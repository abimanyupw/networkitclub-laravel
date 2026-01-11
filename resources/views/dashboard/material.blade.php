@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gray-50 text-gray-900 dark:bg-[#0f1115] dark:text-gray-100 transition-colors duration-300">
    <div class="max-w-screen-xl mx-auto px-4 py-8 lg:py-12">
        
        {{-- Header & Back Button --}}
        <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
            <a href="{{ route('class.show', $course->slug) }}" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-[#1a1d23] border border-gray-200 dark:border-gray-800 rounded-xl text-sm font-bold text-gray-700 dark:text-gray-300 hover:bg-blue-600 hover:text-white transition-all duration-300 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Kelas
            </a>
            
            <span class="px-4 py-1.5 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-black rounded-full uppercase tracking-widest">
                {{ $material->category->name }}
            </span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            {{-- Konten Utama --}}
            <div class="lg:col-span-2">
                <div class="mb-8">
                    <h1 class="text-3xl lg:text-5xl font-black mb-4 leading-tight">
                        {{ $material->title }}
                    </h1>
                    <p class="text-gray-500 text-sm">Update terakhir: {{ $material->updated_at->diffForHumans() }}</p>
                </div>

                {{-- Video Player / Image --}}
                <div class="relative aspect-video rounded-3xl overflow-hidden bg-black shadow-2xl mb-10 border border-gray-200 dark:border-gray-800">
                    @if($material->video_url)
                        <iframe class="w-full h-full" src="{{ $material->video_url }}" frameborder="0" allowfullscreen></iframe>
                    @else
                        <img src="{{ asset('img/' . ($material->thumbnail ?? $course->image)) }}" 
                             class="w-full h-full object-cover">
                    @endif
                </div>

                {{-- Artikel Materi --}}
                <article class="bg-white dark:bg-[#1a1d23] p-8 lg:p-12 rounded-3xl border border-gray-100 dark:border-gray-800 shadow-sm">
                    <div class="prose prose-lg dark:prose-invert max-w-none">
                        <h3 class="text-blue-600 font-bold mb-4">Ringkasan Materi</h3>
                        <div class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                            {!! nl2br(e($material->description)) !!}
                        </div>

                        @if($material->content)
                            <div class="pt-8 border-t border-gray-100 dark:border-gray-800">
                                {!! $material->content !!}
                            </div>
                        @endif
                    </div>

                    {{-- Navigasi Bawah (Next/Prev) --}}
                    <div class="mt-12 flex flex-row sm:flex-row items-center justify-between gap-6 border-t border-gray-100 dark:border-gray-800 pt-8">
                        <div>
                            @if($prev)
                                <a href="{{ route('materials.show', [$course->slug, $prev->slug]) }}" class="group block">
                                    <p class="text-xs text-gray-500 mb-1 font-bold uppercase tracking-tighter">Sebelumnya</p>
                                    <p class="font-black text-3xl text-gray-900 dark:text-white group-hover:text-blue-600 transition-colors">&laquo;</p>
                                </a>
                            @endif
                        </div>
                        <div class="text-right">
                            @if($next)
                                <a href="{{ route('materials.show', [$course->slug, $next->slug]) }}" class="group block">
                                    <p class="text-xs text-gray-500 mb-1 font-bold uppercase tracking-tighter">Berikutnya</p>
                                    <p class="font-black text-3xl text-gray-900 dark:text-white group-hover:text-blue-600 transition-colors">&raquo;</p>
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            </div>

           {{-- Sidebar Navigasi --}}
            <aside class="space-y-8">
                <div class="bg-white dark:bg-[#1a1d23] rounded-3xl border border-gray-200 dark:border-gray-800 overflow-hidden shadow-sm sticky top-28">
                    <div class="p-6 border-b border-gray-100 dark:border-gray-800 bg-gray-50/50 dark:bg-gray-800/20">
                        {{-- Menampilkan Nama Kategori di Judul --}}
                        <h3 class="font-black text-gray-900 dark:text-white uppercase text-xs tracking-widest">
                            Materi di {{ $material->category->name }}
                        </h3>
                        <p class="text-[10px] text-gray-500 mt-1 italic">Menampilkan materi sejenis</p>
                    </div>
                    
                    <div class="p-2 max-h-[60vh] overflow-y-auto">
                        @forelse($courseMaterials as $item)
                            <a href="{{ route('materials.show', [$course->slug, $item->slug]) }}" 
                            class="flex items-center gap-4 p-3 rounded-2xl transition-all duration-200 
                            {{ $item->id == $material->id ? 'bg-blue-600 text-white shadow-lg' : 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-400' }}">
                                
                                <div class="w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-full {{ $item->id == $material->id ? 'bg-white/20' : 'bg-gray-200 dark:bg-gray-700' }} text-xs font-bold">
                                    {{ $loop->iteration }}
                                </div>
                                
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-xs font-bold truncate">{{ $item->title }}</h4>
                                </div>

                                @if($item->id == $material->id)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                @endif
                            </a>
                        @empty
                            <p class="p-4 text-xs text-gray-500 text-center">Tidak ada materi lain di kategori ini.</p>
                        @endforelse
                    </div>

                    {{-- Tombol untuk melihat semua kategori lagi --}}
                    <div class="p-4 bg-gray-50 dark:bg-gray-800/10 border-t border-gray-100 dark:border-gray-800">
                        <a href="{{ route('class.show', $course->slug) }}" class="flex items-center justify-center gap-2 text-[10px] font-black uppercase tracking-tighter text-blue-600 hover:text-blue-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                            Lihat Semua Kategori
                        </a>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</section>
@endsection