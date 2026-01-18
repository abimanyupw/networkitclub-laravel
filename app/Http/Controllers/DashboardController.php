<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use App\Models\Information;
use App\Models\Material;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) // Tambahkan parameter Request
    {
        // 1. Logika Grafik Anggota
        $grafikAnggota = [];
        $labels = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $labels[] = $month->format('M');
            
            $grafikAnggota[] = User::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
        }

        // 2. Logika Paginasi Informasi
        $recentInformation = Information::latest()->paginate(1, ['*'], 'info_page');

        // 3. Cek Request AJAX (Agar paginasi tidak refresh halaman)
        if ($request->ajax()) {
            return view('dashboard.partials.recent-info', compact('recentInformation'))->render();
        }

        // 4. Return View Utama dengan semua data
        return view('dashboard.dashboard', [
            'totalAnggota'   => User::count(),
            'totalMateri'    => Material::count(),
            'totalKelas'     => Course::count(),
            'totalKategori'  => Category::count(),
            'recentMembers'  => User::latest()->take(5)->get(),
            'labels'         => $labels,
            'grafikAnggota'  => $grafikAnggota,
            'recentInformation' => $recentInformation // Pindahkan variabel ke sini
        ]);
    }
}