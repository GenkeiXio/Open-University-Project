<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Research;
use App\Models\Program;


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


    public function index(Request $request)
{
    $facultyName = session('admin_name');

    // FOR COUNTS 
    $adviserCount = Research::where('adviser', 'LIKE', '%' . $facultyName . '%')->count();
    $chairCount = Research::where('chairperson', 'LIKE', '%' . $facultyName . '%')->count();
    $memberCount = Research::whereJsonContains('panel_members', $facultyName)->count();

    // FOR TABLE 
    $uploadedRecords = Research::where('uploaded_by', $facultyName)->latest()->get();

    return view(
        'Faculty.Theses and Dissertation.facultythesis',
        compact('uploadedRecords', 'adviserCount', 'chairCount', 'memberCount')
    );
}

public function facultyUpload()
{
    $programs = \App\Models\Program::all();
    return view('Faculty.Theses and Dissertation.facultythesis_upload', compact('programs'));
}

public function edit($id)
{
    $programs = Program::all();
    $research = Research::findOrFail($id);
    
    // Debug: Log the data
    \Log::info('Editing research:', [
        'id' => $research->id,
        'published_date' => $research->published_date,
        'pdf_path' => $research->pdf_path,
        'keywords' => $research->keywords
    ]);
    
    if ($research->keywords && is_string($research->keywords)) {
        $research->keywords = json_decode($research->keywords, true);
    }
  
    if ($research->panel_members && is_string($research->panel_members)) {
        $research->panel_members = json_decode($research->panel_members, true);
    }
    
    if ($research->published_date) {
        $research->published_date = date('Y-m-d', strtotime($research->published_date));
    }
    
    return view('Faculty.Theses and Dissertation.facultythesis_upload', compact('programs', 'research'));
}

    public function Adminindex(Request $request)
{
    $year = $request->get('year');
    $semester = $request->get('semester');
    
    $query = Research::query();
    
    if ($year) {
        $query->whereYear('published_date', $year);
    }
    
    if ($semester) {
        $monthMapping = [
            '1st' => [1, 2, 3, 4, 5, 6],
            '2nd' => [7, 8, 9, 10, 11, 12],
            'Midyear' => [6, 7, 8],
        ];
        if (isset($monthMapping[$semester])) {
            $query->whereIn(\DB::raw('MONTH(published_date)'), $monthMapping[$semester]);
        }
    }
    
    $stats = [
        'total_theses' => Research::count(),
        'faculty_uploads' => Research::where('uploaded_by', 'NOT LIKE', '%Staff%')->count(),
        'staff_uploads' => Research::where('uploaded_by', 'LIKE', '%Staff%')->count(),
    ];
    
    $uploads = $query->latest()->take(50)->get();
    
    $monthlySubmissions = [];
    for ($month = 1; $month <= 12; $month++) {
        $monthlySubmissions[] = Research::whereMonth('published_date', $month)
            ->whereYear('published_date', $year ?? date('Y'))
            ->count();
    }
    
    $firstSem = Research::whereIn(\DB::raw('MONTH(published_date)'), [1,2,3,4,5,6])->count();
    $secondSem = Research::whereIn(\DB::raw('MONTH(published_date)'), [7,8,9,10,11,12])->count();
    $midyear = Research::whereIn(\DB::raw('MONTH(published_date)'), [6,7,8])->count();
    $semesterData = [$firstSem, $secondSem, $midyear];
    
    $uploadsArray = [];
    foreach ($uploads as $upload) {
        $role = str_contains($upload->uploaded_by ?? '', 'Staff') ? 'Staff' : 'Faculty';
        $uploadsArray[] = [
            'title' => $upload->title,
            'uploaded_by' => $upload->uploaded_by ?? $upload->author,
            'role' => $role,
            'department' => $upload->program->name ?? 'N/A',
            'year' => $upload->published_date ? date('Y', strtotime($upload->published_date)) : '',
            'semester' => $this->getSemester($upload->published_date),
            'status' => 'Approved',
            'date' => $upload->published_date ? date('Y-m-d', strtotime($upload->published_date)) : '',
        ];
    }
    
    return view('Admin.admintheses_dissertation', compact('stats', 'uploadsArray', 'monthlySubmissions', 'semesterData'));
}

private function getSemester($date)
{
    if (!$date) return 'N/A';
    $month = date('n', strtotime($date));
    if ($month >= 1 && $month <= 6) return '1st Semester';
    if ($month >= 7 && $month <= 12) return '2nd Semester';
    return 'Midyear';
}

