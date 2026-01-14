<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Network IT Club</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-premium {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        @keyframes float {
            0%,100%{transform:translateY(0)}
            50%{transform:translateY(-20px)}
        }
        .animate-float{animation:float 6s ease-in-out infinite}
        body::-webkit-scrollbar{display:none}
        body{scrollbar-width:none}
    </style>
</head>

<body class="bg-[#020617] text-slate-200 min-h-screen flex items-center justify-center p-4 relative overflow-x-hidden">

{{-- BACKGROUND --}}
<div class="fixed inset-0 z-0 pointer-events-none">
    <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-blue-600/10 blur-[120px] rounded-full"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-purple-600/10 blur-[120px] rounded-full"></div>
</div>

<main class="relative z-10 w-full max-w-[520px]">
    <div class="glass-premium p-8 sm:p-10 rounded-[2.5rem] shadow-2xl">

        {{-- HEADER --}}
        <div class="text-center mb-5">
            <div class="inline-flex p-3.5 rounded-2xl bg-slate-950 border border-slate-800 mb-5 animate-float">
                <img src="{{ asset('img/logo.png') }}" class="w-12 h-12">
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white">Register</h2>
            <p class="text-slate-400 text-sm mt-1">Network IT Club</p>
        </div>

        {{-- FORM REGISTER --}}
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            {{-- NAME --}}
            <div>
                <label class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] ml-1">Name</label>
                <input type="text" name="name" required
                    class="w-full mt-2 px-4 py-4 rounded-2xl bg-slate-950/50 border border-slate-800 text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none"
                    placeholder="Full name">
            </div>

            {{-- USERNAME (OPTIONAL FIELD) --}}
            <div>
                <label class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] ml-1">Username</label>
                <input type="text" name="username"
                    class="w-full mt-2 px-4 py-4 rounded-2xl bg-slate-950/50 border border-slate-800 text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none"
                    placeholder="Username">
            </div>

            {{-- EMAIL --}}
            <div>
                <label class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] ml-1">Email</label>
                <input type="email" name="email" required
                    class="w-full mt-2 px-4 py-4 rounded-2xl bg-slate-950/50 border border-slate-800 text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none"
                    placeholder="Email">
            </div>

            {{-- PASSWORD --}}
            <div x-data="{ show:false }">
                <label class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] ml-1">Password</label>
                <div class="relative mt-2">
                    <input :type="show ? 'text' : 'password'" id="password" name="password" required
                            class="w-full pl-12 pr-12 py-4 rounded-2xl bg-slate-950/50 border border-slate-800 text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all placeholder:text-slate-700"
                            placeholder="••••••••">
                        
                        <button type="button" @click="show = !show" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 hover:text-white transition-colors">
                            <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path></svg>
                        </button>
                </div>
            </div>

            {{-- BUTTON --}}
            <button type="submit"
                class="col-span-2 w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-lg shadow-blue-500/20 uppercase tracking-widest text-sm">
                Create Account
            </button>

            {{-- LINK LOGIN --}}
            <p class="col-span-2 text-center text-sm text-slate-400">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
            </p>
        </form>

    </div>

    <p class="mt-8 text-center text-[10px] font-bold text-slate-600 uppercase tracking-[0.3em]">
        &copy; 2026 NIT CLUB • SECURITY VERIFIED
    </p>
</main>

</body>
</html>
