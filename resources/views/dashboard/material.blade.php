@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gray-50 text-gray-900 dark:bg-[#0f1115] dark:text-gray-100 transition-colors duration-300">
    <div class="max-w-screen-xl mx-auto px-4 py-8 lg:py-12">
        
        {{-- Breadcrumbs & Back Button --}}
        <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
            <a href="{{ route('class.show', $material->course->slug) }}" 
               class="bg-blue-600 p-2 rounded-md inline-flex items-center gap-2 text-sm font-medium text-white hover:text-black transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar Materi
            </a>
            
            <div class="flex items-center gap-2">
                <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-bold rounded-full uppercase tracking-wider">
                    {{ $material->category->name }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            {{-- Main Content --}}
            <div class="lg:col-span-2">
                {{-- Header Materi --}}
                <div class="mb-8">
                    <h1 class="text-3xl lg:text-4xl font-black mb-4 leading-tight">
                        {{ $material->title }}
                    </h1>
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Dipublikasikan: {{ $material->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>

                {{-- Media Player / Thumbnail --}}
                <div class="relative aspect-video rounded-3xl overflow-hidden bg-black shadow-2xl mb-10 border border-gray-200 dark:border-gray-800">
                    {{-- Cek jika ada video_url, jika tidak tampilkan thumbnail --}}
                    @if(isset($material->video_url))
                        <iframe class="w-full h-full" src="{{ $material->video_url }}" frameborder="0" allowfullscreen></iframe>
                    @else
                        <img src="{{ asset('img/' . ($material->thumbnail ?? $material->course->image)) }}" 
                             alt="{{ $material->title }}" 
                             class="w-full h-full object-cover">
                    @endif
                </div>

                {{-- Deskripsi/Isi Materi --}}
                <article class="prose prose-lg dark:prose-invert max-w-none">
                    <div class="bg-white dark:bg-[#1a1d23] p-8 rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm">
                        <h3 class="text-blue-600 text-xl font-bold mb-4">Tentang Materi Ini</h3>
                        <div class="text-gray-600 dark:text-gray-300 leading-relaxed space-y-4 text-lg">
                            {!! nl2br(e($material->description)) !!}
                        </div>
                        
                        {{-- Contoh jika ada konten artikel panjang --}}
                        @if($material->content)
                            <div class="mt-8 pt-8 border-t border-blue-600">
                                {!! $material->content !!}
                            </div>
                        @endif
                    </div>
                </article>
            </div>

            {{-- Sidebar --}}
            <aside class="space-y-8">
                {{-- Materi Lainnya dalam Kelas Ini --}}
                <div class="bg-white dark:bg-[#1a1d23] rounded-3xl border border-gray-200 dark:border-gray-800 overflow-hidden shadow-sm">
                    <div class="p-6 border-b border-gray-100 dark:border-gray-800 bg-gray-50/50 dark:bg-gray-800/20">
                        <h3 class="font-bold text-gray-900 dark:text-white">Materi dalam Kelas Ini</h3>
                        <p class="text-xs text-gray-500 mt-1">{{ $material->course->title }}</p>
                    </div>
                    <div class="p-2">
                        {{-- Ambil beberapa materi lain dari course yang sama --}}
                        @foreach($material->course->materials->take(5) as $otherMaterial)
                            <a href="{{ route('materials.show', $otherMaterial) }}" 
                               class="flex items-start gap-3 p-3 rounded-2xl transition-all duration-200 
                               {{ $otherMaterial->id == $material->id ? 'bg-blue-50 dark:bg-blue-900/20 border-blue-100 dark:border-blue-800' : 'hover:bg-gray-50 dark:hover:bg-gray-800' }}">
                                <div class="w-16 h-12 flex-shrink-0 rounded-lg overflow-hidden bg-gray-200">
                                    <img src="{{ asset('img/' . ($otherMaterial->thumbnail ?? $material->course->image)) }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-semibold truncate {{ $otherMaterial->id == $material->id ? 'text-blue-600 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300' }}">
                                        {{ $otherMaterial->title }}
                                    </h4>
                                    <span class="text-[10px] text-gray-400 uppercase tracking-tighter">
                                        {{ $otherMaterial->category->name }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="p-4 bg-gray-50 dark:bg-gray-800/10 text-center">
                        <a href="{{ route('class.show', $material->course->slug) }}" class="text-xs font-bold text-blue-600 hover:underline">
                            Lihat Semua Materi
                        </a>
                    </div>
                </div>

            </aside>

        </div>
    </div>
</section>
@endsection


