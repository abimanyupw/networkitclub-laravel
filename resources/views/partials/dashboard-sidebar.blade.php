<aside class="fixed top-0 left-0 z-20 flex-col flex-shrink-0 w-64 h-full pt-16 transition-transform duration-300 lg:flex"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
    <div class="relative flex flex-col flex-1 min-h-full pt-0 bg-gray-100 border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 overflow-y-auto">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 divide-y divide-gray-200 dark:divide-gray-700">
                <ul class="pb-2 space-y-2">
                    <li class="flex flex-col items-center p-2 text-base font-medium text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <img class="w-16 h-16 rounded-full border-2 border-blue-500 object-cover" src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=0D8ABC&color=fff' }}" 
                                        alt="{{ auth()->user()->name }}">
                    <span class=" mt-2 text-black dark:text-white text-md font-medium mr-2">{{ auth()->user()->name }}</span>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-blue-600 dark:text-blue-400 px-2 py-0.5 bg-blue-200 dark:bg-blue-700/20 rounded">
                                            {{ auth()->user()->role }}
                                        </span>
                    </li>
                    <p class="mt-4 text-xs font-bold text-gray-500 uppercase dark:text-gray-400">Main Navigation</p>
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-base font-medium {{ request()->is('dashboard*') ? 'text-gray-900 rounded-lg bg-gray-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-700':'text-gray-900 rounded-lg hover:text-black dark:hover:text-white hover:bg-gray-200 dark:text-white/70 dark:hover:bg-gray-700'}}">
                            <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                            <span class="ml-3">Classes</span>
                        </a>
                    </li>
                    @can('manage')
                    <p class="text-xs font-bold text-gray-500 uppercase dark:text-gray-400">Manage</p>
                    <li>
                        <a href="/manageuser" class="flex items-center p-2 text-base font-medium {{ request()->is('manageuser*') ? 'text-gray-900 rounded-lg bg-gray-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-700':'text-gray-900 rounded-lg hover:text-black dark:hover:text-white hover:bg-gray-200 dark:text-white/70 dark:hover:bg-gray-700'}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor">
                            <path d="M12 12a4.5 4.5 0 100-9 4.5 4.5 0 000 9z"/>
                            <path d="M4 20a8 8 0 0116 0z"/>
                            </svg>
                            <span class="ml-3">Anggota</span>
                        </a>
                    </li>
                    <li>
                        <a href="/managecategory" class="flex items-center p-2 text-base font-medium {{ request()->is('managecategory*') ? 'text-gray-900 rounded-lg bg-gray-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-700':'text-gray-900 rounded-lg hover:text-black dark:hover:text-white hover:bg-gray-200 dark:text-white/70 dark:hover:bg-gray-700'}}">
                            <svg xmlns="http://www.w3.org/2000/svg"class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor">
                                <path d="M12.586 2.586A2 2 0 0011.172 2H4a2 2 0 00-2 2v7.172c0 .53.21 1.04.586 1.414l8 8a2 2 0 002.828 0l7.172-7.172a2 2 0 000-2.828l-8-8zM7 9a2 2 0 110-4 2 2 0 010 4z" />
                                </svg>
                            <span class="ml-3">Kategori Materi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/managecourse" class="flex items-center p-2 text-base font-medium {{ request()->is('managecourse*') ? 'text-gray-900 rounded-lg bg-gray-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-700':'text-gray-900 rounded-lg hover:text-black dark:hover:text-white hover:bg-gray-200 dark:text-white/70 dark:hover:bg-gray-700'}}">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor">
                                <path d="M128 96c0-35.3 28.7-64 64-64l352 0c35.3 0 64 28.7 64 64l0 240-96 0 0-16c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 16-129.1 0c10.9-18.8 17.1-40.7 17.1-64 0-70.7-57.3-128-128-128-5.4 0-10.8 .3-16 1l0-49zM333 448c-5.1-24.2-16.3-46.1-32.1-64L608 384c0 35.3-28.7 64-64 64l-211 0zM64 272a80 80 0 1 1 160 0 80 80 0 1 1 -160 0zM0 480c0-53 43-96 96-96l96 0c53 0 96 43 96 96 0 17.7-14.3 32-32 32L32 512c-17.7 0-32-14.3-32-32z"/>
                            </svg>

                            <span class="ml-3">Kelas</span>
                        </a>
                    </li>
                    <li>
                        <a href="/managematerial" class="flex items-center p-2 text-base font-medium {{ request()->is('managematerial*') ? 'text-gray-900 rounded-lg bg-gray-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-700':'text-gray-900 rounded-lg hover:text-black dark:hover:text-white hover:bg-gray-200 dark:text-white/70 dark:hover:bg-gray-700'}}">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor">
                            <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>

                            <span class="ml-3">Materi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/manageinformation" class="flex items-center p-2 text-base font-medium {{ request()->is('manageinformation*') ? 'text-gray-900 rounded-lg bg-gray-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-700':'text-gray-900 rounded-lg hover:text-black dark:hover:text-white hover:bg-gray-200 dark:text-white/70 dark:hover:bg-gray-700'}}">
                           <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>

                            <span class="ml-3">Informasi</span>
                        </a>
                    </li>
                    @endcan
                </ul>

                <div class="pt-4 space-y-2">
                        <p class="text-xs font-bold text-gray-500 uppercase dark:text-gray-400">Account</p>
                        <form action="/logout" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="flex items-center w-full p-2 text-sm font-bold text-red-600 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                <span class="ml-2">Sign Out</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>