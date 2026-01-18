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
        // 1. Validasi input form
        $request->validate([
            'username' => 'required',
            'email'    => 'required|email',
            'phone'    => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'phone.required'    => 'Nomor telepon wajib diisi.',
        ]);

        // 2. Cari user yang memiliki KETIGA kecocokan data tersebut
        $user = User::where('username', $request->username)
                    ->where('email', $request->email)
                    ->where('phone', $request->phone)
                    ->first();

        // 3. Jika salah satu data tidak cocok
        if (!$user) {
            return back()->with('error', 'Data yang Anda masukkan tidak sesuai dengan catatan kami. Silakan periksa kembali Username, Email, atau Nomor Telepon Anda.');
        }

        // 4. Generate password sementara
        $tempPassword = Str::random(8);
        $user->password = Hash::make($tempPassword);
        $user->save();

        // 5. Kembalikan dengan sukses
        return back()->with('success', 'Verifikasi berhasil! Password Anda telah direset.')
                     ->with('tempPassword', $tempPassword);
    }
}