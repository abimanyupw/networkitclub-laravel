@extends('layouts.dashboard-app')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Tambah Kategori Baru</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12a4.5 4.5 0 100-9 4.5 4.5 0 000 9z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20a8 8 0 0116 0z"/>
            </svg>
            <a href="/managecategory" class="hover:underline font-medium">Manajemen Kategori</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Tambah Kategori</span>
        </nav>
    </div>
        <form action="{{ route('managecategory.index') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden">
                        <div class="p-8 space-y-6">        
                            {{-- Pesan Error Umum --}}
                            @if ($errors->any())
                                <div class="p-4 bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 text-red-700 dark:text-red-400 text-sm rounded-r-lg mb-4">
                                    <div class="font-bold flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        Validasi Gagal
                                    </div>
                                    <p class="ml-6 opacity-80">Beberapa kolom perlu diperbaiki.</p>
                                </div>
                            @endif

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">     
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Cth: Linux Server"
                                           class="w-full px-4 py-2.5 rounded-xl border @error('name') border-red-500 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Slug</label>
                                <input type="text" id="slug" name="slug" value="{{ old('slug') }}" placeholder="linux-server" 
                                       class="w-full px-4 py-2.5 rounded-xl border @error('slug') border-red-500 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                @error('slug') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                <textarea name="description" placeholder="linux server adalah pengetahuan tentang pembangunan server dengan operating system linux" 
                                       class="w-full h-30 px-4 py-2.5 rounded-xl border @error('description') border-red-500 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">{{ old('description') }}</textarea>
                                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        {{-- Footer Form --}}
                        <div class="bg-gray-50 dark:bg-slate-800/50 px-8 py-4 flex items-center justify-start gap-3">
                            <a href="/managecategory" class="px-5 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 dark:hover:text-white transition">
                                Batal
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2.5 rounded-xl font-bold shadow-lg shadow-blue-500/30 transform transition active:scale-95">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <script>
            const nameInput = document.querySelector('#name');
            const slugInput = document.querySelector('#slug');

            nameInput.addEventListener('change', function () {
                fetch("{{ route('managecategory.checkSlug') }}?name=" + nameInput.value)
                    .then(response => response.json())
                    .then(data => {
                        slugInput.value = data.slug;
                    });
            });
        </script>


@endsection