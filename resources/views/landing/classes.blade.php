@extends('layouts.app')

@section('content')

{{-- HEADER KELAS --}}
<section class="bg-white dark:bg-gray-900 pt-12 pb-8 transition-colors duration-300">
    <div class="mx-auto max-w-screen-xl px-4 text-center md:text-left">
        <h1 class="text-4xl font-black tracking-tight text-gray-900 dark:text-white md:text-5xl">
            Eksplorasi <span class="text-blue-600 dark:text-blue-500">Kelas Spesialisasi</span>
        </h1>
        <p class="mt-4 text-lg text-gray-500 dark:text-gray-400 max-w-2xl">
            Tingkatkan keahlian teknismu dengan kurikulum berbasis industri yang dirancang oleh praktisi Network IT Club.
        </p>
    </div>
</section>

{{-- DAFTAR KELAS --}}
<section class="bg-gray-100 dark:bg-gray-800 py-8 antialiased md:py-12 transition-colors duration-300">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        
        <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Semua Kelas</h2>
        </div>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($courses as $kelas)
            <div class="group flex flex-col h-full rounded-3xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 p-5 shadow-sm transition-all duration-300 hover:shadow-2xl hover:border-blue-500 dark:hover:border-blue-500">
                {{-- Image Container --}}
                <div class="relative w-full overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-800">
                    <img class="mx-auto h-full w-full object-contain rounded-2xl p-2 transition-transform duration-500 group-hover:scale-110" src="{{ asset('storage/' . $kelas['image']) }}" alt="{{ $kelas['title'] }}" />
                </div>

                <div class="flex flex-col flex-grow pt-6">
                    <a href="/classes/{{ $kelas['slug'] }}" class="text-xl font-black leading-tight text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                        {{ $kelas['title'] }}
                    </a>
                    <p class="mt-3 text-sm leading-relaxed text-gray-500 dark:text-gray-400 line-clamp-3">
                        {{ $kelas['description'] }}
                    </p>
                </div>

                <div class="mt-6 border-t border-gray-100 dark:border-gray-800 pt-5">
                    <div class="flex items-center justify-between gap-4">
                        <a href="/classes/{{ $kelas['slug'] }}" class="inline-flex items-center justify-center w-full rounded-xl bg-gray-900 dark:bg-blue-600 px-5 py-2.5 text-center text-sm font-bold text-white transition-all hover:bg-blue-700 dark:hover:bg-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            Masuk Kelas
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- FOOTER INFO --}}
<section class="bg-white dark:bg-gray-900 py-12 transition-colors duration-300">
    <div class="mx-auto max-w-screen-xl px-4">
        <div class="rounded-3xl bg-blue-600 dark:bg-blue-700 p-8 md:p-12 text-center text-white shadow-2xl shadow-blue-500/20">
            <h3 class="text-2xl font-black md:text-3xl">Ingin request materi kelas tertentu?</h3>
            <p class="mt-2 text-blue-100">Kirimkan usulan materimu dan kami akan menyiapkannya untukmu.</p>
            <div class="mt-8">
                <a href="#" class="rounded-2xl bg-white px-8 py-4 text-sm font-black text-blue-600 dark:text-blue-700 transition-transform hover:scale-105 inline-block">
                    Hubungi Admin
                </a>
            </div>
        </div>
    </div>
</section>

@endsection