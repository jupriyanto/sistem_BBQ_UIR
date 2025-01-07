<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = Mentor::all();
        return view('admin.admin_datamentor', compact('mentors'));
    }

    public function create()
    {
        return view('admin.admin_datamentor.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|unique:mentors,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $path = $request->file('photo_path')->store('photos', 'public');

        $mentor = new Mentor();
        $mentor->photo_path = $path;
        $mentor->name = $validatedData['name'];
        $mentor->phone_number = $validatedData['phone_number'];
        $mentor->email = $validatedData['email'];
        $mentor->password = bcrypt($validatedData['password']);
        $mentor->save();

        return redirect()->route('mentors.index')->with('success', 'Mentor created successfully.');
    }

    public function show(Mentor $mentor)
    {
        return view('admin.admin_datamentor.show', compact('mentor'));
    }

    public function edit(Mentor $mentor)
    {
        return view('admin.admin_datamentor.edit', compact('mentor'));
    }

    public function update(Request $request, Mentor $mentor)
    {
        $validatedData = $request->validate([
            'photo_path' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|unique:mentors,email,'.$mentor->id,
            'password' => 'sometimes|string|min:8|confirmed',
        ]);

        if ($request->hasFile('photo_path')) {
            $path = $request->file('photo_path')->store('photos', 'public');
            $mentor->photo_path = $path;
        }

        $mentor->name = $validatedData['name'];
        $mentor->phone_number = $validatedData['phone_number'];
        $mentor->email = $validatedData['email'];
        if ($request->filled('password')) {
            $mentor->password = bcrypt($validatedData['password']);
        }

        $mentor->save();

        return redirect()->route('mentors.index')->with('success', 'Mentor updated successfully.');
    }

    public function destroy(Mentor $mentor)
    {
        $mentor->delete();
        return redirect()->route('mentors.index')->with('success', 'Mentor deleted successfully.');
    }
}
