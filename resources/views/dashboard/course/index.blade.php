@extends('layouts.dashboard-app')

@section('content')
<div class="min-h-screen text-gray-900 dark:text-white">
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Daftar Kelas</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="35">
            <path d="M128 96c0-35.3 28.7-64 64-64l352 0c35.3 0 64 28.7 64 64l0 240-96 0 0-16c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 16-129.1 0c10.9-18.8 17.1-40.7 17.1-64 0-70.7-57.3-128-128-128-5.4 0-10.8 .3-16 1l0-49zM333 448c-5.1-24.2-16.3-46.1-32.1-64L608 384c0 35.3-28.7 64-64 64l-211 0zM64 272a80 80 0 1 1 160 0 80 80 0 1 1 -160 0zM0 480c0-53 43-96 96-96l96 0c53 0 96 43 96 96 0 17.7-14.3 32-32 32L32 512c-17.7 0-32-14.3-32-32z"/>
            </svg>
            <a href="{{ route('managecategory.index') }}" class="hover:underline font-medium">Manajemen Kelas</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Daftar Kelas</span>
        </nav>
    </div>

    <div class="mb-4 text-2xl font-semibold border-l-4 border-blue-600 pl-3">
        Daftar Kelas
    </div>

    {{-- Action Buttons --}}
    <div class="mb-6 flex flex-wrap gap-2">
        <a href="/managecourse/create" class="flex items-center gap-2 rounded bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700 transition shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Kelas
        </a>
       
    </div>

    {{-- Filter & Search --}}
    <form action="/managecourse" method="GET" class="mb-6 grid grid-cols-1 gap-4 md:grid-cols-3">
        <div>
            <label class="mb-1 block text-sm font-medium">Cari Kelas:</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari name, slug..." 
                   class="w-full rounded border border-gray-300 bg-white px-4 py-2 focus:ring-2 focus:ring-blue-500 dark:border-gray-700 dark:bg-slate-800 dark:text-white outline-none transition">
        </div>
        <div class="flex items-end">
            <button type="submit" class="flex w-full md:w-auto items-center justify-center gap-2 rounded bg-cyan-400 px-6 py-2 font-bold text-black hover:bg-cyan-500 transition shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                Cari
            </button>
        </div>
    </form>

    {{-- Table --}}
    <div class="overflow-x-auto rounded-lg shadow-xl border border-gray-200 dark:border-gray-800">
                    {{-- Alert Success --}}
            @if (session('success'))
                <div id="alert-success" class="flex items-center p-4 mb-4 text-emerald-800 rounded-lg bg-emerald-50 dark:bg-slate-800 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800 shadow-sm transition-all duration-300" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="ml-3 text-sm font-bold tracking-wide">
                        {{ session('success') }}
                    </div>
                    <button type="button" onclick="document.getElementById('alert-success').remove()" class="ml-auto -mx-1.5 -my-1.5 bg-emerald-50 text-emerald-500 rounded-lg focus:ring-2 focus:ring-emerald-400 p-1.5 hover:bg-emerald-200 inline-flex items-center justify-center h-8 w-8 dark:bg-slate-800 dark:text-emerald-400 dark:hover:bg-slate-700">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            @endif

            {{-- Alert Error (Opsional) --}}
            @if (session('error'))
                <div id="alert-error" class="flex items-center p-4 mb-4 text-rose-800 rounded-lg bg-rose-50 dark:bg-slate-800 dark:text-rose-400 border border-rose-200 dark:border-rose-800 shadow-sm" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="ml-3 text-sm font-bold tracking-wide">
                        {{ session('error') }}
                    </div>
                    <button type="button" onclick="document.getElementById('alert-error').remove()" class="ml-auto -mx-1.5 -my-1.5 bg-rose-50 text-rose-500 rounded-lg focus:ring-2 focus:ring-rose-400 p-1.5 hover:bg-rose-200 inline-flex items-center justify-center h-8 w-8 dark:bg-slate-800 dark:text-rose-400 dark:hover:bg-slate-700">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            @endif
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-blue-200 text-sm font-bold text-black dark:bg-blue-300">
                    <th class="border-b border-r border-gray-300 px-4 py-4 dark:border-gray-900">No.</th>
                    <th class="border-b border-r border-gray-300 px-4 py-4 dark:border-gray-900">Judul</th>
                    <th class="border-b border-r border-gray-300 px-4 py-4 dark:border-gray-900">Slug</th>
                    <th class="border-b border-r border-gray-300 px-4 py-4 dark:border-gray-900">Deskripsi</th>
                    <th class="border-b border-r border-gray-300 px-4 py-4 dark:border-gray-900 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @forelse ($courses as $course)
                <tr class="bg-white/90 hover:bg-blue-50/50 dark:bg-slate-900 dark:hover:bg-slate-800/80 transition-colors">
                    <td class="border-b border-r border-gray-300 px-4 py-3 dark:border-gray-800 text-center font-medium">{{ ($courses->currentPage() - 1) * $courses->perPage() + $loop->iteration }}</td>
                    <td class="border-b border-r border-gray-300 px-4 py-3 dark:border-gray-800">
                        <div class="flex items-center gap-3">
                            <span class="font-medium text-gray-700 dark:text-gray-300">{{ $course->title }}</span>
                        </div>
                    </td>
                    <td class="border-b border-r border-gray-300 px-4 py-3 dark:border-gray-800 text-gray-700 dark:text-gray-400">{{ $course->slug }}</td>
                    <td class="border-b border-r border-gray-300 px-4 py-3 dark:border-gray-800 text-gray-700 dark:text-gray-400">{{ Str::limit($course->description,20) }}</td>
                    <td class="border-b border-gray-300 px-4 py-3 dark:border-gray-800">     
                        <div class="flex justify-center gap-2">
                            <a href="/managecourse/{{ $course->slug }}" class="bg-sky-400 p-1.5 rounded hover:bg-sky-500 transition" title="View">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"> 
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5 c4.478 0 8.268 2.943 9.542 7 -1.274 4.057-5.064 7-9.542 7 -4.477 0-8.268-2.943-9.542-7z" />
                                </svg>

                            </a>
                            <a href="/managecourse/{{ $course->slug }}/edit" class="bg-amber-400 p-1.5 rounded hover:bg-amber-500 transition" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="/managecourse/{{ $course->slug }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="cursor-pointer bg-rose-500 p-1.5 rounded hover:bg-rose-600 transition shadow-sm" 
                                        title="Hapus"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="p-10 text-center text-gray-400">Data tidak ditemukan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-6">
        {{ $courses->links() }}
    </div>
</div>
@endsection