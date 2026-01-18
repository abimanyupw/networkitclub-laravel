<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show(){
        return view('register');
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|min:3|max:20|unique:users,username',
            'email'    => 'required|email:dns|unique:users,email',
            'phone'    => 'required|string|max:15',
            'password' => 'required|min:8',
        ]);

        // Enkripsi password
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('login')->with('success', 'Berhasil Mendaftar');
    }

}