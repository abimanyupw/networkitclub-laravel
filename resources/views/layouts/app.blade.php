<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Network IT Club</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="transition-colors duration-500">
    @include('partials.navbar')
    @yield('content')
    @include('partials.footer')
    
</body>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('headerLogic', () => ({
            mobileMenuOpen: false,
            profileOpen: false,
            isDark: localStorage.getItem('color-theme') === 'dark' || 
                   (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),

            init() {
                // Set tema saat halaman pertama kali dibuka
                this.applyTheme();
            },

            toggleTheme() {
                this.isDark = !this.isDark;
                localStorage.setItem('color-theme', this.isDark ? 'dark' : 'light');
                this.applyTheme();
            },

            applyTheme() {
                if (this.isDark) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            }
        }));
    });
</script>


</html>