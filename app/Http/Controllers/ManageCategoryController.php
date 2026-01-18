<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ManageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        $query = Category::query();

        // SEARCH
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                ->orWhere('slug', 'like', "%{$request->search}%")
                ->orWhere('description', 'like', "%{$request->search}%");
            });
        }
        $categories = $query->latest()->paginate(10)->withQueryString();
        return view('dashboard.category.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|min:3|max:50|unique:categories,slug',
            'description' => 'required|string|min:10',
        ]);

        Category::create($validatedData);

        return redirect('/managecategory')->with('success', 'Kategori berhasil ditambahkan');
    }


    /**
     * Update the specified resource in storage.
     */
   
   // ... bagian atas tetap sama ...

    public function show(Category $managecategory)
    {
        return view('dashboard.category.show', ['category' => $managecategory]);
    }

    public function edit(Category $managecategory)
    {
        return view('dashboard.category.edit', ['category' => $managecategory]);
    }

    public function update(Request $request, Category $managecategory)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|min:3|max:50|unique:categories,slug,' . $managecategory->id,
            'description' => 'required|string|min:10',
        ]);

        $managecategory->update($validated);

        return redirect('/managecategory')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(Category $managecategory)
    {
        $managecategory->delete();
        return redirect()->route('managecategory.index')->with('success', 'Kategori berhasil dihapus.');
    }


    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}