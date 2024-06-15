<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profilePage()
    {
        return view("Profile/view");
    }

    public function save(Request $request)
    {
        // Validate the form data
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone_number' => 'required',
            'profile_picture' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle file upload
        $profilePicturePath = null;

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/profile_pictures', $fileName);
            $profilePicturePath = 'profile_pictures/' . $fileName;
        }

        // Update user data
        $userId = auth()->id();

        DB::table('users')->where('id', $userId)->update([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'alamat' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'profile_picture' => $profilePicturePath,
        ]);

        return redirect()->route('profile.view');
    }
}
