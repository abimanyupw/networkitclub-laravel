@extends('layouts.app')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900 py-12">
    <div class="max-w-screen-md mx-auto px-4">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
            Kebijakan Privasi
        </h1>

        <p class="text-gray-600 dark:text-gray-400 mb-6">
            Privasi Anda sangat penting bagi kami. Dokumen Kebijakan Privasi ini menjelaskan jenis informasi
            yang dikumpulkan dan dicatat oleh kami serta bagaimana kami menggunakannya.
        </p>

        <div class="space-y-6 text-gray-600 dark:text-gray-400">
            <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                    1. Informasi yang Kami Kumpulkan
                </h2>
                <p>
                    Kami dapat mengumpulkan informasi pribadi seperti nama, alamat email, dan informasi lain
                    yang Anda berikan saat mendaftar atau menggunakan layanan kami.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                    2. Penggunaan Informasi
                </h2>
                <p>
                    Informasi yang kami kumpulkan digunakan untuk mengoperasikan, memelihara, dan meningkatkan
                    layanan kami, serta untuk berkomunikasi dengan pengguna.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                    3. Keamanan Data
                </h2>
                <p>
                    Kami berupaya melindungi informasi Anda dengan menerapkan langkah-langkah keamanan yang
                    sesuai untuk mencegah akses, pengungkapan, atau perubahan data tanpa izin.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                    4. Perubahan Kebijakan
                </h2>
                <p>
                    Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu. Setiap perubahan akan
                    dipublikasikan di halaman ini.
                </p>
            </div>
        </div>

        <p class="mt-8 text-sm text-gray-500 dark:text-gray-500">
            Terakhir diperbarui: {{ date('d F Y') }}
        </p>
    </div>
</section>
@endsection
