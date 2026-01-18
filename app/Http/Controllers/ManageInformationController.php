<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ManageInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        return view('dashboard.information.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Category & Course dihapus karena tidak ada di kolom tabel gambar
        return view('dashboard.information.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'slug'    => 'required|string|min:3|max:100|unique:informations,slug',
            'content' => 'required|string',

        ]);
        Information::create($validated);

        return redirect()
            ->route('manageinformation.index')
            ->with('success', 'Informasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Information $manageinformation)
    {
        return view('dashboard.information.show', compact('manageinformation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Information $manageinformation)
    {
        return view('dashboard.information.edit', [
            'information' => $manageinformation
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Information $manageinformation)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'slug'    => 'required|string|min:3|max:100|unique:informations,slug,' . $manageinformation->id,
            'content' => 'required|string',

        ]);



        $manageinformation->update($validated);

        return redirect()
            ->route('manageinformation.index')
            ->with('success', 'Informasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $manageinformation)
    {
        $manageinformation->delete();

        return redirect()
            ->route('manageinformation.index')
            ->with('success', 'Informasi berhasil dihapus.');
    }

    /**
     * Generate slug automatically.
     */
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Information::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
    
    public function uploadImage(Request $request)
{
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        
        // Simpan gambar ke folder public/storage/information
        $path = $file->store('information', 'public');
        
        // Kembalikan URL lengkap gambar
        return response()->json([
            'url' => asset('storage/' . $path)
        ]);
    }

    return response()->json(['error' => 'No image uploaded'], 400);
}
}