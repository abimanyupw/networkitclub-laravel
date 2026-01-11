<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Network IT Club</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-premium {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        
        /* Hide scrollbar */
        body::-webkit-scrollbar { display: none; }
        body { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#020617] text-slate-200 min-h-screen relative flex items-center justify-center overflow-x-hidden p-4">

    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[300px] md:w-[600px] h-[300px] md:h-[600px] bg-blue-600/10 blur-[100px] rounded-full"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[300px] md:w-[600px] h-[300px] md:h-[600px] bg-purple-600/10 blur-[100px] rounded-full"></div>
        <div class="absolute inset-0 opacity-[0.15]" style="background-image: radial-gradient(#1e293b 1px, transparent 1px); background-size: 32px 32px;"></div>
    </div>

    <main class="relative z-10 w-full max-w-[420px] animate-in fade-in zoom-in duration-700">
        <div class="glass-premium p-8 sm:p-10 rounded-[2.5rem] shadow-2xl">
            
            <div class="text-center mb-8">
                <div class="inline-flex p-3.5 rounded-2xl bg-slate-950 border border-slate-800 mb-5 shadow-inner animate-float">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-12 h-12 object-contain" onerror="this.src='https://cdn-icons-png.flaticon.com/512/606/606203.png'">
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Network IT Club</h2>
                
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                
                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] ml-1">Identity</label>
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </span>
                        <input type="text" name="username" required
                            class="w-full pl-12 pr-4 py-4 rounded-2xl bg-slate-950/50 border border-slate-800 text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all placeholder:text-slate-700"
                            placeholder="Username">
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between items-center px-1">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em]">Access Key</label>
                    </div>
                    <div class="relative group" x-data="{ show: false }">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </span>
                        
                        <input :type="show ? 'text' : 'password'" id="password" name="password" required
                            class="w-full pl-12 pr-12 py-4 rounded-2xl bg-slate-950/50 border border-slate-800 text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all placeholder:text-slate-700"
                            placeholder="••••••••">
                        
                        <button type="button" @click="show = !show" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 hover:text-white transition-colors">
                            <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path></svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center justify-between px-1 py-1">
                    <label class="inline-flex items-center group cursor-pointer">
                        <div class="relative">
                            <input type="checkbox" name="remember" class="sr-only peer">
                            <div class="w-5 h-5 border-2 border-slate-700 rounded-md bg-slate-950/50 peer-checked:bg-blue-600 peer-checked:border-blue-600 transition-all duration-200 shadow-inner"></div>
                            <svg class="absolute top-1 left-1 w-3 h-3 text-white opacity-0 peer-checked:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="ml-3 text-[11px] font-bold text-slate-500 group-hover:text-slate-300 uppercase tracking-widest transition-colors">Keep Session</span>
                    </label>
                    
                    <a href="#" class="text-[10px] font-extrabold text-blue-500/80 hover:text-blue-400 uppercase tracking-tighter transition-colors">Key Recovery</a>
                </div>
                  @if ($errors->any())
                        <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-700 dark:border-red-800 dark:bg-red-900/30 dark:text-red-300">
                            {{ $errors->first() }}
                        </div>
                    @endif

                <button type="submit" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl transition-all shadow-lg shadow-blue-500/20 active:scale-[0.98] uppercase tracking-widest text-sm">
                    Authorize
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-800/50 text-center">
                <a href="#" class="text-xs font-bold text-blue-500 hover:text-blue-400 transition-colors uppercase tracking-widest">Request Access Account</a>
            </div>
          

        </div>
        
        <p class="mt-8 text-center text-[10px] font-bold text-slate-600 uppercase tracking-[0.3em]">
            &copy; 2026 NIT CLUB &bull; SECURITY VERIFIED
        </p>
    </main>

    <script>
        const setupPasswordToggle = () => {
            const btn = document.querySelector('button[type="button"]');
            const input = document.querySelector('#password');
            const icons = btn.querySelectorAll('svg');

            btn.addEventListener('click', () => {
                const isPass = input.type === 'password';
                input.type = isPass ? 'text' : 'password';
                icons[0].style.display = isPass ? 'none' : 'block';
                icons[1].style.display = isPass ? 'block' : 'none';
            });
        };
        document.addEventListener('DOMContentLoaded', setupPasswordToggle);
    </script>
</body>
</html>