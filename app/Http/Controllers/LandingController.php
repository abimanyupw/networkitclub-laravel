<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home(){
        return view('landing.home');
    }
    public function about(){
        return view('landing.about');
    }
    public function class(){
        return view('landing.class');
    }
    public function contact(){
        return view('landing.contact');
    }
}