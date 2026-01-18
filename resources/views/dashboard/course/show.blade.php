@extends('layouts.dashboard-app')

@section('content')
    {{-- Header & Navigasi --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Detail Kelas</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
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
                <div class="absolute top-0 left-0 w-full h-2 bg-blue-500"></div>
                
                <img src="{{ $course->thumbnail ? asset('storage/' . $course->thumbnail) : 'https://ui-avatars.com/api/?name=' . urlencode($course->title) . '&background=0D8ABC&color=fff&size=200&bold=true' }}" 
                     class="w-full h-48 mx-auto rounded-2xl object-cover border-4 border-gray-50 dark:border-slate-800 shadow-lg">
                
                <div class="mt-6">
                    <h3 class="text-2xl font-black text-gray-800 dark:text-white leading-tight">{{ $course->title }}</h3>
                    <div class="mt-4 flex flex-wrap justify-center gap-2">
                        <span class="px-4 py-1.5 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-full text-xs font-bold uppercase tracking-widest">
                            {{ $course->materials->count() }} Total Materi
                        </span>
                    </div>
                </div>
            </div>

            {{-- Card Ringkasan Kategori & Materi --}}
            <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 shadow-xl border border-gray-100 dark:border-gray-800">
                <h4 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Statistik Kategori
                </h4>
                <div class="space-y-3">
                    @forelse($groupedMaterials as $categoryId => $materials)
                        @php $category = $materials->first()->category; @endphp
                        <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-slate-800/50 rounded-xl border border-gray-100 dark:border-gray-700">
                            <span class="text-xs font-bold text-gray-700 dark:text-gray-300">
                                {{ $category ? $category->name : 'Tanpa Kategori' }}
                            </span>
                            <span class="text-[10px] font-black bg-blue-600 text-white px-2 py-0.5 rounded-md">
                                {{ $materials->count() }}
                            </span>
                        </div>
                    @empty
                        <p class="text-gray-400 italic text-xs text-center">Tidak ada materi/kategori</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Detail Informasi & List Materi --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Deskripsi --}}
            <div class="bg-white dark:bg-slate-900 rounded-3xl p-8 shadow-xl border border-gray-100 dark:border-gray-800">
                <div class="flex gap-6">
                    <div class="flex-shrink-0 bg-blue-50 dark:bg-slate-800 p-4 rounded-2xl text-blue-600 h-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-400 dark:text-white uppercase font-black tracking-widest mb-1">Deskripsi Kelas</p>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-lg">{{ $course->description }}</p>
                    </div>
                </div>
            </div>

           {{-- List Materi --}}
    <div class="space-y-4">
        @foreach($groupedMaterials as $materials)
            @php $category = $materials->first()->category; @endphp
            <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden">
                <div class="px-6 py-4 bg-gray-50 dark:bg-slate-800/50 border-b border-gray-100 dark:border-gray-700 flex justify-between items-center">
                    <h5 class="text-xs font-black text-gray-500 dark:text-gray-400 uppercase tracking-widest">
                        MODUL: {{ $category ? $category->name : 'TANPA KATEGORI' }}
                    </h5>
                    <span class="text-[10px] font-bold text-blue-600 dark:text-blue-400 italic">
                        {{ $materials->count() }} Materi Tersedia
                    </span>
                </div>
                <div class="divide-y divide-gray-50 dark:divide-gray-800">
                    {{-- DIBATASI DI SINI: Contoh hanya menampilkan 3 materi teratas --}}
                    @foreach($materials->take(3) as $material)
                        <div class="p-4 flex items-center justify-between hover:bg-blue-50/20 transition-all group">
                            <div class="flex items-center gap-4">
                                <div class="w-2 h-2 rounded-full bg-blue-400 group-hover:scale-125 transition-transform"></div>
                                <h6 class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ $material->title }}</h6>
                            </div>
                            <a href="{{ route('materials.show', [$course->slug, $material->slug]) }}" class="text-[10px] font-black text-blue-600 hover:underline uppercase">Pratinjau</a>
                        </div>
                    @endforeach

                    {{-- Notifikasi jika ada materi yang disembunyikan --}}
                    @if($materials->count() > 3)
                        <div class="p-3 text-center bg-gray-50/50 dark:bg-slate-800/30">
                            <p class="text-[10px] font-bold text-gray-400 italic">
                                + {{ $materials->count() - 3 }} materi lainnya tidak ditampilkan
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

            {{-- Footer Button --}}
            <div class="pt-4 flex justify-end">
                <a href="{{ route('managecourse.index') }}" class="group flex items-center gap-2 px-8 py-3.5 text-sm font-bold text-gray-500 hover:text-blue-600 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Daftar Kelas
                </a>
            </div>
        </div>
    </div>
@endsection