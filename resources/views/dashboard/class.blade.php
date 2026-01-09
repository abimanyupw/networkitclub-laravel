@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-gray-50 text-gray-900 dark:bg-[#0f1115] dark:text-gray-100 transition-colors duration-300">
    <div class="max-w-screen-xl mx-auto px-4 py-8 lg:py-16">
        <div class="flex flex-col lg:flex-row gap-10">
            
            {{-- Sidebar --}}
            <aside class="w-full lg:w-72 flex-shrink-0">
                <div class="sticky top-28 p-1 rounded-3xl bg-white dark:bg-[#1a1d23] border border-gray-200 dark:border-gray-800 shadow-sm overflow-hidden">
                    <div class="p-5">
                        <h2 class="text-sm font-black uppercase tracking-widest mb-4 text-blue-600 dark:text-blue-400">Kategori Materi</h2>
                        <nav class="space-y-1.5">
                            {{-- Semua --}}
                            <a href="{{ route('class.show', $course->slug) }}"
                            class="flex items-center px-4 py-3 rounded-xl font-medium transition-all duration-200
                            {{ request('category') ? 'text-gray-500 hover:bg-gray-100 dark:hover:bg-gray-800 dark:text-gray-400' : 'bg-blue-600 text-white shadow-md shadow-blue-200 dark:shadow-none' }}">
                                <span class="text-sm">Semua Materi</span>
                            </a>

                            @foreach ($categories as $category)
                                <a href="{{ route('class.show', [$course->slug, 'category' => $category->slug]) }}"
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
                        <h2 class="text-2xl font-bold tracking-tight">Materi Pembelajaran</h2>
                        <span class="text-sm text-gray-500 font-medium">{{ $materials->count() }} Materi Tersedia</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @forelse ($materials as $material)
                            <div class="group relative bg-white dark:bg-[#1a1d23] rounded-3xl overflow-hidden border border-gray-300 dark:border-gray-800 hover:border-blue-500 dark:hover:border-blue-500 transition-all duration-300 hover:shadow-xl hover:shadow-blue-500/5 hover:-translate-y-1">

                                <div class="aspect-video overflow-hidden relative">
                                    <img src="{{ asset('img/' . ($material->thumbnail ?? $course->image)) }}"
                                        alt="{{ $material->title }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-5">
                                    </div>
                                </div>

                                <div class="p-6">
                                    <div class="flex justify-between gap-2 mb-3">
                                        <span class="text-[10px] font-bold uppercase tracking-widest text-blue-600 dark:text-blue-400 px-2 py-0.5 bg-blue-50 dark:bg-blue-900/20 rounded">
                                            {{ $material->category->name }}
                                        </span>
                                        <span class="text-[10px] font-bold uppercase tracking-widest text-yellow-600 dark:text-yellow-400 px-2 py-0.5 bg-yellow-50 dark:bg-yellow-900/20 rounded">
                                            {{ $material->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    
                                    <a href="{{ route('materials.show', $material) }}"
                                    class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200">
                                        {{ $material->title }}
                                    </a>

                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-3 line-clamp-2 leading-relaxed">
                                        {{ $material->description }}
                                    </p>
                                </div>


                            </div>
                        @empty
                            <div class="col-span-full py-20 text-center rounded-3xl bg-gray-100 dark:bg-gray-800/50 border-2 border-dashed border-gray-300 dark:border-gray-700">
                                <p class="text-gray-500 font-medium italic">Belum ada materi dalam kategori ini.</p>
                            </div>
                        @endforelse
                    </div>

                    {{-- pagination --}}
                    <div class="mt-12 flex justify-center"> 
                        {{ $materials->withQueryString()->links() }} 
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection