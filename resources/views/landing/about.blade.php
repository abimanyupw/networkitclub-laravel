@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
<section class="relative bg-gray-900 overflow-hidden transition-colors duration-300">
    <div class="absolute inset-0 z-0 opacity-20">
        <div class="absolute top-0 left-0 w-72 h-72 bg-blue-600 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-purple-600 rounded-full blur-[120px]"></div>
    </div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 py-24 md:py-32 text-center">
        <span class="inline-block px-4 py-1.5 mb-6 text-xs font-black tracking-widest text-blue-400 uppercase bg-blue-400/10 rounded-full">
            Knowledge is Power
        </span>
        <h1 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-tighter leading-none">
            Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-blue-600">Network IT Club</span>
        </h1>
        <p class="max-w-2xl mx-auto text-gray-400 text-lg md:text-xl leading-relaxed">
            Komunitas belajar dan pengembangan skill IT berbasis praktik untuk mencetak generasi ahli infrastruktur digital.
        </p>
    </div>
</section>

{{-- TENTANG KAMI --}}
<section class="py-24 bg-white dark:bg-gray-900 transition-colors duration-300">
    <div class="max-w-5xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 dark:text-white mb-6 tracking-tight">
                    Wadah Kolaborasi <br><span class="text-blue-600 dark:text-blue-400">Masa Depan IT</span>
                </h2>
                <div class="space-y-6 text-gray-600 dark:text-gray-400 text-lg leading-relaxed">
                    <p>
                        Network IT Club (NIC) adalah komunitas yang berfokus pada pengembangan keterampilan teknologi informasi, khususnya di bidang jaringan komputer, sistem, dan keamanan siber.
                    </p>
                    <p>
                        NIC hadir sebagai wadah belajar kolaboratif untuk siswa dan generasi muda agar siap menghadapi tantangan dunia industri teknologi yang terus berkembang pesat.
                    </p>
                </div>
            </div>
            <div class="relative group w-3/4 mx-auto">
                <div class="absolute -inset-2 bg-gradient-to-r from-blue-600 to-blue-400 rounded-full blur opacity-20 group-hover:opacity-40 transition"></div>
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="relative rounded-3xl transition-transform duration-500 group-hover:scale-[1.02]" alt="NIC Activities">
            </div>
        </div>
    </div>
</section>

{{-- VISI & MISI --}}
<section class="py-24 bg-slate-50 dark:bg-gray-800 transition-colors duration-300">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-8">
        {{-- Visi Card --}}
        <div class="bg-white dark:bg-gray-900 p-10 rounded-[2.5rem] shadow-sm border border-slate-200 hover:border-blue-500 transition-all dark:border-gray-700">
            <div class="w-14 h-14 bg-blue-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-blue-500/30 text-white">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </div>
            <h3 class="text-3xl font-black text-gray-900 dark:text-white mb-4">Visi</h3>
            <p class="text-gray-600 dark:text-gray-400 text-lg leading-relaxed">
                Menjadi komunitas IT yang unggul dalam pengembangan keterampilan jaringan dan keamanan siber yang relevan dengan kebutuhan industri global.
            </p>
        </div>

        {{-- Misi Card --}}
        <div class="bg-white dark:bg-gray-900 p-10 rounded-[2.5rem] shadow-sm border border-slate-200 hover:border-purple-600 transition-all dark:border-gray-700">
            <div class="w-14 h-14 bg-purple-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-purple-500/30 text-white">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <h3 class="text-3xl font-black text-gray-900 dark:text-white mb-4">Misi</h3>
            <ul class="space-y-4">
                @foreach(['Menyediakan pembelajaran IT berbasis praktik', 'Membangun budaya kolaborasi profesional', 'Menyiapkan anggota siap terjun ke dunia kerja'] as $misi)
                <li class="flex items-start text-gray-600 dark:text-gray-400 text-lg">
                    <span class="mr-3 text-purple-600 dark:text-purple-400 mt-1">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293l-4 4a1 1 0 01-1.414 0l-2-2a1 1 0 111.414-1.414L9 10.586l3.293-3.293a1 1 0 111.414 1.414z" clip-rule="evenodd"></path></svg>
                    </span>
                    {{ $misi }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

{{-- KEGIATAN & PENCAPAIAN --}}
<section class="py-24 bg-white dark:bg-gray-900 transition-colors duration-300">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-gray-900 dark:text-white mb-4">Kegiatan & Pencapaian</h2>
            <div class="h-1.5 w-24 bg-blue-600 dark:bg-blue-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @php
                $kegiatan = [
                    ['t' => 'Pelatihan Internal', 'd' => 'Workshop jaringan dan server intensif untuk anggota.', 'icon' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'],
                    ['t' => 'Proyek Tim', 'd' => 'Pembuatan dan simulasi infrastruktur jaringan nyata.', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                    ['t' => 'Kolaborasi', 'd' => 'Kerja sama lintas komunitas dengan mentor industri.', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z']
                ];
            @endphp

            @foreach($kegiatan as $k)
            <div class="group p-8 rounded-3xl border border-slate-200 dark:border-gray-700 bg-white dark:bg-gray-800 hover:border-blue-500 transition-all shadow-sm hover:shadow-xl">
                <div class="text-blue-600 dark:text-blue-400 mb-6 transition-transform group-hover:scale-110 duration-300">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $k['icon'] }}" /></svg>
                </div>
                <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-3">{{ $k['t'] }}</h4>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    {{ $k['d'] }}
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="relative bg-blue-600 py-20 text-center overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" fill="white" viewBox="0 0 100 100" preserveAspectRatio="none">
            <path d="M0 100 L100 0 L100 100 Z"></path>
        </svg>
    </div>
    <div class="relative z-10 px-6">
        <h2 class="text-3xl md:text-5xl font-black text-white mb-8 tracking-tighter">
            Siap Menjelajahi <br>Dunia IT Bersama Kami?
        </h2>
        <a href="{{ route('home') }}"
           class="inline-flex items-center bg-white text-blue-600 px-10 py-4 rounded-2xl font-black hover:bg-gray-100 transform hover:-translate-y-1 transition shadow-2xl">
            Kembali ke Beranda
            <svg class="ml-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
    </div>
</section>

@endsection