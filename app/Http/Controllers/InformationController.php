<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index(Request $request)
    {
        // Variabel disesuaikan dengan yang dipanggil di compact
        $informations = Information::when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', "%{$request->search}%")
                      ->orWhere('slug', 'like', "%{$request->search}%")
                      ->orWhere('content', 'like', "%{$request->search}%"); // description dihapus karena tidak ada di gambar
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dashboard.information', compact('informations'));
    }

    public function show(Information $manageinformation)
    {
        return view('dashboard.informationshow', compact('manageinformation'));
    }
}