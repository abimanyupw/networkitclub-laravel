<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index(Request $request)
    {
        $query = User::query();

        // SEARCH
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('username', 'like', "%{$request->search}%")
                ->orWhere('email', 'like', "%{$request->search}%")
                ->orWhere('name', 'like', "%{$request->search}%");
            });
        }

        // FILTER ROLE
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // DATA USER (sudah terfilter)
        $users = $query->latest()->paginate(10)->withQueryString();

        // 🔥 ROLE LIST (SELALU LENGKAP)
        $roles = User::select('role')->distinct()->pluck('role');

        return view('dashboard.user.index', compact('users', 'roles'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|min:3|max:20|unique:users,username',
            'email'    => 'required|email:dns|unique:users,email',
            'password' => 'required|min:8',
            'role'     => 'required|in:admin,teknisi,siswa,developer',
            'image'    => 'nullable|image|file|max:2048' // Maksimal 2MB
        ]);

        // Enkripsi password
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Logika Upload Foto jika ada
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('user-images', 'public');
        }

        User::create($validatedData);

        return redirect()->route('manageuser.index')->with('success', 'Pengguna baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
            public function show(string $id)
        {
            $user = User::findOrFail($id);
            return view('dashboard.user.show', compact('user'));
        }
    /**
     * Show the form for editing the specified resource.
     */
// ...

        public function edit(string $id)
        {
            $user = User::findOrFail($id);
            return view('dashboard.user.edit', compact('user'));
        }

        public function update(Request $request, string $id)
        {
            $user = User::findOrFail($id);
            $this->authorize('update', $user);

            $rules = [
                'name'     => 'required|string|max:255',
                'role'     => 'required|in:admin,teknisi,siswa,developer',
                'image'    => 'nullable|image|file|max:2048',
            ];

            // Validasi email: jika email berubah, cek keunikan. Jika tetap, abaikan cek unik untuk ID ini.
            if ($request->email != $user->email) {
                $rules['email'] = 'required|email:dns|unique:users,email';
            }

            // Validasi username: logika yang sama dengan email
            if ($request->username != $user->username) {
                $rules['username'] = 'required|string|min:3|max:20|unique:users,username';
            }

            // Validasi password: hanya wajib jika diisi (ingin ganti password)
            if ($request->filled('password')) {
                $rules['password'] = 'required|min:8';
            }

            $validatedData = $request->validate($rules);

            // Logika Password
            if ($request->filled('password')) {
                $validatedData['password'] = bcrypt($request->password);
            } else {
                // Jika kosong, hapus dari array agar tidak mengupdate password lama menjadi null
                unset($validatedData['password']);
            }

            // Logika Update Foto Profil
            if ($request->file('image')) {
                // Hapus foto lama jika ada di storage
                if ($user->image) {
                    Storage::delete($user->image);
                }
                // Simpan foto baru
                $validatedData['image'] = $request->file('image')->store('user-images', 'public');
            }

            $user->update($validatedData);

            return redirect()->route('manageuser.index')->with('success', 'Data pengguna berhasil diperbarui!');
        }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $this->authorize('delete', $user);

        if ($user->id === auth()->id()) {
            return back()->with('error', 'Anda tidak diperbolehkan menghapus akun sendiri!');
        }

        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        return redirect()->route('manageuser.index')
            ->with('success', 'Anggota berhasil dihapus secara permanen.');
    }

}