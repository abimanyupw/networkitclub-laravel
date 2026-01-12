<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Network IT Club</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body x-data="{ 
    isDark: localStorage.getItem('color-theme') === 'dark',
    sidebarOpen: false,
    toggleTheme() {
        this.isDark = !this.isDark;
        if (this.isDark) {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }
    }
}" class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">

    @include('partials.dashboard-navbar')

    <div class="flex pt-16 overflow-hidden">
        @include('partials.dashboard-sidebar')

        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-10 bg-gray-900/50 dark:bg-gray-900/80 lg:hidden"></div>

        <div class="relative w-max-screen h-full overflow-y-auto bg-gray-100 lg:ml-64 dark:bg-gray-900 min-h-screen">
            <main class="p-4 md:p-6">
                @yield('content')
            </main>
            
            @include('partials.dashboard-footer')
        </div>
    </div>

</body>
</html>