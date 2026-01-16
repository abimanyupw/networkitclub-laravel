@extends('layouts.dashboard-app')

@section('content')
<div class="max-w-screen-xl px-4 py-8 lg:py-16">
    <div class="flex flex-col lg:flex-row gap-10">
        
        {{-- Sidebar --}}
        <aside class="w-full lg:w-72 flex-shrink-0">
            <div class="lg:fixed md:sticky sm:sticky top-28 w-72">
            <div class="p-1 rounded-3xl bg-white dark:bg-[#1a1d23] border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
                <div class="p-5">
                    <h2 class="text-sm font-black uppercase tracking-widest mb-4 text-blue-600 dark:text-blue-400">Kategori Materi</h2>
                    <nav class="space-y-1.5">
                        <a href="{{ route('class.show', $course->slug) }}"
                           class="flex items-center px-4 py-3 rounded-xl font-medium transition-all duration-200
                           {{ !request('category') ? 'bg-blue-600 text-white shadow-md shadow-blue-200 dark:shadow-none' : 'text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-800 dark:text-gray-400' }}">
                            <span class="text-sm">Semua Materi</span>
                        </a>

                        @foreach ($categories as $category)
                            <a href="{{ route('class.show', ['course' => $course->slug, 'category' => $category->slug]) }}"
                               class="flex items-center px-4 py-3 rounded-xl font-medium transition-all duration-200
                               {{ request('category') == $category->slug
                                   ? 'bg-blue-600 text-white shadow-md shadow-blue-200 dark:shadow-none'
                                   : 'text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-800 dark:text-gray-400' }}">
                                <span class="text-sm">{{ $category->name }}</span>
                            </a>
                        @endforeach
                    </nav>
                </div>
            </div>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1">
            <div class="mb-12">
                <span class="inline-block px-4 py-1.5 mb-4 text-xs font-bold tracking-wider text-blue-700 uppercase bg-blue-100 rounded-full dark:bg-blue-900/30 dark:text-blue-400">
                    E-Learning Course
                </span>
                <h1 class="text-4xl lg:text-5xl font-black text-gray-900 dark:text-white mb-6 leading-tight">
                    {{ $course->title }}
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed max-w-3xl border-l-4 border-blue-600 pl-6">
                    {{ $course->description }}
                </p>
            </div>

            <div class="border-t border-gray-200 dark:border-gray-800 pt-10">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl text-black dark:text-white font-bold tracking-tight">Materi Pembelajaran</h2>
                    <span class="text-sm text-gray-500 font-medium px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-lg">
                        {{ $materials->total() }} Materi
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @forelse ($materials as $material)
                        <div class="group relative bg-white dark:bg-[#1a1d23] rounded-3xl overflow-hidden border border-gray-200 dark:border-gray-800 hover:border-blue-500 transition-all duration-300 hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-1">
                            
                            {{-- Clickable Overlay --}}
                            <a href="{{ route('materials.show', [$course->slug, $material->slug]) }}" class="absolute inset-0 z-10"></a>

                            <div class="aspect-video overflow-hidden relative">
                                <img src="{{ asset('storage/' . ($material->thumbnail ?? $course->image)) }}"
                                     alt="{{ $material->title }}"
                                     class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </div>

                            <div class="p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-[10px] font-bold uppercase tracking-widest text-blue-600 dark:text-blue-400 px-2 py-1 bg-blue-50 dark:bg-blue-900/20 rounded-md">
                                        {{ $material->category->name }}
                                    </span>
                                    <span class="text-[10px] font-medium text-gray-400">
                                        {{ $material->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-blue-600 transition-colors">
                                    {{ $material->title }}
                                </h3>

                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-3 line-clamp-2">
                                    {{ $material->description }}
                                </p>

                                <div class="mt-5 flex items-center text-blue-600 dark:text-blue-400 font-bold text-sm">
                                    Pelajari Materi
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-20 flex flex-col items-center justify-center rounded-3xl bg-gray-50 dark:bg-gray-800/20 border-2 border-dashed border-gray-200 dark:border-gray-800">
                            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <p class="text-gray-500 font-medium italic">Belum ada materi tersedia untuk kategori ini.</p>
                        </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                <div class="mt-12"> 
                    {{ $materials->withQueryString()->links() }} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection