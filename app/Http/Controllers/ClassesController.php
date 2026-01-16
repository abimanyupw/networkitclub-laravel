<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('dashboard.classes', compact('courses'));
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
            ->withQueryString();

 
        $categories = Category::whereHas('materials', function ($query) use ($course) {
            $query->where('course_id', $course->id);
        })->get();

        return view('dashboard.class', compact('course', 'materials', 'categories'));
    }
}