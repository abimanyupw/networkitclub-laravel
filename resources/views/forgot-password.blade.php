<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full">
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                Lupa Password?
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Jangan khawatir, masukkan username kamu untuk mereset.
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white px-4 py-8 shadow sm:rounded-lg sm:px-10">
                
               @if(session('success'))
    <div class="mb-6 rounded-lg bg-green-50 p-4 border border-green-200">
        <div class="flex items-center">
            <svg class="h-5 w-5 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
        </div>
        
        @if(session('tempPassword'))
            <div class="mt-3">
                <p class="text-xs text-green-700 uppercase tracking-wider font-semibold">Password Sementara Anda:</p>
                <div class="mt-1 flex items-center justify-between bg-white border border-green-200 rounded px-3 py-2">
                    <code class="text-lg font-mono font-bold text-indigo-600 tracking-wider">
                        {{ session('tempPassword') }}
                    </code>
                    <span class="text-[10px] text-gray-400">Salin & Login</span>
                </div>
                <p class="mt-2 text-xs text-green-600 italic">*Segera ganti password Anda setelah berhasil masuk.</p>
            </div>
        @endif
    </div>
@endif

                @if(session('error'))
                    <div class="mb-4 rounded-md bg-red-50 p-4">
                        <div class="flex">
                            <div class="text-sm font-medium text-red-800">
                                {{ session('error') }}
                            </div>
                        </div>
                    </div>
                @endif

                <form class="space-y-6" action="{{ route('forgot.password.process') }}" method="POST">
                    @csrf
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <div class="mt-1">
                            <input id="username" name="username" type="text" required 
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                placeholder="Masukkan username anda">
                        </div>
                    </div>

                    <div>
                        <button type="submit" 
                            class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                            Kirim Link Reset
                        </button>
                    </div>
                </form>

                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="bg-white px-2 text-gray-500">Atau</span>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 text-sm">
                            Kembali ke halaman login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>