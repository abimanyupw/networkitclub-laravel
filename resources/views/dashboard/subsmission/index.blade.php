@extends('layouts.dashboard-app')

@section('content')
<div class="min-h-screen pb-10 text-gray-900 dark:text-slate-100">
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Daftar Tugas </h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
  <line x1="8" y1="7" x2="16" y2="7"/>
  <line x1="8" y1="11" x2="16" y2="11"/>
  <line x1="8" y1="15" x2="13" y2="15"/>
</svg>
            <a href="{{ route('assignments.index') }}" class="hover:underline font-medium">Tugas </a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Daftar Tugas </span>
        </nav>

       
        <p class="text-gray-500 dark:text-gray-400 mt-1">Pantau dan kerjakan tugas Anda sebelum tenggat waktu berakhir.</p>
    </div>

    {{-- Filter & Search Card --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-800 p-5 mb-6">
        <form action="{{ route('assignments.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-end">
            <div class="flex-1 w-full">
                <label class="mb-2 block text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Cari Judul Tugas</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Contoh: Pemrograman Dasar..."
                           class="w-full rounded-xl border-gray-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-800 pl-10 pr-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:bg-white dark:focus:bg-slate-900 transition outline-none">
                </div>
            </div>
            
            <button type="submit"
                    class="w-full md:w-auto px-8 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition duration-200 shadow-lg shadow-blue-200 dark:shadow-none flex items-center justify-center gap-2">
                Filter Data
            </button>
        </form>
    </div>

    {{-- Table Container --}}
    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl shadow-gray-200/50 dark:shadow-none border border-gray-100 dark:border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 dark:bg-slate-800/50 border-b border-gray-100 dark:border-slate-800">
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 text-center w-20">No.</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Informasi Tugas</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Deadline</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 text-center">Status</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 dark:divide-slate-800">
                    @forelse ($assignments as $assignment)
                    <tr class="hover:bg-blue-50/30 dark:hover:bg-slate-800/50 transition-colors group">
                        <td class="px-6 py-5 text-center font-medium text-gray-400">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-gray-800 dark:text-gray-200 group-hover:text-blue-600 transition-colors">
                                    {{ $assignment->title }}
                                </span>
                                <span class="text-xs text-gray-400 mt-0.5 truncate max-w-[200px]">
                                    {{ Str::limit($assignment->description, 50) }}
                                </span>
                            </div>
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                @if($assignment->deadline)
                                    {{ \Carbon\Carbon::parse($assignment->deadline)->translatedFormat('d M Y, H:i') }}
                                @else
                                    <span class="text-gray-300 italic">Tidak ada batas</span>
                                @endif
                            </div>
                        </td>

                        <td class="px-6 py-5 text-center">
                            @php
                                $submitted = $assignment->submissions->where('user_id', auth()->id())->first();
                            @endphp

                            @if($submitted)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-emerald-100 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-500/20">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Terkumpul
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold bg-amber-100 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400 border border-amber-200 dark:border-amber-500/20">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    Menunggu
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-5 text-center">
                            <a href="{{ route('assignments.show', $assignment->slug) }}"
                               class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-blue-50 dark:bg-slate-800 text-blue-600 dark:text-blue-400 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-500 transition-all duration-300 shadow-sm"
                               title="Buka Tugas">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-16 h-16 text-gray-200 dark:text-slate-800 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <p class="text-gray-500 dark:text-gray-400 font-medium italic">Tidak ada tugas yang ditemukan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection