@extends('layouts.dashboard-app')

@section('content')
<div class="min-h-screen text-gray-900 dark:text-white">
    {{-- Header & Breadcrumb --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Daftar Informasi</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <a href="{{ route('manageinformation.index') }}" class="hover:underline font-medium">Manajemen Informasi</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Daftar Informasi</span>
        </nav>
    </div>

    <div class="mb-4 text-2xl font-semibold border-l-4 border-blue-600 pl-3 uppercase">
        Data Informasi
    </div>

    {{-- Action Buttons --}}
     <div class="mb-6 flex flex-wrap gap-2">
        <a href="/manageinformation/create" class="flex items-center gap-2 rounded bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700 transition shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Informasi
        </a>
       
    </div>

    {{-- Filter & Search --}}
     <form action="/manageinformation" method="GET" class="mb-6 grid grid-cols-1 gap-4 md:grid-cols-3">
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

    {{-- Table Container --}}
    <div class="overflow-auto rounded-2xl shadow-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-slate-900">
        {{-- Alert Success --}}
        @if (session('success'))
            <div id="alert-success" class="flex items-center p-4 m-4 text-emerald-800 rounded-xl bg-emerald-50 dark:bg-slate-800/50 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800 shadow-sm" role="alert">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                <div class="text-sm font-bold">{{ session('success') }}</div>
                <button type="button" onclick="this.parentElement.remove()" class="ml-auto hover:text-black">✕</button>
            </div>
        @endif

        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-blue-600 text-sm font-bold text-white">
                    <th class="px-6 py-4 text-center w-16">No.</th>
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Slug</th>
                    <th class="px-6 py-4">Konten (Ringkasan)</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm divide-y divide-gray-200 dark:divide-gray-800">
                @forelse ($informations as $item)
                <tr class="hover:bg-blue-50/50 dark:hover:bg-slate-800/80 transition-colors">
                    <td class="px-6 py-4 text-center font-medium">
                        {{ ($informations->currentPage() - 1) * $informations->perPage() + $loop->iteration }}
                    </td>
                    <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">
                        {{ $item->title }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-gray-100 dark:bg-slate-800 px-2 py-1 rounded text-xs font-mono">
                            {{ $item->slug }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                        {{ Str::limit(strip_tags($item->content), 50) }}
                    </td>
                    <td class="px-6 py-4">     
                        <div class="flex justify-center gap-2">
                            {{-- View --}}
                            <a href="{{ route('manageinformation.show', $item->slug) }}" class="bg-sky-400 p-2 rounded-lg hover:bg-sky-500 transition shadow-md shadow-sky-400/20" title="View">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"> 
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5 c4.478 0 8.268 2.943 9.542 7 -1.274 4.057-5.064 7-9.542 7 -4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            {{-- Edit --}}
                            <a href="{{ route('manageinformation.edit', $item->slug) }}" class="bg-amber-400 p-2 rounded-lg hover:bg-amber-500 transition shadow-md shadow-amber-400/20" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            {{-- Delete --}}
                            <form action="{{ route('manageinformation.destroy', $item->slug) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-rose-500 p-2 rounded-lg hover:bg-rose-600 transition shadow-md shadow-rose-500/20" onclick="return confirm('Yakin ingin menghapus informasi ini?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-16 text-center text-gray-400 italic bg-gray-50 dark:bg-slate-800/20">
                        Data informasi tidak ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginasi --}}
    <div class="mt-8">
        {{ $informations->links() }}
    </div>
</div>
@endsection