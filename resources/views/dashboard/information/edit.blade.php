@extends('layouts.dashboard-app')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<style>
    .note-editor { border-radius: 0.75rem !important; overflow: hidden; border: 1px solid #e2e8f0 !important; }
    .note-editable { min-height: 450px !important; background-color: white !important; font-size: 16px !important; }
    .dark .note-editable { background-color: #0f172a !important; color: #f1f5f9 !important; }
    .dark .note-toolbar { background-color: #1e293b !important; border-bottom: 1px solid #334155 !important; }
</style>

<div class="min-h-screen text-gray-900 dark:text-white pb-10">
    {{-- Header & Breadcrumb --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Edit Informasi</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <a href="{{ route('manageinformation.index') }}" class="hover:underline font-medium">Manajemen Informasi</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Edit Data</span>
        </nav>
    </div>

    <div class="mb-4 text-2xl font-semibold border-l-4 border-blue-600 pl-3">
        Edit: {{ $information->title }}
    </div>

    {{-- Gunakan parameter $information->slug sesuai Route Model Binding Anda --}}
    <form action="{{ route('manageinformation.update', $information->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Kolom Kiri: Konten Utama --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-8 space-y-6">
                    <div>
                        <label class="block text-sm font-semibold mb-2">Judul Informasi</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $information->title) }}" required
                               class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 bg-gray-50 dark:bg-slate-800 focus:ring-2 focus:ring-blue-500 transition outline-none dark:text-white">
                        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Slug (URL)</label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug', $information->slug) }}" readonly
                               class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 bg-gray-100 dark:bg-slate-700 text-gray-500 cursor-not-allowed outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Konten Lengkap</label>
                        <textarea name="content" id="summernote">{{ old('content', $information->content) }}</textarea>
                        @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Sidebar --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-6 space-y-6">
                    
                    {{-- Thumbnail Preview (Jika Tabel Informations Memiliki Kolom Thumbnail) --}}
                   

                    {{-- Tombol Aksi --}}
                    <div class="space-y-3">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-bold shadow-lg transition transform active:scale-95 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V4a1 1 0 10-2 0v7.586l-1.293-1.293z" />
                                <path d="M5 15a3 3 0 003 3h4a3 3 0 003-3v-1a1 1 0 10-2 0v1a1 1 0 01-1 1H8a1 1 0 01-1-1v-1a1 1 0 10-2 0v1z" />
                            </svg>
                            Update Informasi
                        </button>
                        
                        <a href="{{ route('manageinformation.index') }}" class="block text-center w-full py-3 border-2 border-gray-200 dark:border-gray-700 rounded-xl font-bold text-gray-500 hover:bg-gray-50 dark:hover:bg-slate-800 transition">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        // 1. Summernote
        $('#summernote').summernote({
            height: 500,
            placeholder: 'Tulis isi informasi di sini...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ],
            callbacks: {
                onImageUpload: function(files) { uploadImage(files[0]); }
            }
        });



        // 2. Auto Slug
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener('change', function() {
            fetch("{{ route('manageinformation.checkSlug') }}?title=" + encodeURIComponent(title.value))
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    });

</script>
@endsection