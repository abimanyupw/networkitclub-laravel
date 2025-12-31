@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
{{-- Modifikasi: Menambahkan gradient halus dan perbaikan proporsi gambar QR --}}
<section class="relative bg-white py-12 antialiased md:py-20 overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-blue-50 via-transparent to-transparent opacity-70"></div>
    
    <div class="relative mx-auto grid max-w-screen-xl px-4 pb-8 md:grid-cols-12 lg:gap-12 lg:pb-16 xl:gap-0">
        <div class="content-center justify-self-center text-center md:col-span-7 md:justify-self-start md:text-start">
            <span class="inline-block px-3 py-1 mb-4 text-xs font-semibold tracking-wider text-blue-600 uppercase bg-blue-100 rounded-full">
                🚀 New Season Registration
            </span>
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:max-w-2xl md:text-5xl xl:text-7xl">
                Limited Time Offer!<br /><span class="text-blue-600">Up to 50% OFF!</span>
            </h1>
            <h2 class="mb-8 max-w-2xl text-gray-500 md:mb-12 md:text-lg lg:mb-5 lg:text-xl">
                Bergabunglah dengan komunitas IT terbesar. Dapatkan akses ke semua materi eksklusif dengan harga unbeatable!
            </h2>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                <a href="#kelas" class="inline-flex items-center justify-center px-6 py-3 text-base font-medium text-white bg-blue-700 rounded-xl hover:bg-blue-800 transition-all shadow-lg shadow-blue-500/30">
                    Cek Kelas Sekarang
                </a>
            </div>
        </div>

        <div class="flex justify-center items-center md:col-span-5 mt-10 md:mt-0">
            <div class="relative p-4 bg-white rounded-3xl shadow-2xl border border-gray-100">
                <img class="w-48 h-48 md:w-64 md:h-64 object-contain" src="img/qr.png" alt="QR Registration" />
                <p class="mt-4 text-center text-xs font-bold text-gray-400 uppercase tracking-widest">Scan to Join</p>
            </div>
        </div>
    </div>
</section>

{{-- ABOUT SECTION --}}
{{-- Modifikasi: Layout lebih simetris dan teks lebih mengalir --}}
<section class="bg-gray-50 py-16">
    <div class="flex flex-col items-center px-4 mx-auto max-w-screen-xl gap-12 md:grid md:grid-cols-2 lg:px-6">
        <div class="relative w-1/2 max-w-md mx-auto group">
            <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
            <img class="relative w-full transition-transform duration-500 group-hover:scale-105" src="img/logo.png" alt="Logo Network IT Club">
        </div>

        <div class="text-center md:text-left">
            <h2 class="mb-6 text-4xl tracking-tight font-extrabold text-gray-900 leading-tight">
                Membangun Masa Depan <br><span class="text-blue-600">Teknologi Bersama.</span>
            </h2>
            <p class="mb-8 font-normal text-gray-600 md:text-lg leading-relaxed">
                Network IT Club bukan sekadar komunitas, tapi ekosistem bagi para antusias teknologi untuk berbagi ide, riset, dan berkembang bersama di dunia Networking & Cybersecurity.
            </p>
            <a href="#" class="inline-flex items-center text-blue-700 font-bold group">
                Pelajari visi kami 
                <svg class="ml-2 w-5 h-5 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>

