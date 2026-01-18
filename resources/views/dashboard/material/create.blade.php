@extends('layouts.dashboard-app')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<style>
    /* Styling Editor */
    .note-editor { border-radius: 0.75rem !important; overflow: hidden; border: 1px solid #e2e8f0 !important; }
    .note-editable { min-height: 400px !important; background-color: white !important; font-size: 16px !important; }
    
    /* Dark Mode Compatibility */
    .dark .note-editable { background-color: #0f172a !important; color: #f1f5f9 !important; }
    .dark .note-toolbar { background-color: #1e293b !important; border-bottom: 1px solid #334155 !important; }
    
    /* Thumbnail Preview Hover */
    #preview-container:hover img { transform: scale(1.05); }
    
    /* Custom Scrollbar for Summernote */
    .note-editable::-webkit-scrollbar { width: 8px; }
    .note-editable::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
</style>

<div class="min-h-screen text-gray-900 dark:text-white pb-20">
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Tambah Materi</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <a href="{{ route('managematerial.index') }}" class="hover:underline font-medium">Manajemen Materi</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Tambah Materi</span>
        </nav>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 flex items-center gap-3 animate-in fade-in slide-in-from-top-4 duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error') || $errors->any())
        <div class="mb-6 p-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-500 flex items-start gap-3 animate-in fade-in slide-in-from-top-4 duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <div>
                <span class="text-sm font-bold block">Gagal menyimpan materi:</span>
                <ul class="list-disc list-inside text-xs opacity-80 mt-1">
                    @if(session('error')) <li>{{ session('error') }}</li> @endif
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('managematerial.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-8 space-y-6">
                    
                    <div>
                        <label class="block text-sm font-semibold mb-2">Judul Materi</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Masukan judul materi..." required
                            class="w-full px-4 py-3 rounded-xl border transition outline-none @error('title') border-rose-500 bg-rose-50 dark:bg-rose-900/10 @else dark:border-gray-700 bg-gray-50 dark:bg-slate-800 focus:ring-2 focus:ring-blue-500 @enderror">
                        @error('title') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Slug (URL Otomatis)</label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug') }}" readonly
                            class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 bg-gray-100 dark:bg-slate-700 text-gray-500 cursor-not-allowed outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Isi Materi</label>
                        <textarea name="content" id="summernote">{{ old('content') }}</textarea>
                        @error('content') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-6 space-y-6">
                    
                    <div>
                        <label class="block text-sm font-semibold mb-3">Thumbnail Utama</label>
                        <div class="relative group cursor-pointer">
                            <div id="preview-container" class="w-full h-48 rounded-xl border-2 border-dashed @error('thumbnail') border-rose-500 bg-rose-50 @else border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-slate-800 @enderror flex flex-col items-center justify-center overflow-hidden transition-all">
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
                        @error('thumbnail') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Pilih Kursus</label>
                        <select name="course_id" required class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 dark:bg-slate-800 outline-none focus:ring-2 focus:ring-blue-500 transition">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Kategori</label>
                        <select name="category_id" required class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 dark:bg-slate-800 outline-none focus:ring-2 focus:ring-blue-500 transition">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Ringkasan Materi</label>
                        <textarea name="description" rows="3" required placeholder="Tuliskan deskripsi singkat..."
                            class="w-full px-4 py-3 rounded-xl border transition outline-none @error('description') border-rose-500 bg-rose-50 @else dark:border-gray-700 dark:bg-slate-800 focus:ring-2 focus:ring-blue-500 @enderror">{{ old('description') }}</textarea>
                        @error('description') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-4 space-y-3">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-bold shadow-lg shadow-blue-500/30 transition transform active:scale-95 flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                            Simpan Materi
                        </button>
                        <a href="{{ route('managematerial.index') }}" class="block text-center w-full py-3 border border-gray-300 dark:border-gray-700 rounded-xl font-semibold text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-800 transition">
                            Batal & Kembali
                        </a>
                    </div>
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
            placeholder: 'Tuliskan isi materi lengkap di sini...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
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
                error: function(err) {
                    alert("Gagal mengunggah gambar. Periksa koneksi atau ukuran file.");
                    console.error("Upload error:", err);
                }
            });
        }

        // 3. Auto Slug Generation
        const titleInput = document.querySelector('#title');
        const slugInput = document.querySelector('#slug');
        
        titleInput.addEventListener('change', function() {
            if(titleInput.value.trim() !== "") {
                fetch("{{ route('managematerial.checkSlug') }}?title=" + encodeURIComponent(titleInput.value))
                    .then(response => response.json())
                    .then(data => slugInput.value = data.slug)
                    .catch(err => console.error("Slug fetch error:", err));
            }
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