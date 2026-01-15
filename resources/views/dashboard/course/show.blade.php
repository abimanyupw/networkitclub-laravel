@extends('layouts.dashboard-app')

@section('content')
    {{-- Header & Navigasi --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Detail Kelas</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            {{-- Icon Breadcrumb: Chalkboard --}}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="35">
            <path d="M128 96c0-35.3 28.7-64 64-64l352 0c35.3 0 64 28.7 64 64l0 240-96 0 0-16c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 16-129.1 0c10.9-18.8 17.1-40.7 17.1-64 0-70.7-57.3-128-128-128-5.4 0-10.8 .3-16 1l0-49zM333 448c-5.1-24.2-16.3-46.1-32.1-64L608 384c0 35.3-28.7 64-64 64l-211 0zM64 272a80 80 0 1 1 160 0 80 80 0 1 1 -160 0zM0 480c0-53 43-96 96-96l96 0c53 0 96 43 96 96 0 17.7-14.3 32-32 32L32 512c-17.7 0-32-14.3-32-32z"/>
            </svg>
            <a href="{{ route('managecourse.index') }}" class="hover:underline font-medium">Manajemen Kelas</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium italic">{{ $course->title }}</span>
        </nav>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Kolom Kiri: Profile Kelas --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-xl border border-gray-100 dark:border-gray-800 text-center relative overflow-hidden">
                {{-- Decorative Bar --}}
                <div class="absolute top-0 left-0 w-full h-2 bg-blue-500"></div>
                
                <img src="{{ $course->thumbnail ? asset('storage/' . $course->thumbnail) : 'https://ui-avatars.com/api/?name=' . urlencode($course->title) . '&background=0D8ABC&color=fff&size=200&bold=true' }}" 
                     class="w-full h-48 mx-auto rounded-2xl object-cover border-4 border-gray-50 dark:border-slate-800 shadow-lg transition-transform duration-500 hover:scale-105">
                
                <div class="mt-6">
                    <h3 class="text-2xl font-black text-gray-800 dark:text-white leading-tight">{{ $course->title }}</h3>
                    <div class="mt-4 flex flex-wrap justify-center gap-2">
                        <span class="px-4 py-1.5 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-full text-xs font-bold uppercase tracking-widest">
                            {{ $course->materials->count() }} Materi Terdaftar
                        </span>
                    </div>
                </div>
            </div>

            {{-- Card Kategori --}}
            <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-xl border border-gray-100 dark:border-gray-800">
                <h4 class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-widest mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 11h.01M7 15h.01M13 7h.01M13 11h.01M13 15h.01M17 7h.01M17 11h.01M17 15h.01" />
                    </svg>
                    Kategori Terkait
                </h4>
                <div class="flex flex-wrap gap-2">
                    @forelse($categories as $category)
                        <span class="px-3 py-1 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-800 rounded-lg text-xs font-semibold shadow-sm">
                            {{ $category->name }}
                        </span>
                    @empty
                        <p class="text-gray-400 italic text-sm text-center w-full">Belum ada kategori</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Detail Informasi --}}
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden">
                <div class="p-8 space-y-8">
                    
                    
                    <div class="grid grid-cols-1 gap-10">
                        {{-- Deskripsi --}}
                        <div class="flex gap-6">
                            <div class="flex-shrink-0 bg-blue-50 dark:bg-slate-800 p-4 rounded-2xl text-blue-600 h-fit shadow-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-900 dark:text-white uppercase font-black tracking-widest mb-1">Deskripsi Kelas</p>
                                <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-lg">{{ $course->description }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            {{-- Slug --}}
                            <div class="flex gap-6">
                                <div class="flex-shrink-0 bg-amber-50 dark:bg-slate-800 p-4 rounded-2xl text-amber-600 h-fit shadow-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-900 dark:text-white uppercase font-black tracking-widest mb-1">Slug URL</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-mono text-sm bg-gray-50 dark:bg-slate-800 px-3 py-1.5 rounded-lg border border-gray-100 dark:border-gray-700">{{ $course->slug }}</p>
                                </div>
                            </div>

                            {{-- Tanggal --}}
                            <div class="flex gap-6">
                                <div class="flex-shrink-0 bg-emerald-50 dark:bg-slate-800 p-4 rounded-2xl text-emerald-600 h-fit shadow-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-[10px] text-gray-900 dark:text-white uppercase font-black tracking-widest mb-1">Terdaftar Sejak</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-bold text-xl">{{ $course->created_at->format('d M Y') }}</p>
                                    <p class="text-xs text-gray-400 italic mt-0.5">{{ $course->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Footer Button --}}
                    <div class="pt-8 border-t border-gray-50 dark:border-gray-800 flex justify-end">
                        <a href="{{ route('managecourse.index') }}" class="group flex items-center gap-2 px-8 py-3.5 text-sm font-bold text-gray-500 hover:text-white hover:bg-gray-800 dark:hover:bg-slate-700 rounded-2xl transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Daftar Kelas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection