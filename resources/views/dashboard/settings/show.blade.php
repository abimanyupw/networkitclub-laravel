@extends('layouts.dashboard-app')

@section('content')

@php
    $user = auth()->user();
@endphp

<div class="mb-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">
        Profil Saya
    </h1>
    <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="512" height="512">
  <path d="M256 288c79.5 0 144-64.5 144-144S335.5 0 256 0 112 64.5 112 144s64.5 144 144 144zM193.6 351.8c-29.6-15.3-63.2-23.8-97.6-23.8-75.6 0-137 53-137 118.8v18.2c0 13.6 11 24.6 24.6 24.6h210.4c13.6 0 24.6-11 24.6-24.6v-18.2c0-28.8-11.2-56.2-31.4-78.2-14.8-16.2-32.8-29.8-52.6-40.8zM496 402.8V288c0-13.6-11-24.6-24.6-24.6h-48c-13.6 0-24.6 11-24.6 24.6v114.8c0 13.6 11 24.6 24.6 24.6h48c13.6 0 24.6-11 24.6-24.6zM496 202.8V88c0-13.6-11-24.6-24.6-24.6h-48c-13.6 0-24.6 11-24.6 24.6v114.8c0 13.6 11 24.6 24.6 24.6h48c13.6 0 24.6-11 24.6-24.6zM496 522.8V408c0-13.6-11-24.6-24.6-24.6h-48c-13.6 0-24.6 11-24.6 24.6v114.8c0 13.6 11 24.6 24.6 24.6h48c13.6 0 24.6-11 24.6-24.6zM384 402.8V288c0-13.6-11-24.6-24.6-24.6h-48c-13.6 0-24.6 11-24.6 24.6v114.8c0 13.6 11 24.6 24.6 24.6h48c13.6 0 24.6-11 24.6-24.6zM384 202.8V88c0-13.6-11-24.6-24.6-24.6h-48c-13.6 0-24.6 11-24.6 24.6v114.8c0 13.6 11 24.6 24.6 24.6h48c13.6 0 24.6-11 24.6-24.6zM384 522.8V408c0-13.6-11-24.6-24.6-24.6h-48c-13.6 0-24.6 11-24.6 24.6v114.8c0 13.6 11 24.6 24.6 24.6h48c13.6 0 24.6-11 24.6-24.6z"/>
</svg>
        <span class="font-medium">Pengaturan Akun</span>
        <span class="text-gray-400">/</span>
        <span class="text-gray-500 dark:text-gray-400 font-medium">Profil Saya</span>
    </nav>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    {{-- SIDEBAR PROFIL --}}
    <div class="lg:col-span-1">
        <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-xl border border-gray-100 dark:border-gray-800 text-center">
            <img
                src="{{ $user->image ? asset('storage/'.$user->image) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=0D8ABC&color=fff&size=200&bold=true' }}"
                class="w-40 h-40 mx-auto rounded-full object-cover border-4 border-blue-500/20 shadow-2xl">

            <div class="mt-4">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white">
                    {{ $user->name }}
                </h3>
                <p class="text-blue-600 dark:text-blue-400 font-medium text-sm">
                   {{ $user->username }}
                </p>
            </div>

            <div class="mt-6 pt-6 border-t border-gray-100 dark:border-gray-800">
                <span
                    class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest
                    bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">
                    {{ $user->role }}
                </span>
            </div>
        </div>
    </div>

    {{-- DETAIL AKUN --}}
    <div class="lg:col-span-2">
        <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden">
            <div class="p-8 space-y-6">

                <h4 class="text-lg font-bold text-gray-800 dark:text-white border-b border-gray-100 dark:border-gray-800 pb-4">
                    Informasi Akun
                </h4>

                <div class="grid grid-cols-1 gap-6">

                    {{-- Nama --}}
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-50 dark:bg-slate-800 p-3 rounded-xl text-blue-600 dark:text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-bold tracking-wider">
                                Nama Lengkap
                            </p>
                            <p class="text-gray-800 dark:text-gray-200 font-medium text-lg">
                                {{ $user->name }}
                            </p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-50 dark:bg-slate-800 p-3 rounded-xl text-blue-600 dark:text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-bold tracking-wider">
                                Email
                            </p>
                            <p class="text-gray-800 dark:text-gray-200 font-medium text-lg">
                                {{ $user->email }}
                            </p>
                        </div>
                    </div>

                    {{-- Tanggal Daftar --}}
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-50 dark:bg-slate-800 p-3 rounded-xl text-blue-600 dark:text-blue-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-bold tracking-wider">
                                Bergabung Sejak
                            </p>
                            <p class="text-gray-800 dark:text-gray-200 font-medium text-lg">
                                {{ $user->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>

                </div>

                <div class="pt-8 flex justify-end gap-3 border-t border-gray-100 dark:border-gray-800">
                    <a href="{{ route('settings.edit') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-bold shadow-lg shadow-blue-500/30 transition active:scale-95">
                        Edit Profil
                    </a>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
