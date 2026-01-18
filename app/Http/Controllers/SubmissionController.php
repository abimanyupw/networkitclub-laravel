<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $assignments = Assignment::query()
            // Eager Load submissions untuk user yang sedang login saja
            // agar tidak terjadi Lazy Loading di Blade saat cek status 'Terkumpul'
            ->with(['submissions' => function ($query) {
                $query->where('user_id', Auth::id());
            }])
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->latest()
            ->get();

        return view('dashboard.subsmission.index', [
            'assignments' => $assignments
        ]);
    }

 public function show(Assignment $assignment)
{
    // Memuat data submission milik user yang sedang login
    $submission = $assignment->submissions()
        ->where('user_id', auth()->id())
        ->first();

    return view('dashboard.subsmission.show', compact('assignment', 'submission'));
}


    public function store(Request $request, Assignment $assignment)
{
    // 1. TAMBAHKAN LOGIKA PENGUNCI WAKTU DISINI
    if (now()->gt($assignment->deadline)) {
        return back()->with('error', 'Gagal! Batas waktu pengumpulan tugas ini telah berakhir.');
    }

    // 2. Validasi file
    $request->validate([
        'file' => 'required|mimes:pdf,zip,rar|max:5120',
    ]);

    $submission = Submission::where('assignment_id', $assignment->id)
        ->where('user_id', Auth::id())
        ->first();

    // Hapus file lama jika ada
    if ($submission && $submission->file && Storage::disk('public')->exists($submission->file)) {
        Storage::disk('public')->delete($submission->file);
    }

    // Simpan file baru
    $filePath = $request->file('file')->store('submissions', 'public');

    // Update atau buat baru
    Submission::updateOrCreate(
        [
            'assignment_id' => $assignment->id,
            'user_id' => Auth::id(),
        ],
        [
            'file' => $filePath,
            'note' => $request->note,
            'score' => null, // Reset skor jika mereka update (sebelum tenggat)
        ]
    );

    return back()->with('success', 'Tugas berhasil dikirim / diperbarui');
}

    public function score(Request $request, Submission $submission)
    {
        $request->validate([
            'score' => 'required|integer|min:0|max:100',
            'feedback' => 'nullable|string',
        ]);

        $submission->update([
            'score' => $request->score,
            'feedback' => $request->feedback,
        ]);

        return back()->with('success', 'Nilai & feedback berhasil disimpan');
    }
}