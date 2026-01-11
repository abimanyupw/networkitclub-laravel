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
                            <p class="text-blue-100 text-sm">Jl. Raya Trawas, Dusun Lb., Lebaksono, Kec. Pungging, Kabupaten Mojokerto, Jawa Timur 61384</p>
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
                        <a href="https://discord.com/invite/afZ6p7bQwx" class="p-2 bg-white/10 rounded-lg hover:bg-white hover:text-blue-600 transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d='M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128c.125-.094.249-.192.37-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.37.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z'/></svg></a>
                        <a href="https://www.instagram.com/nic.smkn1pungging/" class="p-2 bg-white/10 rounded-lg hover:bg-white hover:text-blue-600 transition-all"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.76 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                    </div>
                </div>
            </div>

            <div class="p-8 bg-gray-300 dark:bg-gray-800 rounded-[1.5rem] border border-gray-100 dark:border-gray-700">
                <h4 class="text-gray-900 dark:text-white font-bold mb-4">Jam Diskusi & Lab</h4>
                <ul class="text-sm text-gray-500 dark:text-gray-400 space-y-2">
                    <li class="flex justify-between"><span class="text-gray-900 dark:text-gray-200">Senin - Kamis</span> <span class="font-bold text-gray-900 dark:text-gray-200">15:00 - 17:00</span></li>
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