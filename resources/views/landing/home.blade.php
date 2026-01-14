@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
<section class="relative bg-white py-12 antialiased md:py-20 overflow-hidden dark:bg-gray-900 transition-colors duration-300">
    {{-- Gradient Background yang berubah di mode gelap --}}
    <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-blue-50 via-transparent to-transparent opacity-70 dark:from-blue-900/20 dark:via-transparent"></div>
    
    <div class="relative mx-auto grid max-w-screen-xl px-4 pb-8 md:grid-cols-12 lg:gap-12 lg:pb-16 xl:gap-0">
        <div class="content-center justify-self-center text-center md:col-span-7 md:justify-self-start md:text-start">
            <span class="inline-block px-3 py-1 mb-4 text-xs font-semibold tracking-wider text-blue-600 uppercase bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">
                🚀 New Season Registration
            </span>
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white md:max-w-2xl md:text-3xl xl:text-5xl">
                Mari Tingkatkan <br /><span class="text-blue-600 dark:text-blue-500">Skill IT Bersama Kami!</span>
            </h1>
            <h2 class="mb-8 max-w-2xl font-semibold text-black dark:text-white md:mb-12 md:text-xl lg:mb-5 lg:text-2xl">
                Scan Untuk Bergabung Dalam Jaringan
            </h2>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                <a href="{{ route('classes') }}" class="inline-flex items-center justify-center px-6 py-3 text-base font-medium text-white bg-blue-700 rounded-xl hover:bg-blue-800 transition-all shadow-lg shadow-blue-500/30">
                    Cek Kelas Sekarang
                </a>
            </div>
        </div>

        <div class="flex justify-center items-center md:col-span-5 mt-10 md:mt-0">
            {{-- Card QR Code --}}
            <div class="relative p-4 bg-white dark:bg-gray-800 rounded-3xl shadow-2xl border border-gray-100 dark:border-gray-700">
                <img class="w-48 h-48 md:w-48 md:h-48 lg:w-64 lg:h-64 object-contain dark:invert" src="{{ asset('img/qr.png') }}" alt="QR Registration" />
                <p class="mt-4 text-center text-xs font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest">Scan to Join</p>
            </div>
        </div>
    </div>
</section>

{{-- ABOUT SECTION --}}
<section class="bg-gray-50 dark:bg-gray-800 py-16 transition-colors duration-300">
    <div class="flex flex-col items-center px-4 mx-auto max-w-screen-xl gap-12 md:grid md:grid-cols-2 lg:px-6">
        <div class="relative w-3/4 md:w-3/4 lg:w-3/5 max-w-md mx-auto group">
            <div class="absolute -inset-2 bg-gradient-to-r from-blue-600 to-blue-400 rounded-full blur opacity-20 group-hover:opacity-40 transition"></div>
            <img class="relative w-full transition-transform duration-500 group-hover:scale-105" src="{{ asset('img/logo.png') }}" alt="Logo Network IT Club">
        </div>

        <div class="text-center md:text-left">
            <h2 class="mb-6 text-3xl tracking-tight font-extrabold text-gray-900 dark:text-white leading-tight">
                Membangun Masa Depan <br><span class="text-blue-600 dark:text-blue-400">Teknologi Bersama.</span>
            </h2>
            <p class="mb-8 text-lg font-normal text-gray-800 dark:text-gray-400 md:text-xl leading-relaxed">
                Network It Club atau bisa disebut NIC adalah extrakurikuler yang berfokus pada bidang IT,Kegiatan dalam NIC biasanya mencakup pelatihan, simulasi jaringan menggunakan software atau bahkan membangun infrastruktur jaringan sederhana.Extrakurikuler ini sangat relevan untuk siswa yang memilih jurusan TKJ(Teknik Komputer & Jaringan).
            </p>
            <a href="{{ route('about') }}" class="inline-flex items-center text-blue-700 dark:text-blue-400 font-bold group">
                Pelajari visi kami 
                <svg class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>