public function store(Request $request)
{
    try {
        \Log::info('Store method called', $request->all());
        
        $request->validate([
            'title' => 'required|string|max:1000',
            'program_id' => 'required|exists:programs,id',
            'document_type' => 'required|in:Thesis,Dissertation',
            'abstract' => 'required|string',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
            'file' => 'required|mimes:pdf|max:20480',
            'adviser' => 'nullable|string|max:255',
            'chairperson' => 'nullable|string|max:255',
            'panel_members' => 'nullable|array',
            'citation' => 'nullable|string',
        ]);

        // Handle file upload
        if (!$request->hasFile('file')) {
            throw new \Exception('No file uploaded');
        }
        
        $file = $request->file('file');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9]/', '_', $originalName) . '.pdf';
        $pdfPath = $file->storeAs('research-pdfs', $filename, 'public');
        
        if (!$pdfPath) {
            throw new \Exception('Failed to store file');
        }

        $level = $request->document_type === 'Dissertation'
            ? 'doctorate'
            : 'masters';

        // Handle keywords - decode from JSON or use empty array
        $keywords = [];
        if ($request->keywords) {
            $keywords = json_decode($request->keywords, true);
            if (!is_array($keywords)) {
                $keywords = [];
            }
        }

        // Handle panel members - ensure it's an array
        $panelMembers = $request->panel_members ?? [];
        if (!is_array($panelMembers)) {
            $panelMembers = [];
        }

        // Get the program to get the degree name
        $program = Program::find($request->program_id);
        
        $research = Research::create([
            'title' => $request->title,
            'author' => $request->author,
            'level' => $level,
            'status' => 'completed',
            'program_id' => $request->program_id,
            'degree' => $program->name,
            'document_type' => $request->document_type,
            'abstract' => $request->abstract,
            'published_date' => $request->published_date,
            'adviser' => $request->adviser,
            'chairperson' => $request->chairperson,
            'panel_members' => $panelMembers,
            'keywords' => $keywords,
            'citation' => $request->citation,
            'pdf_path' => $pdfPath,
            'uploaded_by' => session('admin_name'),
        ]);

        \Log::info('Research created successfully', ['id' => $research->id]);

        return response()->json([
            'success' => true,
            'message' => 'Research uploaded successfully.',
            'data' => $research
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed: ' . implode(', ', array_map(function($errors) {
                return implode(', ', $errors);
            }, $e->errors()))
        ], 422);
    } catch (\Throwable $e) {
        \Log::error('Error in store method: ' . $e->getMessage(), [
            'trace' => $e->getTraceAsString()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Error: ' . $e->getMessage()
        ], 500);
    }
}

public function update(Request $request, $id)
{
    try {

        $research = Research::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:1000',
            'program_id' => 'required|exists:programs,id',
            'document_type' => 'required|in:Thesis,Dissertation',
            'abstract' => 'required|string',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
            'adviser' => 'nullable|string|max:255',
            'chairperson' => 'nullable|string|max:255',
            'panel_members' => 'nullable|array',
            'citation' => 'nullable|string',
        ]);

        $program = Program::find($request->program_id);

        $keywords = [];

        if ($request->keywords) {
            $keywords = json_decode($request->keywords, true);

            if (!is_array($keywords)) {
                $keywords = [];
            }
        }

        $panelMembers = $request->panel_members ?? [];

        if (!is_array($panelMembers)) {
            $panelMembers = [];
        }

        $research->title = $request->title;
        $research->author = $request->author;
        $research->program_id = $request->program_id;
        $research->degree = $program->name;
        $research->document_type = $request->document_type;
        $research->abstract = $request->abstract;
        $research->published_date = $request->published_date;
        $research->adviser = $request->adviser;
        $research->chairperson = $request->chairperson;
        $research->panel_members = $panelMembers;
        $research->keywords = $keywords;
        $research->citation = $request->citation;
        
        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $originalName = pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            );

            $filename =
                time() . '_' .
                preg_replace('/[^a-zA-Z0-9]/', '_', $originalName)
                . '.pdf';

            $pdfPath = $file->storeAs(
                'research-pdfs',
                $filename,
                'public'
            );

            $research->pdf_path = $pdfPath;
        }

        $research->save();

        return response()->json([
            'success' => true,
            'message' => 'Research updated successfully.'
        ]);

    } catch (\Throwable $e) {

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);

    }
}

}