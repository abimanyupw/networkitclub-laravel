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

    public function contact(){
        return view('landing.contact');
    }

}