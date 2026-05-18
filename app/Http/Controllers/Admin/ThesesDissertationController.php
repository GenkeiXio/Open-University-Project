<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThesesDissertationController extends Controller
{
    /*public function index()
    {
        return view('Users.add_theses');
    }*/

    public function create()
    {
        return view('Users.add_theses');
    }

     public function upload()
    {
        return view('Staff.upload_theses');
    }


    public function index()
{
    return view('Faculty.Theses and Dissertation.facultythesis');
}

 public function facultyUpload()
    {
        return view('Faculty.Theses and Dissertation.facultythesis_upload');
    }

    public function Adminindex()
{
    $stats = [
        'total_theses' => 0,
        'faculty_uploads' => 0,
        'staff_uploads' => 0,
    ];

    $uploads = [
        [
            'title' => 'AI-Based Library System',
            'uploaded_by' => 'Juan Dela Cruz',
            'role' => 'Faculty',
            'department' => 'IT Department',
            'year' => '2025',
            'semester' => '1st',
            'status' => 'Approved',
            'date' => '2026-05-18',
        ],
    ];

    $monthlySubmissions = [5, 8, 10, 6, 12, 9];

    $semesterData = [20, 15, 5];

    return view('Admin.admintheses_dissertation', compact(
        'stats',
        'uploads',
        'monthlySubmissions',
        'semesterData'
    ));
}


}