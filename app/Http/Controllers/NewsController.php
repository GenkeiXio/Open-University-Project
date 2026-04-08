<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Activity;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display public home page
     */
    public function index()
    {
        $allNews = News::orderBy('created_at', 'desc')->get();

        $latestNewsItems = $allNews->take(2);
        $news = $allNews;

        $activities = Activity::orderBy('event_date', 'asc')->get();

        return view('home', compact(
            'latestNewsItems',
            'news',
            'activities'
        ));
    }

    /**
     * Admin News Management page
     */
    public function manage()
    {
        $news = News::latest()->get();
        return view('Admin.SidebarContent.news_management', compact('news'));
    }

    /**
     * Store new news
     */
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

        News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $imagePath,
            'created_at' => $date ? $date : now(),
        ]);

        return redirect()->back()->with('success', 'News published successfully!');
    }

    /**
     * Get news (AJAX)
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return response()->json($news);
    }

    /**
     * Update news
     */
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
            $date = $request->input('created_at');
            $news->created_at = $date;
        }

        $news->save();

        return redirect()->back()->with('success', 'News updated successfully!');
    }

    /**
     * Delete news
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->image) {
            Storage::disk('local')->delete($news->image);
        }

        $news->delete();

        return redirect()->back()->with('success', 'Deleted!');
    }

    /**
     * Show image from storage
     */
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