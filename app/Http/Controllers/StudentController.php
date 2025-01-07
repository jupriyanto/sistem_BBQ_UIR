<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('user.user_laporan', compact('students'));
    }

    public function indexFakultasHukum() 
    { 
        $students = Student::where('fakultas', 'fakultas hukum')->get();
        return view('fakultas.fh', compact('students')); 
    }

    public function indexFakultasTeknik() 
    { 
        $students = Student::where('fakultas', 'fakultas teknik')->get();
        return view('fakultas.ft', compact('students')); 
    }

    public function indexFakultasPsikologi() 
    { 
        $students = Student::where('fakultas', 'fakultas psikologi')->get();
        return view('fakultas.fpsi', compact('students')); 
    }

    public function indexFakultasAgamaIslam() 
    { 
        $students = Student::where('fakultas', 'fakultas agama islam')->get();
        return view('fakultas.fai', compact('students')); 
    }

    public function indexFakultasKeguruanDanIlmuPendidikan() 
    { 
        $students = Student::where('fakultas', 'fakultas keguruan dan ilmu pendidikan')->get();
        return view('fakultas.fkip', compact('students')); 
    }

    public function indexFakultasEkonomiBisnis() 
    { 
        $students = Student::where('fakultas', 'fakultas ekonomi bisnis')->get();
        return view('fakultas.feb', compact('students')); 
    }

    public function indexFakultasIlmuSosialDanPolitik() 
    { 
        $students = Student::where('fakultas', 'fakultas ilmu sosial dan politik')->get();
        return view('fakultas.fisipol', compact('students')); 
    }

    public function indexFakultasPertanian() 
    { 
        $students = Student::where('fakultas', 'fakultas pertanian')->get();
        return view('fakultas.faperta', compact('students')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_hp' => 'required',
            'program_studi' => 'required',
            'fakultas' => 'required',
            'pdf' => 'required|mimes:pdf|max:2048',
        ]);

        $pdf = $request->file('pdf');
        $pdfName = $pdf->getClientOriginalName(); // Mendapatkan nama asli file
        $pdfPath = $pdf->storeAs('uploads', $pdfName, 'public'); // Simpan file dengan nama asli

        Student::create([
            'nama' => $request->nama,
            'nomor_hp' => $request->nomor_hp,
            'program_studi' => $request->program_studi,
            'fakultas' => $request->fakultas,
            'pdf_path' => $pdfPath,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
