@extends('layouts.dashboard-app')

@section('content')
<div class="mx-auto">
    {{-- Header & Navigasi --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Edit Kelas</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="35">
                <path d="M128 96c0-35.3 28.7-64 64-64l352 0c35.3 0 64 28.7 64 64l0 240-96 0 0-16c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 16-129.1 0c10.9-18.8 17.1-40.7 17.1-64 0-70.7-57.3-128-128-128-5.4 0-10.8 .3-16 1l0-49zM333 448c-5.1-24.2-16.3-46.1-32.1-64L608 384c0 35.3-28.7 64-64 64l-211 0zM64 272a80 80 0 1 1 160 0 80 80 0 1 1 -160 0zM0 480c0-53 43-96 96-96l96 0c53 0 96 43 96 96 0 17.7-14.3 32-32 32L32 512c-17.7 0-32-14.3-32-32z"/>
            </svg>
            <a href="{{ route('managecourse.index') }}" class="hover:underline font-medium">Manajemen Kelas</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Edit Kelas</span>
        </nav>
    </div>

    {{-- Alert Pesan Error Global --}}
    @if ($errors->any())
    <div class="flex p-4 mb-6 text-sm text-red-800 border border-red-300 rounded-xl bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800 shadow-sm" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div>
            <span class="font-bold underline">Gagal Memperbarui Kelas!</span>
            <ul class="mt-1.5 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <div class="mb-4 text-black dark:text-white text-2xl font-semibold border-l-4 border-blue-600 pl-3">
        Edit Kelas
    </div>

    <form action="{{ route('managecourse.update', ['managecourse' => $course->slug]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Bagian Kiri: Preview Image --}}
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-xl border border-gray-100 dark:border-gray-800 text-center">
                    <div class="relative inline-block group">
                        <img id="preview" 
                             src="{{ $course->image ? asset('storage/' . $course->image) : 'https://ui-avatars.com/api/?name=' . urlencode($course->title) }}" 
                             class="w-70 h-40 rounded-2xl object-cover border-4 @error('image') border-red-500 @else border-blue-500/20 @enderror shadow-2xl transition-all">
                        
                        <label for="image" class="absolute bottom-2 right-2 bg-blue-600 p-2.5 rounded-full text-white cursor-pointer hover:bg-blue-700 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            </svg>
                        </label>
                        <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="previewImage(event)">
                    </div>
                    @error('image')
                        <p class="text-red-500 text-xs mt-3 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div> 

            {{-- Bagian Kanan: Form Inputs --}}
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl p-8 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Input Title --}}
                        <div>
                            <label class="block text-sm font-semibold mb-2 @error('title') text-red-600 @enderror">Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title', $course->title) }}" 
                                   class="w-full px-4 py-2.5 rounded-xl border @error('title') border-red-500 bg-red-50 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 focus:ring-2 focus:ring-blue-500 outline-none transition">
                            @error('title') <p class="text-red-500 text-xs mt-1.5 font-medium">{{ $message }}</p> @enderror
                        </div>

                        {{-- Input Slug --}}
                        <div>
                            <label class="block text-sm font-semibold mb-2">Slug</label>
                            <input type="text" id="slug" name="slug" value="{{ old('slug', $course->slug) }}" readonly 
                                   class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-200 dark:bg-slate-700 text-gray-500 cursor-not-allowed outline-none">
                            @error('slug') <p class="text-red-500 text-xs mt-1.5 font-medium">{{ $message }}</p> @enderror
                        </div> 

                        {{-- Input Description --}}
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm font-semibold mb-2 @error('description') text-red-600 @enderror">Description</label>
                            <textarea name="description" class="w-full h-32 px-4 py-2.5 rounded-xl border @error('description') border-red-500 bg-red-50 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 focus:ring-2 focus:ring-blue-500 outline-none transition">{{ old('description', $course->description) }}</textarea>
                            @error('description') <p class="text-red-500 text-xs mt-1.5 font-medium">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100 dark:border-gray-800">
                        <a href="{{ route('managecourse.index') }}" class="px-6 py-2.5 text-sm font-bold text-gray-500 hover:text-gray-700 transition">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2.5 rounded-xl font-bold shadow-lg shadow-blue-500/30 transform transition active:scale-95">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Script tetap sama --}}
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            document.getElementById('preview').src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    const titleInput = document.querySelector('#title');
    const slugInput = document.querySelector('#slug');

    titleInput.addEventListener('change', function () {
        fetch("{{ route('managecourse.checkSlug') }}?title=" + titleInput.value)
            .then(response => response.json())
            .then(data => {
                slugInput.value = data.slug;
            });
    });
</script>
@endsection