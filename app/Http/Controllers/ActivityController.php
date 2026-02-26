<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity; //

class ActivityController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'time_or_location' => 'required|string',
            'color_code' => 'required|string'
        ]);

        Activity::create([
            'title' => $request->title,
            'event_date' => $request->event_date,
            'time_or_location' => $request->time_or_location,
            'color_code' => $request->color_code,
        ]);

        return back()->with('success', 'Activity added successfully!');
    }
}