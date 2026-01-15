<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class ManageMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $materials = Material::with(['course', 'category'])
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'like', "%{$request->search}%")
                      ->orWhere('slug', 'like', "%{$request->search}%")
                      ->orWhere('description', 'like', "%{$request->search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString(); // Method ini harus dipanggil langsung setelah paginate()

        return view('dashboard.material.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.material.create', [
            'courses' => Course::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id'   => 'required|exists:courses,id',
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|min:3|max:100|unique:materials,slug',
            'description' => 'required|string|min:10',
            'content'     => 'required|string',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('materials', 'public');
        }

        Material::create($validated);

        return redirect()
            ->route('managematerial.index')
            ->with('success', 'Materi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $managematerial)
    {
        // Karena route model binding menggunakan 'slug', pastikan di Model Material 
        // sudah ada: public function getRouteKeyName() { return 'slug'; }
        $managematerial->load(['course', 'category']);

        return view('dashboard.material.show', compact('managematerial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $managematerial)
    {
        return view('dashboard.material.edit', [
            'material'   => $managematerial,
            'courses'    => Course::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $managematerial)
    {
        $validated = $request->validate([
            'course_id'   => 'required|exists:courses,id',
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|min:3|max:100|unique:materials,slug,' . $managematerial->id,
            'description' => 'required|string|min:10',
            'content'     => 'required|string',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            // Hapus foto lama jika ada
            if ($managematerial->thumbnail) {
                Storage::delete('public/' . $managematerial->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('materials', 'public');
        }

        $managematerial->update($validated);

        return redirect()
            ->route('managematerial.index')
            ->with('success', 'Materi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $managematerial)
    {
        // Hapus file thumbnail jika ada
        if ($managematerial->thumbnail) {
            Storage::delete('public/' . $managematerial->thumbnail);
        }

        $managematerial->delete();

        return redirect()
            ->route('managematerial.index')
            ->with('success', 'Materi berhasil dihapus.');
    }

    /**
     * Generate slug automatically.
     */
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Material::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('material-content', 'public');
            
            return response()->json([
                'url' => asset('storage/' . $path)
            ]);
        }
    }
}