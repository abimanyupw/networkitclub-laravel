@extends('layouts.dashboard-app')

@section('content')

{{-- HEADER KELAS --}}
<section>
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Daftar Kelas</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="35">
            <path d="M128 96c0-35.3 28.7-64 64-64l352 0c35.3 0 64 28.7 64 64l0 240-96 0 0-16c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 16-129.1 0c10.9-18.8 17.1-40.7 17.1-64 0-70.7-57.3-128-128-128-5.4 0-10.8 .3-16 1l0-49zM333 448c-5.1-24.2-16.3-46.1-32.1-64L608 384c0 35.3-28.7 64-64 64l-211 0zM64 272a80 80 0 1 1 160 0 80 80 0 1 1 -160 0zM0 480c0-53 43-96 96-96l96 0c53 0 96 43 96 96 0 17.7-14.3 32-32 32L32 512c-17.7 0-32-14.3-32-32z"/>
            </svg>
            <a href="{{ route('kelas') }}" class="hover:underline font-medium">Classes</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Daftar Kelas</span>
        </nav>
    </div>
    <div class="mb-4 text-black dark:text-white text-2xl font-semibold border-l-4 border-blue-600 pl-3">
        Daftar Kelas yang Tersedia
    </div>
</section>

{{-- DAFTAR KELAS --}}
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
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

@endsection