<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;     //
use App\Models\Activity; //

class NewsController extends Controller
{
    /**
     * Display the BUOU Home page with News and Activities.
     */
    public function index()
    {
        // 1. Fetch all News, newest first
        $allNews = News::orderBy('created_at', 'desc')->get();

        // 2. Separate the Top 2 for the Sidebar
        $latestNewsItems = $allNews->take(2);

        // 3. Get the rest for the Archive Tab
        $archiveNews = $allNews->slice(2);

        // 4. Fetch all Calendar Activities, ordered by date
        $activities = Activity::orderBy('event_date', 'asc')->get();

        // 5. Return the view with all necessary data
        return view('home', compact(
            'latestNewsItems', 
            'archiveNews', 
            'activities'
        ));
    }
}