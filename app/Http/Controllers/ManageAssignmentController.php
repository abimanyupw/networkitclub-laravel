<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ManageAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $search = $request->input('search');
    
    // Hitung total siswa untuk perbandingan di statistik
    $totalStudents = User::where('role', 'siswa')->count();

    $assignments = Assignment::query()
        ->withCount('submissions') // Mengambil jumlah pengumpul secara otomatis
        ->when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                         ->orWhere('slug', 'like', '%' . $search . '%');
        })
        ->latest()
        ->paginate(10);

    return view('dashboard.assignment.index', compact('assignments', 'totalStudents'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.assignment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|min:3|max:100|unique:assignments,slug',
            'description' => 'required|string|min:10',
            'deadline'    => 'nullable|date',
            'attachment'  => 'nullable|file',
        ]);

        if ($request->hasFile('attachment')) {
            $validatedData['attachment'] =
                $request->file('attachment')->store('assignments');
        }

        Assignment::create($validatedData);

        return redirect('/manageassignment')
            ->with('success', 'Tugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assignment $manageassignment)
    {
        return view('dashboard.assignment.show', [
            'assignment' => $manageassignment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $manageassignment)
    {
        return view('dashboard.assignment.edit', [
            'assignment' => $manageassignment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignment $manageassignment)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'required|string|min:3|max:100|unique:assignments,slug,' . $manageassignment->id,
            'description' => 'required|string|min:10',
            'deadline'    => 'nullable|date',
            'attachment'  => 'nullable|file',
        ]);

        if ($request->hasFile('attachment')) {
            $validated['attachment'] =
                $request->file('attachment')->store('assignments');
        }

        $manageassignment->update($validated);

        return redirect('/manageassignment')
            ->with('success', 'Tugas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $manageassignment)
    {
        $manageassignment->delete();

        return redirect()
            ->route('manageassignment.index')
            ->with('success', 'Tugas berhasil dihapus');
    }

    /**
     * Generate slug (AJAX)
     */
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(
            Assignment::class,
            'slug',
            $request->title
        );

        return response()->json(['slug' => $slug]);
    }


    public function giveScore(Request $request, Assignment $assignment, Submission $submission)
{
    $request->validate([
        'score' => 'required|integer|min:0|max:100',
        'feedback' => 'nullable|string',
    ]);

    $submission->update([
        'score' => $request->score,
        'feedback' => $request->feedback,
    ]);

    return back()->with('success', 'Nilai berhasil disimpan');
}
}