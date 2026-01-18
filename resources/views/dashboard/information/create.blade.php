@extends('layouts.dashboard-app')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<style>
    /* Styling Editor */
    .note-editor { border-radius: 0.75rem !important; overflow: hidden; border: 1px solid #e2e8f0 !important; }
    .note-editable { min-height: 450px !important; background-color: white !important; font-size: 16px !important; }
    
    /* Dark Mode Compatibility */
    .dark .note-editable { background-color: #0f172a !important; color: #f1f5f9 !important; }
    .dark .note-toolbar { background-color: #1e293b !important; border-bottom: 1px solid #334155 !important; }
    
    /* Animation */
    .animate-fade-in { animation: fadeIn 0.4s ease-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
</style>

<div class="min-h-screen text-gray-900 dark:text-white pb-10">
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Tambah Informasi Baru</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <a href="{{ route('manageinformation.index') }}" class="hover:underline font-medium">Manajemen Informasi</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Buat Baru</span>
        </nav>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 flex items-center gap-3 animate-fade-in">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error') || $errors->any())
        <div class="mb-6 p-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-500 flex items-start gap-3 animate-fade-in">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <div>
                <span class="text-sm font-bold block">Gagal menyimpan informasi:</span>
                <ul class="list-disc list-inside text-xs opacity-80 mt-1">
                    @if(session('error')) <li>{{ session('error') }}</li> @endif
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('manageinformation.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-8 space-y-6">
                    
                    <div>
                        <label class="block text-sm font-semibold mb-2">Judul Informasi</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Masukan judul..." required
                               class="w-full px-4 py-3 rounded-xl border transition outline-none @error('title') border-rose-500 bg-rose-50 dark:bg-rose-900/10 @else dark:border-gray-700 bg-gray-50 dark:bg-slate-800 focus:ring-2 focus:ring-blue-500 @enderror">
                        @error('title') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Slug (URL Otomatis)</label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug') }}" readonly
                               class="w-full px-4 py-3 rounded-xl border dark:border-gray-700 bg-gray-100 dark:bg-slate-700 text-gray-500 cursor-not-allowed outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">Isi Konten Informasi</label>
                        <textarea name="content" id="summernote">{{ old('content') }}</textarea>
                        @error('content') <p class="text-rose-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 p-6 space-y-6">
                        
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            <p class="font-semibold mb-2">Pengaturan Publikasi</p>
                            <ul class="space-y-2 text-xs">
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Otomatis Generate Slug
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Mendukung Gambar & Video
                                </li>
                            </ul>
                        </div>

                        <div class="space-y-3 pt-4 border-t border-gray-100 dark:border-gray-800">
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-xl font-bold shadow-lg transition transform active:scale-95 flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                                Simpan Informasi
                            </button>
                            <a href="{{ route('manageinformation.index') }}" class="block text-center w-full py-3 border-2 border-gray-200 dark:border-gray-700 rounded-xl font-bold text-gray-500 hover:bg-gray-100 dark:hover:bg-slate-800 transition">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        // 1. Initialize Summernote
        $('#summernote').summernote({
            height: 500,
            placeholder: 'Mulai mengetik informasi penting di sini...',
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

        // 2. AJAX Upload for Summernote Images (Optional but recommended)
        function uploadImage(file) {
            let data = new FormData();
            data.append("image", file);
            $.ajax({
                url: "{{ route('manageinformation.uploadImage') }}", // Pastikan route ini ada di web.php
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
                    alert("Gagal mengunggah gambar. Pastikan format dan ukuran file sesuai.");
                }
            });
        }

        // 3. Auto Generate Slug from Title
        const titleInput = document.querySelector('#title');
        const slugInput = document.querySelector('#slug');
        
        titleInput.addEventListener('change', function() {
            if(titleInput.value.trim() !== "") {
                fetch("{{ route('manageinformation.checkSlug') }}?title=" + encodeURIComponent(titleInput.value))
                    .then(response => response.json())
                    .then(data => slugInput.value = data.slug)
                    .catch(error => console.error('Error fetching slug:', error));
            }
        });
    });
</script>
@endsection