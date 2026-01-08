@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-gray-50 text-gray-900 dark:bg-[#0f1115] dark:text-gray-100 transition-colors duration-300">
    <div class="max-w-screen-xl mx-auto px-4 py-8 lg:py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            
            <aside class="w-full lg:w-64 flex-shrink-0">
                <div class="sticky top-24 p-6 rounded-2xl bg-white dark:bg-[#1a1d23] border border-gray-200 dark:border-gray-800 shadow-sm">
                    <h2 class="text-lg font-bold mb-4 text-blue-600 dark:text-blue-400">Kategori Materi</h2>
                    <nav class="space-y-2">
                        <a href="#" class="block px-4 py-2.5 rounded-xl bg-blue-600 text-white font-semibold shadow-md shadow-blue-500/20">Semua Materi</a>
                        <a href="#" class="block px-4 py-2.5 rounded-xl text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all">Binary Exploitation</a>
                        <a href="#" class="block px-4 py-2.5 rounded-xl text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all">Social Engineering</a>
                        <a href="#" class="block px-4 py-2.5 rounded-xl text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all">Web Security</a>
                    </nav>
                </div>
            </aside>

            <div class="flex-1">
                <div class="mb-10">
                    <h1 class="text-4xl font-extrabold text-blue-600 dark:text-blue-500 mb-4">{{ $course->title }}</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed max-w-3xl">
                        {{ $course->description }}
                    </p>
                </div>

                <div class="border-t border-gray-200 dark:border-gray-800 pt-8">
                    <h2 class="text-2xl font-bold mb-6">Materi Pembelajaran</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group relative bg-white dark:bg-[#1a1d23] rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-800 hover:border-blue-500 dark:hover:border-blue-500 transition-all duration-300 shadow-sm hover:shadow-xl">
                            <div class="aspect-video overflow-hidden">
                                <img src="{{ asset('img/' . $course->image) }}" 
                                     alt="" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="p-5">
                                <a href="" class="text-xl font-bold mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                    judul course
                                </a>
                                <p class="text-gray-500 dark:text-gray-400 text-sm line-clamp-2 mb-4">
                                    deskripsi course
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection