@extends('layouts.dashboard-app')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Edit Kategori Materi</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12a4.5 4.5 0 100-9 4.5 4.5 0 000 9z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20a8 8 0 0116 0z"/>
                
            </svg>
            <a href="/manageuser" class="hover:underline font-medium">Manajemen Kategori Materi</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Edit Kategori Materi</span>
        </nav>
    </div>

    <div class="mx-auto">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden">
                        <div class="p-8 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Name</label>
                                    <input type="text" name="name" value="{{ old('name', $category->name) }}" 
                                           class="w-full px-4 py-2.5 rounded-xl border @error('name') border-red-500 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Slug</label>
                                    <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" 
                                           class="w-full px-4 py-2.5 rounded-xl border @error('slug') border-red-500 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                    @error('slug') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div> 
                                <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                <textarea name="description" placeholder="linux server adalah pengetahuan tentang pembangunan server dengan operating system linux" 
                                       class="w-full h-30 px-4 py-2.5 rounded-xl border @error('description') border-red-500 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">{{ old('description', $category->description) }}</textarea>
                                @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            </div>
                        {{-- Footer Form --}}
                        <div class="bg-gray-50 dark:bg-slate-800/50 px-8 py-4 flex items-center justify-end gap-3">
                            <a href="{{ route('managecategory.index') }}" class="px-5 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 dark:hover:text-white transition">
                                Batal
                            </a>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2.5 rounded-xl font-bold shadow-lg shadow-blue-500/30 transform transition active:scale-95">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection