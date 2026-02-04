@extends('layouts.dashboard-app')

@section('content')
<div class="min-h-screen pb-10 text-slate-900 dark:text-slate-100">

    {{-- HEADER --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Edit Tugas</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                <line x1="8" y1="7" x2="16" y2="7"/>
                <line x1="8" y1="11" x2="16" y2="11"/>
                <line x1="8" y1="15" x2="13" y2="15"/>
            </svg>
            <a href="{{ route('manageassignment.index') }}" class="hover:underline font-medium">Manajemen Tugas</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Edit Tugas</span>
        </nav>
    </div>

    @if (session('success'))
        <div class="max-w-4xl mx-auto mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 flex items-center gap-3 animate-in fade-in slide-in-from-top-4 duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error') || $errors->any())
        <div class="max-w-4xl mx-auto mb-6 p-4 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-500 flex items-start gap-3 animate-in fade-in slide-in-from-top-4 duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <div>
                <span class="text-sm font-bold block">Gagal memperbarui tugas:</span>
                <ul class="list-disc list-inside text-xs opacity-80 mt-1">
                    @if(session('error')) <li>{{ session('error') }}</li> @endif
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl shadow-slate-200/50 dark:shadow-none border border-slate-100 dark:border-slate-800 overflow-hidden">
            
            {{-- Form Header Decor (Warna Amber untuk Edit) --}}
            <div class="h-2 bg-amber-500 w-full"></div>
            
            <div class="p-8">
                <div class="mb-8 flex flex-col md:flex-row items-center justify-between gap-4 text-center md:text-left">
                    <div>
                        <h2 class="text-xl font-bold flex items-center justify-center md:justify-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Modifikasi Tugas
                        </h2>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Perbarui rincian atau deadline tugas ini.</p>
                    </div>
                    <span class="px-4 py-1.5 bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 text-[10px] font-black uppercase rounded-full tracking-widest border border-amber-200 dark:border-amber-800">
                        Mode Edit
                    </span>
                </div>

                <form action="{{ route('manageassignment.update', $assignment->slug) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Judul --}}
                        <div class="md:col-span-2">
                            <label for="title" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Judul Tugas</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $assignment->title) }}" 
                                   class="w-full rounded-xl border transition outline-none px-4 py-3 @error('title') border-rose-500 bg-rose-50 dark:bg-rose-900/10 @else border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 @enderror" required>
                            @error('title') <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                        </div>

                        {{-- Slug (Readonly) --}}
                        <div class="md:col-span-1">
                            <label for="slug" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Slug Link</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.172 13.828a4 4 0 015.656 0l4-4a4 4 0 10-5.656-5.656l-1.102 1.101" />
                                    </svg>
                                </span>
                                <input type="text" name="slug" id="slug" value="{{ old('slug', $assignment->slug) }}" readonly
                                       class="w-full rounded-xl border-slate-200 dark:border-slate-700 bg-slate-100 dark:bg-slate-950 pl-10 pr-4 py-3 text-slate-500 dark:text-slate-400 italic outline-none cursor-not-allowed text-sm">
                            </div>
                        </div>

                        {{-- Deadline --}}
                        <div class="md:col-span-1">
                            <label for="deadline" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deadline Baru</label>
                            <input type="datetime-local" name="deadline" id="deadline" value="{{ old('deadline', date('Y-m-d\TH:i', strtotime($assignment->deadline))) }}" 
                                   class="w-full rounded-xl border transition outline-none px-4 py-3 @error('deadline') border-rose-500 bg-rose-50 @else border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 focus:ring-4 focus:ring-amber-500/10 focus:border-amber-500 @enderror" required>
                            @error('deadline') <p class="text-rose-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                   <textarea name="description" id="description" rows="6" 
                    placeholder="Tuliskan detail tugas, format pengumpulan, dan kriteria penilaian..."
                    class="w-full rounded-xl border transition outline-none px-4 py-3 
                    @error('description') 
                        border-rose-500 bg-rose-50 text-rose-900 placeholder-rose-300
                        dark:bg-rose-950/30 dark:text-rose-200 dark:placeholder-rose-700
                    @else 
                        border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 
                        text-slate-900 dark:text-slate-100 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 
                    @enderror" 
                    required>{{ old('description', $assignment->description) }}</textarea>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col md:flex-row justify-end gap-3 pt-6 border-t border-slate-100 dark:border-slate-800">
                        <a href="{{ route('manageassignment.index') }}" 
                           class="px-8 py-3 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 hover:bg-slate-200 transition font-bold text-center">
                            Batal
                        </a>
                        <button type="submit" 
                                class="px-8 py-3 rounded-xl bg-amber-500 text-white hover:bg-amber-600 transition font-bold shadow-lg shadow-amber-500/30 dark:shadow-none active:scale-95">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const titleInput = document.querySelector('#title');
        const slugInput = document.querySelector('#slug');

        titleInput.addEventListener('change', function () {
            if (titleInput.value.length === 0) {
                slugInput.value = '';
                return;
            }

            fetch("{{ route('manageassignment.checkSlug') }}?title=" + encodeURIComponent(titleInput.value))
                .then(response => response.json())
                .then(data => { slugInput.value = data.slug; })
                .catch(err => console.error('Error fetching slug:', err));
        });
    });
</script>
@endsection