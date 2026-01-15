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
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('dashboard.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('dashboard.category.edit', compact('category'));
    }




    /**
     * Update the specified resource in storage.
     */
   
    public function update(Request $request, Category $managecategory)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'slug'        => 'required|string|min:3|max:50|unique:categories,slug,' . $managecategory->slug . ',slug',
            'description' => 'required|string|min:10',
        ]);

        $managecategory->update($validated);

        return redirect('/managecategory')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
          $category = Category::where('slug', $slug)->firstOrFail();

        // Hapus data dari database
        $category->delete();

        return redirect()->route('managecategory.index')->with('success', 'Kategori Materi berhasil dihapus secara permanen.');
    }



    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}