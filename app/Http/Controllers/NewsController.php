<?php

namespace App\Http\Controllers;

use App\Models\News; //
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display the BUOU Home page with dynamic news.
     */
    public function index()
    {
        // Fetch all news ordered by newest first
        $allNews = News::orderBy('created_at', 'desc')->get();

        // Take the 2 most recent news items for the sidebar
        $latestNewsItems = $allNews->take(2);

        // Get everything else for the News Section tab (starting from index 2)
        $archiveNews = $allNews->slice(2);

        return view('home', compact('latestNewsItems', 'archiveNews'));
    }
}