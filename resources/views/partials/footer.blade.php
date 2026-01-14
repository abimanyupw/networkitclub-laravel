<footer class="p-4 bg-blue-600 sm:p-12">
    <div class="mx-auto max-w-screen-xl">
        <div class="md:flex md:justify-between gap-10">
            <div class="mb-10 md:mb-0 md:w-1/2">
                <a href="/" class="flex group flex-col items-start">
                    <div class="p-1 bg-white rounded-xl mr-4 transition-transform group-hover:rotate-12 duration-300">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-12 w-auto" alt="Logo Network IT Club" />
                    </div>
                    <div class="flex-col mt-1 font-medium whitespace-nowrap text-white">
                        <h1 class="text-2xl font-bold tracking-tight leading-none">
                            Network IT Club
                        </h1>
                        <span class="text-sm font-medium text-white uppercase tracking-widest">SMK Negeri 1 Pungging</span>
                    </div>
                </a>
                <p class="mt-3 text-white font-bold leading-relaxed text-md w-3/4">
                    Network It Club atau bisa disebut NIC adalah extrakurikuler yang berfokus pada bidang IT,Kegiatan dalam NIC biasanya mencakup pelatihan.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-8 sm:gap-16 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-black text-white uppercase tracking-widest">Links</h2>
                    <ul class="text-white/70 font-semibold space-y-4">
                        <li>
                            <a href="/" class="hover:text-white hover:underline underline-offset-4 transition-colors">Home</a>
                        </li>
                        <li>
                            <a href="/about" class="hover:text-white hover:underline underline-offset-4 transition-colors">About</a>
                        </li>
                        <li>
                            <a href="/classes" class="hover:text-white hover:underline underline-offset-4 transition-colors">Classes</a>
                        </li>
                        <li>
                            <a href="/Contact" class="hover:text-white hover:underline underline-offset-4 transition-colors">Contact</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-black text-white uppercase tracking-widest">Follow us</h2>
                    <ul class="text-white/70 font-semibold space-y-4">
                        <li>
                            <a href="https://www.instagram.com/nic.smkn1pungging/" class="hover:text-white hover:underline underline-offset-4 transition-colors">Instagram</a>
                        </li>
                        <li>
                            <a href="https://discord.com/invite/afZ6p7bQwx" class="hover:text-white hover:underline underline-offset-4 transition-colors">Discord</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-black text-white uppercase tracking-widest">Legal</h2>
                    <ul class="text-white/70 font-semibold space-y-4">
                        <li>
                            <a href="/privacy-policy" class="hover:text-white hover:underline underline-offset-4 transition-colors">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="/terms" class="hover:text-white hover:underline underline-offset-4 transition-colors">Terms</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr class="my-8 border-white/10 sm:mx-auto lg:my-10" />

        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-lg text-white sm:text-center">
                © 2025 <a href="/" class="hover:text-white font-bold transition-colors">Network IT Club</a>. All Rights Reserved.
            </span>
            
            <div class="flex mt-6 space-x-5 sm:justify-center sm:mt-0">
               @php
                    // Array helper dengan icon Instagram dan Discord
                    $socials = [
                        [
                            'name' => 'Instagram',
                            'path' => 'M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.332 3.608 1.308 1.03 1.03 1.28 2.166 1.346 3.882.06 1.762.06 2.046.06 5.577s0 3.815-.06 5.577c-.066 1.716-.316 2.852-1.346 3.882-.975.976-2.242 1.246-3.608 1.308-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.332-3.608-1.308-1.03-1.03-1.28-2.166-1.346-3.882-.06-1.762-.06-2.046-.06-5.577s0-3.815.06-5.577c.066-1.716.316-2.852 1.346-3.882.975-.976 2.242-1.246 3.608-1.308 1.266-.058 1.646-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z',
                            'link' => 'https://www.instagram.com/nic.smkn1pungging/'
                        ],
                        [
                            'name' => 'Discord',
                            'path' => 'M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128c.125-.094.249-.192.37-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.37.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z',
                            'link' => 'https://discord.com/invite/afZ6p7bQwx'
                        ],
                    ];
                @endphp

                @foreach($socials as $icon)
                <a href="{{ $icon['link'] }}" class="text-blue-100/50 hover:text-white transform hover:-translate-y-1 transition-all duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="{{ $icon['path'] }}" clip-rule="evenodd" />
                    </svg>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>