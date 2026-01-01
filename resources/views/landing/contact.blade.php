@extends('layouts.app')

@section('content')

{{-- HEADER CONTACT --}}
<section class="bg-white dark:bg-gray-900 pt-16 pb-12 transition-colors duration-300">
    <div class="mx-auto max-w-screen-xl px-4 text-center">
        <h1 class="text-4xl font-black tracking-tight text-gray-900 dark:text-white md:text-6xl">
            Hubungi <span class="text-blue-600 dark:text-blue-500">Kami</span>
        </h1>
        <p class="mt-4 text-lg text-gray-500 dark:text-gray-400 max-w-2xl mx-auto">
            Punya pertanyaan teknis atau ingin berkolaborasi? Kami siap membantu dan mendengar ide-ide hebatmu.
        </p>
    </div>
</section>

<section class="bg-white dark:bg-gray-900 pb-20 transition-colors duration-300">
    <div class="mx-auto max-w-screen-xl px-4 grid lg:grid-cols-3 gap-12">
        
        {{-- SISI KIRI: INFORMASI KONTAK --}}
        <div class="lg:col-span-1 space-y-8">
            <div class="p-8 bg-blue-600 dark:bg-blue-700 rounded-[1.5rem] text-white shadow-2xl shadow-blue-500/20">
                <h3 class="text-2xl font-bold mb-6">Informasi Kontak</h3>
                
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="p-3 bg-white/10 rounded-xl mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="font-bold">Lokasi Kami</p>
                            <p class="text-blue-100 text-sm">SMK Negeri 1 Pungging, Mojokerto, Jawa Timur.</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="p-3 bg-white/10 rounded-xl mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="font-bold">Email</p>
                            <p class="text-blue-100 text-sm">admin@nic-smkn1pungging.sch.id</p>
                        </div>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-white/20">
                    <p class="text-xs font-bold uppercase tracking-widest mb-4">Social Media</p>
                    <div class="flex space-x-4">
                        <a href="#" class="p-2 bg-white/10 rounded-lg hover:bg-white hover:text-blue-600 transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                        <a href="#" class="p-2 bg-white/10 rounded-lg hover:bg-white hover:text-blue-600 transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.76 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                    </div>
                </div>
            </div>

            <div class="p-8 bg-gray-300 dark:bg-gray-800 rounded-[1.5rem] border border-gray-100 dark:border-gray-700">
                <h4 class="text-gray-900 dark:text-white font-bold mb-4">Jam Diskusi & Lab</h4>
                <ul class="text-sm text-gray-500 dark:text-gray-400 space-y-2">
                    <li class="flex justify-between"><span class="text-gray-900 dark:text-gray-200">Senin - Kamis</span> <span class="font-bold text-gray-900 dark:text-gray-200">13:00 - 17:00</span></li>
                    <li class="flex justify-between"><span class="text-gray-900 dark:text-gray-200">Jumat</span> <span class="font-bold text-gray-900 dark:text-gray-200">13:00 - 15:00</span></li>
                    <li class="flex justify-between text-red-500 font-medium"><span class="text-gray-900 dark:text-gray-200">Sabtu - Minggu</span> <span>Tutup</span></li>
                </ul>
            </div>
        </div>

        {{-- SISI KANAN: FORM KONTAK --}}
        <div class="lg:col-span-2 bg-gray-300 dark:bg-gray-800 p-8 md:p-12 rounded-[1.5rem] shadow-sm border border-gray-100 dark:border-gray-700">
            <form action="#" class="space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Nama Lengkap</label>
                        <input type="text" id="name" class="w-full p-4 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 transition-all outline-none" placeholder="Masukkan namamu" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Email Aktif</label>
                        <input type="email" id="email" class="w-full p-4 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 transition-all outline-none" placeholder="name@email.com" required>
                    </div>
                </div>
                <div>
                    <label for="subject" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Perihal</label>
                    <input type="text" id="subject" class="w-full p-4 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 transition-all outline-none" placeholder="Misal: Tanya Pendaftaran" required>
                </div>
                <div>
                    <label for="message" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Pesan</label>
                    <textarea id="message" rows="6" class="w-full p-4 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 transition-all outline-none" placeholder="Tuliskan pesanmu di sini..."></textarea>
                </div>
                <button type="submit" class="w-full md:w-fit px-12 py-4 text-white font-black bg-blue-600 dark:bg-blue-500 rounded-2xl hover:bg-blue-700 dark:hover:bg-blue-600 hover:shadow-xl hover:shadow-blue-500/30 transform hover:-translate-y-1 transition-all">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</section>

@endsection