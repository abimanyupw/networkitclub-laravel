@extends('layouts.app')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900 py-12">
    <div class="max-w-screen-md mx-auto px-4">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
            Syarat dan Ketentuan
        </h1>

        <p class="text-gray-600 dark:text-gray-400 mb-6">
            Dengan mengakses dan menggunakan layanan ini, Anda dianggap telah membaca, memahami,
            dan menyetujui seluruh Syarat dan Ketentuan yang berlaku.
        </p>

        <div class="space-y-6 text-gray-600 dark:text-gray-400">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                    1. Penggunaan Layanan
                </h2>
                <p>
                    Anda setuju untuk menggunakan layanan ini hanya untuk tujuan yang sah dan tidak melanggar
                    hukum atau peraturan yang berlaku.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                    2. Akun Pengguna
                </h2>
                <p>
                    Anda bertanggung jawab atas kerahasiaan akun dan kata sandi Anda serta seluruh aktivitas
                    yang terjadi dalam akun tersebut.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                    3. Hak Kekayaan Intelektual
                </h2>
                <p>
                    Seluruh konten yang terdapat dalam layanan ini dilindungi oleh hak cipta dan tidak boleh
                    digunakan tanpa izin tertulis dari kami.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                    4. Perubahan Layanan
                </h2>
                <p>
                    Kami berhak untuk mengubah, menghentikan, atau memperbarui layanan kapan saja tanpa
                    pemberitahuan terlebih dahulu.
                </p>
            </div>
        </div>

        <p class="mt-8 text-sm text-gray-500 dark:text-gray-500">
            Terakhir diperbarui: {{ date('d F Y') }}
        </p>
    </div>
</section>
@endsection
