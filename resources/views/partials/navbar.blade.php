<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script>
    // Script untuk inisialisasi dark mode sebelum halaman render (mencegah flickering)
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
</script>

<header class="sticky top-0 z-50" 
        x-data="{ 
            mobileMenuOpen: false, 
            profileOpen: false,
            isDark: localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
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
        }">
    <nav class="bg-blue-600 border-gray-200 px-4 lg:px-6 py-2.5">
        <div class="flex flex-wrap lg:grid lg:grid-cols-3 items-center mx-auto max-w-screen-xl">
            
            <div class="flex justify-start">
                <a href="/" class="flex items-center">
                    <img src="img/logo.png" class="mr-3 h-9 sm:h-11" alt="Logo" />
                    <span class="self-center text-xl font-bold whitespace-nowrap text-white">Network IT Club</span>
                </a>
            </div>

            <div class="hidden justify-center items-center w-full lg:flex lg:w-auto" id="desktop-menu">
                <ul class="flex flex-row space-x-8 font-medium">
                    <li><a href="{{ route('home') }}" class="block py-2 pr-4 pl-3 text-md font-bold rounded lg:p-0 {{ request()->is('/') ? 'text-white' : 'text-white/70 hover:text-white' }}">Home</a></li>
                    <li><a href="{{ route('about') }}" class="block py-2 pr-4 pl-3 text-md font-bold rounded lg:p-0 {{ request()->is('about*') ? 'text-white' : 'text-white/70 hover:text-white' }}">About</a></li>
                    <li><a href="{{ route('class') }}" class="block py-2 pr-4 pl-3 text-md font-bold rounded lg:p-0 {{ request()->is('class*') ? 'text-white' : 'text-white/70 hover:text-white' }}">Class</a></li>
                    <li><a href="{{ route('contact') }}" class="block py-2 pr-4 pl-3 text-md font-bold rounded lg:p-0 {{ request()->is('contact*') ? 'text-white' : 'text-white/70 hover:text-white' }}">Contact</a></li>
                </ul>
            </div>

            <div class="flex items-center justify-end ml-auto lg:ml-0 gap-2 sm:gap-4">
                
                <button @click="toggleTheme()" type="button" class="text-white hover:bg-white/10 p-2 rounded-lg transition-colors">
                    <svg x-show="isDark" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
                    <svg x-show="!isDark" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                </button>

                @auth
                    <div class="relative">
                        <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-blue-300 border-2 border-white/50">
                            <img class="w-9 h-9 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D8ABC&color=fff" alt="user photo">
                        </button>

                        <div x-show="profileOpen" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 z-50 border" style="display: none;">
                            <div class="px-4 py-2 border-b">
                                <p class="text-sm font-bold text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                            </div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Dashboard</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Settings</a>
                            <form action="{{ route('logout') }}" method="POST" class="border-t mt-1">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Sign out</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="hidden lg:flex gap-2">
                        <a href="#" class="text-white border border-white px-4 py-2 rounded-lg text-sm font-medium">Log in</a>
                        <a href="#" class="bg-white text-blue-600 px-4 py-2 rounded-lg text-sm font-bold">Sign in</a>
                    </div>
                @endauth

                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 text-white lg:hidden">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path x-show="!mobileMenuOpen" d="M3 5h14M3 10h14M3 15h14" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path><path x-show="mobileMenuOpen" d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" style="display: none;"></path></svg>
                </button>
            </div>

            <div x-show="mobileMenuOpen" class="w-full lg:hidden border-t border-white/20 mt-4" style="display: none;">
                <ul class="flex flex-col font-bold text-white py-4 space-y-4">
                    <li><a href="{{ route('home') }}" class="block py-2 pr-4 pl-3 text-md font-semibold rounded lg:p-0 {{ request()->is('/') ? 'text-white bg-gray-300/50' : 'text-white/70 hover:text-white' }}">Home</a></li>
                    <li><a href="{{ route('about') }}" class="block py-2 pr-4 pl-3 text-md font-semibold rounded lg:p-0 {{ request()->is('about*') ? 'text-white bg-gray-300/50' : 'text-white/70 hover:text-white' }}">About</a></li>
                    <li><a href="{{ route('class') }}" class="block py-2 pr-4 pl-3 text-md font-semibold rounded lg:p-0 {{ request()->is('class*') ? 'text-white bg-gray-300/50' : 'text-white/70 hover:text-white' }}">Class</a></li>
                    <li><a href="{{ route('contact') }}" class="block py-2 pr-4 pl-3 text-md font-semibold rounded lg:p-0 {{ request()->is('contact*') ? 'text-white bg-gray-300/50' : 'text-white/70 hover:text-white' }}">Contact</a></li>
                    @guest
                        <li class="grid grid-cols-2 gap-2 pt-4 border-t border-white/20">
                            <a href="#" class="text-center border border-white py-2 rounded-lg">Log in</a>
                            <a href="#" class="text-center bg-white text-blue-600 py-2 rounded-lg">Sign in</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>