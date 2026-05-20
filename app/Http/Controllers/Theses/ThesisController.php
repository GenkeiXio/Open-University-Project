<?php

namespace App\Http\Controllers\Theses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Research;
use App\Models\Program;

class ThesisController extends Controller
{
    // Load public theses page data
    public function index()
    {
        return Research::with('program')->latest()->get();
    }

    // Search theses
    public function search(Request $request)
    {
        return Research::with('program')
            ->where('title', 'like', '%' . $request->q . '%')
            ->orWhere('author', 'like', '%' . $request->q . '%')
            ->get();
    }

    // Filter by program
    public function byProgram($code)
    {
        return Research::whereHas('program', function ($q) use ($code) {
            $q->where('code', $code);
        })->get();
    }

    // Dashboard numbers (for cards / chart)
    public function insights()
    {
        return [
            'total' => Research::count(),
            'masters' => Research::where('level', 'masters')->count(),
            'doctorate' => Research::where('level', 'doctorate')->count(),
        ];
    }

    // Get single research by ID
public function show($id)
{
    $research = Research::with('program')->find($id);
    
    if (!$research) {
        return response()->json(['error' => 'Research not found'], 404);
    }
    
    return response()->json($research);
}

// Get all researches (for related publications)
public function all()
{
    return Research::with('program')
        ->orderBy('created_at', 'desc')
        ->get();
}
}