@extends('layouts.dashboard-app')

@section('content')
<div class="min-h-screen text-gray-900 dark:text-white pb-10">
    {{-- Header & Navigasi --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Detail Informasi</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <a href="{{ route('information') }}" class="hover:underline font-medium">Informasi</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium italic">{{ $manageinformation->title }}</span>
        </nav>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Kolom Kiri: Detail Konten Utama --}}
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden">
                <div class="p-8 space-y-6">
                    <div class="flex justify-between items-center border-b border-gray-100 dark:border-gray-800 pb-4">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-white uppercase tracking-wider">Konten Informasi</h4>
                       
                    </div>
                    
                    {{-- Judul --}}
                    <div>
                        <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-4">{{ $manageinformation->title }}</h2>
                    </div>

                    {{-- Konten Utama (Render HTML) --}}
                    {{-- Gunakan plugin Tailwind Typography 'prose' untuk merender tag HTML dari Summernote --}}
                    <div class="prose prose-lg prose-blue dark:prose-invert max-w-none border-t border-gray-50 dark:border-gray-800 pt-8">
                        {!! $manageinformation->content !!}
                    </div>

                    <div class="pt-8 flex justify-start gap-3 border-t border-gray-100 dark:border-gray-800">
                        <a href="{{ route('information') }}" class="px-8 py-3 bg-blue-600 text-gray-300 rounded-2xl font-bold">
                            Kembali ke Daftar
                        </a> 
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Informasi & Thumbnail --}}
        <div class="lg:col-span-1 space-y-6">
            
            {{-- Metadata Info --}}
            <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-800 p-6 space-y-6">
                <h4 class="text-sm font-bold text-gray-800 dark:text-white border-b dark:border-gray-800 pb-3 uppercase tracking-tighter">Riwayat Data</h4>
                
                <div class="space-y-5">
                    {{-- Tanggal Dibuat --}}
                    <div class="flex items-start gap-4">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-xl text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-black">Tanggal Rilis</p>
                            <p class="text-sm dark:text-gray-200 font-bold text-gray-800">{{ $manageinformation->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    {{-- Terakhir Update --}}
                    <div class="flex items-start gap-4">
                        <div class="bg-emerald-50 dark:bg-emerald-900/20 p-3 rounded-xl text-emerald-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 uppercase font-black">Pembaruan Terakhir</p>
                            <p class="text-sm dark:text-gray-200 font-bold text-gray-800">{{ $manageinformation->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Letakkan di show.blade.php --}}
<style>
    /* Styling agar tabel dari Summernote memiliki border dan padding */
    .prose table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 1px solid #d9e6f8; /* Warna border abu-abu terang */
    }
    .prose th, .prose td {
        border: 1px solid #bfdbff;
        padding: 8px 12px;
        text-align: left;
    }
    .prose th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    /* Mode Gelap (Dark Mode) */
    .dark .prose table, 
    .dark .prose th, 
    .dark .prose td {
        border-color: #334155; /* Warna border untuk dark mode */
    }
    .dark .prose th {
        background-color: #1e293b;
    }
</style>


@endsection