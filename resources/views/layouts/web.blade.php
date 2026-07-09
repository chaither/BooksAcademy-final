<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Books Academy — Professional Publishing House')</title>
    
    <!-- Primary Meta Tags -->
    <meta name="title" content="@yield('meta_title', 'Books Academy — Professional Publishing House')">
    <meta name="description" content="@yield('meta_description', 'Books Academy is a premier professional publishing house dedicated to helping authors refine, publish, and distribute their works globally. Turn your manuscript into a masterpiece.')">
    <meta name="keywords" content="@yield('meta_keywords', 'books academy, book publishing, self publishing, professional publisher, author services, print books, ebooks')">
    <meta name="author" content="Books Academy">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('canonical_url', url()->current())">
    <meta property="og:title" content="@yield('meta_title', 'Books Academy — Professional Publishing House')">
    <meta property="og:description" content="@yield('meta_description', 'Books Academy is a premier professional publishing house dedicated to helping authors refine, publish, and distribute their works globally. Turn your manuscript into a masterpiece.')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo1.png'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="@yield('canonical_url', url()->current())">
    <meta property="twitter:title" content="@yield('meta_title', 'Books Academy — Professional Publishing House')">
    <meta property="twitter:description" content="@yield('meta_description', 'Books Academy is a premier professional publishing house dedicated to helping authors refine, publish, and distribute their works globally. Turn your manuscript into a masterpiece.')">
    <meta property="twitter:image" content="@yield('og_image', asset('images/logo1.png'))">

    <link rel="icon" type="image/png" href="{{ asset('images/gold1.png') }}">

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
    class="bg-transparent text-slate-800 transition-colors duratiwon-200 selection:bg-blue-600 selection:text-white min-h-screen flex flex-col overflow-x-hidden"
    @if(request()->is('/'))
        style="background-image: url('{{ asset('images/cover9.png') }}'); background-size: cover; background-position: center; background-attachment: fixed; background-repeat: no-repeat;"
    @endif
