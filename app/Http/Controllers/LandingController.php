<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home(){
        $courses = Course::latest()->get();
        return view('landing.home', compact('courses'));
    }
    public function about(){
        return view('landing.about');
    }
    public function classes(){
        $courses = Course::all();
        return view('landing.classes', compact('courses'));
    }

public function class(Course $course)
{
    $categorySlug = request('category');

    // 1. Ambil materi dengan filter (Eager Loading tetap ada)
    $materials = $course->materials()
        ->with('category')
        ->when($categorySlug, function ($query) use ($categorySlug) {
            $query->whereHas('category', fn($q) => $q->where('slug', $categorySlug));
        })
        ->paginate(6)
        ->withQueryString(); // Menjaga parameter 'category' tetap ada saat pindah halaman pagination

    // 2. Ambil kategori unik yang hanya ada di course ini (Database Level)
    $categories = Category::whereHas('materials', function ($query) use ($course) {
        $query->where('course_id', $course->id);
    })->get();

    return view('dashboard.class', compact('course', 'materials', 'categories'));
}

    public function contact(){
        return view('landing.contact');
    }
}