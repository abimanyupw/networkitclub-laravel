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

    {{-- Bagian Informasi Penting --}}
<div class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-sm overflow-hidden">
    <div class="bg-violet-600 h-1"></div>
    <div class="p-5">
        <h3 class="text-blue-600 dark:text-blue-400 font-bold text-md mb-4 flex items-center justify-between">
            <span class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                Informasi Terbaru
            </span>
            <a href="{{ route('manageinformation.index') }}" class="text-[10px] bg-blue-50 dark:bg-blue-900/30 px-2 py-1 rounded-lg hover:bg-blue-100 transition-colors">Lihat Semua</a>
        </h3>

        <div class="space-y-4">
            @forelse($recentInformation as $info)
                <div class="group relative pl-4 border-l-2 border-blue-100 dark:border-gray-700 hover:border-blue-500 transition-colors">
                    <a href="{{ route('manageinformation.show', $info->slug) }}" class="block">
                        <h4 class="text-sm font-bold text-gray-900 dark:text-white group-hover:text-blue-600 transition-colors">
                            {{ $info->title }}
                        </h4>
                        <span class="text-[10px] text-gray-400 font-medium">
                            {{ $info->created_at->diffForHumans() }}
                        </span>
                    </a>
                </div>
            @empty
                <div class="text-center py-4">
                    <p class="text-gray-400 text-xs italic">Belum ada informasi terbaru.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
</div>
<style>
 /* Styling agar tabel dari Summernote memiliki border dan padding */
    .prose table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 1px solid #e2e8f0; /* Warna border abu-abu terang */
    }
    .prose th, .prose td {
        border: 1px solid #e2e8f0;
        padding: 8px 12px;
        text-align: left;
    }
    .prose th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    /* Mode Gelap (Dark Mode) */
    .dark .prose table, 
    .dark .prose th, 
    .dark .prose td {
        border-color: #334155; /* Warna border untuk dark mode */
    }
    .dark .prose th {
        background-color: #1e293b;
    }
    </style>

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