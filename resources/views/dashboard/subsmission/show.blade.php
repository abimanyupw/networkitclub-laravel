@extends('layouts.dashboard-app')

@section('content')
<div class="mx-auto px-4 text-slate-900 dark:text-slate-100">

    {{-- Header & Meta --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Detail Tugas </h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
  <line x1="8" y1="7" x2="16" y2="7"/>
  <line x1="8" y1="11" x2="16" y2="11"/>
  <line x1="8" y1="15" x2="13" y2="15"/>
</svg>
            <a href="{{ route('managecategory.index') }}" class="hover:underline font-medium">Tugas </a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Detail Tugas </span>
        </nav>
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight">
                    {{ $assignment->title }}
                </h1>
                <div class="flex items-center mt-2 text-sm text-gray-500 dark:text-gray-400">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Tenggat: 
                    <span class="ml-1 font-semibold text-red-500">
                        {{ $assignment->deadline->timezone('Asia/Jakarta')->format('d M Y, H:i') }}
                    </span>
                </div>
            </div>
            
            @if($submission)
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                    <span class="w-2 h-2 mr-2 bg-green-500 rounded-full"></span>
                    Sudah Dikumpulkan
                </span>
            @else
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">
                    <span class="w-2 h-2 mr-2 bg-yellow-500 rounded-full"></span>
                    Belum Dikumpulkan
                </span>
            @endif
        </div>
    </div>

    {{-- Deskripsi --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 mb-8">
        <h2 class="text-lg font-bold mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Instruksi Tugas
        </h2>
        <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
            {!! nl2br(e($assignment->description)) !!}
        </div>
    </div>

    {{-- Feedback & Nilai (Jika Ada) --}}
    @if($submission && $submission->score !== null)
        @php
            if ($submission->score >= 70) {
                $colorClass = 'border-emerald-200 dark:border-emerald-900 bg-emerald-50/50 dark:bg-emerald-900/10';
                $headerClass = 'bg-emerald-200 dark:bg-emerald-800/50 text-emerald-800 dark:text-emerald-300';
                $textClass = 'text-emerald-700 dark:text-emerald-400';
            } elseif ($submission->score >= 40) {
                $colorClass = 'border-amber-200 dark:border-amber-900 bg-amber-50/50 dark:bg-amber-900/10';
                $headerClass = 'bg-amber-200 dark:bg-amber-800/50 text-amber-800 dark:text-amber-300';
                $textClass = 'text-amber-700 dark:text-amber-400';
            } else {
                $colorClass = 'border-rose-200 dark:border-rose-900 bg-rose-50/50 dark:bg-rose-900/10';
                $headerClass = 'bg-rose-200 dark:bg-rose-800/50 text-rose-800 dark:text-rose-300';
                $textClass = 'text-rose-700 dark:text-rose-400';
            }
        @endphp

        <div class="mb-8 overflow-hidden rounded-2xl border {{ $colorClass }}">
            <div class="flex items-center justify-between px-6 py-4 {{ $headerClass }}">
                <span class="font-bold uppercase tracking-wider text-xs">Hasil Penilaian</span>
                <div class="flex items-baseline gap-1">
                    <span class="text-3xl font-black">{{ $submission->score }}</span>
                    <span class="text-sm opacity-70">/ 100</span>
                </div>
            </div>
            
            @if($submission->feedback)
                <div class="p-6">
                    <p class="text-xs font-bold uppercase {{ $textClass }} mb-2 opacity-80">Feedback Pengajar:</p>
                    <p class="relative text-gray-700 dark:text-gray-300 italic leading-relaxed">
                        "{{ $submission->feedback }}"
                    </p>
                </div>
            @endif
        </div>
    @endif

    {{-- Periksa Deadline --}}
    @php
        $now = \Carbon\Carbon::now()->timezone('Asia/Jakarta');
    @endphp

    @if($assignment->deadline->timezone('Asia/Jakarta')->isPast() && !$submission)
        <div class="mb-8 p-4 bg-rose-50 dark:bg-rose-900/20 border-l-4 border-rose-500 text-rose-700 dark:text-rose-400 text-sm">
            <strong class="font-bold">Perhatian:</strong> Batas waktu pengumpulan tugas telah berakhir. Anda tidak dapat mengirimkan tugas setelah tenggat waktu.
        </div>
    @else
    {{-- Form Section --}}
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
        <div class="p-6 border-b border-gray-100 dark:border-gray-700">
            <h2 class="text-lg font-bold flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12V4m0 0l-4 4m4-4l4 4" />
                </svg>
                Area Pengumpulan
            </h2>
        </div>

        <div class="p-6">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 text-green-700 dark:text-green-400 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($submission)
                <div class="mb-8 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-dashed border-gray-300 dark:border-gray-600">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">File yang telah diunggah:</p>
                            <a href="{{ asset('storage/'.$submission->file) }}" target="_blank" class="mt-2 inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold transition">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 012-2h4.586A1 1 0 0111 2.414l4.586 4.586a1 1 0 01.293.707V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" />
                                </svg>
                                Lihat Dokumen Anda
                            </a>
                        </div>
                        @if($submission->note)
                            <div class="text-right max-w-xs text-xs text-gray-500">
                                <span class="block font-bold uppercase tracking-wider">Catatan Anda:</span>
                                {{ $submission->note }}
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <form action="{{ route('assignments.submit', $assignment->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                        Pilih File Tugas <span class="text-gray-400 font-normal">(PDF, ZIP, atau RAR)</span>
                    </label>
                    <input type="file" name="file" 
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-700 dark:file:text-gray-200 transition pointer-cursor">
                    @error('file')
                        <p class="mt-2 text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                        Tambahkan Catatan <span class="text-gray-400 font-normal">(Opsional)</span>
                    </label>
                    <textarea name="note" rows="3" placeholder="Tulis pesan untuk pengajar di sini..."
                        class="w-full border-gray-200 dark:border-gray-600 dark:bg-gray-700 rounded-xl focus:ring-blue-500 focus:border-blue-500 p-3 transition">{{ old('note', $submission->note ?? '') }}</textarea>
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit"
                        class="group relative inline-flex items-center justify-center px-8 py-3 font-semibold text-white transition-all duration-200 bg-blue-600 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600 shadow-lg shadow-blue-200 dark:shadow-none">
                        {{ $submission ? 'Perbarui Tugas' : 'Kirim Sekarang' }}
                        <svg class="w-5 h-5 ml-2 -mr-1 transition-all group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
</div>
@endsection
