@extends('layouts.dashboard-app')
@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white italic">Dashboard</h1>
    <nav class="mt-2 flex items-center gap-2 text-sm text-blue-600 dark:text-blue-400">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
        </svg>
        <a href="{{ route('dashboard') }}" class="hover:underline font-medium">Dashboard</a>
        <span class="text-gray-400">/</span>
        <span class="text-gray-500 dark:text-gray-400 font-medium">Dashboard</span>
    </nav>
</div>

<div class="mb-5 flex items-center justify-between">
    <div class="my-4 text-2xl font-semibold border-l-4 border-blue-600 pl-3">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">Dashboard</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400">Network IT Club.</p>
    </div>
    <div class="text-xs font-medium text-blue-600 bg-blue-50 dark:bg-blue-900/20 px-3 py-1 rounded-full border border-blue-100 dark:border-blue-800">
        Update: {{ now()->format('d M Y') }}
    </div>
</div>

<div class="grid grid-cols-1 gap-3 mb-6 lg:grid-cols-4 mx-auto">
    @can('manageuser')
    <div class="p-4 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-sm hover:shadow-md transition-shadow group">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-gray-500 dark:text-gray-400 text-[10px] font-bold uppercase tracking-wider">Anggota</h3>
            <div class="p-1.5 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-lg group-hover:scale-110 transition-transform">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
        </div>
        <p class="text-xl font-black text-gray-900 dark:text-white">{{ number_format($totalAnggota) }}</p>
        <span class="text-[10px] text-green-500 font-medium">Total Anggota</span>
    </div>     
    @endcan

    <div class="p-4 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-sm hover:shadow-md transition-shadow group">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-gray-500 dark:text-gray-400 text-[10px] font-bold uppercase tracking-wider">Materi</h3>
            <div class="p-1.5 bg-purple-50 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 rounded-lg group-hover:scale-110 transition-transform">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
        </div>
        <p class="text-xl font-black text-gray-900 dark:text-white">{{ $totalMateri }}</p>
        <span class="text-[10px] text-gray-400 font-medium">Total modul</span>
    </div>

    <div class="p-4 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-sm hover:shadow-md transition-shadow group">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-gray-500 dark:text-gray-400 text-[10px] font-bold uppercase tracking-wider">Kelas</h3>
            <div class="p-1.5 bg-green-50 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-lg group-hover:scale-110 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="30">
                    <path d="M128 96c0-35.3 28.7-64 64-64l352 0c35.3 0 64 28.7 64 64l0 240-96 0 0-16c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 16-129.1 0c10.9-18.8 17.1-40.7 17.1-64 0-70.7-57.3-128-128-128-5.4 0-10.8 .3-16 1l0-49zM333 448c-5.1-24.2-16.3-46.1-32.1-64L608 384c0 35.3-28.7 64-64 64l-211 0zM64 272a80 80 0 1 1 160 0 80 80 0 1 1 -160 0zM0 480c0-53 43-96 96-96l96 0c53 0 96 43 96 96 0 17.7-14.3 32-32 32L32 512c-17.7 0-32-14.3-32-32z"/>
                </svg>
            </div>
        </div>
        <p class="text-xl font-black text-gray-900 dark:text-white">{{ $totalKelas }}</p>
        <span class="text-[10px] text-green-500 font-medium">Total Kelas</span>
    </div>

    <div class="p-4 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-sm hover:shadow-md transition-shadow group">
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-gray-500 dark:text-gray-400 text-[10px] font-bold uppercase tracking-wider">Kategori</h3>
            <div class="p-1.5 bg-orange-50 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400 rounded-lg group-hover:scale-110 transition-transform">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
            </div>
        </div>
        <p class="text-xl font-black text-gray-900 dark:text-white">{{ $totalKategori }}</p>
        <span class="text-[10px] text-gray-400 font-medium">Topik materi</span>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
    @can('manageuser')
    <div class="lg:col-span-2 p-5 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-gray-900 dark:text-white text-sm">Tren Pertumbuhan</h3>
        </div>
        <div class="h-[200px]">
            <canvas id="clubChart"></canvas>
        </div>
    </div>  
    <div class="p-5 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-sm">
        <h3 class="font-bold text-gray-900 dark:text-white text-sm mb-4">Anggota Terbaru</h3>
        <div class="space-y-4">
            @foreach($recentMembers as $member)
            <div class="flex items-center justify-between group">
                <a href="/manageuser/{{ $member->id }}" class="flex items-center space-x-3">
                    <img class="w-9 h-9 rounded-full border border-gray-100 dark:border-gray-600 object-cover shadow-sm" src="{{ $member->image ? asset('storage/' . $member->image) : 'https://ui-avatars.com/api/?name=' . urlencode($member->name) . '&background=random&color=fff&bold=true' }}">
                    <div class="min-w-0">
                        <p class="text-[15px] font-bold text-gray-900 truncate dark:text-white group-hover:text-blue-600 transition-colors">{{ $member->name }}</p>
                        <p class="text-[12px] text-gray-500 truncate dark:text-gray-400">{{ $member->email }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>         
    @endcan
</div>

<div class="grid grid-cols-1 lg:grid-cols-1 gap-5 mt-4">
    {{-- Informasi Penting --}}
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm overflow-hidden mb-5">
        <div class="bg-blue-600 px-4 py-2">
            <h3 class="text-white font-bold text-sm tracking-wide flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Informasi Penting
            </h3>
        </div>
        <div class="p-4">
            <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed mb-2">
                Selamat datang di Dashboard {{ auth()->user()->name }}, Mari meningkatkan skill IT bersama.
            </p>
            <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed mb-2">
                Investasi terbaik adalah investasi pada diri sendiri. Mari bangun portofolio hebat dan kuasai teknologi masa depan di sini.
            </p>
        </div>
    </div>

    {{-- Informasi Terbaru --}}
    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm overflow-hidden">
        <div class="bg-[#22d3ee] px-4 py-2 flex justify-between items-center">
            <h3 class="text-white font-bold text-sm tracking-wide flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                Informasi Terbaru
            </h3>
            <a href="{{ route('information') }}" class="text-[10px] bg-white/20 text-white px-2 py-1 rounded hover:bg-white/30 transition-colors">Lihat Semua</a>
        </div>
        <div class="p-4">
            <div class="space-y-3">
                @forelse($recentInformation as $info)
                <div class="p-3 border border-gray-100 dark:border-gray-700 rounded-lg">
                    <h4 class="text-sm font-bold text-gray-900 dark:text-white mb-1">{{ $info->title }}</h4>
                    <div class="text-gray-600 dark:text-gray-400 text-xs line-clamp-2">
                        {!! Str::limit(strip_tags($info->content), 120) !!} 
                    </div>
                </div>
                @empty
                <p class="text-center text-xs italic text-gray-400">Belum ada informasi.</p>
                @endforelse
                <div class="mt-4">{{ $recentInformation->links() }}</div>
            </div>
        </div>
    </div>

    {{-- TAMBAHAN: TUGAS TERBARU & GRAFIK PENGUMPULAN --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mt-4">
        {{-- Card Tugas Terbaru --}}
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm overflow-hidden">
            <div class="bg-indigo-600 px-4 py-2 flex items-center text-white">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                <h3 class="font-bold text-sm tracking-wide">Tugas Terbaru</h3>
            </div>
            <div class="p-4 space-y-3">
                @forelse($recentAssignments as $task)
                <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-100 dark:border-gray-700">
                    <div class="min-w-0 flex-1">
                        <h4 class="text-sm font-bold text-gray-900 dark:text-white truncate">{{ $task->title }}</h4>
                        <p class="text-[10px] text-red-500 font-medium italic">Deadline: {{ $task->deadline }}</p>
                    </div>
                    <form method="get" action="{{ route('assignments.show', $task->slug) }}">
                        <button class="ml-4 text-[10px] bg-indigo-50 text-indigo-600 px-3 py-1.5 rounded-lg font-bold hover:bg-indigo-100">Detail</button>
                    </form>
                </div>
                @empty
                <p class="text-center text-xs italic text-gray-400 py-4">Belum ada tugas aktif.</p>
                @endforelse
            </div>
        </div>
        @can('manage')
            
        {{-- Card Grafik Pengumpulan --}}
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm p-5">
            <h3 class="font-bold text-gray-900 dark:text-white text-sm mb-4">Aktivitas Pengumpulan Tugas</h3>
            <div class="h-[180px]">
                <canvas id="submissionChart"></canvas>
            </div>
        </div>
        @endcan
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // 1. Grafik Anggota (Gunakan pengaman IF agar tidak error di role Teknisi)
    const clubChartCanvas = document.getElementById('clubChart');
    if (clubChartCanvas) {
        const ctx = clubChartCanvas.getContext('2d');
        let gradient = ctx.createLinearGradient(0, 0, 0, 200);
        gradient.addColorStop(0, 'rgba(37, 99, 235, 0.2)');
        gradient.addColorStop(1, 'rgba(37, 99, 235, 0)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels), 
                datasets: [{
                    label: 'Anggota Baru',
                    data: @json($grafikAnggota), 
                    borderColor: '#2563eb',
                    borderWidth: 2,
                    backgroundColor: gradient,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: { maintainAspectRatio: false, plugins: { legend: { display: false } } }
        });
    }

    // 2. Grafik Pengumpulan (BARU)
    const submissionCanvas = document.getElementById('submissionChart');
    if (submissionCanvas) {
        const ctxSub = submissionCanvas.getContext('2d');
        new Chart(ctxSub, {
            type: 'bar',
            data: {
                labels: @json($labelTugas),
                datasets: [{
                    data: @json($grafikTugas),
                    backgroundColor: '#6366f1',
                    borderRadius: 4
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { 
                    y: { 
                        beginAtZero: true, 
                        ticks: { stepSize: 1, precision: 0 } 
                    } 
                }
            }
        });
    }
</script>
@endsection