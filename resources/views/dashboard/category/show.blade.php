@extends('layouts.dashboard-app')

@section('content')
    {{-- Header & Navigasi --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Detail Kategori</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12a4.5 4.5 0 100-9 4.5 4.5 0 000 9z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20a8 8 0 0116 0z"/>
            </svg>
            <a href="{{ route('managecategory.index') }}" class="hover:underline font-medium">Manajemen Kategori</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium italic">{{ $category->name }}</span>
        </nav>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Kolom Utama: Informasi Kategori --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden">
                <div class="p-8 space-y-8">
                    <div class="flex items-center justify-between border-b border-gray-50 dark:border-gray-800 pb-4">
                        <h4 class="text-xl font-bold text-gray-800 dark:text-white uppercase tracking-tight">Informasi Kategori</h4>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-8">
                        {{-- Nama Kategori --}}
                        <div class="flex gap-5 group">
                            <div class="flex-shrink-0 bg-blue-50 dark:bg-slate-800 p-4 rounded-2xl text-blue-600 h-fit transition-colors group-hover:bg-blue-600 group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 11h.01M7 15h.01M13 7h.01M13 11h.01M13 15h.01M17 7h.01M17 11h.01M17 15h.01" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-900 dark:text-white uppercase font-black tracking-widest mb-1">Nama Kategori</p>
                                <p class="text-gray-900 dark:text-white font-bold text-2xl tracking-tighter">{{ $category->name }}</p>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="flex gap-5 group">
                            <div class="flex-shrink-0 bg-amber-50 dark:bg-slate-800 p-4 rounded-2xl text-amber-600 h-fit transition-colors group-hover:bg-amber-500 group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-900 dark:text-white uppercase font-black tracking-widest mb-1">Deskripsi</p>
                                <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-lg">{{ $category->description ?? 'Tidak ada deskripsi.' }}</p>
                            </div>
                        </div>

                        {{-- Metadata: Dibuat Pada --}}
                        <div class="flex gap-5 group">
                            <div class="flex-shrink-0 bg-emerald-50 dark:bg-slate-800 p-4 rounded-2xl text-emerald-600 h-fit transition-colors group-hover:bg-emerald-500 group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-900 dark:text-white uppercase font-black tracking-widest mb-1">Terdaftar Sejak</p>
                                <p class="text-gray-900 dark:text-white font-bold text-xl">{{ $category->created_at->format('d M, Y') }}</p>
                                <p class="text-xs text-gray-400 font-bold mt-1 italic">{{ $category->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-gray-50 dark:border-gray-800 flex justify-end">
                        <a href="{{ route('managecategory.index') }}" class="group flex items-center gap-2 px-8 py-3 text-sm font-bold text-gray-500 hover:text-white hover:bg-gray-800 dark:hover:bg-slate-700 rounded-2xl transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Manajemen
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom Samping: Statistik Cepat --}}
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-slate-900 rounded-[2rem] p-8 shadow-xl border border-gray-100 dark:border-gray-800 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 to-cyan-400"></div>
                <p class="text-sm font-black text-gray-400 uppercase tracking-widest mb-4">Total Materi</p>
                <h2 class="text-6xl font-black text-blue-600 my-4 tracking-tighter">
                    {{ $category->materials->count() ?? 0 }}
                </h2>
                <p class="text-xs text-gray-500 font-bold uppercase tracking-tight">Materi Menggunakan Kategori Ini</p>
            </div>
        </div>
    </div>
@endsection