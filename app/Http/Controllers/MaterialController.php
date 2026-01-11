<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function show(Course $course, Material $material)
{
    // 1. Validasi Keamanan
    if ($material->course_id !== $course->id) {
        abort(404);
    }

    // 2. Filter Sidebar: Hanya tampilkan materi dengan kategori yang SAMA dengan materi saat ini
    $courseMaterials = $course->materials()
        ->where('category_id', $material->category_id) // Baris kunci untuk filter kategori
        ->orderBy('id', 'asc')
        ->get();

    // 3. Logika Navigasi (Tetap sama)
    $next = $course->materials()
        ->where('id', '>', $material->id)
        ->orderBy('id', 'asc')
        ->first();

    $prev = $course->materials()
        ->where('id', '<', $material->id)
        ->orderBy('id', 'desc')
        ->first();

    return view('dashboard.material', compact(
        'course', 
        'material', 
        'courseMaterials', 
        'next', 
        'prev'
    ));
}
}