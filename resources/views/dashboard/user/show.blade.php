@extends('layouts.dashboard-app')

@section('content')

    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Detail Profil Anggota</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <a href="{{ route('manageuser.index') }}" class="hover:underline font-medium">Manajemen Pengguna</a>
        </nav>
    </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-xl border border-gray-100 dark:border-gray-800 text-center">
                    <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=0D8ABC&color=fff&size=200&bold=true' }}" 
                         class="w-40 h-40 mx-auto rounded-full object-cover border-4 border-blue-500/20 shadow-2xl">
                    
                    <div class="mt-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white">{{ $user->name }}</h3>
                        <p class="text-blue-600 dark:text-blue-400 font-medium text-sm">@ {{ $user->username }}</p>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100 dark:border-gray-800">
                        <span class="px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ $user->role }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden">
                    <div class="p-8 space-y-6">
                        <h4 class="text-lg font-bold text-gray-800 dark:text-white border-b border-gray-100 dark:border-gray-800 pb-4">Informasi Akun</h4>
                        
                        <div class="grid grid-cols-1 gap-6">
                            <div class="flex items-center gap-4">
                                <div class="bg-blue-50 dark:bg-slate-800 p-3 rounded-xl text-blue-600 dark:text-blue-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-bold tracking-wider">Nama Lengkap</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-medium text-lg">{{ $user->name }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <div class="bg-blue-50 dark:bg-slate-800 p-3 rounded-xl text-blue-600 dark:text-blue-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-bold tracking-wider">Email</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-medium text-lg">{{ $user->email }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <div class="bg-blue-50 dark:bg-slate-800 p-3 rounded-xl text-blue-600 dark:text-blue-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase font-bold tracking-wider">Terdaftar Sejak</p>
                                    <p class="text-gray-800 dark:text-gray-200 font-medium text-lg">{{ $user->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-8 flex justify-end gap-3 border-t border-gray-100 dark:border-gray-800">
                            <a href="{{ route('manageuser.index') }}" class="px-6 py-2.5 text-sm font-bold text-gray-500 hover:text-gray-700 dark:hover:text-white transition">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection