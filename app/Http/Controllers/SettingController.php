<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('dashboard.settings.show', compact('user'));
    }

    public function edit()
    {
        return view('dashboard.settings.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $rules = [
            'name'     => 'required|string|max:255',
            'username' => 'required|string|min:3|max:20|unique:users,username,' . $user->id,
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'image'    => 'nullable|image|max:2048',
            'password' => 'nullable|min:8'
        ];

        $data = $request->validate($rules);

        // Password
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        // Image
        if ($request->file('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
            $data['image'] = $request->file('image')->store('user-images', 'public');
        }

        // ❌ PASTIKAN ROLE TIDAK IKUT TERUPDATE
        unset($data['role']);

        $user->update($data);

        return redirect('/settings')->with('success', 'Profil berhasil diperbarui.');
    }
}