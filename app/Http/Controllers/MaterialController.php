<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function show(Material $material)
    {
        // $material sudah data lengkap dari slug
        return view('dashboard.material', compact('material'));
    }
}