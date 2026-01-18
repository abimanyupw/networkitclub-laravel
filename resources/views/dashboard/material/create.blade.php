@extends('layouts.dashboard-app')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<style>
    /* Styling Editor */
    .note-editor {
        border-radius: 0.75rem !important;
        overflow: hidden;
        border: 1px solid #e2e8f0 !important;
    }
    .note-editable {
        min-height: 400px !important;
        background-color: white !important;
        font-size: 16px !important;
    }
    /* Dark Mode Compatibility */
    .dark .note-editable {
        background-color: #0f172a !important;
        color: #f1f5f9 !important;
    }
    .dark .note-toolbar {
        background-color: #1e293b !important;
        border-bottom: 1px solid #334155 !important;
    }
    /* Thumbnail Preview Hover */
    #preview-container:hover img {
        transform: scale(1.05);
    }
</style>

<div class="min-h-screen text-gray-900 dark:text-white">
    {{-- ... bagian header, breadcrumb, dan form cari tetap sama ... --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Tambah Materi</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <a href="{{ route('managematerial.index') }}" class="hover:underline font-medium">Manajemen Materi </a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Tambah Materi </span>
        </nav>
    </div>


    <form action="{{ route('managematerial.index') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Kolom Kiri: Konten Utama --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-8 space-y-6">
                    
                    {{-- Judul --}}
                    <div>
                        <label class="block text-sm font-semibold mb-2">Judul Materi</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Masukan judul materi..." required
                               class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 bg-gray-50 dark:bg-slate-800 focus:ring-2 focus:ring-blue-500 transition outline-none">
                        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Slug --}}
                    <div>
                        <label class="block text-sm font-semibold mb-2">Slug (URL Otomatis)</label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug') }}" readonly
                               class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 bg-gray-100 dark:bg-slate-700 text-gray-500 cursor-not-allowed outline-none">
                    </div>

                    {{-- Summernote Editor --}}
                    <div>
                        <label class="block text-sm font-semibold mb-2">Isi Materi</label>
                        <textarea name="content" id="summernote">{{ old('content') }}</textarea>
                        @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Sidebar --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-6 space-y-6">
                    
                    {{-- Thumbnail dengan Preview --}}
                    <div>
                        <label class="block text-sm font-semibold mb-3">Thumbnail Utama</label>
                        <div class="relative group cursor-pointer">
                            <div id="preview-container" class="w-full h-48 rounded-xl border-2 border-dashed border-gray-300 dark:border-gray-700 flex flex-col items-center justify-center overflow-hidden bg-gray-50 dark:bg-slate-800 transition-all">
                                <div id="placeholder-content" class="text-center p-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="mt-2 text-xs text-gray-500">Pilih gambar cover</p>
                                </div>
                                <img id="img-preview" class="hidden w-full h-full object-cover transition-transform duration-300">
                            </div>
                            <input type="file" name="thumbnail" id="thumbnail-input" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*" onchange="previewImage()">
                        </div>
                        @error('thumbnail') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Metadata --}}
                    <div>
                        <label class="block text-sm font-semibold mb-2">Pilih Kursus</label>
                        <select name="course_id" required class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 dark:bg-slate-800">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Kategori</label>
                        <select name="category_id" required class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 dark:bg-slate-800">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Ringkasan</label>
                        <textarea name="description" rows="3" required class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 dark:bg-slate-800 outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-bold shadow-lg transition transform active:scale-95">
                        Simpan Materi
                    </button>
                    <a href="{{ route('managematerial.index') }}" class="block text-center w-full py-2 border border-blue-600 rounded-md text-xl text-blue-600">Batal</a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        // 1. Summernote Initialization
        $('#summernote').summernote({
            height: 450,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ],
            callbacks: {
                onImageUpload: function(files) {
                    uploadImage(files[0]);
                }
            }
        });

        // 2. AJAX Upload for Summernote Images
        function uploadImage(file) {
            let data = new FormData();
            data.append("image", file);
            $.ajax({
                url: "{{ route('managematerial.uploadImage') }}",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                success: function(response) {
                    $('#summernote').summernote("insertImage", response.url);
                },
                error: function(data) {
                    console.log("Upload error:", data);
                }
            });
        }

        // 3. Auto Slug
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener('change', function() {
            fetch("{{ route('managematerial.checkSlug') }}?title=" + encodeURIComponent(title.value))
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    });

    // 4. Thumbnail Preview Function
    function previewImage() {
        const input = document.querySelector('#thumbnail-input');
        const preview = document.querySelector('#img-preview');
        const placeholder = document.querySelector('#placeholder-content');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection