<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ManageCourseController extends Controller
{
    /**
     * Tampilkan daftar kursus/kelas.
     */
    public function index(Request $request)
    {
        $query = Course::query();

        // Fitur Pencarian
        if ($request->filled('search')) {
            $query->where('title', 'like', "%{$request->search}%")
                  ->orWhere('description', 'like', "%{$request->search}%");
        }

        $courses = $query->latest()->paginate(10)->withQueryString();
        return view('dashboard.course.index', compact('courses'));
    }

    /**
     * Form tambah kelas.
     */
    public function create()
    {
        return view('dashboard.course.create');
    }

    /**
     * Simpan kelas baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|min:3|unique:courses,slug',
            'description' => 'required|string|min:10',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('course-images', 'public');
        }

        Course::create($validated);

        return redirect()->route('managecourse.index')
            ->with('success', 'Kelas baru berhasil ditambahkan.');
    }

        public function show(Course $managecourse)
{
    // Mengambil materi dengan kategorinya dan dikelompokkan
    $groupedMaterials = $managecourse->materials()
                        ->with('category')
                        ->get()
                        ->groupBy(function($item) {
                            return $item->category ? $item->category->name : 'Uncategorized';
                        });

    return view('dashboard.course.show', [
        'course' => $managecourse,
        'groupedMaterials' => $groupedMaterials
    ]);
}

    /**
     * Form edit kelas.
     */
    public function edit(Course $managecourse)
    {
        // Menggunakan Route Model Binding, $managecourse otomatis dicari berdasarkan slug
        return view('dashboard.course.edit', ['course' => $managecourse]);
    }

    /**
     * Update data kelas.
     */
    public function update(Request $request, Course $managecourse)
    {
        // 1. Cek Otorisasi (CoursePolicy)
        $this->authorize('update', $managecourse);

        // 2. Validasi
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|min:3|unique:courses,slug,' . $managecourse->id,
            'description' => 'required|string|min:10',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // 3. Logika File Image
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($managecourse->image) {
                Storage::disk('public')->delete($managecourse->image);
            }
            $validated['image'] = $request->file('image')->store('course-images', 'public');
        }

        // 4. Update Database
        $managecourse->update($validated);

        return redirect()->route('managecourse.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Hapus kelas.
     */
    public function destroy(Course $managecourse)
    {
        // Cek Otorisasi
        $this->authorize('delete', $managecourse);

        // Hapus file fisik
        if ($managecourse->image) {
            Storage::disk('public')->delete($managecourse->image);
        }

        // Hapus data dari DB
        $managecourse->delete();

        return redirect()->route('managecourse.index')
            ->with('success', 'Kelas berhasil dihapus secara permanen.');
    }

    /**
     * Generate slug otomatis via Ajax.
     */
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Course::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}