<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books Academy — Professional Publishing House</title>

    <!-- Inter Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

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
                        },
                    }
                }
            }
        </script>
    @endif

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body
    class="bg-[#E5D3B3] text-slate-800 transition-colors duration-200 selection:bg-blue-600 selection:text-white min-h-screen flex flex-col overflow-x-hidden">

    <!-- Fullscreen Video Intro Splash -->
    <div id="intro-splash"
        class="fixed inset-0 z-[9999] bg-black flex items-center justify-center transition-all duration-1000 ease-out">
        <video id="intro-video" class="w-full h-full object-contain" autoplay muted playsinline>
            <source src="{{ asset('images/vid1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <button id="skip-intro"
            class="absolute bottom-6 right-6 px-4 py-2 bg-white/10 hover:bg-white/20 text-white font-semibold text-[10px] sm:text-xs tracking-widest uppercase rounded-full backdrop-blur-md transition-all border border-white/10 shadow-lg z-[10000]">
            Skip Intro
        </button>
    </div>

    <!-- Navigation Bar -->
    <header class="sticky top-0 z-50 bg-transparent transition-all w-full">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-4 lg:py-6 flex items-center justify-between relative">
            <!-- Navbar Logo (L01) -->
            <div class="relative h-10 lg:h-12 w-32 lg:w-40 xl:w-48 flex-shrink-0 flex items-center z-10">
                <a href="#" class="flex items-center hover:opacity-90 transition-opacity" id="nav-logo">
                    <img id="logo-small" src="{{ asset('images/L01.png') }}" alt="BooksAcademy Logo Small"
                        class="h-8 lg:h-10 max-w-none w-auto object-contain opacity-0 scale-95 pointer-events-none transition-all duration-500 ease-out origin-left drop-shadow-sm">
                </a>
            </div>

            <!-- Middle Links -->
            <nav
                class="hidden lg:flex items-center justify-center gap-4 xl:gap-6 text-xs lg:text-sm xl:text-base 2xl:text-lg font-medium absolute left-1/2 -translate-x-1/2 z-0">
                <a href="#"
                    class="text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors"
                    id="link-home">Home</a>
                <a href="#about-us"
                    class="text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors"
                    id="link-about">About Us</a>

                <!-- Services Dropdown -->
                <div class="relative group/dropdown">
                    <button id="services-dropdown-btn"
                        class="flex items-center gap-1 text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors focus:outline-none">
                        Services
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-4 h-4 transition-transform group-hover/dropdown:rotate-180">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div
                        class="absolute left-0 mt-2 w-56 rounded-xl bg-white dark:bg-slate-900 shadow-lg border border-slate-200 dark:border-slate-800 opacity-0 invisible group-hover/dropdown:opacity-100 group-hover/dropdown:visible transition-all duration-200 transform translate-y-1 group-hover/dropdown:translate-y-0 z-50 p-1.5">
                        <a href="#services" onclick="highlightService('children')"
                            class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors text-xs font-semibold">
                            Children's Books Publishing
                        </a>
                        <a href="#services" onclick="highlightService('bw')"
                            class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors text-xs font-semibold">
                            Black & White Publishing
                        </a>
                        <a href="#services" onclick="highlightService('color')"
                            class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors text-xs font-semibold">
                            Full Color Publishing
                        </a>
                        <div class="h-px bg-slate-200 dark:bg-slate-800 my-1.5"></div>
                        <a href="#services" onclick="highlightService('marketing')"
                            class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors text-xs font-semibold">
                            Marketing Campaigns
                        </a>
                        <a href="#services" onclick="highlightService('addons')"
                            class="block px-3 py-2 rounded-lg text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors text-xs font-semibold">
                            Premium Add-ons
                        </a>
                    </div>
                </div>

                <a href="#bookstore"
                    class="text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors"
                    id="link-bookstore">Bookstore</a>
                <a href="#pressroom"
                    class="text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors"
                    id="link-pressroom">Pressroom</a>
                <a href="#contact-us"
                    class="text-slate-600 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors"
                    id="link-contact">Contact Us</a>
            </nav>

            <!-- Actions Right -->
            <div class="w-32 lg:w-40 xl:w-48 flex items-center justify-end gap-3.5 z-10">
                <!-- Removed Theme Toggle -->

                <!-- Auth Links -->
                @if (Route::has('login'))
                    <div class="hidden lg:flex items-center gap-2">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="px-4 py-2 rounded-lg bg-slate-900 hover:bg-slate-800 text-white dark:bg-white dark:hover:bg-slate-100 dark:text-slate-900 font-semibold text-xs transition-colors"
                                id="btn-dashboard">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-3.5 py-2 text-xs font-semibold text-slate-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors"
                                id="btn-login">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs transition-all shadow-sm"
                                    id="btn-register">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" type="button"
                    class="lg:hidden flex items-center justify-center p-2 rounded-lg text-slate-600 hover:bg-slate-100 transition-colors focus:outline-none"
                    aria-label="Toggle mobile menu">
                    <svg id="menu-open-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg id="menu-close-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Panel -->
        <div id="mobile-menu"
            class="hidden lg:hidden border-t border-slate-200/80 bg-white/95 backdrop-blur-sm absolute w-full left-0 top-16 shadow-lg">
            <div class="px-4 pt-2 pb-6 space-y-2">
                <a href="#"
                    class="block px-3 py-2.5 rounded-md text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">Home</a>
                <a href="#about-us"
                    class="block px-3 py-2.5 rounded-md text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">About
                    Us</a>
                <a href="#services"
                    class="block px-3 py-2.5 rounded-md text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">Services</a>
                <a href="#bookstore"
                    class="block px-3 py-2.5 rounded-md text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">Bookstore</a>
                <a href="#pressroom"
                    class="block px-3 py-2.5 rounded-md text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">Pressroom</a>
                <a href="#contact-us"
                    class="block px-3 py-2.5 rounded-md text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">Contact
                    Us</a>
                @if (Route::has('login'))
                    <div class="h-px bg-slate-200 my-2"></div>
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="block px-3 py-2.5 rounded-md text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="block px-3 py-2.5 rounded-md text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">Log
                            in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="block px-3 py-2.5 rounded-md text-sm font-semibold text-blue-600 hover:bg-blue-50 transition-colors">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <!-- Centered Large Logo (L02) with Connection & Glide Animation -->
    <section class="relative w-full min-h-screen flex items-start justify-center -mt-20 pt-24 sm:pt-32 md:pt-40 lg:pt-48 px-4">
        <div id="logo-container" class="relative w-full max-w-[280px] sm:max-w-[350px] md:max-w-[500px] lg:max-w-[600px] 2xl:max-w-[800px] mx-auto opacity-0 transition-all duration-[1200ms] ease-out" style="transform: translateY(100px); will-change: transform, opacity;">
            <!-- Full Static Logo (shown after animation completes) -->
            <img id="logo-large" src="{{ asset('images/L02.png') }}" alt="BooksAcademy Logo Large"
                class="h-auto w-full object-contain drop-shadow-md origin-center opacity-0 transition-opacity duration-500 will-change-transform">
            
            <!-- Left Half (animated) -->
            <img id="logo-half-left" src="{{ asset('images/L02.png') }}" alt="BooksAcademy Logo Left"
                class="absolute inset-0 h-auto w-full object-contain drop-shadow-md origin-center logo-half"
                style="clip-path: inset(0 50% 0 0); transform: translateX(-150px); opacity: 0; transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1), opacity 1.2s ease-out; will-change: transform, opacity;">
            
            <!-- Right Half (animated) -->
            <img id="logo-half-right" src="{{ asset('images/L02.png') }}" alt="BooksAcademy Logo Right"
                class="absolute inset-0 h-auto w-full object-contain drop-shadow-md origin-center logo-half"
                style="clip-path: inset(0 0 0 50%); transform: translateX(150px); opacity: 0; transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1), opacity 1.2s ease-out; will-change: transform, opacity;">
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about-us"
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-white dark:bg-slate-900 border-y border-slate-200 dark:border-slate-800 transition-colors">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-5">
                    <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Who We
                        Are</span>
                    <h2
                        class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        A Professional Academy for Independent Authors</h2>
                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed text-sm">
                        Books Academy was established to close the gap between creators and global libraries. We offer
                        transparent self-publishing solutions, detailed copy-editing guides, illustration layout
                        alignment, and direct distribution lines into main marketplaces.
                    </p>
                    <div class="flex items-center gap-8 pt-4">
                        <div>
                            <span class="text-3xl font-extrabold text-slate-950 dark:text-white block">1.5k+</span>
                            <span class="text-xs text-slate-400">Published Authors</span>
                        </div>
                        <div>
                            <span class="text-3xl font-extrabold text-slate-950 dark:text-white block">45</span>
                            <span class="text-xs text-slate-400">Distribution Networks</span>
                        </div>
                    </div>
                </div>

                <div
                    class="p-8 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-4">
                    <h3 class="font-bold text-sm uppercase tracking-wider text-slate-400">Core Foundations</h3>
                    <ul class="space-y-3.5 text-xs text-slate-600 dark:text-slate-300">
                        <li class="flex items-start gap-2.5">
                            <span class="text-blue-600 font-bold">✓</span>
                            <span><strong>Full Intellectual Rights:</strong> Authors retain 100% copyright ownership and
                                metadata controls.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-blue-600 font-bold">✓</span>
                            <span><strong>Editorial Review:</strong> Advanced proofreading audits before catalog
                                listings.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-blue-600 font-bold">✓</span>
                            <span><strong>Global Systems:</strong> Immediate setups in Amazon KDP, Apple Books, and
                                Ingram network indexes.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Happenings Section -->
    <section id="pressroom"
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-12">
            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Academy News</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                    Latest Happenings</h2>
            </div>
            <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-500 transition-colors">
                View Press Room →
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            <!-- Article 1 -->
            <article
                class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 space-y-3 hover:border-slate-300 dark:hover:border-slate-700 transition-all">
                <time class="text-xs text-slate-400">June 5, 2026</time>
                <h3 class="text-base font-bold text-slate-900 dark:text-white">Books Academy Opens Tokyo Distribution
                    Center</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">Providing high-speed
                    print-on-demand services across Southeast Asia to facilitate quicker author royalties.</p>
            </article>

            <!-- Article 2 -->
            <article
                class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 space-y-3 hover:border-slate-300 dark:hover:border-slate-700 transition-all">
                <time class="text-xs text-slate-400">May 28, 2026</time>
                <h3 class="text-base font-bold text-slate-900 dark:text-white">Annual Writers Retreat & Masterclass
                    Series</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">Register now for online publishing
                    seminars focused on creative illustration and marketing strategies.</p>
            </article>

            <!-- Article 3 -->
            <article
                class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 space-y-3 hover:border-slate-300 dark:hover:border-slate-700 transition-all">
                <time class="text-xs text-slate-400">May 15, 2026</time>
                <h3 class="text-base font-bold text-slate-900 dark:text-white">Independent Penholder Awards Finalists
                    Released</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">We congratulate four Books Academy
                    authors who have been shortlisted in three global categories.</p>
            </article>
        </div>
    </section>

    <!-- Services Section (Publishing: Children's, B&W, Full Color, Marketing, Add-ons) -->
    <section id="services"
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-white dark:bg-slate-900 border-y border-slate-200 dark:border-slate-800 transition-colors">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Publishing
                    Packages</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                    Publishing & Marketing Services</h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-2">Professional design layouts, print catalogs, and
                    promotional setups.</p>
            </div>

            <!-- Simple Tab Selectors -->
            <div class="flex flex-wrap items-center justify-center gap-2 mb-10" id="services-selector">
                <button onclick="selectServiceCard('children')" id="btn-srv-children"
                    class="px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider border border-blue-600 bg-blue-600 text-white transition-all">
                    Children's Books
                </button>
                <button onclick="selectServiceCard('bw')" id="btn-srv-bw"
                    class="px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-850 transition-all">
                    Black & White
                </button>
                <button onclick="selectServiceCard('color')" id="btn-srv-color"
                    class="px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-850 transition-all">
                    Full Color
                </button>
                <button onclick="selectServiceCard('marketing')" id="btn-srv-marketing"
                    class="px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-850 transition-all">
                    Marketing
                </button>
                <button onclick="selectServiceCard('addons')" id="btn-srv-addons"
                    class="px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-850 transition-all">
                    Add-ons
                </button>
            </div>

            <!-- Detail Grid (Toggled dynamically, only displaying active selection) -->
            <div class="max-w-2xl mx-auto bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-8 shadow-sm"
                id="services-details-container">

                <!-- Content injected/toggled via JS -->
                <div id="service-content-body" class="space-y-6">
                    <!-- Dynamic Text -->
                </div>

            </div>
        </div>
    </section>

    <!-- Why Writers Choose Our House (First Layout: Credentials) -->
    <section
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-5">
                <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Writer
                    Experience</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                    Full Control. Direct Distribution.</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">
                    Traditional publishing setups require full copyright signovers and return minimal net royalties.
                    Books Academy leaves creative control where it belongs—with the author.
                </p>
                <div class="space-y-2.5 text-xs font-medium text-slate-600 dark:text-slate-300">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                        <span>Keep 100% of book permissions and copyright listings.</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                        <span>Secure up to 85% royalties on paperback and digital prints.</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                        <span>Direct consulting with dedicated design editors.</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-center">
                    <span class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white">100%</span>
                    <span class="block text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-wider">Author
                        Ownership</span>
                </div>
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-center">
                    <span class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white">85%</span>
                    <span class="block text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-wider">Net
                        Royalties</span>
                </div>
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-center">
                    <span class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white">24/7</span>
                    <span class="block text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-wider">Author
                        Support</span>
                </div>
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-center">
                    <span class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white">Ingram</span>
                    <span class="block text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-wider">Global
                        Distribution</span>
                </div>
            </div>
        </div>
    </section>

    <!-- The Journey to Publication & Spotlight -->
    <section
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-white dark:bg-slate-900 border-y border-slate-200 dark:border-slate-800 transition-colors">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Our
                    Pipeline</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                    The Journey to Publication</h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-2">A clean, transparent pathway from manuscript draft to
                    global catalog launches.</p>
            </div>

            <!-- Timeline steps -->
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 mb-16 text-center justify-center">
                <div
                    class="p-5 rounded-xl border border-slate-200/80 dark:border-slate-800/80 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span
                        class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs inline-flex items-center justify-center">1</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white pt-1">Manuscript Review</h4>
                    <p class="text-[11px] text-slate-500 leading-relaxed">Evaluation of draft files for structure,
                        spelling, and structural flow.</p>
                </div>
                <div
                    class="p-5 rounded-xl border border-slate-200/80 dark:border-slate-800/80 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span
                        class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs inline-flex items-center justify-center">2</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white pt-1">Design & Layout</h4>
                    <p class="text-[11px] text-slate-500 leading-relaxed">Book cover designing, interior typesetting,
                        and artwork alignment.</p>
                </div>
                <div
                    class="p-5 rounded-xl border border-slate-200/80 dark:border-slate-800/80 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span
                        class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs inline-flex items-center justify-center">3</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white pt-1">Proof Audits</h4>
                    <p class="text-[11px] text-slate-500 leading-relaxed">Verification of physical paperback drafts and
                        digital Kindle proofs.</p>
                </div>
                <div
                    class="p-5 rounded-xl border border-slate-200/80 dark:border-slate-800/80 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span
                        class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs inline-flex items-center justify-center">4</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white pt-1">Distribution</h4>
                    <p class="text-[11px] text-slate-500 leading-relaxed">File uploads to Kindle KDP, Apple Bookstore,
                        and global libraries.</p>
                </div>
                <div class="p-5 rounded-xl border border-blue-600 bg-blue-50/10 dark:bg-blue-900/10 space-y-2">
                    <span
                        class="w-6 h-6 rounded-full bg-blue-600 text-white font-bold text-xs inline-flex items-center justify-center">5</span>
                    <h4 class="font-bold text-sm text-blue-600 dark:text-blue-400 pt-1">Spotlight Launch</h4>
                    <p class="text-[11px] text-slate-500 leading-relaxed">Press wires distribution, marketing ads, and
                        book launching.</p>
                </div>
            </div>

            <!-- Bestseller Spotlight block -->
            <div
                class="p-6 sm:p-8 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 flex flex-col sm:flex-row items-center gap-6">
                <div class="w-20 h-28 bg-slate-900 rounded-lg overflow-hidden shadow flex-shrink-0">
                    <img src="/images/book_design.png" alt="Spotlight Book" class="w-full h-full object-cover">
                </div>
                <div class="flex-1 space-y-2 text-center sm:text-left">
                    <span
                        class="px-2.5 py-0.5 rounded bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-[10px] font-bold uppercase tracking-wider">Featured
                        Launch</span>
                    <h4 class="text-lg font-bold text-slate-900 dark:text-white">"The Art of Visual Systems" by Sarah
                        Jennings</h4>
                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                        Sarah Jennings' layout compilation reached the top design indexes in under two weeks. Utilizing
                        our Full Color package and marketing channels, her work reached universities worldwide.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- The Literary Media Lounge -->
    <section id="media-lounge"
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Multimedia</span>
            <h2
                class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                The Literary Media Lounge</h2>
            <p class="text-xs sm:text-sm text-slate-400 mt-2">Listen to podcast discussions and watch writer panel
                releases.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:gap-8">
            <!-- Lounge item 1 -->
            <div
                class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 flex items-center gap-5">
                <div
                    class="w-16 h-16 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-600 flex items-center justify-center text-2xl flex-shrink-0">
                    🎙️
                </div>
                <div class="flex-1 space-y-1">
                    <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider">Podcast • Episode
                        48</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white">Designing Book Covers that Sell</h4>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 leading-normal"> Sarah Jennings breaks down
                        cover formats and type alignments.</p>
                    <button onclick="alert('Playing audio...');"
                        class="text-xs font-bold text-blue-600 hover:text-blue-500 transition-colors pt-1">Listen
                        Episode →</button>
                </div>
            </div>

            <!-- Lounge item 2 -->
            <div
                class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 flex items-center gap-5">
                <div
                    class="w-16 h-16 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-600 flex items-center justify-center text-2xl flex-shrink-0">
                    🎥
                </div>
                <div class="flex-1 space-y-1">
                    <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider">Video Interview</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white">From Manuscript to Series A</h4>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 leading-normal">R. Cunningham details
                        publishing and organizing startup books.</p>
                    <a href="#intro-video"
                        class="text-xs font-bold text-blue-600 hover:text-blue-500 transition-colors pt-1 block">Watch
                        Video →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Voices from the Penholders -->
    <section
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-white dark:bg-slate-900 border-y border-slate-200 dark:border-slate-800 transition-colors">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Author
                    Testimonials</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                    Voices from the Penholders</h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-2">Publishing testimonials from writers who worked with
                    our house.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                <!-- Quote 1 -->
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-4">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs flex items-center justify-center">
                            AM</div>
                        <div>
                            <h4 class="font-bold text-xs text-slate-900 dark:text-white">Alvin Mercer</h4>
                            <p class="text-[10px] text-slate-400">Author of *"Coded Thoughts"*</p>
                        </div>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed italic">
                        "The design dashboard permitted me to upload and proof layouts directly. Simple, clean, and
                        professional support throughout the process."
                    </p>
                </div>

                <!-- Quote 2 -->
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-4">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs flex items-center justify-center">
                            MV</div>
                        <div>
                            <h4 class="font-bold text-xs text-slate-900 dark:text-white">Martha Vance</h4>
                            <p class="text-[10px] text-slate-400">Author of *"Children of the Wild"*</p>
                        </div>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed italic">
                        "Children's book illustrations need precise color alignment. Their formatting team verified
                        files and set up spreads beautifully."
                    </p>
                </div>

                <!-- Quote 3 -->
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-4">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs flex items-center justify-center">
                            HS</div>
                        <div>
                            <h4 class="font-bold text-xs text-slate-900 dark:text-white">Howard Stark</h4>
                            <p class="text-[10px] text-slate-400">Author of *"Startup Architecture"*</p>
                        </div>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed italic">
                        "Direct global distributions in Amazon and Barnes & Noble allowed my textbook to go live
                        worldwide within 48 hours."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Global Collaborations Section -->
    <section
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Bookstore Partners</span>
            <h2
                class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                Global Collaborations</h2>
            <p class="text-xs sm:text-sm text-slate-400 mt-2">Publishing channels and distributors helping list Books
                Academy titles.</p>
        </div>

        <div
            class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 items-center text-slate-400 dark:text-slate-500 font-bold text-xs text-center">
            <div class="py-3 px-4 border border-slate-200 dark:border-slate-800 rounded-lg">Amazon Kindle</div>
            <div class="py-3 px-4 border border-slate-200 dark:border-slate-800 rounded-lg">Barnes & Noble</div>
            <div class="py-3 px-4 border border-slate-200 dark:border-slate-800 rounded-lg">IngramSpark</div>
            <div class="py-3 px-4 border border-slate-200 dark:border-slate-800 rounded-lg">Google Books</div>
            <div class="py-3 px-4 border border-slate-200 dark:border-slate-800 rounded-lg">Kobo Books</div>
            <div class="py-3 px-4 border border-slate-200 dark:border-slate-800 rounded-lg">Apple Books</div>
        </div>
    </section>

    <!-- Voices of Appreciation -->
    <section
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-white dark:bg-slate-900 border-y border-slate-200 dark:border-slate-800 transition-colors">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span
                    class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Achievements</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                    Voices of Appreciation</h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-2">Literary medals and partner recognitions received by
                    our catalog titles.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 text-center">
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span class="text-2xl block">🏆</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white">Independent Press Award</h4>
                    <p class="text-[11px] text-slate-500">Selected as a premier publishing design platform (2025).</p>
                </div>
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span class="text-2xl block">⭐</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white">Trustpilot 4.9 Rating</h4>
                    <p class="text-[11px] text-slate-500">High-score ratings verified by our author community.</p>
                </div>
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span class="text-2xl block">🎖️</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white">Literary Layout Medal</h4>
                    <p class="text-[11px] text-slate-500">Commended for publishing high-end children's layouts.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Writers Choose Our House (Second Layout: Comparative Table) -->
    <section
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Comparative Audit</span>
            <h2
                class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                Why Writers Choose Our House</h2>
            <p class="text-xs sm:text-sm text-slate-400 mt-2">See how publishing rates contrast against traditional
                houses.</p>
        </div>

        <!-- Comparison Table -->
        <div
            class="overflow-hidden rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[600px] text-left border-collapse text-xs sm:text-sm">
                    <thead>
                        <tr class="bg-slate-900 dark:bg-slate-950 text-white">
                            <th class="p-4 sm:p-5 font-bold">Feature Details</th>
                            <th class="p-4 sm:p-5 font-bold text-blue-400">Books Academy</th>
                            <th class="p-4 sm:p-5 font-bold">Traditional Houses</th>
                            <th class="p-4 sm:p-5 font-bold">Standard Self-Pubs</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-150 dark:divide-slate-800 text-slate-600 dark:text-slate-300">
                        <tr>
                            <td class="p-4 sm:p-5 font-bold text-slate-900 dark:text-white">Book Copyrights</td>
                            <td class="p-4 sm:p-5 text-blue-600 dark:text-blue-400 font-bold">100% Author Owned</td>
                            <td class="p-4 sm:p-5 text-slate-400">Assigned to Publisher</td>
                            <td class="p-4 sm:p-5 text-slate-400">Partial Control</td>
                        </tr>
                        <tr>
                            <td class="p-4 sm:p-5 font-bold text-slate-900 dark:text-white">Author Royalties</td>
                            <td class="p-4 sm:p-5 text-blue-600 dark:text-blue-400 font-bold">Up to 85% Net</td>
                            <td class="p-4 sm:p-5 text-slate-400">8% to 15% Net</td>
                            <td class="p-4 sm:p-5 text-slate-400">30% to 50% Net</td>
                        </tr>
                        <tr>
                            <td class="p-4 sm:p-5 font-bold text-slate-900 dark:text-white">Design & Formatting</td>
                            <td class="p-4 sm:p-5 text-blue-600 dark:text-blue-400 font-bold">Artist Collaborations</td>
                            <td class="p-4 sm:p-5 text-slate-400">Publisher Decisions Only</td>
                            <td class="p-4 sm:p-5 text-slate-400">Standard Web Templates</td>
                        </tr>
                        <tr>
                            <td class="p-4 sm:p-5 font-bold text-slate-900 dark:text-white">Wholesale Placements</td>
                            <td class="p-4 sm:p-5 text-blue-600 dark:text-blue-400 font-bold">Global 1-Click Launch</td>
                            <td class="p-4 sm:p-5 text-slate-400">Selective Distribution</td>
                            <td class="p-4 sm:p-5 text-slate-400">Validation Failures Common</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Bookstore Section -->
    <section id="bookstore"
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 transition-colors">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span
                    class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Catalog</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                    Browse the Academy Bookstore</h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-2">Acquire physical paperbacks or download direct eBooks.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                <!-- Book Card 1 -->
                <div
                    class="group flex flex-col bg-slate-50 dark:bg-slate-950 border border-slate-200/60 dark:border-slate-800/60 rounded-xl overflow-hidden">
                    <div class="aspect-[4/5] overflow-hidden bg-slate-100 relative">
                        <img src="/images/book_coding.png" alt="Mastering Modern Code"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <span
                            class="text-[9px] uppercase font-bold text-blue-600 dark:text-blue-400 block mb-1">Development</span>
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-2">Mastering Modern Code</h3>
                        <p class="text-slate-400 text-[11px] leading-relaxed mb-4 flex-1">Advanced patterns, systems
                            design, and functional frameworks.</p>
                        <div
                            class="flex items-center justify-between pt-3 border-t border-slate-200/50 dark:border-slate-800/50 mt-auto">
                            <span class="text-sm font-bold text-slate-950 dark:text-white">$29.99</span>
                            <button
                                class="px-3 py-1.5 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-[10px] transition-colors">Buy
                                E-Book</button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 2 -->
                <div
                    class="group flex flex-col bg-slate-50 dark:bg-slate-950 border border-slate-200/60 dark:border-slate-800/60 rounded-xl overflow-hidden">
                    <div class="aspect-[4/5] overflow-hidden bg-slate-100 relative">
                        <img src="/images/book_design.png" alt="The Art of Visual Systems"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <span
                            class="text-[9px] uppercase font-bold text-rose-600 dark:text-rose-400 block mb-1">Design</span>
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-2">The Art of Visual Systems</h3>
                        <p class="text-slate-400 text-[11px] leading-relaxed mb-4 flex-1">Bauhaus systems, visual grid
                            structures, and layouts.</p>
                        <div
                            class="flex items-center justify-between pt-3 border-t border-slate-200/50 dark:border-slate-800/50 mt-auto">
                            <span class="text-sm font-bold text-slate-950 dark:text-white">$34.99</span>
                            <button
                                class="px-3 py-1.5 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-[10px] transition-colors">Buy
                                E-Book</button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 3 -->
                <div
                    class="group flex flex-col bg-slate-50 dark:bg-slate-950 border border-slate-200/60 dark:border-slate-800/60 rounded-xl overflow-hidden">
                    <div
                        class="aspect-[4/5] overflow-hidden bg-slate-900 flex items-center justify-center p-6 text-center text-white relative">
                        <div>
                            <p class="text-[8px] uppercase tracking-wider text-blue-400 mb-1">Business Scale</p>
                            <h4 class="text-base font-bold mb-2">Startup Scaleup</h4>
                            <p class="text-[8px] text-slate-400">By R. Cunningham</p>
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <span
                            class="text-[9px] uppercase font-bold text-indigo-600 dark:text-indigo-400 block mb-1">Business</span>
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-2">Startup Scaleup</h3>
                        <p class="text-slate-400 text-[11px] leading-relaxed mb-4 flex-1">Complete blueprint for
                            launching and expanding lean products.</p>
                        <div
                            class="flex items-center justify-between pt-3 border-t border-slate-200/50 dark:border-slate-800/50 mt-auto">
                            <span class="text-sm font-bold text-slate-950 dark:text-white">$24.99</span>
                            <button
                                class="px-3 py-1.5 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-[10px] transition-colors">Buy
                                E-Book</button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 4 -->
                <div
                    class="group flex flex-col bg-slate-50 dark:bg-slate-950 border border-slate-200/60 dark:border-slate-800/60 rounded-xl overflow-hidden">
                    <div
                        class="aspect-[4/5] overflow-hidden bg-slate-900 flex items-center justify-center p-6 text-center text-white relative">
                        <div>
                            <p class="text-[8px] uppercase tracking-wider text-amber-400 mb-1">Kids Story</p>
                            <h4 class="text-base font-bold mb-2">Little Bear's Forest</h4>
                            <p class="text-[8px] text-slate-400">By Martha Vance</p>
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <span
                            class="text-[9px] uppercase font-bold text-orange-600 dark:text-orange-400 block mb-1">Children's</span>
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-2">Little Bear's Forest</h3>
                        <p class="text-slate-400 text-[11px] leading-relaxed mb-4 flex-1">Beautiful illustrated
                            full-color children's tale of forest wildlife.</p>
                        <div
                            class="flex items-center justify-between pt-3 border-t border-slate-200/50 dark:border-slate-800/50 mt-auto">
                            <span class="text-sm font-bold text-slate-950 dark:text-white">$14.99</span>
                            <button
                                class="px-3 py-1.5 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-[10px] transition-colors">Buy
                                E-Book</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact-us"
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
        <div
            class="rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 p-8 sm:p-12 shadow-sm flex flex-col lg:flex-row gap-10 items-start">
            <div class="max-w-md space-y-4">
                <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Author
                    Consultations</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                    Ready to Publish Your Manuscript?</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Fill out our submission
                    consultation request form, and our publishing directors will reach out in under 24 hours.</p>
                <div class="space-y-2 pt-2 text-xs text-slate-400">
                    <p>📍 Literary Media Building, Floor 4, Seattle, WA</p>
                    <p>✉️ publishing@booksacademy.com</p>
                </div>
            </div>

            <div
                class="flex-1 w-full max-w-lg bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-850 rounded-lg p-6">
                <form onsubmit="event.preventDefault(); alert('Consultation request submitted!');" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase font-bold text-slate-400 mb-1.5">Author
                                Name</label>
                            <input type="text" placeholder="John Doe" required
                                class="w-full px-3.5 py-2.5 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:border-blue-600 focus:outline-none text-xs">
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase font-bold text-slate-400 mb-1.5">Email
                                Address</label>
                            <input type="email" placeholder="john@example.com" required
                                class="w-full px-3.5 py-2.5 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:border-blue-600 focus:outline-none text-xs">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase font-bold text-slate-400 mb-1.5">Genre Package
                            Type</label>
                        <select
                            class="w-full px-3.5 py-2.5 rounded border border-slate-200 dark:border-slate-800 bg-slate-900 text-white focus:outline-none text-xs">
                            <option value="children">Children's Books Package</option>
                            <option value="bw">Black & White Package</option>
                            <option value="color">Full Color Package</option>
                            <option value="marketing">Marketing Package</option>
                            <option value="addons">Custom Add-on Consultation</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] uppercase font-bold text-slate-400 mb-1.5">Manuscript
                            Synopsis</label>
                        <textarea placeholder="Describe your book structure..." rows="3"
                            class="w-full px-3.5 py-2.5 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:border-blue-600 focus:outline-none text-xs resize-none"></textarea>
                    </div>
                    <button type="submit"
                        class="w-full py-3 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition-colors">
                        Submit Consultation Request
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer
        class="mt-auto border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 transition-colors">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-10 flex flex-col md:flex-row items-center justify-between gap-6">
            <!-- Left brand -->
            <div class="flex items-center gap-2.5 font-bold text-slate-800 dark:text-white">
                <div class="w-7 h-7 rounded-lg bg-blue-600 flex items-center justify-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-16.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-16.25v14.25" />
                    </svg>
                </div>
                <span class="text-sm">Books<span class="text-blue-600 font-semibold">Academy</span></span>
            </div>

            <!-- Copyright -->
            <p class="text-xs text-slate-400">
                &copy; 2026 Books Academy Inc. All rights reserved. Laravel
                v{{ Illuminate\Foundation\Application::VERSION }}
            </p>

            <!-- Footer Links -->
            <div class="flex gap-4 text-xs text-slate-400">
                <a href="#" class="hover:text-blue-600 transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-blue-600 transition-colors">Terms of Service</a>
            </div>
        </div>
    </footer>

    <!-- Inline JavaScript for Interactivity -->
    <script>
        // Theme switcher logic removed

        // 2. Mock Video Play Logic
        function playMockVideo() {
            document.getElementById('video-overlay').classList.add('hidden');
            const player = document.getElementById('mock-video-player');
            player.classList.remove('hidden');
            player.play();
        }

        // 3. Highlight/Select Service
        const servicesData = {
            children: {
                title: "Children's Book Publishing Package",
                desc: "Perfect square and landscape sizes designed for nursery books, containing storyboard coordinates, proof checks, softcover prints, and artwork allocations.",
                points: ["Custom artist spreads", "Square size paper formats", "High-density color checks", "Paperback and hardcover options"]
            },
            bw: {
                title: "Black & White Publishing Package",
                desc: "Classic layout design crafted for memoirs, poetry, novels, and non-fiction. Features fine cream paper stock and elegant serif typeset grids.",
                points: ["Standard novel layout", "Copy-editor reviews", "eBook format conversions", "Worldwide distribution registries"]
            },
            color: {
                title: "Full Color Publishing Package",
                desc: "Ideal layout choice for cookbooks, travel collections, and graphic novels. Crisp, glossy covers alongside premium heavy-coated paper.",
                points: ["Coated paper stocks", "High-res color profiling", "Dustjacket options", "Artist layout proofing"]
            },
            marketing: {
                title: "Author Marketing Campaign Package",
                desc: "Launch campaigns to build immediate reader attention. Targeted media press releases, social assets, and Amazon keyword search optimization.",
                points: ["Social media campaign assets", "Global press releases wiring", "SEO search listings", "Wholesale bookstore requests"]
            },
            addons: {
                title: "Premium Publishing Add-ons",
                desc: "Optional configurations to secure additional rights, complete catalog registrations, record audiobook casts, or translate manuscripts.",
                points: ["Library of Congress filing", "ISBN allocation", "Audiobook recording setups", "Global translations index"]
            }
        };

        function highlightService(serviceId) {
            selectServiceCard(serviceId);
        }

        function selectServiceCard(serviceId) {
            const buttons = document.querySelectorAll('#services-selector button');
            const data = servicesData[serviceId];

            // Update tab buttons styles
            buttons.forEach(btn => {
                if (btn.id === `btn-srv-${serviceId}`) {
                    btn.className = "px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider border border-blue-600 bg-blue-600 text-white transition-all";
                } else {
                    btn.className = "px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-850 transition-all";
                }
            });

            // Update detail card content
            const container = document.getElementById('service-content-body');

            let pointsList = '';
            data.points.forEach(pt => {
                pointsList += `<li class="flex items-center gap-2">
                        <span class="text-blue-600 font-bold">✓</span>
                        <span>${pt}</span>
                    </li>`;
            });

            container.innerHTML = `
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">${data.title}</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">${data.desc}</p>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs text-slate-600 dark:text-slate-300">
                        ${pointsList}
                    </ul>
                    <div class="pt-4 flex items-center justify-between border-t border-slate-200 dark:border-slate-800 mt-2">
                        <span class="text-xs text-slate-400">Available globally</span>
                        <a href="#contact-us" class="px-4 py-2 rounded bg-slate-900 hover:bg-slate-800 dark:bg-white dark:hover:bg-slate-100 text-white dark:text-slate-900 font-bold text-xs transition-colors">Request Catalog Quote</a>
                    </div>
                `;
        }

        // Logo Animation Logic
        let logoAnimationComplete = false;

        function startLogoAnimation() {
            const logoContainer = document.getElementById('logo-container');
            const halfLeft = document.getElementById('logo-half-left');
            const halfRight = document.getElementById('logo-half-right');
            const logoLarge = document.getElementById('logo-large');

            if (logoContainer && halfLeft && halfRight && logoLarge) {
                // Reset scroll to top on start to align animations
                window.scrollTo(0, 0);

                // Step 1: Slide container up to upper center and fade in
                logoContainer.classList.remove('opacity-0');
                logoContainer.classList.add('opacity-100');
                logoContainer.style.transform = 'translateY(-50px)';

                // Step 2: Connect the logo halves in the middle
                halfLeft.style.transform = 'translateX(0)';
                halfLeft.style.opacity = '1';

                halfRight.style.transform = 'translateX(0)';
                halfRight.style.opacity = '1';

                // Step 3: Fade in unified static logo, hide sliding halves
                setTimeout(() => {
                    logoLarge.style.opacity = '1';
                    halfLeft.style.opacity = '0';
                    halfRight.style.opacity = '0';
                    setTimeout(() => {
                        halfLeft.style.display = 'none';
                        halfRight.style.display = 'none';
                        logoAnimationComplete = true; // Unlock scroll parallax
                        window.dispatchEvent(new Event('scroll')); // Initialize scroll state
                    }, 500);
                }, 1200);
            }
        }

        // Fullscreen Video Intro Logic
        const introSplash = document.getElementById('intro-splash');
        const introVideo = document.getElementById('intro-video');
        const skipIntroBtn = document.getElementById('skip-intro');

        // Prevent scrolling on load if splash is present
        if (introSplash) {
            document.body.classList.add('overflow-y-hidden');
        } else {
            // Trigger animation immediately if splash is not present
            setTimeout(startLogoAnimation, 100);
        }

        function hideIntro() {
            if (introSplash) {
                introSplash.classList.add('opacity-0', 'pointer-events-none');
                document.body.classList.remove('overflow-y-hidden');
                if (introVideo) {
                    introVideo.pause();
                }
                setTimeout(() => {
                    introSplash.style.display = 'none';
                }, 1000);

                // Start logo connection animation as intro transitions out
                startLogoAnimation();
            }
        }

        if (introSplash && introVideo) {
            introVideo.addEventListener('ended', hideIntro);
            if (skipIntroBtn) {
                skipIntroBtn.addEventListener('click', hideIntro);
            }
        }

        // Default show children's book package
        selectServiceCard('children');

        // Parallax Logo Scroll Animation
        window.addEventListener('scroll', () => {
            if (!logoAnimationComplete) return;

            const scrollY = window.scrollY;
            const logoLarge = document.getElementById('logo-large');
            const logoSmall = document.getElementById('logo-small');

            if (logoLarge && logoSmall) {
                // Parallax logic for large logo
                // Move it up slightly slower than the scroll, fade it out, and shrink it
                const parallaxY = scrollY * 0.35;
                const scale = Math.max(0.6, 1 - scrollY * 0.003);
                const opacityLarge = Math.max(0, 1 - scrollY * 0.015);

                logoLarge.style.transform = `translateY(-${parallaxY}px) scale(${scale})`;
                logoLarge.style.opacity = opacityLarge;

                // Fade in the small logo in the navbar when scrolled past threshold
                if (scrollY > 60) {
                    logoSmall.classList.remove('opacity-0', 'pointer-events-none', 'scale-95');
                    logoSmall.classList.add('opacity-100', 'scale-100');
                } else {
                    logoSmall.classList.add('opacity-0', 'pointer-events-none', 'scale-95');
                    logoSmall.classList.remove('opacity-100', 'scale-100');
                }
            }
        });

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOpenIcon = document.getElementById('menu-open-icon');
        const menuCloseIcon = document.getElementById('menu-close-icon');

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                menuOpenIcon.classList.toggle('hidden');
                menuCloseIcon.classList.toggle('hidden');
            });
        }

        // Close mobile menu when a link is clicked
        if (mobileMenu) {
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    menuOpenIcon.classList.remove('hidden');
                    menuCloseIcon.classList.add('hidden');
                });
            });
        }
    </script>
</body>

</html>