<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ManageCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Course::query();

        // SEARCH
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%")
                ->orWhere('slug', 'like', "%{$request->search}%")
                ->orWhere('description', 'like', "%{$request->search}%");
            });
        }
        
        // Menggunakan nama variabel plural agar konsisten di Blade
        $courses = $query->latest()->paginate(10)->withQueryString();
        return view('dashboard.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|unique:courses,slug',
            'description' => 'required|string',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('courses', 'public');
        }

        Course::create($validated);

        return redirect()->route('managecourse.index')
            ->with('success', 'Kelas baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
   /**
 * Display the specified resource.
 */
    public function show($slug)
    {
        // Mengambil course beserta materi-materinya
        // Kita asumsikan di Model Course sudah ada relasi 'materials'
        $course = Course::where('slug', $slug)
            ->with(['materials.category']) 
            ->firstOrFail();

        // Mengambil kategori unik yang ada di dalam kursus ini saja
        $categories = $course->materials->pluck('category')->unique('id');

        return view('dashboard.course.show', compact('course', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        return view('dashboard.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|unique:courses,slug,' . $course->id,
            'description' => 'required|string',
            'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama
            if ($course->thumbnail) {
                Storage::delete('public/' . $course->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('courses', 'public');
        }

        $course->update($validated);

        return redirect()->route('managecourse.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        // Hapus file thumbnail dari storage
        if ($course->thumbnail) {
            Storage::delete('public/' . $course->thumbnail);
        }

        $course->delete();

        return redirect()->route('managecourse.index')
            ->with('success', 'Kelas berhasil dihapus secara permanen.');
    }

    /**
     * Generate slug otomatis (Ajax)
     */
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Course::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}