{{-- SKILLS SECTION --}}
<section class="bg-white dark:bg-gray-900 py-20 px-4 transition-colors duration-300">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-3xl md:text-5xl font-extrabold text-center text-gray-900 dark:text-white mb-16 tracking-tight">
            Hal Hal yang <span class="text-blue-600 dark:text-blue-500">Dipelajari</span>
        </h2> 

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            {{-- Soft Skill Card --}}
            <div class="group bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 p-8 rounded-[2rem] hover:bg-white dark:hover:bg-gray-800 hover:border-blue-500 transition-all duration-300 shadow-sm hover:shadow-xl">
                <div class="flex items-center mb-8">
                    <div class="p-4 bg-blue-600 rounded-2xl shadow-lg shadow-blue-500/40 mr-5">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Soft Skill</h3>
                </div>
                <ul class="space-y-4">
                    @foreach(['Communication Skill', 'Problem Solving', 'Creative Thinking', 'Time Management'] as $skill)
                    <li class="flex items-center text-gray-600 dark:text-gray-400">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4"></div>
                        {{ $skill }}
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Hard Skill Card --}}
            <div class="group bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 p-8 rounded-[2rem] hover:bg-white dark:hover:bg-gray-800 hover:border-purple-500 transition-all duration-300 shadow-sm hover:shadow-xl">
                <div class="flex items-center mb-8">
                    <div class="p-4 bg-purple-600 rounded-2xl shadow-lg shadow-purple-500/40 mr-5">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Hard Skill</h3>
                </div>
                <ul class="space-y-4">
                    @foreach(['Cyber Security', 'Network Admin', 'Basic Programming', 'Network Cabling'] as $skill)
                    <li class="flex items-center text-gray-600 dark:text-gray-400">
                        <div class="w-2 h-2 bg-purple-600 rounded-full mr-4"></div>
                        {{ $skill }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- DAFTAR KELAS SECTION --}}
<section class="bg-gray-50 dark:bg-gray-800 py-8 antialiased md:py-12 transition-colors duration-300">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        
        <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Kelas Terbaru</h2>
        </div>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($courses as $kelas)
            <div class="group flex flex-col h-full rounded-3xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 p-5 shadow-sm transition-all duration-300 hover:shadow-2xl hover:border-blue-500 dark:hover:border-blue-500">
                {{-- Image Container --}}
                <div class="relative w-full overflow-hidden rounded-2xl bg-gray-100 dark:bg-gray-800">
                    <img class="mx-auto h-full w-full object-contain rounded-2xl p-2 transition-transform duration-500 group-hover:scale-110" src="storage/{{ $kelas['image'] }}" alt="{{ $kelas['title'] }}" />
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

{{-- FAQ SECTION --}}
<section class="bg-white dark:bg-gray-900 py-20 transition-colors duration-300">
    <div class="mx-auto max-w-3xl px-4">
        <div class="mb-12 text-center">
            <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4">FAQ</h2>
            <div class="h-1 w-20 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        <div class="space-y-4">
            @php
                $faqs = [
                    ['q' => 'Apa itu Network IT Club?', 'a' => 'Network It Club atau bisa disebut NIC adalah extrakurikuler yang berfokus pada bidang IT,Kegiatan dalam NIC biasanya mencakup pelatihan, simulasi jaringan menggunakan software atau bahkan membangun infrastruktur jaringan sederhana.Extrakurikuler ini sangat relevan untuk siswa yang memilih jurusan TKJ(Teknik Komputer & Jaringan).'],
                    ['q' => 'Apakah kegiatan ini gratis?', 'a' => 'Ya, kegiatan ini gratis untuk siapapun yang ingin belajar di bidang IT'],
                    ['q' => 'Siapa saja yang boleh bergabung?', 'a' => 'Siapapun yang ingin belajar IT tanpa memandang latar belakang pendidikan.']
                ];
            @endphp

            @foreach($faqs as $faq)
            <details class="group rounded-2xl bg-slate-50 dark:bg-gray-800 p-6 transition-all border border-transparent open:border-blue-200 dark:open:border-blue-800 open:bg-white dark:open:bg-gray-800">
                <summary class="flex cursor-pointer list-none items-center justify-between font-bold text-gray-900 dark:text-white">
                    {{ $faq['q'] }}
                    <span class="transition-transform duration-300 group-open:rotate-180 text-blue-600 dark:text-blue-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </summary>
                <p class="mt-4 text-gray-600 dark:text-gray-400 leading-relaxed border-t border-gray-100 dark:border-gray-700 pt-4">
                    {{ $faq['a'] }}
                </p>
            </details>
            @endforeach
        </div>
    </div>
</section>

@endsection