{{-- SKILLS SECTION (Hal-hal yang dipelajari) --}}
{{-- Modifikasi: Card lebih estetik sesuai desain sebelumnya --}}
<section class="bg-white py-20 px-4">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-3xl md:text-5xl font-extrabold text-center text-gray-900 mb-16 tracking-tight">
            Hal Hal yang <span class="text-blue-600">Dipelajari</span>
        </h2> 

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="group bg-slate-50 border border-slate-200 p-8 rounded-[2rem] hover:bg-white hover:border-blue-500 transition-all duration-300 shadow-sm hover:shadow-xl">
                <div class="flex items-center mb-8">
                    <div class="p-4 bg-blue-600 rounded-2xl shadow-lg shadow-blue-500/40 mr-5">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Soft Skill</h3>
                </div>
                <ul class="space-y-4">
                    @foreach(['Communication Skill', 'Problem Solving', 'Creative Thinking', 'Time Management'] as $skill)
                    <li class="flex items-center text-gray-600">
                        <div class="w-2 h-2 bg-blue-600 rounded-full mr-4"></div>
                        {{ $skill }}
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="group bg-slate-50 border border-slate-200 p-8 rounded-[2rem] hover:bg-white hover:border-purple-500 transition-all duration-300 shadow-sm hover:shadow-xl">
                <div class="flex items-center mb-8">
                    <div class="p-4 bg-purple-600 rounded-2xl shadow-lg shadow-purple-500/40 mr-5">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Hard Skill</h3>
                </div>
                <ul class="space-y-4">
                    @foreach(['Cyber Security', 'Network Admin', 'Basic Programming', 'Network Cabling'] as $skill)
                    <li class="flex items-center text-gray-600">
                        <div class="w-2 h-2 bg-purple-600 rounded-full mr-4"></div>
                        {{ $skill }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>


<section id="kelas" class="bg-gray-50 py-16">
    <div class="mx-auto max-w-screen-xl px-4">
        <div class="mb-10 flex justify-between items-end">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900">Daftar Kelas</h2>
                <p class="text-gray-500">Pilih spesialisasi yang ingin kamu kuasai.</p>
            </div>
            <a href="#" class="text-blue-600 font-semibold hover:underline">Lihat Semua</a>
        </div>
        
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            {{-- Loop Card Kelas --}}
            <div class="group rounded-3xl border border-gray-200 bg-white p-5 shadow-sm hover:shadow-2xl transition-all duration-300">
                <div class="relative overflow-hidden rounded-2xl bg-gray-100 h-48 w-full mb-6">
                    <img class="mx-auto h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="iMac Class" />
                </div>
                <div>
                    <a href="#" class="text-lg font-bold text-gray-900 hover:text-blue-600 transition-colors">Admin Network System</a>
                    <p class="mt-2 text-sm text-gray-500 line-clamp-2">Belajar mengelola infrastruktur jaringan server skala enterprise.</p>
                </div>
                <div class="mt-6">
                    <button type="button" class="w-full rounded-xl bg-gray-900 px-5 py-3 text-sm font-bold text-white hover:bg-blue-700 transition-all">
                        Masuk Kelas
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQ SECTION --}}
{{-- Modifikasi: Warna Accordion lebih soft agar tidak terlalu mencolok (eye-pleasing) --}}
<section class="bg-white py-20">
    <div class="mx-auto max-w-3xl px-4">
        <div class="mb-12 text-center">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-4">FAQ</h2>
            <div class="h-1 w-20 bg-blue-600 mx-auto rounded-full"></div>
        </div>

        <div class="space-y-4">
            @php
                $faqs = [
                    ['q' => 'Apa itu Network IT Club?', 'a' => 'Komunitas belajar networking dan server untuk masa depan IT Indonesia.'],
                    ['q' => 'Apakah kegiatan ini gratis?', 'a' => 'Ya, komunitas kami menyediakan banyak resource gratis untuk pelajar.'],
                    ['q' => 'Siapa saja yang boleh bergabung?', 'a' => 'Siapapun yang ingin belajar IT tanpa memandang latar belakang pendidikan.']
                ];
            @endphp

            @foreach($faqs as $faq)
            <details class="group rounded-2xl bg-slate-50 p-6 transition-all border border-transparent open:border-blue-200 open:bg-white">
                <summary class="flex cursor-pointer list-none items-center justify-between font-bold text-gray-900">
                    {{ $faq['q'] }}
                    <span class="transition-transform duration-300 group-open:rotate-180 text-blue-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </summary>
                <p class="mt-4 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                    {{ $faq['a'] }}
                </p>
            </details>
            @endforeach
        </div>
    </div>
</section>

@endsection