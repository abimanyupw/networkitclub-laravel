<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;


class LoginController extends Controller
{
    
    /**
     * Tampilkan halaman login
     */
    public function show()
    {
        return view('login');
    }

    /**
     * Tangani proses login
     */
    public function login(Request $request)
    {
        // 1. Validasi Input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Fitur Rate Limiting (Keamanan: Maksimal 5 percobaan per menit)
        $throttleKey = Str::lower($request->input('username')) . '|' . $request->ip();
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            return back()->withErrors([
                'username' => "Terlalu banyak percobaan login. Silakan coba lagi dalam $seconds detik.",
            ])->onlyInput('username');
        }

        // 3. Cek Autentikasi
        // Tips: Menggunakan 'username' sebagai field login
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            RateLimiter::clear($throttleKey);

            return redirect()->intended('/dashboard')
                ->with('success', 'Selamat datang kembali di Network IT Club!');
        }

        // 4. Jika Gagal
        RateLimiter::hit($throttleKey);

        return back()->withErrors([
            'username' => 'Kredensial yang Anda berikan tidak cocok dengan data kami.',
        ])->onlyInput('username');
    }

    /**
     * Proses Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}