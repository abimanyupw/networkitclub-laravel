<header class="sticky top-0 z-50" x-data="headerLogic" x-cloak>
    <nav class="bg-blue-600 border-gray-200 px-4 lg:px-6 py-2.5">
        <div class="flex flex-wrap lg:grid lg:grid-cols-3 items-center mx-auto max-w-screen-xl">
            
            <div class="flex justify-start">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('img/logo.png') }}" class="mr-1 h-8 sm:h-11" alt="Logo" />
                    <span class="self-center text-xl font-bold whitespace-nowrap text-white">Network IT Club</span>
                </a>
            </div>

            <div class="hidden justify-center items-center w-full lg:flex lg:w-auto">
                <ul class="flex flex-row space-x-8 font-medium">
                    <li><a href="{{ route('home') }}" class="block py-2 text-lg font-bold {{ request()->is('/') ? 'text-white' : 'text-white/70 hover:text-white' }}">Home</a></li>
                    <li><a href="{{ route('about') }}" class="block py-2 text-lg font-bold {{ request()->is('about*') ? 'text-white' : 'text-white/70 hover:text-white' }}">About</a></li>
                    <li><a href="{{ route('classes') }}" class="block py-2 text-lg font-bold {{ request()->is('classes*') ? 'text-white' : 'text-white/70 hover:text-white' }}">Classes</a></li>
                    <li><a href="{{ route('contact') }}" class="block py-2 text-lg font-bold {{ request()->is('contact*') ? 'text-white' : 'text-white/70 hover:text-white' }}">Contact</a></li>
                </ul>
            </div>

            <div class="flex items-center justify-end ml-auto lg:ml-0 gap-2 sm:gap-4">
                
                <button @click="toggleTheme()" type="button" class="text-white hover:bg-white/10 p-2 rounded-lg transition-colors focus:outline-none">
                    <svg x-show="isDark" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
                    <svg x-show="!isDark" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                </button>

                @auth
                    <div class="relative hidden lg:block">
                        <button @click="profileOpen = !profileOpen" @click.away="profileOpen = false" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-blue-300 border-2 border-white/50">
                            <img class="w-10 h-10 rounded-full object-cover" src="{{ auth()->user()->image ? asset('img/' . auth()->user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" 
                                        alt="{{ auth()->user()->name }}">
                        </button>
                        <div x-show="profileOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 z-50 border text-gray-700">
                             <div class="px-4 py-2 border-b">
                                <p class="text-sm font-bold text-gray-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                            </div>
                            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm hover:bg-blue-50">Dashboard</a>
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-blue-50">Settings</a>
                            <form action="{{ route('logout') }}" method="POST" class="border-t mt-1">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">Sign out</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="hidden lg:flex gap-2">
                        <a href="{{ route('login') }}" class="text-white border border-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-100 hover:text-black">Log in</a>
                    </div>
                @endauth

                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 text-white lg:hidden focus:outline-none">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="w-full lg:hidden border-t border-white/20 mt-4">
                
                <ul class="flex flex-col font-semibold text-white py-2">
                    <li><a href="{{ route('home') }}" class="block py-2 px-3 rounded {{ request()->is('/') ? 'bg-white/10' : 'hover:bg-white/10' }}">Home</a></li>
                    <li><a href="{{ route('about') }}" class="block py-2 px-3 rounded {{ request()->is('about*') ? 'bg-white/10' : 'hover:bg-white/10' }}">About</a></li>
                    <li><a href="{{ route('classes') }}" class="block py-2 px-3 rounded {{ request()->is('classes*') ? 'bg-white/10' : 'hover:bg-white/10' }}">Classes</a></li>
                    <li><a href="{{ route('contact') }}" class="block py-2 px-3 rounded {{ request()->is('contact*') ? 'bg-white/10' : 'hover:bg-white/10' }}">Contact</a></li>
                    
                    @auth
                        <div class="mt-2 pt-4 border-t border-white/20">
                            <div class="flex items-center px-3 mb-3">
                              <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full border-2 border-white/30" 
                                        src="{{ auth()->user()->image ? asset('img/' . auth()->user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" 
                                        alt="{{ auth()->user()->name }}">
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-white">{{ auth()->user()->name }}</div>
                                    <div class="text-sm font-medium text-white/60">{{ auth()->user()->email }}</div>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <a href="{{ route('dashboard') }}" class="block py-1 px-3 text-white/80 hover:bg-white/10 rounded">Dashboard</a>
                                <a href="" class="block py-1 px-3 text-white/80 hover:bg-white/10 rounded">Settings</a>
                               <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left py-2 px-3 text-white/80 hover:bg-white/10 rounded">
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <li class="grid grid-cols-1 gap-2 pt-4 border-t border-white/20 mt-4">
                            <a href="{{ route('login') }}" class="text-center border border-white py-2 rounded-lg">Log in</a>
                        </li>
                    @endauth                    
                </ul>
            </div>
        </div>
    </nav>
</header>