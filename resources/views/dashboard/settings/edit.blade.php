@extends('layouts.dashboard-app')

@section('content')

@php
    $user = auth()->user();
@endphp

<div class="mb-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">
        Edit Profil Saya
    </h1>
    <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 12a4.5 4.5 0 100-9 4.5 4.5 0 000 9z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 20a8 8 0 0116 0z"/>
        </svg>
        <span class="font-medium">Pengaturan Akun</span>
        <span class="text-gray-400">/</span>
        <span class="text-gray-500 dark:text-gray-400 font-medium">Edit Profil</span>
    </nav>
</div>

<div class="mx-auto">
    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- FOTO PROFIL --}}
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-xl border border-gray-100 dark:border-gray-800 text-center">
                    <div class="relative inline-block group">
                        <img id="preview"
                            src="{{ $user->image ? asset('storage/'.$user->image) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=0D8ABC&color=fff&size=200&bold=true' }}"
                            class="w-40 h-40 rounded-full object-cover border-4 border-blue-500/20 shadow-2xl transition group-hover:scale-105">

                        <label for="image"
                            class="absolute bottom-2 right-2 bg-blue-600 p-2.5 rounded-full text-white cursor-pointer hover:bg-blue-700 shadow-lg transition active:scale-90">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </label>

                        <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="previewImage(event)">
                    </div>

                    <div class="mt-4">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white">{{ $user->name }}</h3>
                        <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">
                            {{ $user->role }}
                        </span>
                    </div>

                    <p class="text-xs text-gray-400 mt-4 italic">
                        Ketuk ikon kamera untuk mengganti foto profil
                    </p>
                </div>
            </div>

            {{-- FORM --}}
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800">
                    <div class="p-8 space-y-6">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-black dark:text-white text-sm font-semibold mb-2">Username</label>
                                <input type="text" name="username" value="{{ old('username', $user->username) }}"
                                    class="w-full px-4 py-2.5 rounded-xl border bg-gray-50 dark:bg-slate-800 dark:text-white">
                            </div>

                            <div>
                                <label class="block text-black dark:text-white text-sm font-semibold mb-2">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                    class="w-full px-4 py-2.5 rounded-xl border bg-gray-50 dark:bg-slate-800 dark:text-white">
                            </div>

                            <div>
                                <label class="block text-black dark:text-white text-sm font-semibold mb-2">Email</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                    class="w-full px-4 py-2.5 rounded-xl border bg-gray-50 dark:bg-slate-800 dark:text-white">
                            </div>
                            <div>
                                <label class="block text-black dark:text-white text-sm font-semibold mb-2">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                    class="w-full px-4 py-2.5 rounded-xl border bg-gray-50 dark:bg-slate-800 dark:text-white">
                            </div>
                        </div>
                        
                        <hr>

                        <div>
                            <label class="block text-black dark:text-white text-sm font-semibold mb-2">
                                Ganti Password (Opsional)
                            </label>
                            <input type="password" name="password"
                                placeholder="Kosongkan jika tidak ingin mengganti"
                                class="w-full px-4 py-2.5 rounded-xl border bg-gray-50 dark:bg-slate-800 dark:text-white">
                        </div>
                    </div>

                    <div class="bg-gray-50 dark:bg-slate-800/50 px-8 py-4 flex justify-end gap-3">
                        <a href="{{ route('settings.show') }}" class="px-5 py-2 text-sm font-bold text-gray-500">
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2.5 rounded-xl font-bold shadow-lg">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = e => document.getElementById('preview').src = e.target.result;
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection
