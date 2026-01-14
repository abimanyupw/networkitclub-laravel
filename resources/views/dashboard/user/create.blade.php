@extends('layouts.dashboard-app')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Tambah Anggota Baru</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12a4.5 4.5 0 100-9 4.5 4.5 0 000 9z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20a8 8 0 0116 0z"/>
            </svg>
            <a href="/manageuser" class="hover:underline font-medium">Manajemen Anggota</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-500 dark:text-gray-400 font-medium">Tambah Anggota</span>
        </nav>
    </div>
        <form action="/manageuser" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-xl border border-gray-100 dark:border-gray-800 text-center">
                        <div class="relative inline-block group">
                            <img id="preview" 
                                 src="https://ui-avatars.com/api/?name=New+Member&background=0D8ABC&color=fff&size=200&bold=true" 
                                 class="w-40 h-40 rounded-full object-cover border-4 border-blue-500/20 shadow-2xl transition-transform duration-300 group-hover:scale-105">
                            
                            <label for="image" class="absolute bottom-2 right-2 bg-blue-600 p-2.5 rounded-full text-white cursor-pointer hover:bg-blue-700 shadow-lg transform transition active:scale-90">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </label>
                            <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="previewImage(event)">
                        </div>
                        
                        <div class="mt-4">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white">Pilih Foto Profil</h3>
                        </div>
                        <p class="text-xs text-gray-400 mt-4 leading-relaxed italic">
                            Ketuk ikon kamera untuk mengunggah foto profil baru.
                        </p>
                        @error('image')
                            <p class="text-red-500 text-[10px] mt-2 font-bold uppercase tracking-tight">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

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
                                {{-- Username --}}
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Username</label>
                                    <input type="text" name="username" value="{{ old('username') }}" placeholder="Cth: abimanyu"
                                           class="w-full px-4 py-2.5 rounded-xl border @error('username') border-red-500 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                    @error('username') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                {{-- Nama Lengkap --}}
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Cth: Abimanyu Wisnu"
                                           class="w-full px-4 py-2.5 rounded-xl border @error('name') border-red-500 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="contoh@gmail.com"
                                           class="w-full px-4 py-2.5 rounded-xl border @error('email') border-red-500 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                {{-- Role --}}
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Role</label>
                                    <select name="role" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                        <option value="" disabled selected>Pilih Role</option>
                                        <option value="teknisi" {{ old('role') == 'teknisi' ? 'selected' : '' }}>Teknisi</option>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                    </select>
                                    @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <hr class="border-gray-100 dark:border-gray-800">

                            {{-- Password --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Password Akun</label>
                                <input type="password" name="password" placeholder="Masukkan minimal 8 karakter" 
                                       class="w-full px-4 py-2.5 rounded-xl border @error('password') border-red-500 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                <p class="text-[10px] text-gray-500 mt-2 font-medium italic">*Password akan dienkripsi secara otomatis oleh sistem.</p>
                            </div>
                        </div>

                        {{-- Footer Form --}}
                        <div class="bg-gray-50 dark:bg-slate-800/50 px-8 py-4 flex items-center justify-end gap-3">
                            <a href="/manageuser" class="px-5 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 dark:hover:text-white transition">
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
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection