<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Books Academy — Sign In</title>

        <!-- Inter Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
                            }
                        }
                    }
                }
            </script>
        @endif

        <!-- Theme Initialization Script -->
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
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body class="bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 transition-colors duration-200 min-h-screen">
        <div class="grid grid-cols-1 lg:grid-cols-12 min-h-screen">
            
            <!-- Left Banner (Minimal Solid Deep Slate canvas) -->
            <div class="hidden lg:flex lg:col-span-5 bg-slate-900 dark:bg-slate-950 flex-col justify-between p-12 text-white border-r border-slate-800">
                <div class="relative z-10">
                    <a href="/" class="flex items-center gap-2.5 font-bold tracking-tight text-white" id="nav-logo-guest">
                        <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4.5 h-4.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-16.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-16.25v14.25" />
                            </svg>
                        </div>
                        <span class="text-lg">Books<span class="text-blue-500 font-semibold">Academy</span></span>
                    </a>
                </div>

                <div class="relative z-10 space-y-4">
                    <h2 class="text-2xl font-bold leading-tight">Professional Publishing Support</h2>
                    <p class="text-xs text-slate-400 leading-relaxed max-w-sm">Access your writer dashboard to coordinate layout design files, review editorial proof prints, and index multi-store distribution lists.</p>
                </div>

                <div class="relative z-10 text-[10px] text-slate-500">
                    &copy; 2026 Books Academy Inc. All rights reserved.
                </div>
            </div>

            <!-- Right Form Section -->
            <div class="col-span-12 lg:col-span-7 flex flex-col justify-center items-center p-6 sm:p-12 relative bg-slate-50 dark:bg-slate-900 transition-colors">
                <!-- Sun/Moon floating toggle -->
                <div class="absolute top-6 right-6">
                    <button id="theme-toggle" type="button" class="w-9 h-9 rounded-lg border border-slate-200 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-950 flex items-center justify-center text-slate-650 dark:text-slate-450 transition-colors focus:outline-none" aria-label="Toggle theme">
                        <svg id="theme-toggle-dark-icon" class="w-4 h-4 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="w-4 h-4 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464a1 1 0 10-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="w-full max-w-md space-y-6">
                    <div class="text-center lg:text-left space-y-1.5">
                        <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 dark:text-white">Workspace Sign In</h1>
                        <p class="text-xs text-slate-400">Please enter credentials below to continue.</p>
                    </div>

                    <!-- Clean flat card -->
                    <div class="bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-6 sm:p-8 shadow-sm">
                        {{ $slot }}
                    </div>
                </div>
            </div>

        </div>

        <!-- Light/Dark Mode switcher script for Login page -->
        <script>
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
        </script>
    </body>
</html>
