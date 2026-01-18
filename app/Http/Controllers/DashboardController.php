<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use App\Models\Information;
use App\Models\Material;
use App\Models\Assignment; 
use App\Models\Submission; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) 
    {
        // 1. Grafik Pertumbuhan Anggota (6 Bulan)
        $grafikAnggota = [];
        $labels = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $labels[] = $month->format('M');
            $grafikAnggota[] = User::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
        }

        // 2. Grafik Pengumpulan Tugas (7 Hari Terakhir)
        $grafikTugas = [];
        $labelTugas = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $labelTugas[] = $date->format('d M');
            $grafikTugas[] = Submission::whereDate('created_at', $date)->count();
        }

        // 3. Tugas Terbaru (Tanpa relasi course agar tidak error)
        $recentAssignments = Assignment::latest()->take(3)->get();

        // 4. Paginasi Informasi
        $recentInformation = Information::latest()->paginate(1, ['*'], 'info_page');

        if ($request->ajax()) {
            return view('dashboard.partials.recent-info', compact('recentInformation'))->render();
        }

        return view('dashboard.dashboard', [
            'totalAnggota'      => User::count(),
            'totalMateri'       => Material::count(),
            'totalKelas'        => Course::count(),
            'totalKategori'     => Category::count(),
            'recentMembers'     => User::latest()->take(5)->get(),
            'labels'            => $labels,
            'grafikAnggota'     => $grafikAnggota,
            'labelTugas'        => $labelTugas,
            'grafikTugas'       => $grafikTugas,
            'recentAssignments' => $recentAssignments,
            'recentInformation' => $recentInformation
        ]);
    }
}