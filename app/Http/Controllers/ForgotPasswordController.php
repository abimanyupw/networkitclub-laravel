<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
public function process(Request $request)
{
    // Tambahkan custom message agar lebih user-friendly
    $request->validate([
        'username' => 'required'
    ], [
        'username.required' => 'Username wajib diisi.'
    ]);

    $user = User::where('username', $request->username)->first();

    if (!$user) {
        return back()->with('error', 'Username tidak terdaftar di sistem kami.');
    }

    $tempPassword = Str::random(8);
    $user->password = Hash::make($tempPassword);
    $user->save();

    // Mengirim password ke session untuk ditampilkan di view
    return back()->with('success', 'Password berhasil direset.')
                 ->with('tempPassword', $tempPassword);
}
}