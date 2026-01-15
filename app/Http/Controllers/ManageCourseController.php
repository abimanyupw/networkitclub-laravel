<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

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
        $course = $query->latest()->paginate(10)->withQueryString();
        return view('dashboard.course.index', compact('course'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        return view('dashboard.course.show', compact('course'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        // Hapus data dari database
        $course->delete();

        return redirect()->route('managecategory.index')->with('success', 'Kelas berhasil dihapus secara permanen.');
    }
}