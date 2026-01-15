@extends('layouts.dashboard-app')

@section('content')
<div class="min-h-screen text-gray-900 dark:text-white">
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Detail Materi</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <a href="{{ route('managecategory.index') }}" class="hover:underline font-medium">Manajemen Materi </a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Detail Materi </span>
        </nav>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Kolom Kiri: Detail Konten --}}
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden">
                <div class="p-8 space-y-6">
                    <div class="flex justify-between items-center border-b border-gray-100 dark:border-gray-800 pb-4">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-white">Isi Materi</h4>
                        <span class="px-3 py-1 text-xs font-bold rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                            {{ $managematerial->category->name }}
                        </span>
                    </div>
                    
                    {{-- Judul & Deskripsi Singkat --}}
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $managematerial->title }}</h2>
                        <p class="text-gray-500 dark:text-gray-400 italic">{{ $managematerial->description }}</p>
                    </div>

                    {{-- Konten Utama (Render HTML dari Summernote) --}}
                    <div class="prose prose-blue dark:prose-invert max-w-none border-t border-gray-50 dark:border-gray-800 pt-6">
                        {!! $managematerial->content !!}
                    </div>

                    <div class="pt-8 flex justify-end gap-3 border-t border-gray-100 dark:border-gray-800">
                        <a href="{{ route('managematerial.index') }}" class="px-6 py-2.5 text-sm font-bold text-gray-500 hover:text-gray-700 dark:hover:text-white transition">
                            Kembali
                        </a>                       
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Informasi & Thumbnail --}}
        <div class="lg:col-span-1 space-y-6">
            {{-- Thumbnail --}}
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden p-4">
                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-bold tracking-wider mb-3">Thumbnail Cover</p>
                @if($managematerial->thumbnail)
                    <img src="{{ asset('storage/' . $managematerial->thumbnail) }}" alt="Thumbnail" class="w-full h-auto rounded-xl object-cover shadow-md">
                @else
                    <div class="w-full h-48 bg-gray-100 dark:bg-slate-800 rounded-xl flex items-center justify-center">
                        <p class="text-gray-400 text-sm italic">Tidak ada thumbnail</p>
                    </div>
                @endif
            </div>

            {{-- Info Metadata --}}
            <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-6 space-y-6">
                <h4 class="text-sm font-bold text-gray-800 dark:text-white border-b dark:border-gray-800 pb-3">Informasi Tambahan</h4>
                
                <div class="space-y-4">
                    {{-- Kursus --}}
                    <div class="flex items-start gap-4">
                        <div class="bg-emerald-50 dark:bg-emerald-900/20 p-2.5 rounded-lg text-emerald-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-500 uppercase font-extrabold">Bagian Dari Kursus</p>
                            <p class="text-sm dark:text-gray-200 font-bold">{{ $managematerial->course->title }}</p>
                        </div>
                    </div>

                    {{-- Tanggal --}}
                    <div class="flex items-start gap-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-2.5 rounded-lg text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-500 uppercase font-extrabold">Terakhir Update</p>
                            <p class="text-sm dark:text-gray-200">{{ $managematerial->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection