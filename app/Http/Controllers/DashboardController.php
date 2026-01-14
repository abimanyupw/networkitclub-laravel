<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Course;
use App\Models\Category;
use App\Models\Material;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data pertumbuhan anggota 6 bulan terakhir
        $grafikAnggota = [];
        $labels = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $labels[] = $month->format('M'); // Contoh: Jan, Feb, Mar
            
            // Hitung jumlah user berdasarkan bulan pendaftaran
            $grafikAnggota[] = User::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
        }

        return view('dashboard.dashboard', [
            'totalAnggota' => User::count(),
            'totalMateri'  => Material::count(),
            'totalKelas'   => Course::count(),
            'totalKategori'=> Category::count(),
            'recentMembers' => User::latest()->take(5)->get(),
            // Kirim data asli ke view
            'labels' => $labels,
            'grafikAnggota' => $grafikAnggota,
        ]);
    }
}