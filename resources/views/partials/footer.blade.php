<footer class="p-4 bg-blue-600 sm:p-12">
    <div class="mx-auto max-w-screen-xl">
        <div class="md:flex md:justify-between gap-10">
            <div class="mb-10 md:mb-0 md:w-1/3">
                <a href="/" class="flex items-center group">
                    <div class="p-2 bg-white rounded-2xl mr-4 transition-transform group-hover:rotate-12 duration-300">
                        <img src="img/logo.png" class="h-12 w-auto" alt="Logo Network IT Club" />
                    </div>
                    <div class="flex-col self-center font-semibold whitespace-nowrap text-white">
                        <h1 class="text-2xl font-black tracking-tight leading-none">
                            Network IT Club
                        </h1>
                        <span class="text-sm font-medium text-white uppercase tracking-widest">SMK Negeri 1 Pungging</span>
                    </div>
                </a>
                <p class="mt-6 text-white font-bold leading-relaxed text-md">
                    Membangun komunitas antusias IT untuk berbagi pengetahuan, berkolaborasi dalam proyek, dan menumbuhkan inovasi di bidang teknologi informasi.
                </p>
            </div>

            <div class="grid grid-cols-2 gap-8 sm:gap-16 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-black text-white uppercase tracking-widest">Resources</h2>
                    <ul class="text-white/70 font-semibold space-y-4">
                        <li>
                            <a href="https://flowbite.com" class="hover:text-white hover:underline underline-offset-4 transition-colors">Flowbite</a>
                        </li>
                        <li>
                            <a href="https://tailwindcss.com/" class="hover:text-white hover:underline underline-offset-4 transition-colors">Tailwind CSS</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-black text-white uppercase tracking-widest">Follow us</h2>
                    <ul class="text-white/70 font-semibold space-y-4">
                        <li>
                            <a href="#" class="hover:text-white hover:underline underline-offset-4 transition-colors">Github</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-white hover:underline underline-offset-4 transition-colors">Discord</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-black text-white uppercase tracking-widest">Legal</h2>
                    <ul class="text-white/70 font-semibold space-y-4">
                        <li>
                            <a href="#" class="hover:text-white hover:underline underline-offset-4 transition-colors">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-white hover:underline underline-offset-4 transition-colors">Terms</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <hr class="my-8 border-white/10 sm:mx-auto lg:my-10" />

        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-white sm:text-center">
                © 2025 <a href="/" class="hover:text-white font-bold transition-colors">Network IT Club</a>. All Rights Reserved.
            </span>
            
            <div class="flex mt-6 space-x-5 sm:justify-center sm:mt-0">
                @php
                    // Array helper untuk memudahkan pengelolaan icon sosmed jika dibutuhkan
                    $socials = [
                        ['path' => 'M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z'],
                        ['path' => 'M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z'],
                    ];
                @endphp

                @foreach($socials as $icon)
                <a href="#" class="text-blue-100/50 hover:text-white transform hover:-translate-y-1 transition-all duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="{{ $icon['path'] }}" clip-rule="evenodd" />
                    </svg>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>