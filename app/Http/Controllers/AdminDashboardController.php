<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.admin_dashboard', compact('students'));
    }
    public function download($id) 
    { 
        $student = Student::findOrFail($id); 
        $filePath = public_path('storage/' . $student->pdf_path); 
        return response()->download($filePath); 
    }
}
