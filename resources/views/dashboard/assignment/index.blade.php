@extends('layouts.dashboard-app')

@section('content')
<div class="min-h-screen pb-10 text-slate-900 dark:text-slate-100">

    {{-- HEADER & ACTION --}}
        <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Daftar Tugas </h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
  <line x1="8" y1="7" x2="16" y2="7"/>
  <line x1="8" y1="11" x2="16" y2="11"/>
  <line x1="8" y1="15" x2="13" y2="15"/>
</svg>
            <a href="{{ route('manageassignment.index') }}" class="hover:underline font-medium">Manajemen Tugas</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Daftar Tugas </span>
        </nav>
        </div>

<div class="mb-6 flex flex-wrap gap-2">
        <a href="{{ route('manageassignment.create') }}"
           class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-semibold transition-all shadow-lg shadow-blue-200 dark:shadow-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Tambah Tugas Baru
        </a>
    </div>

    {{-- SEARCH & FILTER --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl p-5 mb-6 border border-slate-100 dark:border-slate-800 shadow-sm">
        <form method="GET" class="flex flex-col md:flex-row gap-3">
            <div class="relative flex-1">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari judul tugas atau slug..."
                       class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 pl-10 pr-4 py-2.5 focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>
            <button class="bg-slate-800 dark:bg-blue-600 text-white px-8 py-2.5 rounded-xl font-bold hover:opacity-90 transition">
                Cari
            </button>
            @if(request('search'))
                <a href="{{ route('manageassignment.index') }}" class="flex items-center justify-center px-4 py-2.5 text-slate-500 hover:text-rose-500 transition">
                    Reset
                </a>
            @endif
        </form>
    </div>

    {{-- TABLE CONTAINER --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 dark:bg-slate-800/50 border-b border-slate-100 dark:border-slate-800">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500 text-center w-16">No</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Informasi Tugas</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500">Deadline</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">Statistik Pengumpul</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-500 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @forelse ($assignments as $assignment)
                    <tr class="group hover:bg-blue-50/30 dark:hover:bg-slate-800/50 transition-colors">
                        {{-- NO --}}
                        <td class="p-4 text-center text-slate-400 font-medium">
                            {{ ($assignments->currentPage()-1)*$assignments->perPage()+$loop->iteration }}
                        </td>

                        {{-- JUDUL & SLUG --}}
                        <td class="p-4">
                            <div class="font-bold text-slate-800 dark:text-slate-200 group-hover:text-blue-600 transition-colors">
                                {{ $assignment->title }}
                            </div>
                            <div class="text-[10px] inline-block px-2 py-0.5 bg-slate-100 dark:bg-slate-800 text-slate-500 rounded mt-1">
                                {{ $assignment->slug }}
                            </div>
                        </td>

                        {{-- DEADLINE --}}
                        <td class="p-4">
                            @php $isExpired = now() > $assignment->deadline; @endphp
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold {{ $isExpired ? 'text-rose-500' : 'text-slate-700 dark:text-slate-300' }}">
                                    {{ \Carbon\Carbon::parse($assignment->deadline)->translatedFormat('d M Y') }}
                                </span>
                                <span class="text-[10px] {{ $isExpired ? 'text-rose-400' : 'text-slate-400 font-medium' }}">
                                    {{ \Carbon\Carbon::parse($assignment->deadline)->format('H:i') }} WIB
                                </span>
                            </div>
                        </td>

                        {{-- STATISTIK (RASIO SISWA) --}}
                        <td class="p-4 text-center">
                            <div class="flex flex-col items-center">
                                <div class="flex items-baseline gap-1">
                                    <span class="text-lg font-black text-blue-600 dark:text-blue-400">
                                        {{ $assignment->submissions_count }}
                                    </span>
                                    <span class="text-xs text-slate-400 font-bold">
                                        / {{ $totalStudents }}
                                    </span>
                                </div>

                                {{-- Mini Progress Bar --}}
                                @php
                                    $percentage = $totalStudents > 0 ? ($assignment->submissions_count / $totalStudents) * 100 : 0;
                                @endphp
                                <div class="w-16 h-1.5 bg-slate-100 dark:bg-slate-800 rounded-full mt-1.5 overflow-hidden">
                                    <div class="h-full bg-blue-500 rounded-full" style="width: {{ $percentage }}%"></div>
                                </div>
                                
                                <span class="text-[9px] uppercase tracking-tighter text-slate-400 font-bold mt-1">
                                    Siswa Mengumpulkan
                                </span>
                            </div>
                        </td>

                        {{-- AKSI --}}
                        <td class="p-4">
                            <div class="flex justify-center items-center gap-2">
                                {{-- VIEW DETAIL --}}
                                <a href="{{ route('manageassignment.show', $assignment) }}"
                                   class="p-2 rounded-lg bg-sky-50 dark:bg-sky-900/20 text-sky-600 hover:bg-sky-600 hover:text-white transition-all shadow-sm"
                                   title="Lihat Detail & Nilai">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('manageassignment.edit', $assignment) }}"
                                   class="p-2 rounded-lg bg-amber-50 dark:bg-amber-900/20 text-amber-600 hover:bg-amber-500 hover:text-white transition-all shadow-sm"
                                   title="Edit Tugas">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>

                                {{-- DELETE --}}
                                <form method="POST" action="{{ route('manageassignment.destroy', $assignment) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('⚠️ Hapus tugas ini? Semua data pengumpulan siswa juga akan terhapus.')"
                                            class="p-2 rounded-lg bg-rose-50 dark:bg-rose-900/20 text-rose-600 hover:bg-rose-600 hover:text-white transition-all shadow-sm"
                                            title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-20 text-center">
                            <div class="flex flex-col items-center">
                                <div class="bg-slate-100 dark:bg-slate-800 p-4 rounded-full mb-4">
                                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0a2 2 0 01-2 2H6a2 2 0 01-2-2m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                </div>
                                <p class="text-slate-500 dark:text-slate-400 font-medium italic">Tidak ada penugasan aktif saat ini.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-8">
        {{ $assignments->links() }}
    </div>
</div>
@endsection