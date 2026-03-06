<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Activity;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * EXISTING: Display public home page
     */
    public function index()
    {
        // 1. Fetch all news from the database
        $allNews = \App\Models\News::orderBy('created_at', 'desc')->get();

        // 2. This fixes the error in RightSide.blade.php
        $latestNewsItems = $allNews->take(2);

        // 3. This fixes the error in News.blade.php
        // We send all news so the accordion/list can display everything
        $news = $allNews;

        // 4. Fetch activities for the calendar
        $activities = \App\Models\Activity::orderBy('event_date', 'asc')->get();

        // 5. Pass everything to the view
        return view('home', compact(
            'latestNewsItems', 
            'news', 
            'activities'
        ));
    }

    /**
     * NEW: Display the Admin News Management page
     */
    public function manage()
    {
        $news = \App\Models\News::latest()->get();
        
        // Corrected path to match your SidebarContent folder
        return view('Super-Admin.SidebarContent.news_management', compact('news'));
    }

    /**
     * NEW: Store a new news item from the Admin Dashboard
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // Changed disk to 'local' (storage/app/News)
            $imagePath = $request->file('image')->store('News', 'local');
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'created_at' => $request->created_at ?? now(),
            'published_at' => $request->created_at ?? now(),
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'News published successfully!');
    }

    /**
     * NEW: Show the edit form or return data for JavaScript
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return response()->json($news);
    }

    /**
     * NEW: Update an existing news item
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete from 'local' disk
            if ($news->image) {
                Storage::disk('local')->delete($news->image);
            }
            $news->image = $request->file('image')->store('News', 'local');
        }

        $news->title = $request->title;
        $news->content = $request->content;
        $news->created_at = $request->created_at ?? $news->created_at;
        $news->published_at = $request->created_at ?? $news->published_at;
        $news->save();

        return redirect()->back()->with('success', 'News updated successfully!');
    }

    /**
     * NEW: Delete a news item
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

    public function showImage($id)
    {
        // 1. Find the news record
        $news = \App\Models\News::findOrFail($id);

        // 2. Build the full system path to storage/app/News/filename.jpg
        // Since you moved the folder to storage/app/News, and the database 
        // stores "News/filename.jpg", this math works:
        $path = storage_path('app/' . $news->image);

        // 3. Verify if the file physically exists in the new location
        if ($news->image && file_exists($path)) {
            return response()->file($path);
        }

        // 4. If it fails, we know the database string doesn't match the filename
        abort(404, "File not found at: " . $path); 
    }
}