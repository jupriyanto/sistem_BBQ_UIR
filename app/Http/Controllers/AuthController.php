<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Mentor;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Cek apakah email dan password cocok dengan admin
        if ($request->email === 'ddik123@gmail.com' && $request->password === 'ddikcomel') {
            // Login sebagai admin
            Auth::loginUsingId(1); // Asumsikan admin memiliki ID 1
            return redirect()->route('dashboard');
        }

        // Cek apakah mentor ada dalam database
        $mentor = Mentor::where('email', $request->email)->first();

        if ($mentor && Hash::check($request->password, $mentor->password)) {
            Auth::login($mentor);
            return redirect()->route('beranda');
        }

        // Jika login gagal
        return redirect()->back()->with('error', 'Email atau Kata Sandi salah.');
    }

    public function dashboard()
    {
        try {
            $mentors = Mentor::all(); // Ambil semua data mentor
            return view('admin.admin_dashboard', compact('mentors'));
        } catch (\Exception $e) {
            \Log::error('Error loading dashboard: ' . $e->getMessage());
            abort(500, 'Something went wrong');
        }
    }

    public function beranda()
    {
        return view('user.user_beranda');
    }
}