>

    @if(request()->is('/'))
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
    @endif

    <!-- Navigation Bar -->
    <header id="main-navbar" class="sticky top-0 z-50 bg-[#06080b]/90 backdrop-blur-md transition-transform duration-300 w-full border-b border-transparent">
        <!-- Glowing Golden Line -->
        <div class="absolute bottom-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-[#C4A052]/80 to-transparent z-10"></div>
        <div class="absolute bottom-0 left-0 w-full h-[3px] bg-gradient-to-r from-transparent via-[#C4A052] to-transparent blur-[3px] opacity-40 z-0"></div>
        
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-4 lg:py-6 flex items-center justify-between relative">
            <!-- Navbar Logo -->
            <div class="relative h-14 lg:h-16 w-48 lg:w-56 xl:w-64 flex-shrink-0 flex items-center z-[100]">
                <a href="{{ url('/') }}" class="absolute -top-4 lg:-top-8 -left-2 hover:opacity-90 transition-opacity" id="nav-logo">
                    <img id="logo-small" src="{{ asset('images/gold1.png') }}" alt="BooksAcademy Logo Small"
                        class="h-20 lg:h-28 max-w-none w-auto object-contain opacity-0 scale-95 pointer-events-none transition-all duration-500 ease-out origin-left drop-shadow-[0_4px_20px_rgba(0,0,0,0.3)]">
                </a>
            </div>

            <!-- Middle Links -->
            <nav
                class="hidden lg:flex flex-1 items-center justify-center gap-6 xl:gap-10 text-sm lg:text-base font-serif z-0 px-4">
                <a href="{{ url('/') }}"
                    class="text-[#C4A052] hover:text-[#D4B886] transition-colors relative"
                    id="link-home">
                    Home
                    <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-6 h-[2px] bg-[#C4A052]"></span>
                </a>
                <a href="{{ url('/#about-us') }}" onclick="if(typeof hideIntro === 'function') hideIntro()"
                    class="text-slate-200 hover:text-[#C4A052] transition-colors"
                    id="link-about">About Us</a>

                <!-- Services Dropdown -->
                <div class="relative group/dropdown">
                    <button id="services-dropdown-btn"
                        class="flex items-center gap-1 text-slate-200 hover:text-[#C4A052] transition-colors focus:outline-none font-serif">
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
                        class="absolute left-0 mt-2 w-56 rounded-xl bg-white shadow-lg border border-slate-200 opacity-0 invisible group-hover/dropdown:opacity-100 group-hover/dropdown:visible transition-all duration-200 transform translate-y-1 group-hover/dropdown:translate-y-0 z-50 p-1.5 font-sans">
                        <a href="{{ route('services') }}" onclick="highlightService('children')"
                            class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-100 transition-colors text-xs font-semibold">
                            Children's Books Publishing
                        </a>
                        <a href="{{ route('services') }}" onclick="highlightService('bw')"
                            class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-100 transition-colors text-xs font-semibold">
                            Black & White Publishing
                        </a>
                        <a href="{{ route('services') }}" onclick="highlightService('color')"
                            class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-100 transition-colors text-xs font-semibold">
                            Full Color Publishing
                        </a>
                        <div class="h-px bg-slate-200 my-1.5"></div>
                        <a href="{{ route('services') }}" onclick="highlightService('marketing')"
                            class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-100 transition-colors text-xs font-semibold">
                            Marketing Campaigns
                        </a>
                        <a href="{{ route('services') }}" onclick="highlightService('addons')"
                            class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-100 transition-colors text-xs font-semibold">
                            Premium Add-ons
                        </a>
                    </div>
                </div>

                <a href="{{ route('bookstore') }}"
                    class="text-slate-200 hover:text-[#C4A052] transition-colors"
                    id="link-bookstore">Bookstore</a>
                <a href="{{ route('pressroom') }}"
                    class="text-slate-200 hover:text-[#C4A052] transition-colors"
                    id="link-pressroom">Pressroom</a>
                <a href="{{ route('contact') }}"
                    class="text-slate-200 hover:text-[#C4A052] transition-colors"
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
                                class="px-4 py-2 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-semibold text-xs transition-colors"
                                id="btn-dashboard">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="flex items-center gap-1.5 px-5 py-2 rounded-full border border-[#C4A052] text-[#C4A052] hover:bg-[#C4A052] hover:text-[#06080b] transition-colors text-sm font-serif tracking-wide"
                                id="btn-login">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                Log in
                            </a>
                            {{-- @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs transition-all shadow-sm"
                                    id="btn-register">
                                    Register
                                </a>
                            @endif --}}
                        @endauth
                    </div>
                @endif

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" type="button"
                    class="lg:hidden flex items-center justify-center p-2 rounded-lg text-white hover:bg-white/10 transition-colors focus:outline-none"
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
                <a href="{{ url('/') }}"
                    class="block px-3 py-2.5 rounded-md text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">Home</a>
                <a href="{{ url('/#about-us') }}" onclick="if(typeof hideIntro === 'function') hideIntro()"
                    class="block px-3 py-2.5 rounded-md text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">About
                    Us</a>
                <a href="{{ route('services') }}"
                    class="block px-3 py-2.5 rounded-md text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">Services</a>
                <a href="{{ route('bookstore') }}"
                    class="block px-3 py-2.5 rounded-md text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">Bookstore</a>
                <a href="{{ route('pressroom') }}"
                    class="block px-3 py-2.5 rounded-md text-sm font-semibold text-slate-700 hover:text-blue-600 hover:bg-slate-50 transition-colors">Pressroom</a>
                <a href="{{ route('contact') }}"
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

    <main>
        @yield('content')
    </main>
    <!-- Footer -->
    <x-footer />

    <!-- Inline JavaScript for Interactivity -->
    <script>
        // Theme switcher logic removed



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
                    btn.className = "px-5 py-2.5 rounded-full text-xs font-medium uppercase tracking-wider border border-[#C4A052] bg-[#C4A052] text-[#0a0502] hover:shadow-[0_0_15px_rgba(196,160,82,0.3)] transition-all";
                } else {
                    btn.className = "px-5 py-2.5 rounded-full text-xs font-medium uppercase tracking-wider border border-white/10 text-slate-300 hover:border-[#C4A052] hover:text-[#C4A052] transition-all";
                }
            });

            // Update detail card content
            const container = document.getElementById('service-content-body');
            if (!container) return;

            let pointsList = '';
            data.points.forEach(pt => {
                pointsList += `<li class="flex items-center gap-2">
                        <span class="text-[#C4A052] font-bold">✓</span>
                        <span class="text-slate-300">${pt}</span>
                    </li>`;
            });

            container.innerHTML = `
                    <h3 class="text-2xl font-serif font-bold text-white mb-2 drop-shadow-sm">${data.title}</h3>
                    <p class="text-sm text-slate-400 leading-relaxed mb-6">${data.desc}</p>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        ${pointsList}
                    </ul>
                    <div class="pt-6 mt-6 flex items-center justify-between border-t border-white/10">
                        <span class="text-xs text-slate-400 uppercase tracking-wider font-bold">Available globally</span>
                        <a href="#contact-us" class="px-6 py-2.5 rounded-full bg-[#C4A052] hover:bg-[#d4b05e] text-[#0a0502] font-bold text-xs uppercase tracking-wider transition-colors shadow-[0_0_15px_rgba(196,160,82,0.2)]">Request Quote</a>
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
                // Reset scroll to top on start to align animations, unless a hash is present
                if (!window.location.hash) {
                    window.scrollTo(0, 0);
                }

                // Step 1: Slide container up to upper center and fade in
                logoContainer.classList.remove('opacity-0');
                logoContainer.classList.add('opacity-100');
                logoContainer.style.transform = 'translateY(-50px)';

                const heroContent = document.getElementById('hero-content');
                if(heroContent) {
                    heroContent.classList.remove('opacity-0');
                    heroContent.classList.add('opacity-100');
                }

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

        function hideIntro() {
            if (introSplash) {
                introSplash.classList.add('opacity-0', 'pointer-events-none');
                document.body.classList.remove('overflow-y-hidden');
                
                if (window.location.hash) {
                    const target = document.querySelector(window.location.hash);
                    if (target) {
                        setTimeout(() => target.scrollIntoView(), 50);
                    }
                }

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

        const skipIntroHash = window.location.hash === '#about-us';

        // Prevent scrolling on load if splash is present
        if (introSplash && !skipIntroHash) {
            document.body.classList.add('overflow-y-hidden');
        } else if (introSplash && skipIntroHash) {
            introSplash.style.display = 'none';
            if (introVideo) introVideo.pause();
            setTimeout(startLogoAnimation, 100);
            
            setTimeout(() => {
                const target = document.querySelector(window.location.hash);
                if (target) target.scrollIntoView();
            }, 150);
        } else {
            // Trigger animation immediately if splash is not present
            setTimeout(startLogoAnimation, 100);
        }

        if (introSplash && introVideo && !skipIntroHash) {
            introVideo.addEventListener('ended', hideIntro);
            if (skipIntroBtn) {
                skipIntroBtn.addEventListener('click', hideIntro);
            }
        }

        // Default show children's book package
        selectServiceCard('children');

        let lastScrollY = window.scrollY;
        const mainNavbar = document.getElementById('main-navbar');

        // Parallax Logo Scroll Animation
        window.addEventListener('scroll', () => {
            if (!logoAnimationComplete) return;

            const scrollY = window.scrollY;
            
            // Navbar Hide/Show Logic
            if (mainNavbar) {
                if (scrollY > lastScrollY && scrollY > 80) {
                    // Scrolling down: hide
                    mainNavbar.classList.add('-translate-y-full');
                } else {
                    // Scrolling up: show
                    mainNavbar.classList.remove('-translate-y-full');
                }
                lastScrollY = scrollY;
            }

            const logoLarge = document.getElementById('logo-large');
            const logoSmall = document.getElementById('logo-small');
            const aboutUsSection = document.getElementById('about-us');

            if (logoLarge && logoSmall) {
                let opacityLarge = 1;
                let parallaxY = scrollY * 0.15; // gentle parallax
                
                if (aboutUsSection) {
                    const aboutUsTop = aboutUsSection.offsetTop;
                    // Start fading out when getting closer to the about us section
                    const triggerPoint = Math.max(0, aboutUsTop - window.innerHeight * 0.8);
                    
                    if (scrollY > triggerPoint) {
                        const fadeDistance = window.innerHeight * 0.3;
                        opacityLarge = Math.max(0, 1 - (scrollY - triggerPoint) / fadeDistance);
                    }
                } else {
                    // Fallback
                    opacityLarge = Math.max(0, 1 - scrollY * 0.015);
                    parallaxY = scrollY * 0.35;
                }

                logoLarge.style.transform = `translateY(-${parallaxY}px)`;
                logoLarge.style.opacity = opacityLarge;

                // Fade in the small logo in the navbar when scrolled past threshold
                if (scrollY > 150) {
                    logoSmall.classList.remove('opacity-0', 'pointer-events-none', 'scale-95');
                    logoSmall.classList.add('opacity-100', 'scale-100');
                } else {
                    logoSmall.classList.add('opacity-0', 'pointer-events-none', 'scale-95');
                    logoSmall.classList.remove('opacity-100', 'scale-100');
                }
            }

            // About Us Animations & Parallax
            if (aboutUsSection) {
                const rect = aboutUsSection.getBoundingClientRect();
                const col1 = document.getElementById('about-col-1');
                const col2 = document.getElementById('about-col-2');
                const col3 = document.getElementById('about-col-3');
                const banner = document.getElementById('about-banner');
                
                // If section is approaching or in viewport
                if (rect.top < window.innerHeight * 0.85) {
                    if (col1) col1.classList.remove('opacity-0', 'translate-y-10');
                    if (col2) col2.classList.remove('opacity-0', 'translate-y-10');
                    if (col3) col3.classList.remove('opacity-0', 'translate-y-10');
                    if (banner) banner.classList.remove('opacity-0', 'translate-y-10');
                    
                    // Parallax for the middle column (books)
                    if (col2 && rect.top < window.innerHeight && rect.bottom > 0) {
                        // Subtle parallax for the bookshelf
                        const boxParallax = Math.max(-40, Math.min(40, (rect.top - window.innerHeight/2) * 0.15));
                        col2.style.transform = `translateY(${boxParallax}px)`;
                    }
                }
            }

            // Latest Happenings Animations
            const happeningsSection = document.getElementById('latest-happenings');
            if (happeningsSection) {
                const rect = happeningsSection.getBoundingClientRect();
                if (rect.top < window.innerHeight * 0.85) {
                    ['happenings-header', 'happening-card-1', 'happening-card-2', 'happening-card-3'].forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.classList.remove('opacity-0', 'translate-y-10');
                    });
                }
            }
        });

        // Testimonial Carousel Logic
        const testimonials = [
            {
                text: "Books Academy made my publishing journey smooth, professional, and truly empowering.",
                author: "Sarah J., Published Author"
            },
            {
                text: "The sheer level of detail and control I was given over my own manuscript was unparalleled.",
                author: "Marcus T., Best-Selling Novelist"
            },
            {
                text: "Finally, a publisher that understands the modern author's need for direct distribution.",
                author: "Elena R., Independent Writer"
            }
        ];
        
        let currentTestimonialIndex = 0;
        const testimonialContent = document.getElementById('testimonial-content');
        const testimonialText = document.getElementById('testimonial-text');
        const testimonialAuthor = document.getElementById('testimonial-author');
        const testimonialPrev = document.getElementById('testimonial-prev');
        const testimonialNext = document.getElementById('testimonial-next');
        const testimonialDots = document.querySelectorAll('#testimonial-dots button');

        function updateTestimonial(index) {
            if (!testimonialContent) return;
            
            // Fade out
            testimonialContent.classList.remove('opacity-100');
            testimonialContent.classList.add('opacity-0');
            
            setTimeout(() => {
                // Update text
                testimonialText.textContent = testimonials[index].text;
                testimonialAuthor.textContent = "- " + testimonials[index].author;
                
                // Update dots
                testimonialDots.forEach((dot, i) => {
                    if (i === index) {
                        dot.classList.remove('bg-slate-300');
                        dot.classList.add('bg-slate-800', 'dark:bg-white');
                    } else {
                        dot.classList.remove('bg-slate-800', 'dark:bg-white');
                        dot.classList.add('bg-slate-300', 'dark:bg-slate-700');
                    }
                });
                
                // Fade in
                testimonialContent.classList.remove('opacity-0');
                testimonialContent.classList.add('opacity-100');
            }, 300);
        }

        if (testimonialPrev && testimonialNext && testimonialDots.length > 0) {
            testimonialPrev.addEventListener('click', () => {
                currentTestimonialIndex = (currentTestimonialIndex - 1 + testimonials.length) % testimonials.length;
                updateTestimonial(currentTestimonialIndex);
            });

            testimonialNext.addEventListener('click', () => {
                currentTestimonialIndex = (currentTestimonialIndex + 1) % testimonials.length;
                updateTestimonial(currentTestimonialIndex);
            });

            testimonialDots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    currentTestimonialIndex = index;
                    updateTestimonial(currentTestimonialIndex);
                });
            });
        }

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