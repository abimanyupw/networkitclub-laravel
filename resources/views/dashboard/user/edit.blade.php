@extends('layouts.dashboard-app')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Edit Profil Anggota</h1>
        <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <a href="/manageuser" class="hover:underline font-medium">Manajemen Pengguna</a>
        </nav>
    </div>

    <div class="mx-auto">
        <form action="/manageuser/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-xl border border-gray-100 dark:border-gray-800 text-center">
                        <div class="relative inline-block group">
                            <img id="preview" 
                                 src="{{ $user->image ? asset('storage/' . $user->image) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=0D8ABC&color=fff&size=200&bold=true' }}" 
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
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white">{{ $user->name }}</h3>
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">
                                {{ $user->role }}
                            </span>
                        </div>
                        <p class="text-xs text-gray-400 mt-4 leading-relaxed italic">
                            Ketuk ikon kamera untuk mengubah foto profil.
                        </p>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-800 overflow-hidden">
                        <div class="p-8 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                {{-- Username --}}
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Username</label>
                                    <input type="text" name="username" value="{{ old('username', $user->username) }}" 
                                           class="w-full px-4 py-2.5 rounded-xl border @error('username') border-red-500 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                    @error('username') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                {{-- Nama Lengkap --}}
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                                           class="w-full px-4 py-2.5 rounded-xl border @error('name') border-red-500 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Email</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                                           class="w-full px-4 py-2.5 rounded-xl border @error('email') border-red-500 @else border-gray-200 dark:border-gray-700 @enderror bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                {{-- Role --}}
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Role</label>
                                    <select name="role" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                        <option value="teknisi" {{ old('role', $user->role) == 'teknisi' ? 'selected' : '' }}>Teknisi</option>
                                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="developer" {{ old('role', $user->role) == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="border-gray-100 dark:border-gray-800">

                            {{-- Password --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Ganti Password (Opsional)</label>
                                <input type="password" name="password" placeholder="Masukkan password baru jika ingin mengganti" 
                                       class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-slate-800 dark:text-white focus:ring-2 focus:ring-blue-500 transition outline-none">
                                <p class="text-[10px] text-amber-500 mt-2 font-medium">Biarkan kosong jika tidak ingin mengubah password lama.</p>
                            </div>
                        </div>

                        {{-- Footer Form --}}
                        <div class="bg-gray-50 dark:bg-slate-800/50 px-8 py-4 flex items-center justify-end gap-3">
                            <a href="/manageuser" class="px-5 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 dark:hover:text-white transition">
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