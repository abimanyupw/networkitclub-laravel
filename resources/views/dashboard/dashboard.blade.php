@extends('layouts.dashboard-app')

@section('content')
    <h1 class=" my-3 text-xl font-extrabold text-gray-900 dark:text-gray-100 tracking-tight">Selamat Datang, {{ auth()->user()->name }}!</h1>
<div class="mb-5 flex items-center justify-between">
    <div>
        <h1 class="text-xl font-extrabold text-gray-900 dark:text-white tracking-tight">Dashboard</h1>
        <p class="text-xs text-gray-500 dark:text-gray-400">Network IT Club.</p>
    </div>
    <div class="text-xs font-medium text-blue-600 bg-blue-50 dark:bg-blue-900/20 px-3 py-1 rounded-full border border-blue-100 dark:border-blue-800">
        Update: {{ now()->format('d M Y') }}
    </div>
</div>

<div class="grid grid-cols-2 gap-3 mb-6 lg:grid-cols-4">
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
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
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
    <div class="lg:col-span-2 p-5 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-gray-900 dark:text-white text-sm">Tren Pertumbuhan</h3>
            <select class="text-[10px] bg-gray-50 dark:bg-gray-700 border-none rounded-lg px-2 py-1 outline-none">
                <option>6 Bulan Terakhir</option>
            </select>
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
                    <img class="w-9 h-9 rounded-full border border-gray-100 dark:border-gray-600 object-cover shadow-sm" src="{{ $member->image ? asset('storage/' . $member->image) : 'https://ui-avatars.com/api/?name=' . urlencode($member->name) . '&background=random&color=fff&bold=true' }}" 
                                alt="{{ $member->name }}">
                                
                    <div class="min-w-0">
                        <p class="text-[15px] font-bold text-gray-900 truncate dark:text-white group-hover:text-blue-600 transition-colors">{{ $member->name }}</p>
                        <p class="text-[12px] text-gray-500 truncate dark:text-gray-400">{{ $member->email }}</p>
                    </div>
                </a>
                <svg class="w-3 h-3 text-gray-300 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </div>
            @endforeach
        </div>
        <form method="get" action="{{ route('manageuser.index') }}">
            @csrf
        <button class="cursor-pointer w-full mt-5 py-2 text-[12px] font-bold text-blue-600 bg-blue-50 dark:bg-blue-900/20 rounded-xl hover:bg-blue-100 transition-colors">
            Lihat Semua Anggota
        </button>
    </form>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-1 gap-5 mt-4">
    <div class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-sm overflow-hidden">
        <div class="bg-blue-600 h-1"></div>
        <div class="p-5">
            <h3 class="text-blue-600 dark:text-blue-400 font-bold text-md mb-3 flex items-center">
                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                Informasi Penting
            </h3>
            <div class="space-y-2">
                <p class="text-gray-700 dark:text-gray-300 text-[18px] leading-relaxed">Selamat datang di Dashboard Developer Network IT Club!</p>
                <p class="text-gray-500 dark:text-gray-400 text-[18px] leading-relaxed italic">Kelola pengguna, kategori, materi, dan jadwal secara real-time.</p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-sm overflow-hidden">
        <div class="bg-cyan-500 h-1"></div>
        <div class="p-5">
            <h3 class="text-cyan-600 dark:text-cyan-400 font-bold text-md mb-3 flex items-center">
                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                Jadwal Terdekat
            </h3>
            <div class="flex items-start justify-between bg-gray-50 dark:bg-gray-700/50 p-3 rounded-xl border border-gray-100 dark:border-gray-600">
                <div>
                    <p class="text-[11px] font-bold text-gray-900 dark:text-white">Lab TKJ D</p>
                    <p class="text-[9px] text-gray-500 dark:text-gray-400">Jam 00:00 • 12 Jun 2025</p>
                </div>
                <div class="text-[9px] font-bold px-2 py-0.5 bg-cyan-100 text-cyan-600 rounded-md">Besok</div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('clubChart').getContext('2d');
    
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
                pointRadius: 3,
                pointBackgroundColor: '#2563eb',
                backgroundColor: gradient,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: { 
                legend: { display: false } 
            },
            scales: {
                y: { 
                    beginAtZero: true,
                    ticks: { font: { size: 10 }, color: '#9ca3af' },
                    grid: { color: 'rgba(156, 163, 175, 0.1)' }
                },
                x: { 
                    grid: { display: false }, 
                    ticks: { font: { size: 10 }, color: '#9ca3af' } 
                }
            }
        }
    });
</script>
@endsection