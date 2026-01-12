<aside class="fixed top-0 left-0 z-20 flex-col flex-shrink-0 w-64 h-full pt-16 transition-transform duration-300 lg:flex"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
    <div class="relative flex flex-col flex-1 min-h-full pt-0 bg-gray-100 border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 divide-y divide-gray-200 dark:divide-gray-700">
                <ul class="pb-2 space-y-2">
                    <li class="flex flex-col items-center p-2 text-base font-medium text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <img class="w-16 h-16 rounded-full border-2 border-white/50" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}" alt="user photo">
                    <span class=" mt-2 text-black dark:text-white text-md font-medium mr-2">{{ auth()->user()->name }}</span>
                    <span class="text-[10px] font-bold uppercase tracking-widest text-blue-600 dark:text-blue-400 px-2 py-0.5 bg-blue-200 dark:bg-blue-700/20 rounded">
                                            {{ auth()->user()->role }}
                                        </span>
                
                    </li>
                    <p class="text-xs font-bold text-gray-500 uppercase dark:text-gray-400">Main Navigation</p>
                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
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