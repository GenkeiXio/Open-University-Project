<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Activity;
use App\Services\ActivityLogger;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $perPage = in_array($request->per_page, [5, 10, 15, 25]) ? (int) $request->per_page : 5;

        $news = News::latest()->paginate($perPage);

        return view('Admin.SidebarContent.news_management', compact('news'));
    }

    public function manage(Request $request)
    {
        // ✅ FIX: use paginate instead of get()
        $perPage = in_array($request->per_page, [5, 10, 15, 25]) ? (int) $request->per_page : 5;

        $news = News::latest()->paginate($perPage);

        return view('Admin.SidebarContent.news_management', compact('news'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('News', 'local');
        }

        $date = $request->input('created_at');

        $news = News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $imagePath,
            'created_at' => $date ? $date : now(),
        ]);

        ActivityLogger::log(
            action: 'Created news article: ' . $news->title,
            module: 'News',
        );

        return redirect()->back()->with('success', 'News published successfully!');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return response()->json($news);
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('local')->delete($news->image);
            }
            $news->image = $request->file('image')->store('News', 'local');
        }

        $news->title = $request->input('title');
        $news->content = $request->input('content');

        if ($request->filled('created_at')) {
            $news->created_at = $request->input('created_at');
        }

        $news->save();

        ActivityLogger::log(
            action: 'Updated news article: ' . $news->title,
            module: 'News',
        );

        return redirect()->back()->with('success', 'News updated successfully!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        ActivityLogger::log(
            action: 'Deleted news article: ' . $news->title,
            module: 'News',
        );

        if ($news->image) {
            Storage::disk('local')->delete($news->image);
        }

        $news->delete();

        return redirect()->back()->with('success', 'Deleted!');
    }

    public function showImage($id)
    {
        $news = News::findOrFail($id);
        $path = storage_path('app/' . $news->image);

        if ($news->image && file_exists($path)) {
            return response()->file($path);
        }

        abort(404, "File not found at: " . $path);
    }
}