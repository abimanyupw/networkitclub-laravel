<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home(){
        $courses = Course::latest()->take(2)->get();
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

    $materials = $course->materials()
        ->with('category')
        ->when($categorySlug, function ($query) use ($categorySlug) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        })
        ->paginate(6);

    $categories = $course->materials()
        ->with('category')
        ->get()
        ->pluck('category')
        ->unique('id');

    return view('dashboard.class', compact(
        'course',
        'materials',
        'categories'
    ));
}

    public function contact(){
        return view('landing.contact');
    }
}