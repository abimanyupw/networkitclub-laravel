@extends('layouts.dashboard-app')

@section('content')
<div class="min-h-screen pb-10 text-slate-900 dark:text-slate-100">

    {{-- HEADER --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Detail Manajemen Tugas</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                <line x1="8" y1="7" x2="16" y2="7"/>
                <line x1="8" y1="11" x2="16" y2="11"/>
                <line x1="8" y1="15" x2="13" y2="15"/>
            </svg>
            <a href="{{ route('manageassignment.index') }}" class="hover:underline font-medium">Manajemen Tugas</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Detail Pengumpulan</span>
        </nav>
    </div>

    {{-- KARTU STATISTIK RINGKAS --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-slate-900 p-6 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm transition-all hover:shadow-md">
            <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest mb-1">Total Pengumpulan</p>
            <div class="flex items-end justify-between">
                <h3 class="text-3xl font-black text-indigo-600">{{ $assignment->submissions->count() }}</h3>
                <span class="text-xs text-slate-400 font-medium">Siswa</span>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-900 p-6 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm transition-all hover:shadow-md border-l-4 border-l-emerald-500">
            <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest mb-1">Tepat Waktu</p>
            <div class="flex items-end justify-between">
                <h3 class="text-3xl font-black text-emerald-500">
                    {{ $assignment->submissions->filter(fn($s) => $s->created_at <= $assignment->deadline)->count() }}
                </h3>
                <span class="text-xs text-emerald-500/60 font-medium italic">On-Time</span>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-900 p-6 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm transition-all hover:shadow-md border-l-4 border-l-rose-500">
            <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest mb-1">Terlambat</p>
            <div class="flex items-end justify-between">
                <h3 class="text-3xl font-black text-rose-500">
                    {{ $assignment->submissions->filter(fn($s) => $s->created_at > $assignment->deadline)->count() }}
                </h3>
                <span class="text-xs text-rose-500/60 font-medium italic">Late</span>
            </div>
        </div>
    </div>

    <div class="mb-6">
        <a href="{{ route('manageassignment.index') }}"
           class="inline-flex items-center gap-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 px-5 py-2.5 rounded-xl font-bold transition shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="bg-indigo-600 px-8 py-5 flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h2 class="text-white font-bold text-lg tracking-tight italic">{{ $assignment->title }}</h2>
                <p class="text-indigo-200 text-xs mt-1">Daftar pengumpulan berkas oleh siswa</p>
            </div>
            <div class="bg-white/10 backdrop-blur-md px-4 py-2 rounded-2xl border border-white/20">
                <span class="text-white text-xs font-black uppercase tracking-widest">
                    {{ $assignment->submissions->count() }} Submissions
                </span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-800/50 text-[11px] font-black uppercase tracking-[0.2em] text-slate-400">
                        <th class="px-8 py-5">Identitas Siswa</th>
                        <th class="px-6 py-5 text-center">Berkas</th>
                        <th class="px-6 py-5">Waktu Kirim</th>
                        <th class="px-6 py-5 text-center">Status</th>
                        <th class="px-6 py-5 text-center">Nilai</th>
                        <th class="px-8 py-5 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($assignment->submissions as $sub)
                    <tr class="group hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="px-8 py-5 font-bold text-slate-800 dark:text-slate-200">
                            {{ $sub->user->name }}
                        </td>

                        <td class="px-6 py-5 text-center">
                            @if($sub->file)
                                <a href="{{ Storage::url($sub->file) }}"
                                   target="_blank"
                                   class="inline-flex items-center gap-2 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 px-4 py-2 rounded-xl text-xs font-bold hover:bg-blue-600 hover:text-white transition-all border border-blue-100 dark:border-blue-800">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h4.586A1 1 0 0111 2.414l4.586 4.586a1 1 0 01.293.707V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/></svg>
                                    Lihat Berkas
                                </a>
                            @else
                                <span class="text-slate-300 italic text-[10px] uppercase font-bold tracking-tighter">No File</span>
                            @endif
                        </td>

                        <td class="px-6 py-5 text-xs text-slate-500 dark:text-slate-400">
                            {{ $sub->created_at->translatedFormat('d M Y') }}
                            <span class="block opacity-60 text-[10px] font-mono mt-0.5">{{ $sub->created_at->format('H:i') }} WIB</span>
                        </td>

                        <td class="px-6 py-5 text-center">
                            @if($sub->created_at->gt($assignment->deadline))
                                <span class="bg-rose-100 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest border border-rose-200 dark:border-rose-800">
                                    ⚠️ Terlambat
                                </span>
                            @else
                                <span class="bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 px-3 py-1.5 rounded-lg text-[10px] font-black uppercase tracking-widest border border-emerald-200 dark:border-emerald-800">
                                    ✅ On Time
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-5 text-center">
                            @if($sub->score !== null)
                                <div class="flex flex-col items-center">
                                    <span class="text-2xl font-black text-indigo-600 dark:text-indigo-400 leading-none">{{ $sub->score }}</span>
                                    <span class="text-[9px] uppercase font-black text-emerald-500 tracking-tighter mt-1 italic">Graded</span>
                                </div>
                            @else
                                <div class="flex flex-col items-center">
                                    <span class="text-slate-300 dark:text-slate-700 font-black text-xl leading-none">---</span>
                                    <span class="text-[9px] uppercase font-black text-rose-400 tracking-tighter mt-1 italic">Not Graded</span>
                                </div>
                            @endif
                        </td>

                        <td class="px-8 py-5 text-center">
                            <button onclick="openScoreModal({{ $sub->id }}, '{{ addslashes($sub->user->name) }}', {{ $sub->score ?? 'null' }}, '{{ addslashes($sub->feedback ?? '') }}')"
                                    class="bg-indigo-600 text-white hover:bg-indigo-700 px-5 py-2.5 rounded-2xl text-[11px] font-black uppercase tracking-widest transition-all shadow-lg shadow-indigo-200 dark:shadow-none active:scale-95">
                                Beri Nilai
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-24 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-20 h-20 bg-slate-50 dark:bg-slate-800 rounded-full flex items-center justify-center mb-6">
                                    <svg class="w-10 h-10 text-slate-200 dark:text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-slate-800 dark:text-white font-bold">Belum Ada Pengumpulan</h3>
                                <p class="text-slate-400 text-sm mt-1 italic">Mahasiswa belum menyerahkan tugas untuk projek ini.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODAL PENILAIAN --}}
<div id="scoreModal" class="fixed inset-0 bg-slate-900/80 backdrop-blur-md hidden items-center justify-center z-[100] transition-all p-4 animate-in fade-in duration-300">
    <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] shadow-2xl w-full max-w-md overflow-hidden border border-slate-100 dark:border-slate-800">
        <div class="bg-indigo-600 p-8">
            <h3 class="text-2xl font-black text-white italic tracking-tight">Grade Assignment</h3>
            <p id="studentName" class="text-indigo-100 text-[10px] font-bold uppercase tracking-[0.2em] mt-1"></p>
        </div>

        <form method="POST" id="scoreForm" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-3">Nilai Mahasiswa (0-100)</label>
                <input type="number" name="score" id="scoreInput"
                       class="w-full bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition outline-none text-lg font-black"
                       min="0" max="100" placeholder="0" required>
            </div>

            <div>
                <label class="block text-[11px] font-black text-slate-400 uppercase tracking-widest mb-3">Feedback / Catatan</label>
                <textarea name="feedback" id="feedbackInput"
                          rows="4" placeholder="Berikan saran atau evaluasi..."
                          class="w-full bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-2xl px-5 py-4 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition outline-none text-sm leading-relaxed"></textarea>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="button"
                        onclick="closeScoreModal()"
                        class="flex-1 py-4 bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 rounded-2xl font-black uppercase tracking-widest text-[11px] hover:bg-slate-200 transition">
                    Batal
                </button>

                <button type="submit"
                        class="flex-2 px-8 py-4 bg-indigo-600 text-white rounded-2xl font-black uppercase tracking-widest text-[11px] hover:bg-indigo-700 shadow-xl shadow-indigo-500/20 transition active:scale-95">
                    Submit Score
                </button>
            </div>
        </form>
    </div>
</div>

{{-- JAVASCRIPT LOGIC --}}
<script>
function openScoreModal(id, name, score, feedback) {
    const modal = document.getElementById('scoreModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    document.getElementById('studentName').innerText = 'SISWA: ' + name;
    
    // Reset dan isi input
    document.getElementById('scoreInput').value = (score !== null) ? score : '';
    document.getElementById('feedbackInput').value = feedback || '';
    
    // Update Action Form URL (Sesuaikan dengan rute Laravel Anda)
    // Pastikan rute ini mengarah ke method update di submission controller
    document.getElementById('scoreForm').action = `/submission/${id}/score`;
}

function closeScoreModal() {
    const modal = document.getElementById('scoreModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Close on Outside Click
window.onclick = function(event) {
    const modal = document.getElementById('scoreModal');
    if (event.target == modal) {
        closeScoreModal();
    }
}
</script>
@endsection