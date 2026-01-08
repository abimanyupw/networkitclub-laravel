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

    public function class($slug){
        $course = Course::where('slug', $slug)->firstOrFail();
        return view('dashboard.class', compact('course'));
    }
    public function contact(){
        return view('landing.contact');
    }
}