@extends('layouts.dashboard-app')

@section('content')
<div class="min-h-screen pb-10 text-slate-900 dark:text-slate-100">

    {{-- HEADER --}}
     <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Detail Tugas</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                <line x1="8" y1="7" x2="16" y2="7"/>
                <line x1="8" y1="11" x2="16" y2="11"/>
                <line x1="8" y1="15" x2="13" y2="15"/>
                </svg>
            <a href="{{ route('manageassignment.index') }}" class="hover:underline font-medium">Manajemen Tugas</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Detail Tugas</span>
        </nav>
        </div>
        <div class="mb-6 flex flex-wrap gap-2">
        <a href="{{ route('manageassignment.index') }}"
           class="inline-flex items-center gap-2 bg-slate-800 dark:bg-slate-700 hover:bg-slate-900 text-white px-5 py-2.5 rounded-xl font-bold transition shadow-lg shadow-slate-200 dark:shadow-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali
        </a>
    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="bg-indigo-600 px-6 py-4 flex justify-between items-center">
            <h2 class="text-white font-bold text-lg">Daftar Mahasiswa Mengumpulkan</h2>
            <span class="bg-indigo-500 text-white text-xs px-3 py-1 rounded-full border border-indigo-400">
                Total: {{ $assignment->submissions->count() }}
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-800/50 text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">
                        <th class="px-6 py-4">Siswa</th>
                        <th class="px-6 py-4 text-center">Berkas</th>
                        <th class="px-6 py-4">Waktu Kirim</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-center">Nilai</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse($assignment->submissions as $sub)
                    <tr class="group hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-6 py-4 font-bold text-slate-800 dark:text-slate-200">
                            {{ $sub->user->name }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if($sub->file)
                                <a href="{{ Storage::url($sub->file) }}"
                                   target="_blank"
                                   class="inline-flex items-center gap-2 bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-blue-600 hover:text-white transition-all">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h4.586A1 1 0 0111 2.414l4.586 4.586a1 1 0 01.293.707V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"/></svg>
                                    Download
                                </a>
                            @else
                                <span class="text-slate-400 italic text-xs">Tidak ada file</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-xs text-slate-500 dark:text-slate-400">
                            {{ $sub->created_at->translatedFormat('d M Y, H:i') }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if($sub->created_at->gt($assignment->deadline))
                                <span class="bg-rose-100 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400 px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider">
                                    ⚠️ Terlambat
                                </span>
                            @else
                                <span class="bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider">
                                    ✅ Tepat Waktu
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if($sub->score !== null)
                                <span class="text-lg font-black text-indigo-600 dark:text-indigo-400">{{ $sub->score }}</span>
                            @else
                                <span class="text-slate-300 dark:text-slate-600">---</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center">
                            <button onclick="openScoreModal({{ $sub->id }}, '{{ $sub->user->name }}', {{ $sub->score ?? 'null' }}, '{{ $sub->feedback }}')"
                                    class="bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 dark:text-indigo-400 hover:bg-indigo-600 hover:text-white px-4 py-2 rounded-xl text-xs font-bold transition-all shadow-sm">
                                Beri Nilai
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-20 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-slate-200 dark:text-slate-700 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <p class="text-slate-400 italic">Belum ada mahasiswa yang mengumpulkan tugas ini.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODAL --}}
<div id="scoreModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center z-[100] transition-all p-4">
    <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-2xl w-full max-w-md overflow-hidden border border-slate-100 dark:border-slate-800 scale-95 transition-transform">
        <div class="bg-indigo-600 p-6">
            <h3 class="text-xl font-bold text-white">Penilaian Mahasiswa</h3>
            <p id="studentName" class="text-indigo-100 text-sm opacity-80 mt-1"></p>
        </div>

        <form method="POST" id="scoreForm" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Nilai Akhir (0-100)</label>
                <input type="number" name="score" id="scoreInput"
                       class="w-full bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition outline-none"
                       min="0" max="100" placeholder="Masukkan skor..." required>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Feedback / Catatan</label>
                <textarea name="feedback" id="feedbackInput"
                          rows="4" placeholder="Berikan komentar membangun bagi mahasiswa..."
                          class="w-full bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl px-4 py-3 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition outline-none"></textarea>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button"
                        onclick="closeScoreModal()"
                        class="px-5 py-2.5 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-xl font-bold hover:bg-slate-200 transition">
                    Batal
                </button>

                <button type="submit"
                        class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 dark:shadow-none transition">
                    Simpan Nilai
                </button>
            </div>
        </form>
    </div>
</div>

{{-- JAVASCRIPT --}}
<script>
function openScoreModal(id, name, score, feedback) {
    const modal = document.getElementById('scoreModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    
    document.getElementById('studentName').innerText = 'Nama: ' + name;
    document.getElementById('scoreInput').value = score !== null ? score : '';
    document.getElementById('feedbackInput').value = (feedback !== 'undefined' && feedback !== 'null') ? feedback : '';
    
    // Perhatikan: Pastikan route ini sesuai dengan route di web.php Anda
    document.getElementById('scoreForm').action = `/submission/${id}/score`;
}

function closeScoreModal() {
    const modal = document.getElementById('scoreModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Menutup modal jika area luar diklik
window.onclick = function(event) {
    const modal = document.getElementById('scoreModal');
    if (event.target == modal) {
        closeScoreModal();
    }
}
</script>
@endsection