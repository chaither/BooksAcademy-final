<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Books Academy — Sign In</title>
        <link rel="icon" type="image/png" href="{{ asset('images/L01.png') }}">

        <!-- Inter & Playfair Display Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">

        <!-- Tailwind CSS & Vite -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
            <script>
                tailwind.config = {
                    darkMode: 'class',
                    theme: {
                        extend: {
                            fontFamily: {
                                sans: ['"Inter"', 'sans-serif'],
                                serif: ['"Playfair Display"', 'serif'],
                            }
                        }
                    }
                }
            </script>
        @endif

        <script>
            const currentTheme = localStorage.getItem('theme') || 
                (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            if (currentTheme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>

        <style>
            body { font-family: 'Inter', sans-serif; }
            .font-serif { font-family: 'Playfair Display', serif; }
            
            /* Glassmorphism utilities */
            .glass-panel {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
            .dark .glass-panel {
                background: rgba(15, 23, 42, 0.5);
                border: 1px solid rgba(255, 255, 255, 0.05);
            }

            /* Animated Mesh Gradient Background */
            .mesh-bg {
                background-color: #0f172a;
                background-image: 
                    radial-gradient(at 40% 20%, hsla(28,100%,74%,1) 0px, transparent 50%),
                    radial-gradient(at 80% 0%, hsla(189,100%,56%,1) 0px, transparent 50%),
                    radial-gradient(at 0% 50%, hsla(355,100%,93%,1) 0px, transparent 50%),
                    radial-gradient(at 80% 50%, hsla(340,100%,76%,1) 0px, transparent 50%),
                    radial-gradient(at 0% 100%, hsla(22,100%,77%,1) 0px, transparent 50%),
                    radial-gradient(at 80% 100%, hsla(242,100%,70%,1) 0px, transparent 50%),
                    radial-gradient(at 0% 0%, hsla(343,100%,76%,1) 0px, transparent 50%);
                animation: pulseBg 15s ease infinite alternate;
                background-size: 200% 200%;
            }

            @keyframes pulseBg {
                0% { background-position: 0% 0%; }
                100% { background-position: 100% 100%; }
            }
            
            /* Quote fade animation */
            .quote-slide {
                transition: opacity 1s ease-in-out, transform 1s ease-in-out;
                opacity: 0;
                transform: translateY(10px);
                position: absolute;
                inset: 0;
                pointer-events: none;
            }
            .quote-slide.active {
                opacity: 1;
                transform: translateY(0);
                pointer-events: auto;
            }
        </style>
    </head>
    <body class="bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 transition-colors duration-300 min-h-screen font-sans antialiased overflow-hidden">
        
        <div class="flex min-h-screen relative">
            
            <!-- Left Panel: Dynamic Aesthetic Background & Quotes -->
            <div class="hidden lg:flex lg:w-5/12 mesh-bg relative flex-col justify-between p-12 text-white shadow-2xl z-10 overflow-hidden">
                <!-- Overlay for better text readability -->
                <div class="absolute inset-0 bg-black/20 backdrop-blur-[2px]"></div>

                <!-- Logo -->
                <div class="relative z-10">
                    <a href="{{ url('/') }}" class="flex items-center gap-3 font-bold tracking-tight text-white group hover:scale-105 transition-transform duration-300 w-max" id="nav-logo-guest">
                        <div class="w-10 h-10 rounded-xl bg-white/20 backdrop-blur-md border border-white/30 flex items-center justify-center text-white shadow-lg group-hover:bg-white/30 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-16.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-16.25v14.25" />
                            </svg>
                        </div>
                        <span class="text-2xl drop-shadow-md">Books<span class="text-blue-100 font-semibold">Academy</span></span>
                    </a>
                </div>

                <!-- Quotes Carousel -->
                <div class="relative z-10 flex-1 flex items-center justify-center mt-12 mb-8">
                    <div class="relative w-full h-64" id="quote-container">
                        <!-- Quote 1 -->
                        <div class="quote-slide active flex flex-col justify-center h-full">
                            <svg class="w-10 h-10 text-white/40 mb-4" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                            <p class="text-3xl md:text-4xl font-serif font-medium leading-tight text-white drop-shadow-md">"The scariest moment is always just before you start."</p>
                            <div class="mt-6 flex items-center gap-4">
                                <div class="w-10 h-px bg-white/60"></div>
                                <span class="text-sm font-semibold tracking-wider uppercase text-white/90">Stephen King</span>
                            </div>
                        </div>
                        <!-- Quote 2 -->
                        <div class="quote-slide flex flex-col justify-center h-full">
                            <svg class="w-10 h-10 text-white/40 mb-4" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                            <p class="text-3xl md:text-4xl font-serif font-medium leading-tight text-white drop-shadow-md">"A word after a word after a word is power."</p>
                            <div class="mt-6 flex items-center gap-4">
                                <div class="w-10 h-px bg-white/60"></div>
                                <span class="text-sm font-semibold tracking-wider uppercase text-white/90">Margaret Atwood</span>
                            </div>
                        </div>
                        <!-- Quote 3 -->
                        <div class="quote-slide flex flex-col justify-center h-full">
                            <svg class="w-10 h-10 text-white/40 mb-4" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                            <p class="text-3xl md:text-4xl font-serif font-medium leading-tight text-white drop-shadow-md">"There is no greater agony than bearing an untold story inside you."</p>
                            <div class="mt-6 flex items-center gap-4">
                                <div class="w-10 h-px bg-white/60"></div>
                                <span class="text-sm font-semibold tracking-wider uppercase text-white/90">Maya Angelou</span>
                            </div>
                        </div>
                        <!-- Quote 4 -->
                        <div class="quote-slide flex flex-col justify-center h-full">
                            <svg class="w-10 h-10 text-white/40 mb-4" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                            <p class="text-3xl md:text-4xl font-serif font-medium leading-tight text-white drop-shadow-md">"We write to taste life twice, in the moment and in retrospect."</p>
                            <div class="mt-6 flex items-center gap-4">
                                <div class="w-10 h-px bg-white/60"></div>
                                <span class="text-sm font-semibold tracking-wider uppercase text-white/90">Anaïs Nin</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative z-10 text-xs text-white/60 font-medium">
                    &copy; 2026 Books Academy Inc. All rights reserved.
                </div>
            </div>

            <!-- Right Form Section -->
            <div class="w-full lg:w-7/12 flex flex-col justify-center items-center p-6 sm:p-12 relative bg-slate-50 dark:bg-slate-900 transition-colors z-0">
                
                <!-- Background decorative elements -->
                <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-blue-500/10 dark:bg-blue-600/10 rounded-full blur-[80px] pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-96 h-96 bg-rose-500/10 dark:bg-rose-600/10 rounded-full blur-[80px] pointer-events-none"></div>

                <!-- Theme Toggle -->
                <div class="absolute top-6 right-6 z-20">
                    <button id="theme-toggle" type="button" class="w-10 h-10 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 flex items-center justify-center text-slate-700 dark:text-slate-300 hover:scale-110 transition-transform shadow-sm focus:outline-none" aria-label="Toggle theme">
                        <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464a1 1 0 10-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="w-full max-w-md z-10 relative">
                    <!-- Glass panel container for the form -->
                    <div class="glass-panel rounded-2xl p-8 sm:p-10 shadow-xl relative overflow-hidden">
                        <!-- Subtle inner glow -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-white/60 to-transparent dark:from-white/5 pointer-events-none rounded-2xl"></div>
                        
                        <div class="relative z-10">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Scripts -->
        <script>
            // Theme toggle logic
            const themeToggleBtn = document.getElementById('theme-toggle');
            const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

            if (currentTheme === 'dark') {
                themeToggleLightIcon.classList.remove('hidden');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
            }

            themeToggleBtn.addEventListener('click', function() {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                    themeToggleLightIcon.classList.add('hidden');
                    themeToggleDarkIcon.classList.remove('hidden');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                    themeToggleDarkIcon.classList.add('hidden');
                    themeToggleLightIcon.classList.remove('hidden');
                }
            });

            // Quotes Carousel Logic
            const slides = document.querySelectorAll('.quote-slide');
            let currentSlide = 0;

            if (slides.length > 0) {
                setInterval(() => {
                    slides[currentSlide].classList.remove('active');
                    currentSlide = (currentSlide + 1) % slides.length;
                    slides[currentSlide].classList.add('active');
                }, 6000); // Change quote every 6 seconds
            }
        </script>
    </body>
</html>
