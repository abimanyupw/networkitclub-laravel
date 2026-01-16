@extends('layouts.dashboard-app')

@section('content')
<div class="max-w-screen-xl mx-auto px-4 py-6 lg:py-10">
    
    {{-- Top Bar: Navigation & Status --}}
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <a href="{{ route('class.show', $course->slug) }}" 
           class="inline-flex items-center gap-2 text-sm font-bold text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors group">
            <div class="p-2 bg-white dark:bg-gray-800 rounded-lg shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </div>
            Kembali ke Daftar Materi
        </a>
        
        <div class="flex items-center gap-3">
            <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-[10px] font-black rounded-lg uppercase tracking-widest border border-blue-200 dark:border-blue-800">
                {{ $material->category->name }}
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
        
        {{-- Konten Utama --}}
        <div class="lg:col-span-2">
            {{-- Judul & Meta --}}
            <div class="mb-8">
                <h1 class="text-3xl lg:text-5xl font-black text-gray-900 dark:text-white mb-4 leading-tight tracking-tight">
                    {{ $material->title }}
                </h1>
                <div class="flex items-center gap-4 text-gray-500 text-xs font-medium">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Update: {{ $material->updated_at->diffForHumans() }}
                    </span>
                </div>
            </div>

            {{-- Media Player --}}
            <div class="group relative aspect-video rounded-[2rem] overflow-hidden bg-gray-900 shadow-2xl shadow-blue-500/10 mb-10 border-4 border-white dark:border-gray-800">
                @if($material->video_url)
                    <iframe class="w-full h-full" src="{{ $material->video_url }}" frameborder="0" allowfullscreen></iframe>
                @else
                    <img src="{{ asset('storage/' . ($material->thumbnail ?? $course->image)) }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black/20"></div>
                @endif
            </div>

            {{-- Artikel Materi --}}
            <article class="bg-white dark:bg-[#1a1d23] p-6 lg:p-10 rounded-[2.5rem] border border-gray-100 dark:border-gray-800 shadow-sm relative overflow-hidden">
                {{-- Decorative Element --}}
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 dark:bg-blue-900/10 rounded-full -mr-16 -mt-16 blur-3xl"></div>

                <div class="prose prose-blue lg:prose-xl dark:prose-invert max-w-none">
                    <h3 class="text-blue-600 dark:text-blue-400 font-black text-xl mb-6 flex items-center gap-3">
                        Deskripsi Materi
                    </h3>
                    
                    <div class="text-gray-600 dark:text-gray-300 leading-relaxed mb-10">
                        {!! nl2br(e($material->description)) !!}
                    </div>

                    @if($material->content)
                        <div class="pt-8 border-t border-gray-100 dark:border-gray-800 text-gray-800 dark:text-gray-200 custom-content">
                            {!! $material->content !!}
                        </div>
                    @endif
                </div>

                {{-- Navigasi Bawah --}}
                <div class="mt-16 grid grid-cols-2 gap-4 border-t border-gray-100 dark:border-gray-800 pt-10">
                    @if($prev)
                        <a href="{{ route('materials.show', [$course->slug, $prev->slug]) }}" 
                           class="flex flex-col gap-2 p-4 rounded-2xl border border-gray-100 dark:border-gray-800 hover:border-blue-500 transition-all group">
                            <span class="text-[10px] font-black uppercase tracking-widest text-gray-400 group-hover:text-blue-500 transition-colors">Sebelumnya</span>
                            <span class="text-sm font-bold text-gray-900 dark:text-white truncate">{{ $prev->title }}</span>
                        </a>
                    @else
                        <div></div>
                    @endif

                    @if($next)
                        <a href="{{ route('materials.show', [$course->slug, $next->slug]) }}" 
                           class="flex flex-col gap-2 p-4 rounded-2xl border border-gray-100 dark:border-gray-800 hover:border-blue-500 transition-all text-right group">
                            <span class="text-[10px] font-black uppercase tracking-widest text-gray-400 group-hover:text-blue-500 transition-colors">Berikutnya</span>
                            <span class="text-sm font-bold text-gray-900 dark:text-white truncate">{{ $next->title }}</span>
                        </a>
                    @endif
                </div>
            </article>
        </div>

        {{-- Sidebar Navigasi --}}
        <aside class="space-y-6">
            <div class="sticky top-24 bg-white dark:bg-[#1a1d23] rounded-[2rem] border border-gray-200 dark:border-gray-800 overflow-hidden shadow-xl shadow-gray-200/50 dark:shadow-none">
                <div class="p-6 bg-gray-50 dark:bg-gray-800/30 border-b border-gray-100 dark:border-gray-800">
                    <h3 class="font-black text-gray-900 dark:text-white uppercase text-xs tracking-[0.2em]">
                        Daftar Materi
                    </h3>
                    <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold">{{ $material->category->name }}</p>
                </div>
                
                <div class="p-3 space-y-2 max-h-[50vh] overflow-y-auto custom-scrollbar">
                    @forelse($courseMaterials as $item)
                        <a href="{{ route('materials.show', [$course->slug, $item->slug]) }}" 
                           class="flex items-center gap-4 p-4 rounded-2xl transition-all duration-300 group
                           {{ $item->id == $material->id 
                               ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/20' 
                               : 'hover:bg-blue-50 dark:hover:bg-blue-900/20 text-gray-700 dark:text-gray-400 hover:text-blue-600' }}">
                            
                            <div class="relative flex-shrink-0">
                                <div class="w-10 h-10 flex items-center justify-center rounded-xl font-bold text-sm
                                    {{ $item->id == $material->id ? 'bg-white/20' : 'bg-gray-100 dark:bg-gray-800 group-hover:bg-blue-100' }}">
                                    {{ $loop->iteration }}
                                </div>
                                @if($item->id == $material->id)
                                    <span class="absolute -top-1 -right-1 flex h-3 w-3">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-3 w-3 bg-white"></span>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-bold truncate">{{ $item->title }}</h4>
                                <p class="text-[10px] opacity-60 truncate">Klik untuk mempelajari</p>
                            </div>
                        </a>
                    @empty
                        <p class="p-4 text-xs text-gray-500 text-center italic">Tidak ada materi lain.</p>
                    @endforelse
                </div>

                <div class="p-5">
                    <a href="{{ route('class.show', $course->slug) }}" 
                       class="flex items-center justify-center gap-2 py-3 px-4 rounded-xl text-xs font-black uppercase tracking-widest bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-blue-600 hover:text-white transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                        Lihat Kurikulum Utama
                    </a>
                </div>
            </div>

            {{-- Info Card Tambahan --}}
           

    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    .dark .custom-scrollbar::-webkit-scrollbar-thumb { background: #334155; }
    
    .custom-content p { margin-bottom: 1.5rem; line-height: 1.8; }
    .custom-content h2, .custom-content h3 { font-weight: 800; color: inherit; margin-top: 2rem; margin-bottom: 1rem; }
</style>
@endsection