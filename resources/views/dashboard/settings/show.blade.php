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
        <svg xmlns="http://www.w3.org/2000/svg"
     viewBox="0 0 24 24"
     fill="none"
     stroke="currentColor"
     stroke-width="2"
     stroke-linecap="round"
     stroke-linejoin="round"
     class="w-4 h-4">
  <circle cx="12" cy="12" r="3"/>
  <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06A1.65 1.65 0 0 0 15 19.4
           a1.65 1.65 0 0 0-1 .6 1.65 1.65 0 0 0-.33 1.82V22
           a2 2 0 1 1-4 0v-.1
           a1.65 1.65 0 0 0-.33-1.82
           a1.65 1.65 0 0 0-1-.6
           a1.65 1.65 0 0 0-1.82.33l-.06.06
           a2 2 0 1 1-2.83-2.83l.06-.06
           a1.65 1.65 0 0 0 .33-1.82
           a1.65 1.65 0 0 0-.6-1
           a1.65 1.65 0 0 0-1.82-.33H2
           a2 2 0 1 1 0-4h.1
           a1.65 1.65 0 0 0 1.82-.33
           a1.65 1.65 0 0 0 .6-1
           a1.65 1.65 0 0 0-.33-1.82l-.06-.06
           a2 2 0 1 1 2.83-2.83l.06.06
           a1.65 1.65 0 0 0 1.82.33
           a1.65 1.65 0 0 0 1-.6
           a1.65 1.65 0 0 0 .33-1.82V2
           a2 2 0 1 1 4 0v.1
           a1.65 1.65 0 0 0 .33 1.82
           a1.65 1.65 0 0 0 1 .6
           a1.65 1.65 0 0 0 1.82-.33l.06-.06
           a2 2 0 1 1 2.83 2.83l-.06.06
           a1.65 1.65 0 0 0-.33 1.82
           a1.65 1.65 0 0 0 .6 1
           a1.65 1.65 0 0 0 1.82.33H22
           a2 2 0 1 1 0 4h-.1
           a1.65 1.65 0 0 0-1.82.33
           a1.65 1.65 0 0 0-.6 1z"/>
</svg>

        <span class="font-medium">Pengaturan Akun</span>
        <span class="text-gray-400">/</span>
        <span class="text-gray-500 dark:text-gray-400 font-medium">Profil Saya</span>
    </nav>
</div>
          {{-- Alert Success --}}
            @if (session('success'))
                <div id="alert-success" class="flex items-center p-4 mb-4 text-emerald-800 rounded-lg bg-emerald-50 dark:bg-slate-800 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800 shadow-sm transition-all duration-300" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="ml-3 text-sm font-bold tracking-wide">
                        {{ session('success') }}
                    </div>
                    <button type="button" onclick="document.getElementById('alert-success').remove()" class="ml-auto -mx-1.5 -my-1.5 bg-emerald-50 text-emerald-500 rounded-lg focus:ring-2 focus:ring-emerald-400 p-1.5 hover:bg-emerald-200 inline-flex items-center justify-center h-8 w-8 dark:bg-slate-800 dark:text-emerald-400 dark:hover:bg-slate-700">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            @endif

            {{-- Alert Error (Opsional) --}}
            @if (session('error'))
                <div id="alert-error" class="flex items-center p-4 mb-4 text-rose-800 rounded-lg bg-rose-50 dark:bg-slate-800 dark:text-rose-400 border border-rose-200 dark:border-rose-800 shadow-sm" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="ml-3 text-sm font-bold tracking-wide">
                        {{ session('error') }}
                    </div>
                    <button type="button" onclick="document.getElementById('alert-error').remove()" class="ml-auto -mx-1.5 -my-1.5 bg-rose-50 text-rose-500 rounded-lg focus:ring-2 focus:ring-rose-400 p-1.5 hover:bg-rose-200 inline-flex items-center justify-center h-8 w-8 dark:bg-slate-800 dark:text-rose-400 dark:hover:bg-slate-700">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
            @endif
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
