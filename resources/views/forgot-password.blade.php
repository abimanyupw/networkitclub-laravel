<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | Network IT Club</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}" />
    
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
        
        body::-webkit-scrollbar { display: none; }
        body { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#020617] text-slate-200 min-h-screen relative flex items-center justify-center overflow-x-hidden p-4">

    {{-- Background Glow --}}
    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[300px] md:w-[600px] h-[300px] md:h-[600px] bg-blue-600/10 blur-[100px] rounded-full"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[300px] md:w-[600px] h-[300px] md:h-[600px] bg-purple-600/10 blur-[100px] rounded-full"></div>
        <div class="absolute inset-0 opacity-[0.15]" style="background-image: radial-gradient(#1e293b 1px, transparent 1px); background-size: 32px 32px;"></div>
    </div>

    {{-- Main Container --}}
    <main class="relative z-10 w-full max-w-[420px] animate-in fade-in zoom-in duration-700">
        <div class="glass-premium p-8 sm:p-10 rounded-[2.5rem] shadow-2xl border border-slate-800/50">
            
            <div class="text-center mb-8">
                <div class="inline-flex p-3.5 rounded-2xl bg-slate-950 border border-slate-800 mb-5 shadow-inner animate-float">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-12 h-12 object-contain" onerror="this.src='https://cdn-icons-png.flaticon.com/512/606/606203.png'">
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">Lupa Password?</h2>
                <p class="text-slate-500 text-[10px] font-bold uppercase tracking-[0.2em] mt-2">Recovery your account access</p>
            </div>

            {{-- Alert Sukses & Password Sementara --}}
            @if(session('success'))
                <div class="mb-6 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 animate-in slide-in-from-top-2 duration-300">
                    <div class="flex items-center justify-center mb-2">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-[11px] font-bold uppercase tracking-widest text-center">Success Request</span>
                    </div>
                    <p class="text-[10px] font-medium opacity-90 text-center mb-4">{{ session('success') }}</p>

                    @if(session('tempPassword'))
                        <div class="p-4 bg-slate-950/80 rounded-2xl border border-emerald-500/30 flex flex-col items-center justify-center shadow-inner">
                            <p class="text-[9px] text-slate-500 uppercase font-bold tracking-widest mb-3">Temporary Password:</p>
                            
                            <code id="tempPass" class="text-2xl font-mono font-black text-blue-500 tracking-[0.2em] mb-4 select-all">
                                {{ session('tempPassword') }}
                            </code>
                            
                            <button type="button" onclick="copyToClipboard()" id="copyBtn"
                                    class="w-full text-[10px] bg-blue-600/20 text-blue-400 py-2 rounded-xl hover:bg-blue-600 hover:text-white transition-all uppercase font-bold border border-blue-600/30">
                                Copy Password
                            </button>
                        </div>
                        <p class="text-center mt-3 text-[9px] text-emerald-500/60 italic">*Please change it after login.</p>
                    @endif
                </div>
            @endif

            {{-- Alert Error --}}
            @if(session('error'))
                <div class="mb-6 p-4 rounded-2xl bg-rose-500/10 border border-rose-500/20 text-rose-500 animate-in slide-in-from-top-2 duration-300 text-center">
                    <div class="flex items-center justify-center mb-1">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-[11px] font-bold uppercase tracking-widest">Error Found</span>
                    </div>
                    <p class="text-[10px] font-medium opacity-80">{{ session('error') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('forgot.password.process') }}" class="space-y-4">
                @csrf
                
                {{-- Input Username --}}
                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] ml-1">Username</label>
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </span>
                        <input type="text" name="username" required value="{{ old('username') }}"
                            class="w-full pl-12 pr-4 py-4 rounded-2xl bg-slate-950/50 border border-slate-800 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 text-white outline-none transition-all placeholder:text-slate-700 text-sm"
                            placeholder="Enter your username">
                    </div>
                </div>

                {{-- Input Email --}}
                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] ml-1">Email Terdaftar</label>
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </span>
                        <input type="email" name="email" required value="{{ old('email') }}"
                            class="w-full pl-12 pr-4 py-4 rounded-2xl bg-slate-950/50 border border-slate-800 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 text-white outline-none transition-all placeholder:text-slate-700 text-sm"
                            placeholder="email@example.com">
                    </div>
                </div>

                {{-- Input Phone --}}
                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-[0.2em] ml-1">Nomor Telepon</label>
                    <div class="relative group">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-blue-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </span>
                        <input type="text" name="phone" required value="{{ old('phone') }}"
                            class="w-full pl-12 pr-4 py-4 rounded-2xl bg-slate-950/50 border border-slate-800 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 text-white outline-none transition-all placeholder:text-slate-700 text-sm"
                            placeholder="0812xxxxxxxx">
                    </div>
                </div>
                
                <button type="submit" class="w-full mt-4 py-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl transition-all shadow-lg shadow-blue-500/20 active:scale-[0.98] uppercase tracking-widest text-sm">
                    Generate Recovery
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-800/50 text-center">
                <a href="{{ route('login') }}" class="inline-flex items-center text-xs font-bold text-slate-500 hover:text-blue-500 transition-colors uppercase tracking-widest">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Secure Login
                </a>
            </div>
        </div>
        
        <p class="mt-8 text-center text-[10px] font-bold text-slate-600 uppercase tracking-[0.3em]">
            &copy; 2026 NIT CLUB &bull; SECURITY VERIFIED
        </p>
    </main>

    {{-- Script JavaScript untuk Copy Ke Clipboard --}}
    <script>
        function copyToClipboard() {
            const passwordText = document.getElementById('tempPass').innerText;
            const btn = document.getElementById('copyBtn');

            navigator.clipboard.writeText(passwordText).then(() => {
                const originalText = btn.innerText;
                btn.innerText = 'Copied! ✓';
                btn.classList.replace('text-blue-400', 'text-emerald-400');
                btn.classList.replace('bg-blue-600/20', 'bg-emerald-600/20');
                btn.classList.add('border-emerald-500/50');

                setTimeout(() => {
                    btn.innerText = originalText;
                    btn.classList.replace('text-emerald-400', 'text-blue-400');
                    btn.classList.replace('bg-emerald-600/20', 'bg-blue-600/20');
                    btn.classList.remove('border-emerald-500/50');
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy: ', err);
            });
        }
    </script>
</body>
</html>