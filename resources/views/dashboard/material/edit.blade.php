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

<div class="min-h-screen text-gray-900 dark:text-white">
    {{-- ... bagian header, breadcrumb, dan form cari tetap sama ... --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Edit Materi</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <a href="{{ route('managematerial.index') }}" class="hover:underline font-medium">Manajemen Materi </a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Edit Materi </span>
        </nav>
    </div>

    <div class="mb-4 text-2xl font-semibold border-l-4 border-blue-600 pl-3">
        Edit Materi 
    </div>

    <form action="{{ route('managematerial.update', $material->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Kolom Kiri: Konten Utama --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-8 space-y-6">
                    <div>
                        <label class="block text-sm font-semibold mb-2">Judul Materi</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $material->title) }}" required
                               class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 bg-gray-50 dark:bg-slate-800 focus:ring-2 focus:ring-blue-500 transition outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Slug (URL)</label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug', $material->slug) }}" readonly
                               class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 bg-gray-100 dark:bg-slate-700 text-gray-500 cursor-not-allowed">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Isi Materi</label>
                        <textarea name="content" id="summernote">{{ old('content', $material->content) }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Sidebar --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-6 space-y-6">
                    
                    {{-- Thumbnail Preview --}}
                    <div>
                        <label class="block text-sm font-semibold mb-3">Thumbnail Cover</label>
                        <div class="relative group cursor-pointer">
                            <div id="preview-container" class="w-full h-48 rounded-xl border-2 border-solid border-blue-500 flex flex-col items-center justify-center overflow-hidden bg-gray-50 dark:bg-slate-800 transition-all">
                                {{-- Jika ada gambar lama, tampilkan --}}
                                @if($material->thumbnail)
                                    <img id="img-preview" src="{{ asset('storage/' . $material->thumbnail) }}" class="w-full h-full object-cover">
                                    <div id="placeholder-content" class="hidden text-center p-4">
                                        <p class="text-xs text-gray-500">Klik untuk ganti gambar</p>
                                    </div>
                                @else
                                    <div id="placeholder-content" class="text-center p-4">
                                        <p class="text-xs text-gray-500">Belum ada gambar</p>
                                    </div>
                                    <img id="img-preview" class="hidden w-full h-full object-cover">
                                @endif
                            </div>
                            <input type="file" name="thumbnail" id="thumbnail-input" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*" onchange="previewImage()">
                        </div>
                        <p class="text-xs text-gray-400 mt-2 italic">*Kosongkan jika tidak ingin mengubah thumbnail</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Pilih Kursus</label>
                        <select name="course_id" required class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 dark:bg-slate-800">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id', $material->course_id) == $course->id ? 'selected' : '' }}>
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Kategori</label>
                        <select name="category_id" required class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 dark:bg-slate-800">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $material->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Ringkasan</label>
                        <textarea name="description" rows="3" required class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 dark:bg-slate-800 outline-none">{{ old('description', $material->description) }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:blue-700 text-white py-4 rounded-xl font-bold shadow-lg transition transform active:scale-95">
                        Update Materi
                    </button>
                    <a href="{{ route('managematerial.index') }}" class="block text-center w-full py-2 border border-blue-600 rounded-md text-xl text-blue-600">Batal</a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        // 1. Summernote
        $('#summernote').summernote({
            height: 450,
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

        function uploadImage(file) {
            let data = new FormData();
            data.append("image", file);
            $.ajax({
                url: "{{ route('managematerial.uploadImage') }}",
                cache: false, contentType: false, processData: false,
                data: data, type: "POST",
                headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
                success: function(response) {
                    $('#summernote').summernote("insertImage", response.url);
                }
            });
        }

        // 2. Auto Slug
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        title.addEventListener('change', function() {
            fetch("{{ route('managematerial.checkSlug') }}?title=" + encodeURIComponent(title.value))
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    });

    // 3. Image Preview
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