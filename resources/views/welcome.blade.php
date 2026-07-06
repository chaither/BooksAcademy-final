@extends('layouts.web')

@section('title', 'Books Academy — Your Gateway to Professional Publishing')
@section('meta_title', 'Books Academy — Your Gateway to Professional Publishing')
@section('meta_description', 'Discover Books Academy, where we transform your manuscript into a beautifully published book. We offer premium publishing services, global distribution, and professional design.')
@section('meta_keywords', 'publish book, professional publishing, authors academy, book distribution, book design')

@section('content')
    <!-- Left Aligned Large Logo and Hero Content -->
    <section
        class="relative w-full min-h-[100dvh] flex flex-col justify-between -mt-24 pt-24 pb-4 px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">

        <!-- Top Hero Content -->
        <div
            class="w-full max-w-7xl mx-auto flex-1 flex flex-col items-center justify-center sm:mt-8 z-10 px-4 text-center">
            <div class="max-w-3xl flex flex-col items-center space-y-6">
                <!-- Welcome text -->
                <div class="inline-flex items-center justify-center gap-4">
                    <div class="h-[2px] w-8 sm:w-12 bg-[#C4A052]"></div>
                    <h4 class="text-xs sm:text-sm font-bold tracking-[0.25em] text-[#E5D3B3] uppercase">Welcome To</h4>
                    <div class="h-[2px] w-8 sm:w-12 bg-[#C4A052]"></div>
                </div>

                <!-- Logo replaces BOOKS ACADEMY text -->
                <div id="logo-container"
                    class="relative -left-4 sm:-left-8 md:-left-12 lg:-left-16 w-full max-w-[350px] sm:max-w-[450px] md:max-w-[600px] lg:max-w-[700px] opacity-0 transition-all duration-[1200ms] ease-out flex justify-start self-start"
                    style="transform: translateY(30px); will-change: transform, opacity;">
                    <img id="logo-large" src="{{ asset('images/cover8.png') }}" alt="BooksAcademy Logo Large"
                        class="h-auto w-full object-contain object-left opacity-0 transition-opacity duration-500 will-change-transform">

                    <img id="logo-half-left" src="{{ asset('images/cover8.png') }}" alt="BooksAcademy Logo Left"
                        class="absolute inset-0 h-auto w-full object-contain logo-half"
                        style="clip-path: inset(0 50% 0 0); transform: translateX(-40px); opacity: 0; transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1), opacity 1.2s ease-out;">

                    <img id="logo-half-right" src="{{ asset('images/cover8.png') }}" alt="BooksAcademy Logo Right"
                        class="absolute inset-0 h-auto w-full object-contain logo-half"
                        style="clip-path: inset(0 0 0 50%); transform: translateX(60px); opacity: 0; transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1), opacity 1.2s ease-out;">
                </div>
            </div>

            <div class="-mt-6 sm:-mt-10 lg:-mt-8 flex flex-col items-center text-center opacity-0 transition-opacity duration-[1500ms] delay-700 fade-in-up"
                id="hero-content">
                <p class="text-[15px] sm:text-base md:text-lg text-white mb-2 font-serif tracking-wide">
                    Empowering writers. Enriching readers.
                </p>
                <p class="text-[14px] sm:text-sm md:text-base text-gray-300 font-serif tracking-wide">
                    We publish exceptional stories and build a legacy of literary brilliance.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6 mt-6">
                    <a href="{{ route('services') }}"
                        class="px-8 py-3.5 rounded bg-[#bd9a55] text-white text-xs sm:text-[13px] font-bold tracking-wider hover:bg-[#a88849] transition-colors flex items-center justify-center gap-2 shadow-lg shadow-[#bd9a55]/20 font-sans">
                        EXPLORE OUR SERVICES <span class="font-normal">&rarr;</span>
                    </a>
                    <a href="{{ route('bookstore') }}"
                        class="px-8 py-3.5 rounded border border-[#bd9a55] text-[#e6d3af] text-xs sm:text-[13px] font-bold tracking-wider hover:bg-[#bd9a55]/10 transition-colors flex items-center justify-center gap-2 font-sans">
                        VISIT BOOKSTORE <span class="font-normal">&rarr;</span>
                    </a>
                </div>
            </div>

        </div>

        <!-- Premium Book Showcase -->
        <div class="w-full relative mt-1 mb-2 sm:mb-1 pt-4 pb-0 z-20 overflow-visible">

            <div class="swiper book-showcase-swiper relative z-10 max-w-[1000px] mx-auto">
                <div class="swiper-wrapper flex items-end">
                    @php
                        // Array of book images - easily replaceable with dynamic data
                        $showcaseBooks = [
                            'images/A-20.png',
                            'images/A-7.png',
                            'images/A-3.png',
                            'images/A-4.png',
                            'images/A-5.png',
                            'images/A-6.png',
                            'images/A-2.png',
                            'images/A-8.png',
                            'images/A-9.png',
                            'images/A-10.png',
                            'images/A-11.png',
                            'images/A-12.png',
                            'images/A-13.png',
                            'images/A-14.png',
                            'images/A-15.png',
                            'images/A-16.png',
                            'images/A-17.png',
                            'images/A-18.png',
                            'images/A-19.png',
                            'images/A-1.png',
                            'images/A-21.png',
                            'images/A-25.png',
                            'images/A-23.png',
                            'images/A-24.png',
                            'images/A-22.png',
                            'images/A-26.png',


                        ];
                    @endphp

                    @foreach($showcaseBooks as $index => $bookImg)
                        <div class="swiper-slide cursor-pointer flex items-center justify-center">
                            <div class="book-3d-showcase group">
                                <div class="book-face book-front">
                                    <img loading="lazy" src="{{ asset($bookImg) }}" class="w-full h-full object-fill" alt="Premium Book {{ $index + 1 }}">
                                    <div class="absolute inset-0 bg-gradient-to-tr from-black/30 via-transparent to-white/10 pointer-events-none"></div>
                                </div>
                                <div class="book-face book-back"></div>
                                <div class="book-face book-spine"></div>
                                <div class="book-face book-pages-right"></div>
                                <div class="book-face book-pages-top"></div>
                                <div class="book-face book-pages-bottom"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Removed Shelf Graphic -->
            </div>
        </div>

        <!-- Bottom Feature Columns (Over dark blue wave) -->
        <div class="relative w-full max-w-6xl mx-auto -mt-8 sm:-mt-12 lg:-mt-8 pt-4 pb-12 z-10">
            <!-- Continuous Horizontal Line (Desktop) -->
            <div
                class="hidden lg:block absolute top-[100px] left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-[#C4A052]/40 to-transparent z-0">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 text-center z-10">

                <!-- Feature 1 -->
                <div class="flex flex-col items-center relative py-4">
                    <!-- Icon Container -->
                    <div class="relative mb-8">
                        <div
                            class="relative w-[84px] h-[84px] rounded-full bg-[#121824] border border-[#a68242] flex items-center justify-center shadow-lg">
                            <div
                                class="w-[66px] h-[66px] rounded-full border-[2px] border-[#d6b772] flex items-center justify-center bg-gradient-to-b from-[#1a2130] to-[#0a0d14]">
                                <!-- Feather Pen Icon -->
                                <svg class="w-7 h-7 text-[#d6b772]" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                    </path>
                                </svg>
                            </div>
                            <!-- Glowing bottom dot -->
                            <div
                                class="absolute -bottom-1.5 left-1/2 -translate-x-1/2 w-3 h-3 bg-[#ffeaad] blur-[2px] rounded-full z-10">
                            </div>
                            <div
                                class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-1.5 h-1.5 bg-white rounded-full shadow-[0_0_8px_2px_#ffeaad] z-20">
                            </div>
                        </div>
                    </div>

                    <!-- Text Content -->
                    <div class="px-4">
                        <h5 class="text-[#d6b772] text-[13px] font-serif uppercase tracking-widest mb-3">Expert Publishing
                        </h5>
                        <p class="text-[11px] text-[#9ca3af] leading-relaxed">Professional publishing<br>with a personal
                            touch.</p>
                    </div>

                    <!-- Right Divider & Star (Desktop) -->
                    <div
                        class="hidden lg:block absolute right-0 top-0 bottom-0 w-[1px] bg-gradient-to-b from-transparent via-[#C4A052]/30 to-transparent">
                    </div>
                    <div
                        class="hidden lg:flex absolute -right-[7px] top-[93px] w-[15px] h-[15px] items-center justify-center text-[#ffeaad] z-20 drop-shadow-[0_0_6px_#C4A052]">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-full h-full">
                            <path d="M12 0L13.5 10.5L24 12L13.5 13.5L12 24L10.5 13.5L0 12L10.5 10.5Z" />
                        </svg>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="flex flex-col items-center relative py-4">
                    <!-- Icon Container -->
                    <div class="relative mb-8">
                        <div
                            class="relative w-[84px] h-[84px] rounded-full bg-[#121824] border border-[#a68242] flex items-center justify-center shadow-lg">
                            <div
                                class="w-[66px] h-[66px] rounded-full border-[2px] border-[#d6b772] flex items-center justify-center bg-gradient-to-b from-[#1a2130] to-[#0a0d14]">
                                <!-- Book Icon -->
                                <svg class="w-7 h-7 text-[#d6b772]" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <!-- Glowing bottom dot -->
                            <div
                                class="absolute -bottom-1.5 left-1/2 -translate-x-1/2 w-3 h-3 bg-[#ffeaad] blur-[2px] rounded-full z-10">
                            </div>
                            <div
                                class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-1.5 h-1.5 bg-white rounded-full shadow-[0_0_8px_2px_#ffeaad] z-20">
                            </div>
                        </div>
                    </div>

                    <!-- Text Content -->
                    <div class="px-4">
                        <h5 class="text-[#d6b772] text-[13px] font-serif uppercase tracking-widest mb-3">Author Support</h5>
                        <p class="text-[11px] text-[#9ca3af] leading-relaxed">Guiding authors from<br>manuscript to
                            masterpiece.</p>
                    </div>

                    <!-- Right Divider & Star (Desktop) -->
                    <div
                        class="hidden lg:block absolute right-0 top-0 bottom-0 w-[1px] bg-gradient-to-b from-transparent via-[#C4A052]/30 to-transparent">
                    </div>
                    <div
                        class="hidden lg:flex absolute -right-[7px] top-[93px] w-[15px] h-[15px] items-center justify-center text-[#ffeaad] z-20 drop-shadow-[0_0_6px_#C4A052]">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-full h-full">
                            <path d="M12 0L13.5 10.5L24 12L13.5 13.5L12 24L10.5 13.5L0 12L10.5 10.5Z" />
                        </svg>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="flex flex-col items-center relative py-4">
                    <!-- Icon Container -->
                    <div class="relative mb-8">
                        <div
                            class="relative w-[84px] h-[84px] rounded-full bg-[#121824] border border-[#a68242] flex items-center justify-center shadow-lg">
                            <div
                                class="w-[66px] h-[66px] rounded-full border-[2px] border-[#d6b772] flex items-center justify-center bg-gradient-to-b from-[#1a2130] to-[#0a0d14]">
                                <!-- Star Icon -->
                                <svg class="w-7 h-7 text-[#d6b772]" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                    </path>
                                </svg>
                            </div>
                            <!-- Glowing bottom dot -->
                            <div
                                class="absolute -bottom-1.5 left-1/2 -translate-x-1/2 w-3 h-3 bg-[#ffeaad] blur-[2px] rounded-full z-10">
                            </div>
                            <div
                                class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-1.5 h-1.5 bg-white rounded-full shadow-[0_0_8px_2px_#ffeaad] z-20">
                            </div>
                        </div>
                    </div>

                    <!-- Text Content -->
                    <div class="px-4">
                        <h5 class="text-[#d6b772] text-[13px] font-serif uppercase tracking-widest mb-3">Quality &
                            Excellence</h5>
                        <p class="text-[11px] text-[#9ca3af] leading-relaxed">Committed to the highest<br>standards in every
                            book.</p>
                    </div>

                    <!-- Right Divider & Star (Desktop) -->
                    <div
                        class="hidden lg:block absolute right-0 top-0 bottom-0 w-[1px] bg-gradient-to-b from-transparent via-[#C4A052]/30 to-transparent">
                    </div>
                    <div
                        class="hidden lg:flex absolute -right-[7px] top-[93px] w-[15px] h-[15px] items-center justify-center text-[#ffeaad] z-20 drop-shadow-[0_0_6px_#C4A052]">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-full h-full">
                            <path d="M12 0L13.5 10.5L24 12L13.5 13.5L12 24L10.5 13.5L0 12L10.5 10.5Z" />
                        </svg>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="flex flex-col items-center relative py-4">
                    <!-- Icon Container -->
                    <div class="relative mb-8">
                        <div
                            class="relative w-[84px] h-[84px] rounded-full bg-[#121824] border border-[#a68242] flex items-center justify-center shadow-lg">
                            <div
                                class="w-[66px] h-[66px] rounded-full border-[2px] border-[#d6b772] flex items-center justify-center bg-gradient-to-b from-[#1a2130] to-[#0a0d14]">
                                <!-- Shield Icon -->
                                <svg class="w-7 h-7 text-[#d6b772]" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <!-- Glowing bottom dot -->
                            <div
                                class="absolute -bottom-1.5 left-1/2 -translate-x-1/2 w-3 h-3 bg-[#ffeaad] blur-[2px] rounded-full z-10">
                            </div>
                            <div
                                class="absolute -bottom-1 left-1/2 -translate-x-1/2 w-1.5 h-1.5 bg-white rounded-full shadow-[0_0_8px_2px_#ffeaad] z-20">
                            </div>
                        </div>
                    </div>

                    <!-- Text Content -->
                    <div class="px-4">
                        <h5 class="text-[#d6b772] text-[13px] font-serif uppercase tracking-widest mb-3">Legacy Building
                        </h5>
                        <p class="text-[11px] text-[#9ca3af] leading-relaxed">Creating timeless stories<br>that inspire
                            generations.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about-us"
        class="relative py-24 xl:py-32 2xl:py-40 min-h-screen flex flex-col justify-center bg-[#0a0502] border-y border-[#C4A052]/20 transition-colors overflow-hidden">

        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/about.png') }}" alt="About Us Background"
                class="w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0502]/90 via-[#0a0502]/50 to-[#0a0502]/90"></div>
        </div>

        <!-- Main container -->
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 relative z-10 flex flex-col gap-16">

            <!-- Top 3 columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 lg:gap-8 items-start">

                <!-- Left Column: Who We Are -->
                <div class="space-y-8 opacity-0 transition-all duration-1000 ease-out translate-y-10" id="about-col-1">
                    <div class="space-y-4">
                        <span
                            class="text-[10px] font-bold text-[#C4A052] uppercase tracking-[0.25em] flex items-center gap-4">
                            <span class="w-8 h-[1px] bg-[#C4A052]"></span>
                            Who We Are
                        </span>
                        <h2 class="text-3xl sm:text-4xl xl:text-5xl font-serif text-white leading-[1.15]">
                            A Professional <br class="hidden lg:block">Academy for <br class="hidden lg:block">
                            <span class="italic text-[#C4A052]">Independent Authors</span>
                        </h2>
                    </div>

                    <p class="text-slate-300 leading-relaxed text-sm drop-shadow-md">
                        Books Academy bridges the gap between creators and global markets. We provide transparent
                        self-publishing solutions, expert editorial support, stunning design, and worldwide distribution to
                        help your book succeed.
                    </p>

                    <div class="flex flex-wrap items-center gap-4">
                        <a href="{{ route('services') }}"
                            class="px-6 py-3 rounded bg-[#C4A052] text-[#0a0502] text-xs font-bold hover:bg-[#D4B886] transition-colors flex items-center gap-2 shadow-[0_0_15px_rgba(196,160,82,0.3)]">
                            Explore Our Services <span class="text-[#0a0502]/70">&rarr;</span>
                        </a>
                        <button
                            class="px-6 py-3 rounded border border-[#C4A052]/50 text-slate-200 text-xs font-semibold hover:bg-[#C4A052]/10 transition-colors flex items-center gap-2">
                            <span
                                class="w-5 h-5 rounded-full bg-[#C4A052] text-white flex items-center justify-center text-[10px]">▶</span>
                            How It Works
                        </button>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-4 pt-6 mt-2">
                        <div
                            class="text-center sm:text-left space-y-2 relative sm:pr-4 border-b sm:border-b-0 border-[#C4A052]/20 pb-6 sm:pb-0">
                            <div
                                class="w-10 h-10 mx-auto sm:mx-0 rounded-full border border-[#C4A052]/40 flex items-center justify-center text-[#C4A052] bg-black/40 backdrop-blur-sm shadow-[0_0_10px_rgba(196,160,82,0.1)] mb-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <h5
                                class="font-bold text-[13px] sm:text-[11px] text-white uppercase tracking-widest drop-shadow-sm">
                                Author<br class="hidden sm:block">First</h5>
                            <p class="text-[11px] sm:text-[9px] text-slate-400 leading-tight">We protect your<br
                                    class="hidden sm:block">rights and royalties.</p>
                        </div>
                        <div
                            class="text-center sm:text-left space-y-2 relative sm:border-l border-b sm:border-b-0 border-[#C4A052]/20 pb-6 sm:pb-0 sm:pl-4">
                            <div
                                class="w-10 h-10 mx-auto sm:mx-0 rounded-full border border-[#C4A052]/40 flex items-center justify-center text-[#C4A052] bg-black/40 backdrop-blur-sm shadow-[0_0_10px_rgba(196,160,82,0.1)] mb-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                            <h5
                                class="font-bold text-[13px] sm:text-[11px] text-white uppercase tracking-widest drop-shadow-sm">
                                Expert<br class="hidden sm:block">Support
                            </h5>
                            <p class="text-[11px] sm:text-[9px] text-slate-400 leading-tight">From manuscript<br
                                    class="hidden sm:block">to marketplace.</p>
                        </div>
                        <div class="text-center sm:text-left space-y-2 relative sm:border-l border-[#C4A052]/20 sm:pl-4">
                            <div
                                class="w-10 h-10 mx-auto sm:mx-0 rounded-full border border-[#C4A052]/40 flex items-center justify-center text-[#C4A052] bg-black/40 backdrop-blur-sm shadow-[0_0_10px_rgba(196,160,82,0.1)] mb-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <h5
                                class="font-bold text-[13px] sm:text-[11px] text-white uppercase tracking-widest drop-shadow-sm">
                                Global<br class="hidden sm:block">Reach</h5>
                            <p class="text-[11px] sm:text-[9px] text-slate-400 leading-tight">Your book,<br
                                    class="hidden sm:block">worldwide.</p>
                        </div>
                    </div>
                </div>

                <!-- Middle Column: Bookshelf & Quote -->
                <div class="flex flex-col items-center opacity-0 transition-all duration-1000 ease-out translate-y-10 delay-200 mt-12 lg:mt-0"
                    id="about-col-2">
                    <span class="text-[10px] font-bold text-[#C4A052] uppercase tracking-[0.2em] mb-10 text-center">Featured
                        Books by our authors</span>

                    <!-- Bookshelf Container -->
                    <div class="relative w-full max-w-[380px] mx-auto flex items-end justify-center"
                        style="perspective: 1200px;">
                        <!-- Books -->
                        <div class="flex items-end justify-center gap-4 mb-[2px] relative z-10 w-full px-6">

                            <!-- Book 1: The Quiet Path -->
                            <div
                                class="group relative w-[30%] aspect-[2/3] rounded-r-md rounded-l-sm shadow-[-10px_10px_20px_rgba(0,0,0,0.4)] transform -rotate-2 hover:rotate-0 hover:-translate-y-4 transition-all duration-500 cursor-pointer overflow-hidden bg-[#e6dbcb] border-l-[3px] border-white/60">
                                <div
                                    class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400&q=80')] bg-cover bg-center opacity-50 mix-blend-multiply">
                                </div>
                                <div
                                    class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/40 via-white/10 to-transparent">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-white/20 opacity-0 group-hover:opacity-100 transition-opacity">
                                </div>

                                <div
                                    class="relative z-10 flex flex-col h-full items-center justify-start text-center p-3 pt-5">
                                    <span
                                        class="text-[14px] font-serif text-slate-900 leading-[1.1]">The<br>Quiet<br>Path</span>
                                    <span class="text-[6px] text-slate-800 mt-2 tracking-widest uppercase font-medium">A
                                        Journey Inward</span>
                                    <span
                                        class="mt-auto text-[7px] text-slate-900 font-bold tracking-[0.15em] uppercase pb-2">Lena
                                        Morgan</span>
                                </div>
                            </div>

                            <!-- Book 2: Beyond The Page -->
                            <div
                                class="group relative w-[38%] aspect-[2/3] rounded-r-md rounded-l-sm shadow-[-15px_15px_25px_rgba(0,0,0,0.6)] transform hover:-translate-y-5 transition-all duration-500 cursor-pointer z-10 overflow-hidden bg-[#0c162d] border-l-[3px] border-[#D4B886]/40 -translate-y-3">
                                <div
                                    class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1516979187457-637abb4f9353?w=400&q=80')] bg-cover bg-center opacity-40">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-[#0c162d] via-[#0c162d]/50 to-transparent">
                                </div>
                                <div
                                    class="absolute inset-y-0 left-0 w-4 bg-gradient-to-r from-black/60 via-white/10 to-transparent">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-white/10 opacity-0 group-hover:opacity-100 transition-opacity">
                                </div>

                                <div
                                    class="relative z-10 flex flex-col h-full items-center justify-start text-center p-3 pt-6">
                                    <span class="text-[15px] font-serif text-[#E5D3B3] leading-[1.2] mb-1">BEYOND<br>THE
                                        PAGE</span>
                                    <span class="text-[7px] text-slate-300 tracking-wider">Turning Ideas into<br>Lasting
                                        Impact</span>
                                    <div class="mt-auto mb-4 relative">
                                        <svg class="w-8 h-8 text-[#E5D3B3]" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                            </path>
                                        </svg>
                                        <div
                                            class="absolute top-0 left-1/2 -translate-x-1/2 w-3 h-3 bg-[#E5D3B3] rounded-full blur-[8px] opacity-80">
                                        </div>
                                    </div>
                                    <span
                                        class="text-[7px] text-[#E5D3B3] font-bold tracking-[0.15em] uppercase pb-2">Adrian
                                        Holloway</span>
                                </div>
                            </div>

                            <!-- Book 3: Waves of Change -->
                            <div
                                class="group relative w-[30%] aspect-[2/3] rounded-r-md rounded-l-sm shadow-[-10px_10px_20px_rgba(0,0,0,0.4)] transform rotate-2 hover:rotate-0 hover:-translate-y-4 transition-all duration-500 cursor-pointer overflow-hidden bg-[#264653] border-l-[3px] border-white/30">
                                <div
                                    class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1498673394965-85cb14905c89?w=400&q=80')] bg-cover bg-center opacity-50 mix-blend-screen">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-[#264653] via-transparent to-transparent">
                                </div>
                                <div
                                    class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/50 via-white/10 to-transparent">
                                </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-white/20 opacity-0 group-hover:opacity-100 transition-opacity">
                                </div>

                                <div
                                    class="relative z-10 flex flex-col h-full items-center justify-start text-center p-3 pt-5">
                                    <span
                                        class="text-[13px] font-serif text-white uppercase tracking-wider leading-[1.2]">Waves
                                        of<br>Change</span>
                                    <span class="text-[6px] text-emerald-50 mt-2 tracking-widest font-light">Stories of
                                        Resilience<br>and Hope</span>
                                    <span
                                        class="mt-auto text-[7px] text-white font-bold tracking-[0.15em] uppercase pb-2">Maya
                                        Sterling</span>
                                </div>
                            </div>
                        </div>

                        <!-- Shelf Graphic -->
                        <div
                            class="absolute bottom-0 left-[-6%] right-[-6%] h-[14px] bg-[#1a1d24] rounded-full shadow-[0_10px_30px_rgba(0,0,0,0.4)] z-20 border-t border-white/10">
                        </div>
                    </div>

                    <!-- Shelf Glow (Yellow Light) -->
                    <div class="relative w-full flex justify-center h-32 -mt-1 pointer-events-none z-0">
                        <!-- Intense center strip right under the shelf -->
                        <div class="absolute top-0 w-28 h-4 bg-[#ffe299] opacity-70 blur-[8px]"></div>
                        <!-- Main light bulb glow -->
                        <div class="absolute top-0 w-48 h-20 bg-[#ffc642] opacity-40 blur-[24px] rounded-b-full"></div>
                        <!-- Wide diffused ambient light -->
                        <div
                            class="absolute top-0 w-[90%] h-32 bg-gradient-to-b from-[#C4A052]/20 via-[#C4A052]/5 to-transparent blur-[30px]">
                        </div>
                    </div>

                    <!-- Testimonial Quote -->
                    <div
                        class="text-center mt-10 space-y-4 relative w-full px-6 min-h-[130px] flex flex-col justify-center">
                        <span
                            class="absolute -top-6 left-4 text-5xl text-[#C4A052] opacity-30 font-serif leading-none">"</span>
                        <div id="testimonial-content" class="transition-opacity duration-300 opacity-100">
                            <p id="testimonial-text" class="text-xs text-slate-300 italic leading-relaxed drop-shadow-md">
                                Books Academy made my publishing journey smooth, professional, and truly empowering.
                            </p>
                            <p id="testimonial-author"
                                class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-4">- Sarah J.,
                                Published Author</p>
                        </div>

                        <div class="flex justify-between items-center w-full mt-2 absolute bottom-0 left-0 px-2 sm:px-6">
                            <button id="testimonial-prev"
                                class="w-10 h-10 sm:w-8 sm:h-8 rounded-full bg-slate-800 text-white flex items-center justify-center text-sm sm:text-xs hover:bg-[#C4A052] transition-colors shadow-lg focus:outline-none">&lt;</button>
                            <div class="flex justify-center gap-3 sm:gap-2" id="testimonial-dots">
                                <!-- Dots will be managed by JS -->
                                <button
                                    class="w-2 h-2 sm:w-1.5 sm:h-1.5 rounded-full bg-slate-800 transition-colors focus:outline-none"
                                    data-index="0"></button>
                                <button
                                    class="w-2 h-2 sm:w-1.5 sm:h-1.5 rounded-full bg-slate-300 transition-colors focus:outline-none"
                                    data-index="1"></button>
                                <button
                                    class="w-2 h-2 sm:w-1.5 sm:h-1.5 rounded-full bg-slate-300 transition-colors focus:outline-none"
                                    data-index="2"></button>
                            </div>
                            <button id="testimonial-next"
                                class="w-10 h-10 sm:w-8 sm:h-8 rounded-full bg-slate-800 text-white flex items-center justify-center text-sm sm:text-xs hover:bg-[#C4A052] transition-colors shadow-lg focus:outline-none">&gt;</button>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Core Foundations -->
                <div class="relative opacity-0 transition-all duration-1000 ease-out translate-y-10 delay-[400ms] mt-12 lg:mt-0"
                    id="about-col-3">
                    <div
                        class="p-8 rounded-2xl bg-black/50 backdrop-blur-md shadow-[0_0_30px_rgba(0,0,0,0.8)] space-y-8 relative overflow-hidden h-full flex flex-col border border-[#C4A052]/30">
                        <h3 class="font-bold text-[10px] text-white uppercase tracking-[0.2em] flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded bg-black/60 border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] shadow-inner shadow-black/50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            Core Foundations
                        </h3>

                        <ul class="space-y-6 flex-1">
                            <!-- Item 1 -->
                            <li class="flex items-start gap-4 pb-5 border-b border-[#C4A052]/20">
                                <div
                                    class="w-8 h-8 rounded-full bg-black/60 border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] flex-shrink-0 shadow-inner shadow-black/50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <strong class="text-white text-[13px] block mb-1">Full Intellectual Rights</strong>
                                    <span class="text-slate-400 text-[11px] leading-relaxed block">Authors retain 100%
                                        copyright ownership and metadata controls.</span>
                                </div>
                            </li>
                            <!-- Item 2 -->
                            <li class="flex items-start gap-4 pb-5 border-b border-[#C4A052]/20">
                                <div
                                    class="w-8 h-8 rounded-full bg-black/60 border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] flex-shrink-0 shadow-inner shadow-black/50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <strong class="text-white text-[13px] block mb-1">Editorial Excellence</strong>
                                    <span class="text-slate-400 text-[11px] leading-relaxed block">Advanced proofreading and
                                        editorial reviews before listing.</span>
                                </div>
                            </li>
                            <!-- Item 3 -->
                            <li class="flex items-start gap-4 pb-5 border-b border-[#C4A052]/20">
                                <div
                                    class="w-8 h-8 rounded-full bg-black/60 border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] flex-shrink-0 shadow-inner shadow-black/50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <strong class="text-white text-[13px] block mb-1">Global Distribution</strong>
                                    <span class="text-slate-400 text-[11px] leading-relaxed block">Immediate setups in
                                        Amazon KDP, Apple Books, Ingram, and more.</span>
                                </div>
                            </li>
                            <!-- Item 4 -->
                            <li class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 rounded-full bg-black/60 border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] flex-shrink-0 shadow-inner shadow-black/50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <strong class="text-white text-[13px] block mb-1">Transparent & Fair</strong>
                                    <span class="text-slate-400 text-[11px] leading-relaxed block">Clear processes, fair
                                        pricing, and dedicated support.</span>
                                </div>
                            </li>
                        </ul>

                        <div
                            class="mt-4 bg-gradient-to-r from-[#D4B886] to-[#C4A052] p-4 rounded-xl flex items-center justify-between cursor-pointer hover:shadow-[0_0_20px_rgba(196,160,82,0.4)] hover:-translate-y-0.5 transition-all group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded bg-black/20 flex items-center justify-center text-[#0a0502]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <strong class="text-[#0a0502] text-[11px] block mb-0.5">Ready to bring your book to
                                        life?</strong>
                                    <span class="text-[#0a0502]/80 text-[9px] block">Join thousands of authors who trust
                                        us.</span>
                                </div>
                            </div>
                            <div
                                class="w-7 h-7 rounded-full bg-[#0a0502] flex items-center justify-center text-[#C4A052] text-xs group-hover:translate-x-1 transition-transform">
                                &rarr;
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Banner Stats -->
            <div class="w-full bg-[#0a0502]/80 backdrop-blur-md rounded-2xl p-8 shadow-2xl opacity-0 transition-all duration-1000 ease-out translate-y-10 delay-[600ms] border border-[#C4A052]/30"
                id="about-banner">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-4 divide-x-0 md:divide-x divide-[#C4A052]/20">
                    <!-- Stat 1 -->
                    <div class="flex items-center justify-center gap-4 group cursor-default">
                        <div
                            class="w-10 h-10 rounded-full bg-[#1a110a] border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] group-hover:bg-[#C4A052] group-hover:text-[#1a110a] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <strong
                                class="text-[#D4B886] text-xl font-serif block group-hover:scale-105 transition-transform origin-left drop-shadow-md">1.5K+</strong>
                            <span class="text-slate-300 text-[9px] tracking-wider uppercase block mt-0.5">Published
                                Authors</span>
                        </div>
                    </div>
                    <!-- Stat 2 -->
                    <div class="flex items-center justify-center gap-4 md:pl-4 group cursor-default">
                        <div
                            class="w-10 h-10 rounded-full bg-[#1a110a] border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] group-hover:bg-[#C4A052] group-hover:text-[#1a110a] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <strong
                                class="text-[#D4B886] text-xl font-serif block group-hover:scale-105 transition-transform origin-left drop-shadow-md">2.3K+</strong>
                            <span class="text-slate-300 text-[9px] tracking-wider uppercase block mt-0.5">Books
                                Published</span>
                        </div>
                    </div>
                    <!-- Stat 3 -->
                    <div class="flex items-center justify-center gap-4 md:pl-4 group cursor-default">
                        <div
                            class="w-10 h-10 rounded-full bg-[#1a110a] border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] group-hover:bg-[#C4A052] group-hover:text-[#1a110a] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <strong
                                class="text-[#D4B886] text-xl font-serif block group-hover:scale-105 transition-transform origin-left drop-shadow-md">45</strong>
                            <span class="text-slate-300 text-[9px] tracking-wider uppercase block mt-0.5">Distribution
                                Networks</span>
                        </div>
                    </div>
                    <!-- Stat 4 -->
                    <div class="flex items-center justify-center gap-4 md:pl-4 group cursor-default">
                        <div
                            class="w-10 h-10 rounded-full bg-[#1a110a] border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] group-hover:bg-[#C4A052] group-hover:text-[#1a110a] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <strong
                                class="text-[#D4B886] text-xl font-serif block group-hover:scale-105 transition-transform origin-left drop-shadow-md">98%</strong>
                            <span class="text-slate-300 text-[9px] tracking-wider uppercase block mt-0.5">Author
                                Satisfaction</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <!-- Why Writers Choose Our House (Writer Experience) -->
    <section
        class="relative py-24 xl:py-32 2xl:py-40 min-h-screen flex flex-col justify-center overflow-hidden bg-[#0a0502] border-b border-[#C4A052]/20 transition-colors">

        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/writer.png') }}" alt="Background Texture"
                class="w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0a0502] via-[#0a0502]/70 to-[#0a0502]/40"></div>
        </div>

        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">

                <!-- Left Column -->
                <div class="space-y-8">
                    <!-- Headings -->
                    <div class="space-y-4">
                        <span class="text-[10px] font-bold text-[#C4A052] uppercase tracking-[0.2em]">Writer
                            Experience</span>
                        <h2
                            class="text-3xl sm:text-4xl lg:text-5xl font-serif text-white leading-[1.1] drop-shadow-md">
                            Full Control.<br><span class="text-white dark:text-[#C4A052]">Direct Distribution.</span>
                        </h2>
                        <div class="w-12 h-0.5 bg-[#C4A052] my-4"></div>
                        <p class="text-sm text-slate-300 leading-relaxed max-w-md pt-2">
                            Traditional publishing setups require full copyright signovers and return minimal net royalties.
                            Books Academy leaves creative control where it belongs—with the author.
                        </p>
                    </div>

                    <!-- List Items -->
                    <div class="space-y-6 pt-4">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-[#1a110a] border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] flex-shrink-0 shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Keep 100% of book permissions
                                </h4>
                                <p class="text-[11px] text-slate-400 mt-0.5">and copyright listings.</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-[#1a110a] border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] flex-shrink-0 shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Secure up to 85% royalties</h4>
                                <p class="text-[11px] text-slate-400 mt-0.5">on paperback and digital prints.</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 rounded-full bg-[#1a110a] border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] flex-shrink-0 shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Direct consulting with</h4>
                                <p class="text-[11px] text-slate-400 mt-0.5">dedicated design editors.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Card -->
                    <div
                        class="bg-black/50 backdrop-blur-md rounded-xl p-5 border border-[#C4A052]/20 flex items-center gap-6 mt-8 max-w-full sm:max-w-[420px] shadow-[0_0_20px_rgba(196,160,82,0.1)]">
                        <div
                            class="w-10 h-10 rounded-full bg-[#C4A052] flex items-center justify-center text-[#0a0502] flex-shrink-0 shadow-[0_0_15px_rgba(196,160,82,0.5)]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h5 class="text-[11px] font-bold text-white">Your story. Your rights. Our
                                platform.</h5>
                            <p class="text-[9px] text-slate-400 mt-0.5">We're here to empower your journey<br>from
                                manuscript to marketplace.</p>
                        </div>
                        <div class="text-[#C4A052] font-serif text-sm italic whitespace-nowrap transform -rotate-2 pr-2 drop-shadow-sm">
                            Let's publish<br>together.
                        </div>
                    </div>
                </div>

                <!-- Right Column (Large Card) -->
                <div
                    class="bg-black/60 backdrop-blur-xl rounded-[2rem] shadow-[0_0_40px_rgba(0,0,0,0.8)] p-8 lg:p-10 border border-[#C4A052]/30 relative overflow-hidden group hover:shadow-[0_0_50px_rgba(196,160,82,0.15)] transition-shadow duration-500">
                    <div class="mb-8 relative z-10">
                        <h3 class="text-3xl font-serif text-white leading-[1.2] drop-shadow-sm">Built for Authors.</h3>
                        <h3 class="text-3xl font-serif text-[#C4A052] italic leading-[1.2] drop-shadow-sm">Focused on You.</h3>
                        <div class="w-12 h-0.5 bg-[#C4A052] mt-5"></div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-8 relative z-10">
                        <!-- 100% -->
                        <div
                            class="bg-black/40 backdrop-blur-md rounded-2xl p-6 text-center border border-[#C4A052]/20 hover:border-[#C4A052]/50 shadow-sm hover:shadow-[0_0_15px_rgba(196,160,82,0.15)] transition-all group-hover:-translate-y-1 duration-300">
                            <div
                                class="w-10 h-10 mx-auto rounded-full border border-emerald-500/50 flex items-center justify-center text-emerald-400 mb-4 bg-[#1a110a]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-2xl font-bold text-white block drop-shadow-sm">100%</span>
                            <span
                                class="text-[7px] font-bold text-slate-300 uppercase tracking-widest mt-1.5 block">Author
                                Ownership</span>
                            <p class="text-[8px] text-slate-400 mt-2.5 leading-relaxed px-2">You keep 100% control of your
                                copyright and rights.</p>
                        </div>

                        <!-- 85% -->
                        <div
                            class="bg-black/40 backdrop-blur-md rounded-2xl p-6 text-center border border-[#C4A052]/20 hover:border-[#C4A052]/50 shadow-sm hover:shadow-[0_0_15px_rgba(196,160,82,0.15)] transition-all group-hover:-translate-y-1 duration-300 delay-75">
                            <div
                                class="w-10 h-10 mx-auto rounded-full border border-[#C4A052]/50 flex items-center justify-center text-[#C4A052] mb-4 bg-[#1a110a]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                            <span class="text-2xl font-bold text-white block drop-shadow-sm">85%</span>
                            <span
                                class="text-[7px] font-bold text-slate-300 uppercase tracking-widest mt-1.5 block">Net
                                Royalties</span>
                            <p class="text-[8px] text-slate-400 mt-2.5 leading-relaxed px-2">Earn up to 85% royalties on
                                paperback and digital prints.</p>
                        </div>

                        <!-- 24/7 -->
                        <div
                            class="bg-black/40 backdrop-blur-md rounded-2xl p-6 text-center border border-[#C4A052]/20 hover:border-[#C4A052]/50 shadow-sm hover:shadow-[0_0_15px_rgba(196,160,82,0.15)] transition-all group-hover:-translate-y-1 duration-300 delay-100">
                            <div
                                class="w-10 h-10 mx-auto rounded-full border border-blue-500/50 flex items-center justify-center text-blue-400 mb-4 bg-[#1a110a]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-2xl font-bold text-white block drop-shadow-sm">24/7</span>
                            <span
                                class="text-[7px] font-bold text-slate-300 uppercase tracking-widest mt-1.5 block">Author
                                Support</span>
                            <p class="text-[8px] text-slate-400 mt-2.5 leading-relaxed px-2">Our team is here for you,
                                anytime you need us.</p>
                        </div>

                        <!-- Ingram -->
                        <div
                            class="bg-black/40 backdrop-blur-md rounded-2xl p-6 text-center border border-[#C4A052]/20 hover:border-[#C4A052]/50 shadow-sm hover:shadow-[0_0_15px_rgba(196,160,82,0.15)] transition-all group-hover:-translate-y-1 duration-300 delay-150">
                            <div
                                class="w-10 h-10 mx-auto rounded-full border border-purple-500/50 flex items-center justify-center text-purple-400 mb-4 bg-[#1a110a]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                    </path>
                                </svg>
                            </div>
                            <span
                                class="text-2xl font-serif text-white block tracking-wide drop-shadow-sm">Ingram</span>
                            <span
                                class="text-[7px] font-bold text-slate-300 uppercase tracking-widest mt-1.5 block">Global
                                Distribution</span>
                            <p class="text-[8px] text-slate-400 mt-2.5 leading-relaxed px-2">Your book, available worldwide
                                through Ingram distribution.</p>
                        </div>
                    </div>

                    <!-- Bottom CTA Banner -->
                    <div
                        class="bg-[#0a0502] rounded-xl p-5 flex items-center justify-between shadow-inner transition-transform group-hover:scale-[1.02] duration-500 relative z-10 border border-[#C4A052]/20">
                        <div class="flex items-center gap-4">
                            <div class="text-[#C4A052]">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-[9px] text-slate-300 pr-4 border-r border-[#C4A052]/20 leading-relaxed">We
                                empower authors with the tools,<br>support, and freedom to succeed.</p>
                        </div>
                        <a href="#"
                            class="text-[10px] font-serif italic text-[#C4A052] hover:text-white transition-colors flex items-center gap-2 pr-2">
                            Start your<br>journey today &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Happenings Section -->
    <section id="latest-happenings"
        class="relative py-24 xl:py-32 2xl:py-40 border-b bg-[#0a0502] border-[#C4A052]/20 transition-colors overflow-hidden">

        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/latest.png') }}" alt="Latest Happenings Background"
                class="w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0502] via-[#0a0502]/60 to-[#0a0502]"></div>
        </div>

        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 relative z-10">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16 opacity-0 transition-all duration-1000 ease-out translate-y-10"
                id="happenings-header">
                <div class="space-y-4 max-w-xl">
                    <span class="text-[10px] font-bold text-[#C4A052] uppercase tracking-[0.25em] flex items-center gap-4">
                        <span class="w-8 h-[1px] bg-[#C4A052]"></span>
                        Stay Updated
                    </span>
                    <h2 class="text-4xl sm:text-5xl font-serif text-white leading-[1.1] drop-shadow-md">
                        Latest <span class="italic text-[#C4A052]">Happenings</span>
                    </h2>
                    <p class="text-[13px] text-slate-300 pt-2 leading-relaxed max-w-md">
                        News, events, and achievements—discover what's new in the world of books and beyond.
                    </p>
                </div>
                <a href="#"
                    class="inline-flex items-center gap-3 text-[10px] font-bold uppercase tracking-widest text-slate-300 hover:text-[#C4A052] transition-colors group">
                    View All Updates
                    <span
                        class="w-8 h-8 rounded-full border border-slate-600 flex items-center justify-center group-hover:border-[#C4A052] group-hover:text-[#C4A052] transition-all">&rarr;</span>
                </a>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <article
                    class="group bg-black/50 backdrop-blur-md rounded-3xl overflow-hidden hover:shadow-[0_0_30px_rgba(196,160,82,0.15)] transition-all duration-500 hover:-translate-y-2 opacity-0 translate-y-10 border border-[#C4A052]/30 hover:border-[#C4A052]/60"
                    id="happening-card-1">
                    <div class="aspect-[16/11] overflow-hidden relative p-3 pb-0">
                        <div class="w-full h-full rounded-2xl overflow-hidden relative border border-[#C4A052]/20">
                            <div
                                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=600&q=80')] bg-cover bg-center group-hover:scale-105 transition-transform duration-700">
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80">
                            </div>
                            <div class="absolute bottom-4 left-4">
                                <span
                                    class="px-4 py-1.5 bg-[#C4A052] text-[#0a0502] text-[9px] font-bold uppercase tracking-widest rounded-full shadow-[0_0_15px_rgba(196,160,82,0.5)]">Book
                                    Launch</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-[1px] bg-[#C4A052]"></div>
                            <time class="text-[9px] text-[#C4A052] font-bold uppercase tracking-widest block">Oct 24,
                                2026</time>
                        </div>
                        <h3
                            class="text-[22px] font-serif text-white group-hover:text-[#C4A052] transition-colors leading-[1.3] drop-shadow-sm">
                            <a href="#">"The Quiet Path" Reaches #1 on Bestseller List</a>
                        </h3>
                        <p class="text-xs text-slate-400 leading-relaxed line-clamp-3 pt-2">
                            Lena Morgan's breathtaking new release has captured the hearts of readers worldwide, securing
                            the top spot in literary fiction just one week after launch.
                        </p>
                    </div>
                </article>

                <!-- Card 2 -->
                <article
                    class="group bg-black/50 backdrop-blur-md rounded-3xl overflow-hidden hover:shadow-[0_0_30px_rgba(196,160,82,0.15)] transition-all duration-500 hover:-translate-y-2 opacity-0 translate-y-10 delay-[200ms] border border-[#C4A052]/30 hover:border-[#C4A052]/60"
                    id="happening-card-2">
                    <div class="aspect-[16/11] overflow-hidden relative p-3 pb-0">
                        <div class="w-full h-full rounded-2xl overflow-hidden relative border border-[#C4A052]/20">
                            <div
                                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1561489422-45de3d015e3e?w=600&q=80')] bg-cover bg-center group-hover:scale-105 transition-transform duration-700">
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80">
                            </div>
                            <div class="absolute bottom-4 left-4">
                                <span
                                    class="px-4 py-1.5 bg-[#1a110a] text-white text-[9px] font-bold uppercase tracking-widest rounded-full shadow-lg border border-[#C4A052]/50">Award</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-[1px] bg-[#C4A052]"></div>
                            <time class="text-[9px] text-[#C4A052] font-bold uppercase tracking-widest block">Oct 18,
                                2026</time>
                        </div>
                        <h3
                            class="text-[22px] font-serif text-white group-hover:text-[#C4A052] transition-colors leading-[1.3] drop-shadow-sm">
                            <a href="#">Books Academy Wins Publishing Excellence Award</a>
                        </h3>
                        <p class="text-xs text-slate-400 leading-relaxed line-clamp-3 pt-2">
                            We are honored to receive the prestigious 2026 Publishing Excellence Award for our unwavering
                            commitment to author rights and transparent publishing.
                        </p>
                    </div>
                </article>

                <!-- Card 3 -->
                <article
                    class="group bg-black/50 backdrop-blur-md rounded-3xl overflow-hidden hover:shadow-[0_0_30px_rgba(196,160,82,0.15)] transition-all duration-500 hover:-translate-y-2 opacity-0 translate-y-10 delay-[400ms] border border-[#C4A052]/30 hover:border-[#C4A052]/60"
                    id="happening-card-3">
                    <div class="aspect-[16/11] overflow-hidden relative p-3 pb-0">
                        <div class="w-full h-full rounded-2xl overflow-hidden relative border border-[#C4A052]/20">
                            <div
                                class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1515162816999-a0c47dc192f7?w=600&q=80')] bg-cover bg-center group-hover:scale-105 transition-transform duration-700">
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80">
                            </div>
                            <div class="absolute bottom-4 left-4">
                                <span
                                    class="px-4 py-1.5 bg-[#1a110a] text-white text-[9px] font-bold uppercase tracking-widest rounded-full shadow-lg border border-[#C4A052]/50">Event</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-[1px] bg-[#C4A052]"></div>
                            <time class="text-[9px] text-[#C4A052] font-bold uppercase tracking-widest block">Nov 05,
                                2026</time>
                        </div>
                        <h3
                            class="text-[22px] font-serif text-white group-hover:text-[#C4A052] transition-colors leading-[1.3] drop-shadow-sm">
                            <a href="#">Upcoming Masterclass: Building Your Author Brand</a>
                        </h3>
                        <p class="text-xs text-slate-400 leading-relaxed line-clamp-3 pt-2">
                            Join our expert panel for an exclusive online masterclass on how to build a resilient,
                            recognizable author brand in today's saturated digital marketplace.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- The Journey to Publication & Spotlight (Redesigned) -->
    <style>
        /* Journey Section Styles */
        #journey-section {
            background-color: #0a0502;
            position: relative;
            overflow: hidden;
        }

        /* Background elements */
        .journey-bg-paper {
            position: absolute;
            inset: 0;
            background-image: url('{{ asset('images/latest.png') }}');
            background-size: cover;
            background-position: center;
            opacity: 0.6;
            pointer-events: none;
        }

        .journey-bg-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(10, 5, 2, 0.9), rgba(10, 5, 2, 0.5), rgba(10, 5, 2, 0.9));
            pointer-events: none;
        }

        .journey-light {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }

        .journey-particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background-color: #C4A052;
            border-radius: 50%;
            box-shadow: 0 0 8px 2px rgba(196, 160, 82, 0.4);
            opacity: 0.6;
            pointer-events: none;
        }

        /* Timeline specific */
        .journey-card {
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(12px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.8);
            border: 1px solid rgba(196, 160, 82, 0.3);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: transform, opacity, filter;
            opacity: 0;
            /* Default Hidden State */
        }

        .journey-card:hover {
            transform: translateY(-12px) !important;
            /* Overrides floating */
            box-shadow: 0 22px 40px rgba(0, 0, 0, 0.9);
            border-color: rgba(196, 160, 82, 0.8);
        }

        .journey-card:hover .journey-icon-wrap {
            transform: rotate(8deg) scale(1.1);
            box-shadow: 0 0 15px rgba(196, 160, 82, 0.4);
        }

        .journey-card:hover .journey-card-bg {
            opacity: 1;
        }

        .journey-card.is-active {
            filter: brightness(1.1);
            transform: scale(1.02);
            box-shadow: 0 0 0 1px #C4A052, 0 0 20px rgba(196, 160, 82, 0.3);
        }

        .journey-card.is-active .journey-step-num {
            color: #C9A227;
        }

        .journey-icon-wrap {
            transition: all 0.5s ease;
        }

        /* Progress indicator */
        .progress-line-fill {
            transform-origin: top;
            transform: scaleY(0);
        }

        /* Float animation class added after appear */
        @keyframes floatGentle {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .is-floating {
            animation: floatGentle 6s ease-in-out infinite;
        }
    </style>

    <section id="journey-section"
        class="py-24 xl:py-32 2xl:py-40 min-h-screen flex flex-col justify-center border-y border-[#C4A052]/20 relative z-10 text-white">

        <!-- Background Elements -->
        <div class="journey-bg-paper z-0"></div>
        <div class="journey-bg-overlay z-0"></div>
        <div class="journey-light bg-[#C4A052]/10 w-[600px] h-[600px] top-[-100px] left-[-100px] z-0 parallax-bg-slow">
        </div>
        <div class="journey-light bg-[#C4A052]/5 w-[500px] h-[500px] bottom-[20%] right-[-50px] z-0 parallax-bg-fast"></div>

        <!-- Golden Particles -->
        <div id="particles-container" class="absolute inset-0 overflow-hidden pointer-events-none z-0"></div>

        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 relative z-20 flex">

            <!-- Vertical Progress Indicator -->
            <div class="hidden lg:flex flex-col items-center mr-12 relative w-8 shrink-0">
                <div class="h-full w-px bg-slate-800 absolute left-1/2 -translate-x-1/2 top-0 bottom-0 z-0"></div>
                <div id="progress-fill"
                    class="h-full w-1 bg-gradient-to-b from-[#D4B886] to-[#C4A052] absolute left-1/2 -translate-x-1/2 top-0 bottom-0 z-10 progress-line-fill rounded-full shadow-[0_0_10px_rgba(196,160,82,0.5)]">
                </div>

                <!-- Indicators -->
                <div
                    class="h-full w-full absolute top-0 left-0 flex flex-col justify-between py-[15%] z-20 pointer-events-none">
                    <div
                        class="w-3 h-3 rounded-full bg-[#0a0502] border-2 border-slate-600 mx-auto prog-dot transition-colors duration-300">
                    </div>
                    <div
                        class="w-3 h-3 rounded-full bg-[#0a0502] border-2 border-slate-600 mx-auto prog-dot transition-colors duration-300">
                    </div>
                    <div
                        class="w-3 h-3 rounded-full bg-[#0a0502] border-2 border-slate-600 mx-auto prog-dot transition-colors duration-300">
                    </div>
                    <div
                        class="w-3 h-3 rounded-full bg-[#0a0502] border-2 border-slate-600 mx-auto prog-dot transition-colors duration-300">
                    </div>
                    <div
                        class="w-3 h-3 rounded-full bg-[#0a0502] border-2 border-slate-600 mx-auto prog-dot transition-colors duration-300">
                    </div>
                    <div
                        class="w-3 h-3 rounded-full bg-[#0a0502] border-2 border-slate-600 mx-auto prog-dot transition-colors duration-300">
                    </div>
                    <div
                        class="w-3 h-3 rounded-full bg-[#0a0502] border-2 border-slate-600 mx-auto prog-dot transition-colors duration-300">
                    </div>
                </div>
            </div>

            <!-- Content Container -->
            <div class="flex-1" id="journey-content">
                <div class="text-center lg:text-left max-w-2xl mb-20 md:mb-32 mx-auto lg:mx-0">
                    <span id="journey-subtitle"
                        class="text-[10px] font-bold text-[#C4A052] uppercase tracking-[0.25em] block mb-4 opacity-0">Our
                        Pipeline</span>
                    <h2 id="journey-title"
                        class="text-4xl sm:text-5xl lg:text-6xl font-serif text-white leading-[1.1] opacity-0 drop-shadow-md">
                        The Journey to <span class="italic text-[#C4A052]">Publication</span>
                    </h2>
                </div>

                <!-- Timeline Layout -->
                <div class="relative w-full pb-32" id="timeline-container">

                    <!-- SVG Timeline connecting line -->
                    <div class="absolute inset-0 pointer-events-none hidden md:block z-0 opacity-40">
                        <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 1000 1400">
                            <!-- Background path -->
                            <path
                                d="M 250,50 C 500,50 500,250 750,250 C 1000,250 1000,450 750,450 C 500,450 500,700 250,700 C 0,700 0,950 250,950 C 500,950 500,1200 750,1200"
                                fill="none" stroke="#C9A227" stroke-width="1" stroke-dasharray="8,8" opacity="0.3" />
                            <!-- Active path to be animated -->
                            <path id="timeline-path-active"
                                d="M 250,50 C 500,50 500,250 750,250 C 1000,250 1000,450 750,450 C 500,450 500,700 250,700 C 0,700 0,950 250,950 C 500,950 500,1200 750,1200"
                                fill="none" stroke="url(#gold-grad-bright)" stroke-width="3"
                                style="stroke-dasharray: 4000; stroke-dashoffset: 4000;" />

                            <defs>
                                <linearGradient id="gold-grad-bright" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#C9A227" />
                                    <stop offset="50%" stop-color="#2F6BFF" />
                                    <stop offset="100%" stop-color="#C9A227" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>

                    <!-- Process Cards -->
                    <div
                        class="relative z-10 flex flex-col md:grid md:grid-cols-2 gap-y-12 md:gap-y-32 gap-x-12 lg:gap-x-24">

                        <!-- Step 1 -->
                        <div
                            class="journey-card rounded-2xl p-8 lg:p-10 relative overflow-hidden group w-full max-w-sm mx-auto md:ml-auto md:mr-0 mt-0">
                            <div
                                class="journey-card-bg absolute inset-0 bg-gradient-to-br from-[#C4A052]/20 via-transparent to-transparent opacity-0 transition-opacity duration-500 pointer-events-none">
                            </div>

                            <div class="relative z-10 flex flex-col items-center text-center">
                                <span
                                    class="journey-step-num absolute top-0 left-0 text-6xl font-serif text-white/5 transition-colors duration-500 select-none -translate-x-4 -translate-y-6 pointer-events-none z-0">01</span>

                                <div
                                    class="journey-icon-wrap w-16 h-16 rounded-full bg-black/60 border border-[#C4A052]/50 text-white flex items-center justify-center text-2xl mb-6 shadow-inner z-10">
                                    📖
                                </div>
                                <h3 class="text-xl font-bold text-white mb-3 z-10 drop-shadow-sm">Manuscript</h3>
                                <p class="text-xs text-slate-400 leading-relaxed z-10">Comprehensive evaluation of your
                                    draft for structural flow, pacing, and narrative alignment.</p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div
                            class="journey-card rounded-2xl p-8 lg:p-10 relative overflow-hidden group w-full max-w-sm mx-auto md:mr-auto md:ml-0 md:mt-32">
                            <div
                                class="journey-card-bg absolute inset-0 bg-gradient-to-br from-[#C4A052]/20 via-transparent to-transparent opacity-0 transition-opacity duration-500 pointer-events-none">
                            </div>

                            <div class="relative z-10 flex flex-col items-center text-center">
                                <span
                                    class="journey-step-num absolute top-0 left-0 text-6xl font-serif text-white/5 transition-colors duration-500 select-none -translate-x-4 -translate-y-6 pointer-events-none z-0">02</span>

                                <div
                                    class="journey-icon-wrap w-16 h-16 rounded-full bg-black/60 border border-[#C4A052]/50 text-white flex items-center justify-center text-2xl mb-6 shadow-inner z-10">
                                    ✏️
                                </div>
                                <h3 class="text-xl font-bold text-white mb-3 z-10 drop-shadow-sm">Editing</h3>
                                <p class="text-xs text-slate-400 leading-relaxed z-10">Professional line edits and
                                    copyediting to polish prose while preserving your authentic voice.</p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div
                            class="journey-card rounded-2xl p-8 lg:p-10 relative overflow-hidden group w-full max-w-sm mx-auto md:ml-auto md:mr-0 mt-0">
                            <div
                                class="journey-card-bg absolute inset-0 bg-gradient-to-br from-[#C4A052]/20 via-transparent to-transparent opacity-0 transition-opacity duration-500 pointer-events-none">
                            </div>

                            <div class="relative z-10 flex flex-col items-center text-center">
                                <span
                                    class="journey-step-num absolute top-0 left-0 text-6xl font-serif text-white/5 transition-colors duration-500 select-none -translate-x-4 -translate-y-6 pointer-events-none z-0">03</span>

                                <div
                                    class="journey-icon-wrap w-16 h-16 rounded-full bg-black/60 border border-[#C4A052]/50 text-white flex items-center justify-center text-2xl mb-6 shadow-inner z-10">
                                    🎨
                                </div>
                                <h3 class="text-xl font-bold text-white mb-3 z-10 drop-shadow-sm">Design</h3>
                                <p class="text-xs text-slate-400 leading-relaxed z-10">Bespoke cover artistry and interior
                                    typesetting crafted to capture your story's essence.</p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div
                            class="journey-card rounded-2xl p-8 lg:p-10 relative overflow-hidden group w-full max-w-sm mx-auto md:mr-auto md:ml-0 md:mt-32">
                            <div
                                class="journey-card-bg absolute inset-0 bg-gradient-to-br from-[#C4A052]/20 via-transparent to-transparent opacity-0 transition-opacity duration-500 pointer-events-none">
                            </div>

                            <div class="relative z-10 flex flex-col items-center text-center">
                                <span
                                    class="journey-step-num absolute top-0 left-0 text-6xl font-serif text-white/5 transition-colors duration-500 select-none -translate-x-4 -translate-y-6 pointer-events-none z-0">04</span>

                                <div
                                    class="journey-icon-wrap w-16 h-16 rounded-full bg-black/60 border border-[#C4A052]/50 text-white flex items-center justify-center text-2xl mb-6 shadow-inner z-10">
                                    🔍
                                </div>
                                <h3 class="text-xl font-bold text-white mb-3 z-10 drop-shadow-sm">Proofreading</h3>
                                <p class="text-xs text-slate-400 leading-relaxed z-10">Rigorous final audit of digital
                                    proofs to ensure impeccable quality before production.</p>
                            </div>
                        </div>

                        <!-- Step 5 -->
                        <div
                            class="journey-card rounded-2xl p-8 lg:p-10 relative overflow-hidden group w-full max-w-sm mx-auto md:ml-auto md:mr-0 mt-0">
                            <div
                                class="journey-card-bg absolute inset-0 bg-gradient-to-br from-[#C4A052]/20 via-transparent to-transparent opacity-0 transition-opacity duration-500 pointer-events-none">
                            </div>

                            <div class="relative z-10 flex flex-col items-center text-center">
                                <span
                                    class="journey-step-num absolute top-0 left-0 text-6xl font-serif text-white/5 transition-colors duration-500 select-none -translate-x-4 -translate-y-6 pointer-events-none z-0">05</span>

                                <div
                                    class="journey-icon-wrap w-16 h-16 rounded-full bg-black/60 border border-[#C4A052]/50 text-white flex items-center justify-center text-2xl mb-6 shadow-inner z-10">
                                    🖨️
                                </div>
                                <h3 class="text-xl font-bold text-white mb-3 z-10 drop-shadow-sm">Printing</h3>
                                <p class="text-xs text-slate-400 leading-relaxed z-10">High-end physical production
                                    utilizing premium paper stock, bindings, and finishes.</p>
                            </div>
                        </div>

                        <!-- Step 6 -->
                        <div
                            class="journey-card rounded-2xl p-8 lg:p-10 relative overflow-hidden group w-full max-w-sm mx-auto md:mr-auto md:ml-0 md:mt-32">
                            <div
                                class="journey-card-bg absolute inset-0 bg-gradient-to-br from-[#C4A052]/20 via-transparent to-transparent opacity-0 transition-opacity duration-500 pointer-events-none">
                            </div>

                            <div class="relative z-10 flex flex-col items-center text-center">
                                <span
                                    class="journey-step-num absolute top-0 left-0 text-6xl font-serif text-white/5 transition-colors duration-500 select-none -translate-x-4 -translate-y-6 pointer-events-none z-0">06</span>

                                <div
                                    class="journey-icon-wrap w-16 h-16 rounded-full bg-black/60 border border-[#C4A052]/50 text-white flex items-center justify-center text-2xl mb-6 shadow-inner z-10">
                                    🌍
                                </div>
                                <h3 class="text-xl font-bold text-white mb-3 z-10 drop-shadow-sm">Distribution</h3>
                                <p class="text-xs text-slate-400 leading-relaxed z-10">Seamless integration with global
                                    networks including Amazon, Apple Books, and Ingram.</p>
                            </div>
                        </div>

                        <!-- Step 7 -->
                        <div
                            class="journey-card rounded-2xl p-8 lg:p-10 relative overflow-hidden group w-full max-w-sm mx-auto md:col-span-2 mt-0 md:mt-12">
                            <div
                                class="journey-card-bg absolute inset-0 bg-gradient-to-br from-[#C4A052]/30 via-transparent to-transparent opacity-0 transition-opacity duration-500 pointer-events-none">
                            </div>

                            <div class="relative z-10 flex flex-col items-center text-center">
                                <span
                                    class="journey-step-num absolute top-0 left-0 text-6xl font-serif text-white/5 transition-colors duration-500 select-none -translate-x-4 -translate-y-6 pointer-events-none z-0">07</span>

                                <div
                                    class="journey-icon-wrap w-20 h-20 rounded-full bg-gradient-to-br from-black/80 to-black/60 border-2 border-[#C4A052] text-white flex items-center justify-center text-3xl mb-6 shadow-[0_0_30px_rgba(196,160,82,0.4)] z-10">
                                    🚀
                                </div>
                                <h3 class="text-2xl font-bold text-white mb-3 z-10 drop-shadow-sm">Launch</h3>
                                <p class="text-sm text-slate-300 leading-relaxed max-w-md z-10">Targeted marketing
                                    strategies, press wire releases, and dedicated support to celebrate and elevate your
                                    debut.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Transition Gradient to next section -->
        <div id="journey-bottom-transition"
            class="absolute bottom-0 left-0 right-0 h-48 bg-gradient-to-t from-[#0a0502] to-transparent pointer-events-none z-10 transition-colors duration-1000">
        </div>
    </section>

    <!-- JS dependencies for GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

            gsap.registerPlugin(ScrollTrigger);

            // Generate Golden Particles
            const particlesContainer = document.getElementById('particles-container');
            for (let i = 0; i < 40; i++) {
                const p = document.createElement('div');
                p.className = 'journey-particle';
                p.style.left = Math.random() * 100 + '%';
                p.style.top = Math.random() * 100 + '%';
                p.style.opacity = Math.random() * 0.4 + 0.1;
                particlesContainer.appendChild(p);

                // Random floating animation
                gsap.to(p, {
                    y: -100 - Math.random() * 200,
                    x: (Math.random() - 0.5) * 100,
                    duration: 10 + Math.random() * 20,
                    repeat: -1,
                    yoyo: true,
                    ease: "sine.inOut"
                });
            }

            // Parallax effects
            gsap.to(".parallax-bg-slow", {
                y: 200,
                ease: "none",
                scrollTrigger: {
                    trigger: "#journey-section",
                    start: "top bottom",
                    end: "bottom top",
                    scrub: true
                }
            });

            gsap.to(".parallax-bg-fast", {
                y: -300,
                ease: "none",
                scrollTrigger: {
                    trigger: "#journey-section",
                    start: "top bottom",
                    end: "bottom top",
                    scrub: true
                }
            });

            // Progress Indicator Fill
            gsap.to(".progress-line-fill", {
                scaleY: 1,
                ease: "none",
                scrollTrigger: {
                    trigger: "#timeline-container",
                    start: "top center",
                    end: "bottom center",
                    scrub: true
                }
            });

            // Timeline connecting line
            const timelinePath = document.getElementById('timeline-path-active');
            if (timelinePath) {
                gsap.to(timelinePath, {
                    strokeDashoffset: 0,
                    ease: "none",
                    scrollTrigger: {
                        trigger: "#timeline-container",
                        start: "top 60%",
                        end: "bottom 80%",
                        scrub: true
                    }
                });
            }

            // Title animations
            gsap.to("#journey-title",
                { y: 0, opacity: 1, duration: 1, ease: "power3.out", scrollTrigger: { trigger: "#journey-content", start: "top 80%" } }
            );
            gsap.fromTo("#journey-title", { y: 50 }, { y: 0, duration: 1, ease: "power3.out", scrollTrigger: { trigger: "#journey-content", start: "top 80%" } });

            gsap.to("#journey-subtitle",
                { y: 0, opacity: 1, duration: 1, delay: 0.2, ease: "power3.out", scrollTrigger: { trigger: "#journey-content", start: "top 80%" } }
            );
            gsap.fromTo("#journey-subtitle", { y: 20 }, { y: 0, duration: 1, delay: 0.2, ease: "power3.out", scrollTrigger: { trigger: "#journey-content", start: "top 80%" } });

            // Cards sequential animation
            const cards = document.querySelectorAll('.journey-card');
            const dots = document.querySelectorAll('.prog-dot');

            cards.forEach((card, index) => {
                // Enter animation
                gsap.to(card, {
                    opacity: 1,
                    scale: 1,
                    y: 0,
                    filter: "blur(0px)",
                    duration: 0.9,
                    ease: "expo.out",
                    scrollTrigger: {
                        trigger: card,
                        start: "top 80%",
                        onEnter: () => {
                            card.classList.add('is-active');
                            if (dots[index]) {
                                dots[index].style.borderColor = '#C9A227';
                                dots[index].style.boxShadow = '0 0 10px rgba(201, 162, 39, 0.5)';
                            }
                            // Add floating after appearance
                            setTimeout(() => card.classList.add('is-floating'), 900);
                        },
                        onLeaveBack: () => {
                            card.classList.remove('is-active', 'is-floating');
                            if (dots[index]) {
                                dots[index].style.borderColor = '';
                                dots[index].style.boxShadow = '';
                            }
                        }
                    }
                });
                gsap.fromTo(card, { y: 80, scale: 0.9, filter: "blur(12px)" }, {
                    y: 0, scale: 1, filter: "blur(0px)", duration: 0.9, ease: "expo.out",
                    scrollTrigger: {
                        trigger: card,
                        start: "top 80%"
                    }
                });

                // Remove active state when scrolling past
                ScrollTrigger.create({
                    trigger: card,
                    start: "top 40%",
                    onEnter: () => card.classList.remove('is-active'),
                    onLeaveBack: () => card.classList.add('is-active')
                });
            });

            // Final transition to next section
            gsap.to("#journey-section", {
                backgroundColor: "#0F1B3D", // Darker transition matching next section's theme
                ease: "power2.inOut",
                scrollTrigger: {
                    trigger: cards[cards.length - 1],
                    start: "top 50%",
                    end: "bottom top",
                    scrub: true
                }
            });

            gsap.to(".journey-bg-paper", {
                opacity: 0,
                ease: "power2.inOut",
                scrollTrigger: {
                    trigger: cards[cards.length - 1],
                    start: "top 50%",
                    end: "bottom top",
                    scrub: true
                }
            });
        });
    </script>

    <!-- The Literary Media Lounge (Redesigned) -->
    <style>
        /* Media Lounge Styles */
        #media-lounge {
            background: linear-gradient(135deg, #F8F5EE 0%, #F2E7D3 100%);
            position: relative;
            overflow: hidden;
        }

        /* Parallax background layers */
        .media-layer-bg {
            position: absolute;
            inset: -10%;
            background-image: url('{{ asset('images/writer.png') }}');
            background-size: cover;
            background-position: center;
            opacity: 0.6;
            pointer-events: none;
        }

        .media-bg-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(10, 5, 2, 0.9), rgba(10, 5, 2, 0.5), rgba(10, 5, 2, 0.9));
            pointer-events: none;
        }

        .media-spotlight {
            position: absolute;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(201, 162, 39, 0.08) 0%, rgba(255, 255, 255, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
            top: -10%;
            left: -10%;
        }

        .media-feather {
            position: absolute;
            opacity: 0.15;
            pointer-events: none;
            filter: blur(2px);
        }

        /* Cards */
        .media-featured-card {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(196, 160, 82, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            border-radius: 24px;
            overflow: hidden;
            transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.5s ease;
        }

        .media-featured-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(196, 160, 82, 0.15);
        }

        .media-featured-img-wrap {
            overflow: hidden;
            position: relative;
        }

        .media-featured-img {
            transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .media-featured-card:hover .media-featured-img {
            transform: scale(1.05);
        }

        .glass-sweep {
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.3) 50%, rgba(255, 255, 255, 0) 100%);
            transform: skewX(-20deg);
            transition: none;
        }

        .media-featured-card:hover .glass-sweep {
            animation: sweep 1.2s ease-in-out;
        }

        @keyframes sweep {
            0% {
                left: -100%;
            }

            100% {
                left: 200%;
            }
        }

        .media-play-btn {
            transition: all 0.3s ease;
        }

        .media-featured-card:hover .media-play-btn {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(201, 162, 39, 0.5);
        }

        /* List Cards */
        .media-list-card {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(196, 160, 82, 0.2);
            border-radius: 16px;
            padding: 20px;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        .media-list-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 15px 30px rgba(196, 160, 82, 0.1);
            border-color: rgba(196, 160, 82, 0.6);
        }

        /* Mini Player */
        #mini-player {
            position: fixed;
            bottom: -100px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(10, 5, 2, 0.95);
            backdrop-filter: blur(15px);
            padding: 12px 24px;
            border-radius: 50px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            gap: 16px;
            z-index: 100;
            transition: bottom 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            border: 1px solid rgba(196, 160, 82, 0.3);
            color: white;
        }

        #mini-player.show {
            bottom: 30px;
        }

        .waveform-bar {
            width: 3px;
            background: #C9A227;
            border-radius: 3px;
            display: inline-block;
            animation: pulseWave 1.2s ease-in-out infinite alternate;
        }

        .waveform-bar:nth-child(2) {
            animation-delay: 0.2s;
        }

        .waveform-bar:nth-child(3) {
            animation-delay: 0.4s;
        }

        .waveform-bar:nth-child(4) {
            animation-delay: 0.1s;
        }

        .waveform-bar:nth-child(5) {
            animation-delay: 0.3s;
        }

        @keyframes pulseWave {
            0% {
                height: 4px;
            }

            100% {
                height: 16px;
            }
        }
    </style>

    <section id="media-lounge"
        class="py-24 xl:py-32 min-h-screen flex flex-col justify-center border-y bg-[#0a0502] border-[#C4A052]/20 z-10 text-white relative overflow-hidden">

        <!-- Parallax Backgrounds -->
        <div class="media-layer-bg media-parallax-slow"></div>
        <div class="media-bg-overlay z-0"></div>
        <div class="media-spotlight media-parallax-mid" id="media-spotlight-1"></div>

        <!-- Abstract background elements -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
            <svg class="media-feather media-parallax-mid" style="top:20%; right:15%; width:120px;" viewBox="0 0 24 24"
                fill="none" stroke="#C9A227" stroke-width="0.5" opacity="0.3">
                <path
                    d="M12 2C8 6 4 12 4 18C4 20.2 5.8 22 8 22C11.5 22 15 17 18 12C20 8.5 21 5.5 20 4C19 2.5 16 1.5 12 2Z" />
            </svg>
            <svg class="media-feather media-parallax-fast"
                style="bottom:15%; left:10%; width:80px; transform: rotate(-45deg);" viewBox="0 0 24 24" fill="none"
                stroke="#C9A227" stroke-width="0.5" opacity="0.2">
                <path
                    d="M12 2C8 6 4 12 4 18C4 20.2 5.8 22 8 22C11.5 22 15 17 18 12C20 8.5 21 5.5 20 4C19 2.5 16 1.5 12 2Z" />
            </svg>
        </div>

        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 relative z-20">

            <div class="text-center mb-16 md:mb-24 media-header opacity-0 translate-y-8">
                <span class="text-[10px] font-bold text-[#C4A052] uppercase tracking-[0.25em] block mb-4 drop-shadow-sm">Multimedia</span>
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-serif text-white leading-[1.1] drop-shadow-md">
                    The Literary Media <span class="italic text-[#C4A052]">Lounge</span>
                </h2>
                <p class="text-sm text-slate-300 mt-4 max-w-xl mx-auto">Immerse yourself in our curated collection of expert
                    podcasts, author interviews, and publishing masterclasses.</p>
            </div>

            <!-- Editorial Layout -->
            <div class="flex flex-col lg:flex-row gap-12 lg:gap-16 items-start">

                <!-- Left: Sticky Featured Content -->
                <div class="w-full lg:w-7/12 sticky top-32 media-featured-container opacity-0 translate-y-10">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-2 h-2 rounded-full bg-[#C4A052] animate-pulse"></div>
                        <span class="text-xs font-bold uppercase tracking-widest text-white drop-shadow-sm">Featured Masterclass</span>
                    </div>

                    <div class="media-featured-card cursor-pointer group">
                        <div class="media-featured-img-wrap aspect-[16/9] w-full bg-[#0a0502]">
                            <!-- Placeholder premium image -->
                            <div
                                class="media-featured-img w-full h-full bg-[url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1000')] bg-cover bg-center">
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent">
                            </div>
                            <div class="glass-sweep"></div>

                            <!-- Play Button Overlay -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div
                                    class="media-play-btn w-20 h-20 rounded-full bg-white/20 backdrop-blur-md border border-white/50 flex items-center justify-center text-white">
                                    <svg class="w-8 h-8 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Bottom Info -->
                            <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                                <div class="flex items-center gap-3 mb-3">
                                    <span
                                        class="px-3 py-1 rounded-full bg-[#C4A052] text-[#0a0502] text-[9px] uppercase font-bold tracking-wider">Video</span>
                                    <span class="text-[10px] font-medium opacity-80">45 Min</span>
                                </div>
                                <h3 class="text-3xl font-serif mb-2 leading-tight drop-shadow-sm">The Architecture of Bestselling
                                    Storytelling</h3>
                                <p class="text-sm opacity-80 line-clamp-2">Join industry veteran Elena Rostova as she
                                    deconstructs the structural elements that define modern literary success.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Scrolling List -->
                <div class="w-full lg:w-5/12 flex flex-col gap-6 media-list-container pt-12 lg:pt-0">

                    <div class="flex items-center justify-between mb-2">
                        <h4 class="text-lg font-serif font-bold text-white drop-shadow-sm">Latest Episodes</h4>
                        <a href="#" class="text-xs font-bold text-[#C4A052] hover:text-white transition-colors">View All
                            &rarr;</a>
                    </div>

                    <!-- Podcast Card 1 -->
                    <div class="media-list-card media-item opacity-0 translate-y-8 cursor-pointer flex gap-5 items-center group podcast-trigger"
                        data-title="Designing Book Covers that Sell" data-author="Sarah Jennings">
                        <div
                            class="w-20 h-20 shrink-0 rounded-xl bg-[url('https://images.unsplash.com/photo-1589998059171-989d887dda19?q=80&w=300')] bg-cover bg-center shadow-md relative overflow-hidden border border-[#C4A052]/20">
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-colors">
                            </div>
                            <div
                                class="absolute inset-0 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity">
                                <svg class="w-8 h-8 drop-shadow-[0_0_10px_rgba(196,160,82,0.8)]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-[9px] uppercase font-bold text-[#C4A052] tracking-wider drop-shadow-sm">Podcast • Ep
                                    48</span>
                            </div>
                            <h5 class="font-bold text-sm text-white mb-1 group-hover:text-[#C4A052] transition-colors drop-shadow-sm">
                                Designing Book Covers that Sell</h5>
                            <p class="text-[10px] text-slate-400 line-clamp-2 mb-2">Sarah Jennings breaks down cover
                                formats, typography alignment, and color psychology.</p>
                            <div class="h-4 flex items-end gap-[2px] opacity-0 group-hover:opacity-100 transition-opacity">
                                <div class="waveform-bar h-1"></div>
                                <div class="waveform-bar h-1"></div>
                                <div class="waveform-bar h-1"></div>
                                <div class="waveform-bar h-1"></div>
                                <div class="waveform-bar h-1"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Video Card 1 -->
                    <div class="media-list-card media-item opacity-0 translate-y-8 cursor-pointer flex gap-5 items-center group"
                        data-title="From Manuscript to Series A">
                        <div
                            class="w-20 h-20 shrink-0 rounded-xl bg-[url('https://images.unsplash.com/photo-1551818255-e6e10975bc17?q=80&w=300')] bg-cover bg-center shadow-md relative overflow-hidden border border-[#C4A052]/20">
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-colors">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center text-white">
                                <svg class="w-8 h-8 drop-shadow-[0_0_10px_rgba(196,160,82,0.8)] group-hover:scale-110 transition-transform"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-[9px] uppercase font-bold text-emerald-400 tracking-wider drop-shadow-sm">Interview</span>
                            </div>
                            <h5 class="font-bold text-sm text-white mb-1 group-hover:text-[#C4A052] transition-colors drop-shadow-sm">
                                From Manuscript to Series A</h5>
                            <p class="text-[10px] text-slate-400 line-clamp-2">R. Cunningham details publishing, organizing
                                startup books, and reaching target audiences.</p>
                        </div>
                    </div>

                    <!-- Podcast Card 2 -->
                    <div class="media-list-card media-item opacity-0 translate-y-8 cursor-pointer flex gap-5 items-center group podcast-trigger"
                        data-title="The Art of Editing" data-author="Michael Chang">
                        <div
                            class="w-20 h-20 shrink-0 rounded-xl bg-[url('https://images.unsplash.com/photo-1455390582262-044cdead27d8?q=80&w=300')] bg-cover bg-center shadow-md relative overflow-hidden border border-[#C4A052]/20">
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-colors">
                            </div>
                            <div
                                class="absolute inset-0 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity">
                                <svg class="w-8 h-8 drop-shadow-[0_0_10px_rgba(196,160,82,0.8)]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-[9px] uppercase font-bold text-[#C4A052] tracking-wider drop-shadow-sm">Podcast • Ep
                                    47</span>
                            </div>
                            <h5 class="font-bold text-sm text-white mb-1 group-hover:text-[#C4A052] transition-colors drop-shadow-sm">
                                The Art of Ruthless Editing</h5>
                            <p class="text-[10px] text-slate-400 line-clamp-2 mb-2">How to kill your darlings and tighten
                                your prose without losing your voice.</p>
                            <div class="h-4 flex items-end gap-[2px] opacity-0 group-hover:opacity-100 transition-opacity">
                                <div class="waveform-bar h-1"></div>
                                <div class="waveform-bar h-1"></div>
                                <div class="waveform-bar h-1"></div>
                                <div class="waveform-bar h-1"></div>
                                <div class="waveform-bar h-1"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Video Card 2 -->
                    <div class="media-list-card media-item opacity-0 translate-y-8 cursor-pointer flex gap-5 items-center group"
                        data-title="Distribution Networks Explained">
                        <div
                            class="w-20 h-20 shrink-0 rounded-xl bg-[url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=300')] bg-cover bg-center shadow-md relative overflow-hidden border border-[#C4A052]/20">
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-colors">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center text-white">
                                <svg class="w-8 h-8 drop-shadow-[0_0_10px_rgba(196,160,82,0.8)] group-hover:scale-110 transition-transform"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="text-[9px] uppercase font-bold text-purple-400 tracking-wider drop-shadow-sm">Panel</span>
                            </div>
                            <h5 class="font-bold text-sm text-white mb-1 group-hover:text-[#C4A052] transition-colors drop-shadow-sm">
                                Global Distribution Networks</h5>
                            <p class="text-[10px] text-slate-400 line-clamp-2">Navigating IngramSpark, Amazon KDP, and
                                international retail channels.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Mini Floating Player -->
        <div id="mini-player">
            <div
                class="w-10 h-10 rounded-full bg-[#C9A227] flex items-center justify-center text-white cursor-pointer hover:bg-white hover:text-[#C9A227] transition-colors">
                <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z" />
                </svg>
            </div>
            <div class="flex flex-col min-w-[150px]">
                <span id="player-title" class="text-xs font-bold truncate max-w-[200px]">Episode Title</span>
                <span id="player-author" class="text-[10px] text-slate-400">Author</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-[9px] text-slate-400">12:04</span>
                <div class="w-32 h-1 bg-white/20 rounded-full relative overflow-hidden">
                    <div class="absolute top-0 left-0 bottom-0 w-1/3 bg-[#C9A227] rounded-full"></div>
                </div>
                <span class="text-[9px] text-slate-400">-33:12</span>
            </div>
            <div class="ml-2 text-slate-400 hover:text-white cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5 10c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2h3l4 4V6l-4 4H5z" />
                </svg>
            </div>
        </div>
    </section>

    <!-- JS dependencies for GSAP are already included from previous section -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

            // Media Lounge Entrance Animations
            gsap.to(".media-header", {
                y: 0, opacity: 1, duration: 1, ease: "power3.out",
                scrollTrigger: {
                    trigger: "#media-lounge",
                    start: "top 70%"
                }
            });

            // Featured Card Entrance
            gsap.to(".media-featured-container", {
                y: 0, opacity: 1, duration: 1, delay: 0.2, ease: "power3.out",
                scrollTrigger: {
                    trigger: "#media-lounge",
                    start: "top 60%"
                }
            });

            // Staggered List Cards
            gsap.to(".media-item", {
                y: 0, opacity: 1, duration: 0.8, stagger: 0.15, ease: "power3.out",
                scrollTrigger: {
                    trigger: ".media-list-container",
                    start: "top 70%"
                }
            });

            // Parallax Layers
            gsap.to(".media-parallax-slow", {
                y: 100, ease: "none",
                scrollTrigger: { trigger: "#media-lounge", start: "top bottom", end: "bottom top", scrub: true }
            });
            gsap.to(".media-parallax-mid", {
                y: 200, ease: "none",
                scrollTrigger: { trigger: "#media-lounge", start: "top bottom", end: "bottom top", scrub: true }
            });
            gsap.to(".media-parallax-fast", {
                y: -150, ease: "none",
                scrollTrigger: { trigger: "#media-lounge", start: "top bottom", end: "bottom top", scrub: true }
            });

            // Mousemove 3D Tilt & Light Follow
            const section = document.getElementById('media-lounge');
            const spotlight = document.getElementById('media-spotlight-1');
            const cards = document.querySelectorAll('.media-list-card, .media-featured-card');

            if (section && spotlight) {
                section.addEventListener('mousemove', (e) => {
                    const rect = section.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    // Move spotlight
                    gsap.to(spotlight, {
                        x: (x - rect.width / 2) * 0.1,
                        y: (y - rect.height / 2) * 0.1,
                        duration: 1,
                        ease: "power2.out"
                    });

                    // Tilt cards slightly
                    cards.forEach(card => {
                        const cardRect = card.getBoundingClientRect();
                        const cardCenterX = cardRect.left + cardRect.width / 2;
                        const cardCenterY = cardRect.top + cardRect.height / 2;
                        const deltaX = e.clientX - cardCenterX;
                        const deltaY = e.clientY - cardCenterY;

                        // Only tilt if mouse is relatively close
                        if (Math.abs(deltaX) < 400 && Math.abs(deltaY) < 400) {
                            gsap.to(card, {
                                rotateY: deltaX * 0.01,
                                rotateX: -deltaY * 0.01,
                                transformPerspective: 1000,
                                duration: 0.5,
                                ease: "power1.out"
                            });
                        } else {
                            gsap.to(card, { rotateY: 0, rotateX: 0, duration: 0.5 });
                        }
                    });
                });

                section.addEventListener('mouseleave', () => {
                    cards.forEach(card => gsap.to(card, { rotateY: 0, rotateX: 0, duration: 0.5 }));
                    gsap.to(spotlight, { x: 0, y: 0, duration: 1 });
                });
            }

            // Mini Player Interaction
            const player = document.getElementById('mini-player');
            const playerTitle = document.getElementById('player-title');
            const playerAuthor = document.getElementById('player-author');
            const podcastTriggers = document.querySelectorAll('.podcast-trigger');

            podcastTriggers.forEach(trigger => {
                trigger.addEventListener('mouseenter', () => {
                    playerTitle.textContent = trigger.dataset.title;
                    playerAuthor.textContent = trigger.dataset.author;
                    player.classList.add('show');
                });
            });

            if (section && player) {
                section.addEventListener('mouseleave', () => {
                    player.classList.remove('show');
                });
            }
        });
    </script>

    <!-- Voices from the Penholders (Redesigned) -->
    <style>
        /* Hall of Authors Styles */
        .penholders-wrapper {
            position: relative;
            width: 100%;
            min-height: 100vh;
            background-image: url('{{ asset('images/global.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            transition: background-color 1s ease;
        }

        .penholders-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(10, 5, 2, 0.9), rgba(10, 5, 2, 0.5), rgba(10, 5, 2, 0.9));
            pointer-events: none;
        }

        .penholders-bg-layer {
            position: absolute;
            inset: -10%;
            width: 120%;
            height: 120%;
            pointer-events: none;
        }

        .penholders-bg-texture {
            opacity: 0.04;
            background-image: url('data:image/svg+xml,%3Csvg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noise"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="4" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100" height="100" filter="url(%23noise)" opacity="0.4"/%3E%3C/svg%3E');
        }

        .penholders-bg-manuscript {
            opacity: 0.03;
            background-size: 400px;
            background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="400" height="200" opacity="0.5"%3E%3Cpath d="M10 50 Q 50 20 100 50 T 200 50 T 300 50" stroke="%230F1B3D" fill="transparent" stroke-width="0.5"/%3E%3Cpath d="M10 80 Q 80 110 150 80 T 300 80 T 380 80" stroke="%230F1B3D" fill="transparent" stroke-width="0.5"/%3E%3Cpath d="M10 110 Q 60 140 120 110 T 250 110 T 360 110" stroke="%230F1B3D" fill="transparent" stroke-width="0.5"/%3E%3C/svg%3E');
        }

        .penholders-bg-rays {
            background: radial-gradient(circle at 50% 0%, rgba(255, 255, 255, 0.4) 0%, rgba(255, 255, 255, 0) 60%);
            opacity: 0.5;
        }

        .author-slide {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .author-slide.active {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .premium-testimonial-card {
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(196, 160, 82, 0.3);
            border-radius: 24px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5), inset 0 0 0 1px rgba(255, 255, 255, 0.1);
            padding: 40px;
            max-width: 600px;
            width: 90%;
            position: relative;
            transform-style: preserve-3d;
            z-index: 10;
        }

        .book-cover-3d {
            width: 140px;
            height: 210px;
            background: #0a0502;
            border-radius: 4px 8px 8px 4px;
            box-shadow: -5px 0 10px rgba(0, 0, 0, 0.5), 10px 20px 30px rgba(0, 0, 0, 0.6);
            position: absolute;
            top: -60px;
            right: -40px;
            transform: rotateY(-20deg) rotateX(10deg);
            transform-style: preserve-3d;
            transition: transform 0.5s ease;
            background-image: url('https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=300');
            background-size: cover;
            background-position: center;
        }

        .book-cover-3d::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 8px;
            background: linear-gradient(to right, rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.1) 50%, rgba(0, 0, 0, 0.2));
            border-radius: 4px 0 0 4px;
        }

        .quote-word {
            display: inline-block;
            opacity: 0.2;
            transform: translateY(5px);
            transition: all 0.4s ease;
        }

        .quote-word.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .quote-mark-bg {
            position: absolute;
            font-family: serif;
            font-size: 200px;
            line-height: 1;
            color: rgba(196, 160, 82, 0.15);
            top: -20px;
            left: -10px;
            z-index: -1;
            user-select: none;
        }

        .journey-bar {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 30px;
        }

        .journey-step {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(15, 27, 61, 0.2);
        }

        .journey-step.active {
            background: #C9A227;
            box-shadow: 0 0 10px #C9A227;
        }

        .journey-line {
            height: 1px;
            flex: 1;
            background: rgba(15, 27, 61, 0.1);
        }

        .floating-badge {
            position: absolute;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: bold;
            color: white;
            border: 1px solid rgba(196, 160, 82, 0.3);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            animation: floatBadge 6s ease-in-out infinite;
        }

        @keyframes floatBadge {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .ending-scene {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            z-index: 20;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(10px);
            color: white;
        }
    </style>

    <div class="penholders-wrapper border-y border-[#C4A052]/20" id="hall-of-authors">
        <div class="penholders-overlay z-0"></div>

        <!-- Background Layers -->
        <div class="penholders-bg-layer penholders-bg-texture" id="hoa-texture"></div>
        <div class="penholders-bg-layer penholders-bg-manuscript" id="hoa-manuscript"></div>
        <div class="penholders-bg-layer penholders-bg-rays" id="hoa-rays"></div>

        <!-- Header -->
        <div class="pt-16 md:pt-24 pb-8 text-center relative z-20 px-4 drop-shadow-md">
            <span
                class="text-[10px] sm:text-xs font-bold text-[#C4A052] uppercase tracking-[0.25em] block mb-2 sm:mb-4">Hall
                of Authors</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl 2xl:text-6xl font-serif text-white leading-tight">Voices from
                the Penholders</h2>
            <p class="text-xs sm:text-sm text-slate-300 mt-3 sm:mt-4 max-w-xl mx-auto">Publishing testimonials from writers
                who worked with our house.</p>
        </div>

        <!-- Editable Testimonials Data -->
        @php
            // EDIT YOUR PENHOLDER VOICES (TESTIMONIALS) HERE
            // You can easily add, edit, or remove testimonials by modifying this array.
            $authorData = [
                [
                    'name' => 'Eleanor Vance', 
                    'book' => 'The Whispering Shadows', 
                    'quote' => 'Publishing through Books Academy gave me the control I needed over my creative work. The process was seamless and incredibly supportive.', 
                    'bg' => '#0f131a' // Dark background to fit the page
                ],
                [
                    'name' => 'Marcus Thorne', 
                    'book' => 'Echoes of Eternity', 
                    'quote' => 'The design dashboard permitted me to upload and proof layouts directly. Simple, clean, and professional support throughout the process.', 
                    'bg' => '#151a24' // Dark background to fit the page
                ],
                [
                    'name' => 'Alvin Mercer', 
                    'book' => 'Coded Thoughts', 
                    'quote' => 'Direct global distributions in Amazon and Barnes & Noble allowed my textbook to go live worldwide within 48 hours.', 
                    'bg' => '#0f131a' // Dark background to fit the page
                ],
            ];
        @endphp

        <!-- Authors Container -->
        <div class="w-full max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pt-8 pb-16 relative z-10 px-4"
            id="hoa-container">
            @foreach($authorData as $index => $data)
                <div class="flex flex-col h-full">
                    <div class="premium-testimonial-card w-full h-full flex flex-col justify-between"
                        style="background-color: {{ $data['bg'] }} !important;">
                        <div class="quote-mark-bg">"</div>

                        <div>
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-white drop-shadow-sm">{{ $data['name'] }}</h3>
                                <p class="text-xs font-bold uppercase tracking-wider text-[#C4A052]">Author of
                                    "{{ $data['book'] }}"</p>
                            </div>

                            <p class="text-lg text-slate-300 leading-relaxed font-serif italic drop-shadow-sm">
                                {{ $data['quote'] }}
                            </p>
                        </div>

                        <div class="mt-8 flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-black/50 border border-[#C4A052]/50 flex items-center justify-center font-bold text-white shadow-[0_0_15px_rgba(196,160,82,0.3)]">
                                {{ collect(explode(' ', $data['name']))->map(fn($s) => strtoupper(substr($s, 0, 1)))->join('') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Ending Scene -->
        <div
            class="relative z-10 w-full bg-black/60 backdrop-blur-md border border-[#C4A052]/30 py-16 px-4 text-center mt-8 mb-0 rounded-2xl max-w-5xl mx-auto shadow-2xl">
            <h2 class="text-4xl font-serif mb-4 text-white drop-shadow-md">Your Story Could Be Next.</h2>
            <p class="text-slate-300 mb-8 max-w-md mx-auto">Join thousands of authors who have successfully brought their
                manuscripts to life in our Hall of Authors.</p>
            <button
                class="px-8 py-4 bg-gradient-to-r from-[#C4A052] to-[#D4B247] rounded-full text-[#0a0502] font-bold tracking-wider uppercase text-sm shadow-[0_0_30px_rgba(196,160,82,0.5)] hover:scale-105 hover:shadow-[0_0_50px_rgba(196,160,82,0.8)] transition-all duration-300">
                Start Your Publishing Journey
            </button>
        </div>

        <!-- Padding block to prevent margin collapse -->
        <div class="h-16 w-full"></div>

    </div>

    <!-- Global Collaborations Section (Interactive 3D Experience) -->
    <style>
        /* Globe Section Premium Styling */
        .globe-section-wrapper {
            position: relative;
            width: 100%;
            min-height: 100vh;
            overflow: hidden;
            background-image: url('{{ asset('images/global.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(196, 160, 82, 0.2);
        }

        .globe-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(10, 5, 2, 0.9), rgba(10, 5, 2, 0.5), rgba(10, 5, 2, 0.9));
            pointer-events: none;
            z-index: 0;
        }

        /* Background Elements */
        .globe-bg-marble {
            position: absolute;
            inset: 0;
            opacity: 0.15;
            background-image: url('https://images.unsplash.com/photo-1542880941-18ed36592275?q=80&w=1920');
            /* subtle marble/paper texture */
            background-size: cover;
            background-position: center;
            mix-blend-mode: multiply;
            pointer-events: none;
        }

        .globe-bg-dust {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 70% 50%, rgba(201, 162, 39, 0.1) 0%, rgba(255, 255, 255, 0) 60%);
            pointer-events: none;
        }

        /* Layout Split */
        .globe-content {
            width: 100%;
            padding-right: 0;
            z-index: 20;
        }

        .globe-canvas-container {
            width: 100%;
            height: 60vh;
            position: relative;
            z-index: 10;
            cursor: grab;
        }

        .globe-canvas-container:active {
            cursor: grabbing;
        }

        @media (min-width: 1024px) {
            .globe-content {
                padding-right: 4rem;
            }

            .globe-canvas-container {
                height: 80vh;
            }
        }

        /* Typography & Content */
        .globe-subtitle {
            font-size: 0.75rem;
            font-weight: 700;
            color: #C4A052;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            margin-bottom: 1rem;
            display: block;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .globe-title {
            font-size: 3.5rem;
            font-family: serif;
            color: #ffffff;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            text-shadow: 0 4px 10px rgba(0,0,0,0.5);
        }

        .globe-title span {
            font-style: italic;
            color: #C4A052;
        }

        .globe-desc {
            font-size: 1rem;
            color: #cbd5e1;
            line-height: 1.7;
            margin-bottom: 2.5rem;
            max-width: 90%;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .globe-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 2rem;
            background: #C4A052;
            color: #0a0502;
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            border-radius: 9999px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        .globe-cta:hover {
            background: #D4B247;
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(196, 160, 82, 0.3);
        }

        /* Statistics */
        .globe-stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-top: 4rem;
            border-top: 1px solid rgba(196, 160, 82, 0.2);
            padding-top: 3rem;
        }

        .globe-stat-item h4 {
            font-size: 2.5rem;
            font-weight: 700;
            font-family: serif;
            color: #ffffff;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .globe-stat-item span {
            font-size: 0.75rem;
            color: #cbd5e1;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        /* Partner Logos in 3D Space (HTML Overlays) */
        .partner-logo-satellite {
            position: absolute;
            top: 0;
            left: 0;
            transform-origin: center center;
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3), inset 0 0 15px rgba(255, 255, 255, 1);
            cursor: pointer;
            z-index: 30;
            will-change: transform;
        }

        .partner-logo-satellite.hovered-state {
            border-color: rgba(255, 255, 255, 1);
            box-shadow: 0 15px 40px rgba(255, 255, 255, 0.3), inset 0 0 20px rgba(255, 255, 255, 1);
            z-index: 50 !important;
        }

        .partner-logo-satellite img {
            max-width: 75%;
            max-height: 75%;
            opacity: 0.9;
            transition: all 0.3s ease;
        }

        .partner-logo-satellite.hovered-state img {
            opacity: 1;
            transform: scale(1.1);
        }

        /* Info Card */
        .partner-info-card {
            position: absolute;
            top: -140px;
            left: 50%;
            transform: translateX(-50%) translateY(20px);
            width: 260px;
            background: rgba(10, 5, 2, 0.95);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(196, 160, 82, 0.3);
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            pointer-events: none;
        }

        .partner-info-card::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%) rotate(45deg);
            width: 16px;
            height: 16px;
            background: rgba(10, 5, 2, 0.95);
            border-bottom: 1px solid rgba(196, 160, 82, 0.3);
            border-right: 1px solid rgba(196, 160, 82, 0.3);
        }

        .partner-logo-satellite.hovered-state .partner-info-card {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .partner-card-title {
            font-family: serif;
            font-size: 1.25rem;
            color: #ffffff;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .partner-card-subtitle {
            font-size: 0.65rem;
            color: #C4A052;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 700;
            margin-bottom: 0.75rem;
        }

        .partner-card-desc {
            font-size: 0.8rem;
            color: #cbd5e1;
            line-height: 1.5;
            margin-bottom: 1rem;
        }

        .partner-card-link {
            font-size: 0.75rem;
            color: #C4A052;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            pointer-events: auto;
        }

        .partner-card-link:hover {
            color: #ffffff;
        }

        #globe-webgl-container {
            position: absolute;
            top: -20%;
            left: -20%;
            width: 140%;
            height: 140%;
            pointer-events: none; /* Allows dragging on the parent container */
        }
    </style>

    <section class="globe-section-wrapper border-y border-[#C4A052]/20" id="global-collaborations">
        <div class="globe-overlay z-0"></div>
        <!-- Background Layers -->
        <div class="globe-bg-marble" data-speed="0.2"></div>
        <div class="globe-bg-dust z-0"></div>

        <div
            class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 relative z-10 flex flex-col lg:flex-row items-center justify-between">

            <!-- Left: Text & Typography (40%) -->
            <div class="globe-content lg:w-5/12 mb-16 lg:mb-0 globe-text-content opacity-0 translate-y-10">
                <span class="globe-subtitle">Bookstore Partners</span>
                <h2 class="globe-title">
                    Global<br><span>Collaborations</span>
                </h2>
                <p class="globe-desc">
                    Books Academy is not just a publisher. We connect authors to readers all over the world. The globe
                    represents the journey of every published book traveling across continents through our trusted
                    publishing network.
                </p>
                <a href="#" class="globe-cta">
                    Explore Partners
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>

                <div class="globe-stats-grid">
                    <div class="globe-stat-item">
                        <h4><span class="counter" data-target="50">0</span>+</h4>
                        <span>Publishing Partners</span>
                    </div>
                    <div class="globe-stat-item">
                        <h4><span class="counter" data-target="1000">0</span>+</h4>
                        <span>Bookstores Worldwide</span>
                    </div>
                    <div class="globe-stat-item">
                        <h4><span class="counter" data-target="25">0</span>+</h4>
                        <span>Countries Reached</span>
                    </div>
                    <div class="globe-stat-item">
                        <h4><span class="counter" data-target="2">0</span>M+</h4>
                        <span>Readers Worldwide</span>
                    </div>
                </div>
            </div>

            <!-- Right: Interactive 3D Globe (60%) -->
            <div class="w-full lg:w-7/12 globe-canvas-container opacity-0 scale-95" id="globe-interactive-area">
                <div id="globe-webgl-container"></div>

                <!-- HTML Overlays for Logos (Managed by JS) -->
                <div id="satellites-container" class="absolute pointer-events-none overflow-visible" style="top: -20%; left: -20%; width: 140%; height: 140%;">
                    <!-- Satellites will be injected here -->
                </div>
            </div>

        </div>
    </section>

    <!-- Load Three.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined' || typeof THREE === 'undefined') return;

            // --- GSAP Scroll Animations ---
            const globeSection = document.getElementById('global-collaborations');

            gsap.to('.globe-text-content', {
                y: 0, opacity: 1, duration: 1, ease: "power3.out",
                scrollTrigger: {
                    trigger: globeSection,
                    start: "top 60%"
                }
            });

            gsap.to('#globe-interactive-area', {
                scale: 1, opacity: 1, duration: 1.5, ease: "power2.out", delay: 0.2,
                scrollTrigger: {
                    trigger: globeSection,
                    start: "top 60%"
                }
            });

            // Animated Counters
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                ScrollTrigger.create({
                    trigger: globeSection,
                    start: "top 50%",
                    onEnter: () => {
                        gsap.to(counter, {
                            innerHTML: counter.dataset.target,
                            duration: 2,
                            snap: { innerHTML: 1 },
                            ease: "power2.out"
                        });
                    },
                    once: true
                });
            });

            // --- Three.js Globe Implementation ---
            const container = document.getElementById('globe-webgl-container');
            const satellitesContainer = document.getElementById('satellites-container');
            if (!container) return;

            // Scene, Camera, Renderer
            const scene = new THREE.Scene();

            const camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 1000);
            camera.position.z = 350; // Pulled back to match the 140% container scale

            const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
            renderer.setSize(container.clientWidth, container.clientHeight);
            renderer.setPixelRatio(window.devicePixelRatio);
            container.appendChild(renderer.domElement);

            // Lighting
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
            scene.add(ambientLight);

            const directionalLight = new THREE.DirectionalLight(0xffdfa0, 0.8);
            directionalLight.position.set(100, 100, 50);
            scene.add(directionalLight);

            const pointLight = new THREE.PointLight(0xc9a227, 0.5);
            pointLight.position.set(-100, -50, 100);
            scene.add(pointLight);

            // Globe Group
            const globeGroup = new THREE.Group();
            scene.add(globeGroup);

            // 1. Base Sphere (Earth Map)
            const globeRadius = 70;
            const textureLoader = new THREE.TextureLoader();
            textureLoader.setCrossOrigin("anonymous");

            // Load a beautiful night earth map to match the aesthetic and show city lights
            const earthMap = textureLoader.load('https://unpkg.com/three-globe/example/img/earth-night.jpg');

            const sphereGeo = new THREE.SphereGeometry(globeRadius, 64, 64);
            const sphereMat = new THREE.MeshPhongMaterial({
                map: earthMap,
                color: 0xffffff, // Use white so map colors show fully
                emissive: 0x111111,

                specular: 0x223355,
                shininess: 15,
                transparent: true,
                opacity: 0.98
            });
            const globeMesh = new THREE.Mesh(sphereGeo, sphereMat);
            globeGroup.add(globeMesh);

            // 2. Removed wireframe, using the actual map texture now

            // Add particles around the globe
            const particleGeo = new THREE.BufferGeometry();
            const particleCount = 200;
            const posArray = new Float32Array(particleCount * 3);
            for (let i = 0; i < particleCount * 3; i += 3) {
                const r = globeRadius + 5 + Math.random() * 20;
                const theta = Math.random() * Math.PI * 2;
                const phi = Math.acos((Math.random() * 2) - 1);
                posArray[i] = r * Math.sin(phi) * Math.cos(theta);
                posArray[i + 1] = r * Math.sin(phi) * Math.sin(theta);
                posArray[i + 2] = r * Math.cos(phi);
            }
            particleGeo.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
            const particleMat = new THREE.PointsMaterial({ size: 1.5, color: 0xc9a227, transparent: true, opacity: 0.6 });
            const particleMesh = new THREE.Points(particleGeo, particleMat);
            globeGroup.add(particleMesh);

            // 3. Atmosphere Glow (Removed per user request)
            /*
            const atmosGeo = new THREE.SphereGeometry(globeRadius + 8, 64, 64);
            const atmosMat = new THREE.MeshBasicMaterial({
                color: 0xc9a227,
                transparent: true,
                opacity: 0.05,
                side: THREE.BackSide
            });
            const atmosMesh = new THREE.Mesh(atmosGeo, atmosMat);
            globeGroup.add(atmosMesh);
            */

            // Orbit Rings
            const orbits = [
                { radius: 100, speed: 0.002, angle: 0, direction: 1, tilt: 0.2 },
                { radius: 125, speed: 0.0015, angle: Math.PI / 3, direction: -1, tilt: -0.1 },
                { radius: 150, speed: 0.001, angle: Math.PI, direction: 1, tilt: 0.3 }
            ];

            orbits.forEach(orbit => {
                const ringGeo = new THREE.RingGeometry(orbit.radius - 0.5, orbit.radius + 0.5, 64);
                const ringMat = new THREE.MeshBasicMaterial({ color: 0xc9a227, transparent: true, opacity: 0.2, side: THREE.DoubleSide });
                const ring = new THREE.Mesh(ringGeo, ringMat);
                ring.rotation.x = Math.PI / 2 + orbit.tilt;
                globeGroup.add(ring);
            });

            // Partner Data
            const partners = [
                { name: "Amazon Kindle", platform: "E-Reader Dist.", desc: "Global ebook distribution to millions of Kindle devices.", orbitIndex: 2, logo: "/images/globe.png" },
                { name: "Google Books", platform: "Digital Library", desc: "Indexed and sold through the massive Google Play ecosystem.", orbitIndex: 2, logo: "https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" },
                { name: "Apple Books", platform: "iOS Ecosystem", desc: "Premium placement for users across all Apple devices.", orbitIndex: 1, logo: "https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" },
                { name: "Kobo Books", platform: "International", desc: "Strong presence in Canada, Japan, and European markets.", orbitIndex: 1, logo: "https://upload.wikimedia.org/wikipedia/commons/e/ec/Rakuten_logo.svg" },
                { name: "Barnes & Noble", platform: "Nook & Print", desc: "US retail distribution and Nook digital storefronts.", orbitIndex: 0, logo: "https://upload.wikimedia.org/wikipedia/commons/5/5e/Barnes_%26_Noble_logo.svg" },
                { name: "IngramSpark", platform: "Global Print", desc: "Connecting to 40,000+ independent bookstores and libraries.", orbitIndex: 0, logo: "https://upload.wikimedia.org/wikipedia/commons/8/89/Book_icon_%28closed%29_-_Blue_and_gold.svg" },
            ];

            // Create HTML Satellites
            const satellites = [];
            partners.forEach((partner, i) => {
                // Distribute them evenly on their orbits
                const countInOrbit = partners.filter(p => p.orbitIndex === partner.orbitIndex).length;
                const indexInOrbit = partners.filter((p, idx) => idx < i && p.orbitIndex === partner.orbitIndex).length;
                const angleOffset = (Math.PI * 2 / countInOrbit) * indexInOrbit;

                const el = document.createElement('div');
                el.className = 'partner-logo-satellite pointer-events-auto';
                el.innerHTML = `
                                                            <img src="${partner.logo}" loading="lazy" alt="${partner.name} logo" onerror="this.src='https://via.placeholder.com/60?text=${partner.name.charAt(0)}'" />
                                                            <div class="partner-info-card">
                                                                <div class="partner-card-subtitle">${partner.platform}</div>
                                                                <div class="partner-card-title">${partner.name}</div>
                                                                <div class="partner-card-desc">${partner.desc}</div>
                                                                <a href="#" class="partner-card-link">Learn More &rarr;</a>
                                                            </div>
                                                        `;
                satellitesContainer.appendChild(el);

                satellites.push({
                    element: el,
                    orbitIndex: partner.orbitIndex,
                    angle: angleOffset,
                    isHovered: false
                });

                // Pause on hover
                el.addEventListener('mouseenter', () => {
                    satellites[i].isHovered = true;
                    el.classList.add('hovered-state');
                });
                el.addEventListener('mouseleave', () => {
                    satellites[i].isHovered = false;
                    el.classList.remove('hovered-state');
                });
            });

            // Drag & Inertia Interaction
            let isDragging = false;
            let previousMousePosition = { x: 0, y: 0 };
            let rotationVelocity = { x: 0.002, y: 0.001 }; // initial auto-spin

            const interactiveArea = document.getElementById('globe-interactive-area');

            interactiveArea.addEventListener('mousedown', (e) => {
                isDragging = true;
                previousMousePosition = { x: e.offsetX, y: e.offsetY };
                interactiveArea.style.cursor = 'grabbing';
            });

            interactiveArea.addEventListener('mousemove', (e) => {
                if (isDragging) {
                    const deltaMove = {
                        x: e.offsetX - previousMousePosition.x,
                        y: e.offsetY - previousMousePosition.y
                    };

                    rotationVelocity.x = deltaMove.x * 0.005;
                    rotationVelocity.y = deltaMove.y * 0.005;

                    globeGroup.rotation.y += rotationVelocity.x;
                    globeGroup.rotation.x += rotationVelocity.y;

                    previousMousePosition = { x: e.offsetX, y: e.offsetY };
                }
            });

            window.addEventListener('mouseup', () => {
                isDragging = false;
                interactiveArea.style.cursor = 'grab';
            });
            interactiveArea.addEventListener('mouseleave', () => {
                isDragging = false;
                interactiveArea.style.cursor = 'grab';
            });

            // Touch support
            interactiveArea.addEventListener('touchstart', (e) => {
                isDragging = true;
                previousMousePosition = { x: e.touches[0].clientX, y: e.touches[0].clientY };
            }, { passive: true });
            interactiveArea.addEventListener('touchmove', (e) => {
                if (isDragging) {
                    const deltaMove = {
                        x: e.touches[0].clientX - previousMousePosition.x,
                        y: e.touches[0].clientY - previousMousePosition.y
                    };
                    rotationVelocity.x = deltaMove.x * 0.005;
                    rotationVelocity.y = deltaMove.y * 0.005;
                    globeGroup.rotation.y += rotationVelocity.x;
                    globeGroup.rotation.x += rotationVelocity.y;
                    previousMousePosition = { x: e.touches[0].clientX, y: e.touches[0].clientY };
                }
            }, { passive: true });
            interactiveArea.addEventListener('touchend', () => { isDragging = false; });

            // Animation Loop
            let halfW = container.clientWidth / 2;
            let halfH = container.clientHeight / 2;

            function animate() {
                requestAnimationFrame(animate);

                // Apply inertia
                if (!isDragging) {
                    globeGroup.rotation.y += rotationVelocity.x;
                    globeGroup.rotation.x += rotationVelocity.y;

                    // Friction
                    rotationVelocity.x *= 0.95;
                    rotationVelocity.y *= 0.95;

                    // Baseline auto-spin
                    if (Math.abs(rotationVelocity.x) < 0.001) rotationVelocity.x += 0.0001 * (rotationVelocity.x > 0 ? 1 : -1);
                    if (Math.abs(rotationVelocity.x) < 0.002) rotationVelocity.x = 0.002;
                }

                // Limit X rotation
                globeGroup.rotation.x = Math.max(-Math.PI / 4, Math.min(Math.PI / 4, globeGroup.rotation.x));

                // Rotate particles slowly
                particleMesh.rotation.y -= 0.001;

                // Update Satellites
                satellites.forEach(sat => {
                    const orbit = orbits[sat.orbitIndex];

                    // Only move if not hovered
                    if (!sat.isHovered) {
                        sat.angle += orbit.speed * orbit.direction;
                    }

                    // Calculate 3D position based on orbit params
                    // We tilt it around X axis initially
                    const vector = new THREE.Vector3(
                        Math.cos(sat.angle) * orbit.radius,
                        0,
                        Math.sin(sat.angle) * orbit.radius
                    );

                    // Apply the ring's tilt
                    const euler = new THREE.Euler(orbit.tilt, 0, 0);
                    vector.applyEuler(euler);

                    // Apply globe group's rotation to get world position
                    vector.applyEuler(globeGroup.rotation);

                    // Project to 2D screen space
                    const projected = vector.clone();
                    projected.project(camera);

                    const screenX = (projected.x * halfW) + halfW;
                    const screenY = -(projected.y * halfH) + halfH;

                    // Globe radius is 70.
                    // We smoothly fade out elements when they go behind the globe
                    const opacity = vector.z < 20 ? Math.max(0, (vector.z + 50) / 70) : 1;
                    
                    if (opacity <= 0.05) {
                        sat.element.style.display = 'none';
                    } else {
                        sat.element.style.display = 'flex';
                        // Depth goes from roughly -150 to +150. Normalize to 0-1 for scaling.
                        const depth = (vector.z + 150) / 300;

                        let scaleBase = depth * 0.5 + 0.6;
                        let finalScale = sat.isHovered ? scaleBase * 1.3 : scaleBase;

                        sat.element.style.transform = `translate(-50%, -50%) translate(${screenX}px, ${screenY}px) scale(${finalScale})`;
                        sat.element.style.opacity = opacity;

                        // Don't overwrite z-index if hovered so card stays on top
                        if (!sat.isHovered) {
                            sat.element.style.zIndex = vector.z > 0 ? 40 : 20;
                        }
                    }
                });

                renderer.render(scene, camera);
            }

            animate();

            // Handle Resize
            window.addEventListener('resize', () => {
                halfW = container.clientWidth / 2;
                halfH = container.clientHeight / 2;
                camera.aspect = container.clientWidth / container.clientHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(container.clientWidth, container.clientHeight);
            });
        });
    </script>

    <!-- Voices of Appreciation (Hall of Recognition) -->
    <style>
        /* Hall of Recognition Parallax & Layout */
        #hall-of-recognition {
            position: relative;
            background-image: url('{{ asset('images/global.png') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #ffffff;
            overflow: hidden;
            font-family: 'Inter', sans-serif;
            border-top: 1px solid rgba(196, 160, 82, 0.2);
        }

        .hor-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(10, 5, 2, 0.9), rgba(10, 5, 2, 0.5), rgba(10, 5, 2, 0.9));
            pointer-events: none;
            z-index: 0;
        }

        .hor-bg-layer {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        /* 3D Book Styles */
        .preserve-3d {
            transform-style: preserve-3d;
        }

        .book-page {
            backface-visibility: hidden;
            transform-origin: left center;
            box-shadow: inset 5px 0 20px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            padding: 2rem;
        }

        .book-page-back {
            position: absolute;
            inset: 0;
            background: #f4eee1;
            transform: rotateY(180deg);
            backface-visibility: hidden;
        }

        .gold-text {
            background: linear-gradient(135deg, #c9a227 0%, #e6cd73 50%, #c9a227 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        @keyframes sweep {
            0% {
                transform: translateX(-100%) skewX(-20deg);
            }

            100% {
                transform: translateX(200%) skewX(-20deg);
            }
        }
    </style>

    <section id="hall-of-recognition">
        <div class="hor-overlay z-0"></div>

        <!-- Intro Header & Featured Award -->
        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 pt-32 pb-32 text-center" id="hor-intro">
            <span class="text-xs font-semibold text-[#C4A052] uppercase tracking-widest block mb-4">Achievements</span>
            <h2 class="text-4xl md:text-6xl font-extrabold text-white drop-shadow-md mb-4" style="font-family: serif;">Voices of
                Appreciation</h2>
            <p class="text-lg md:text-xl text-slate-300 drop-shadow-sm italic mb-16">"Recognized for Excellence Worldwide"</p>

            <!-- Featured Award Glass Card -->
            <div
                class="mx-auto max-w-3xl p-8 md:p-12 rounded-3xl bg-black/60 border border-[#C4A052]/40 backdrop-blur-xl shadow-[0_30px_60px_-15px_rgba(0,0,0,0.5)] relative overflow-hidden group transition-transform duration-500 hover:-translate-y-2 hover:shadow-[0_40px_80px_-15px_rgba(196,160,82,0.4)]">
                <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent pointer-events-none"></div>
                <div class="relative z-10">
                    <span class="text-6xl block mb-6 drop-shadow-lg">🏆</span>
                    <h3 class="text-3xl md:text-4xl font-bold mb-3 text-white drop-shadow-sm">Global Publisher of the Year</h3>
                    <p class="text-sm font-bold text-[#C4A052] tracking-[0.2em] uppercase mb-6">Independent Press Award •
                        2025</p>
                    <p class="text-slate-300 leading-relaxed max-w-xl mx-auto drop-shadow-sm">Selected as the premier publishing design and
                        distribution platform, demonstrating unparalleled commitment to author success and literary
                        excellence across continents.</p>
                </div>
                <div
                    class="absolute inset-0 translate-x-[-100%] group-hover:animate-[sweep_2s_ease-in-out_infinite] bg-gradient-to-r from-transparent via-white/10 to-transparent transform skew-x-[-20deg]">
                </div>
            </div>
        </div>

        <!-- Clean Static Timeline / Awards -->
        <div class="relative z-10 w-full max-w-6xl mx-auto px-4 pb-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- 2022 -->
                <div
                    class="p-6 bg-black/50 backdrop-blur-md border border-[#C4A052]/30 rounded-2xl shadow-sm text-center hover:-translate-y-1 transition-transform">
                    <div class="text-3xl font-bold text-[#C4A052] mb-3 font-serif drop-shadow-sm">2022</div>
                    <h4 class="font-bold text-white text-lg mb-2">First Recognition</h4>
                    <p class="text-sm text-slate-300">Establishing a new standard in independent publishing.</p>
                </div>
                <!-- 2023 -->
                <div
                    class="p-6 bg-black/50 backdrop-blur-md border border-[#C4A052]/30 rounded-2xl shadow-sm text-center hover:-translate-y-1 transition-transform">
                    <div class="text-3xl font-bold text-[#C4A052] mb-3 font-serif drop-shadow-sm">2023</div>
                    <h4 class="font-bold text-white text-lg mb-2">Publishing Excellence</h4>
                    <p class="text-sm text-slate-300">Recognized for outstanding editorial support and distribution.</p>
                </div>
                <!-- 2024 -->
                <div
                    class="p-6 bg-black/50 backdrop-blur-md border border-[#C4A052]/30 rounded-2xl shadow-sm text-center hover:-translate-y-1 transition-transform">
                    <div class="text-3xl font-bold text-[#C4A052] mb-3 font-serif drop-shadow-sm">2024</div>
                    <h4 class="font-bold text-white text-lg mb-2">Global Expansion</h4>
                    <p class="text-sm text-slate-300">Reaching authors and readers across 45+ distribution networks.</p>
                </div>
                <!-- 2025 -->
                <div
                    class="p-6 bg-black/50 backdrop-blur-md border border-[#C4A052]/50 rounded-2xl shadow-md text-center ring-2 ring-[#C4A052]/30 hover:-translate-y-1 transition-transform">
                    <div class="text-3xl font-bold text-[#C4A052] mb-3 font-serif drop-shadow-sm">2025</div>
                    <h4 class="font-bold text-white text-lg mb-2">Industry Award</h4>
                    <p class="text-sm text-slate-300">Celebrating our legacy in literary excellence and author success.</p>
                </div>
            </div>

            <div class="mt-12 text-center">
                <button type="button" onclick="document.getElementById('recognitions-modal').classList.remove('hidden')"
                    class="px-8 py-3.5 bg-[#C4A052] hover:bg-[#a88849] text-white font-bold rounded shadow-lg transition-colors inline-flex items-center gap-2">
                    View All Recognitions <span>&rarr;</span>
                </button>
            </div>
        </div>

        <!-- Premium Statistics -->
        <div class="relative z-10 w-full max-w-5xl mx-auto px-4 pb-32">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 text-center hor-stats-grid">
                <div class="p-6 bg-black/50 backdrop-blur-md rounded-2xl border border-[#C4A052]/30 transition-transform hover:-translate-y-1">
                    <div class="text-3xl font-extrabold text-white mb-2 font-serif drop-shadow-sm"><span class="hor-counter"
                            data-target="25">0</span>+</div>
                    <div class="text-xs text-[#C4A052] font-bold tracking-wider uppercase">Industry Awards</div>
                </div>
                <div class="p-6 bg-black/50 backdrop-blur-md rounded-2xl border border-[#C4A052]/30 transition-transform hover:-translate-y-1">
                    <div class="text-3xl font-extrabold text-white mb-2 font-serif drop-shadow-sm"><span class="hor-counter"
                            data-target="4.9">0</span></div>
                    <div class="text-xs text-[#C4A052] font-bold tracking-wider uppercase">Average Rating</div>
                </div>
                <div class="p-6 bg-black/50 backdrop-blur-md rounded-2xl border border-[#C4A052]/30 transition-transform hover:-translate-y-1">
                    <div class="text-3xl font-extrabold text-white mb-2 font-serif drop-shadow-sm"><span class="hor-counter"
                            data-target="1000">0</span>+</div>
                    <div class="text-xs text-[#C4A052] font-bold tracking-wider uppercase">Books Published</div>
                </div>
                <div class="p-6 bg-black/50 backdrop-blur-md rounded-2xl border border-[#C4A052]/30 transition-transform hover:-translate-y-1">
                    <div class="text-3xl font-extrabold text-white mb-2 font-serif drop-shadow-sm"><span class="hor-counter"
                            data-target="25">0</span>+</div>
                    <div class="text-xs text-[#C4A052] font-bold tracking-wider uppercase">Countries</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts for Hall of Recognition -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

            // --- Stats Counters ---
            const counters = document.querySelectorAll('.hor-counter');
            counters.forEach(counter => {
                ScrollTrigger.create({
                    trigger: ".hor-stats-grid",
                    start: "top 80%",
                    onEnter: () => {
                        let target = parseFloat(counter.dataset.target);
                        let isDecimal = counter.dataset.target.includes('.');
                        gsap.to(counter, {
                            innerHTML: target,
                            duration: 2,
                            snap: isDecimal ? { innerHTML: 0.1 } : { innerHTML: 1 },
                            ease: "power2.out",
                            onUpdate: function () {
                                if (isDecimal) counter.innerHTML = parseFloat(counter.innerHTML).toFixed(1);
                            }
                        });
                    },
                    once: true
                });
            });
        });
    </script>




    <!-- Recognitions Modal -->
    <div id="recognitions-modal" class="fixed inset-0 z-[10000] hidden">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm"
            onclick="document.getElementById('recognitions-modal').classList.add('hidden')"></div>

        <!-- Modal Content -->
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-lg bg-black/80 backdrop-blur-xl border border-[#C4A052]/30 rounded-2xl shadow-2xl p-6 md:p-8">
            <div class="flex justify-between items-center mb-6 border-b border-white/10 pb-4">
                <h3 class="text-2xl font-serif font-bold text-white">All Recognitions</h3>
                <button onclick="document.getElementById('recognitions-modal').classList.add('hidden')"
                    class="text-slate-300 hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="space-y-4 max-h-[60vh] overflow-y-auto pr-2 custom-scrollbar">
                <!-- Recognition Item -->
                <div
                    class="flex items-start gap-4 p-4 rounded-xl bg-white/5 border border-white/10 hover:border-yellow-500/50 hover:bg-white/10 transition-colors">
                    <div
                        class="w-12 h-12 rounded-full bg-yellow-500/20 flex items-center justify-center text-yellow-500 font-bold shrink-0 shadow-inner">
                        2022
                    </div>
                    <div>
                        <h4 class="font-bold text-white">First Recognition</h4>
                        <p class="text-sm text-slate-300 mt-1">Awarded for establishing a new standard in independent
                            publishing.</p>
                    </div>
                </div>

                <!-- Recognition Item -->
                <div
                    class="flex items-start gap-4 p-4 rounded-xl bg-white/5 border border-white/10 hover:border-yellow-500/50 hover:bg-white/10 transition-colors">
                    <div
                        class="w-12 h-12 rounded-full bg-yellow-500/20 flex items-center justify-center text-yellow-500 font-bold shrink-0 shadow-inner">
                        2023
                    </div>
                    <div>
                        <h4 class="font-bold text-white">Publishing Excellence</h4>
                        <p class="text-sm text-slate-300 mt-1">Recognized for outstanding editorial support and global
                            distribution networks.</p>
                    </div>
                </div>

                <!-- Recognition Item -->
                <div
                    class="flex items-start gap-4 p-4 rounded-xl bg-white/5 border border-white/10 hover:border-yellow-500/50 hover:bg-white/10 transition-colors">
                    <div
                        class="w-12 h-12 rounded-full bg-yellow-500/20 flex items-center justify-center text-yellow-500 font-bold shrink-0 shadow-inner">
                        2024
                    </div>
                    <div>
                        <h4 class="font-bold text-white">Global Expansion</h4>
                        <p class="text-sm text-slate-300 mt-1">Honored for successfully reaching authors and readers across
                            45+ distribution networks.</p>
                    </div>
                </div>

                <!-- Recognition Item -->
                <div
                    class="flex items-start gap-4 p-4 rounded-xl bg-white/5 border border-white/10 hover:border-yellow-500/50 hover:bg-white/10 transition-colors">
                    <div
                        class="w-12 h-12 rounded-full bg-yellow-500/20 flex items-center justify-center text-yellow-500 font-bold shrink-0 shadow-inner">
                        2025
                    </div>
                    <div>
                        <h4 class="font-bold text-white">Industry Award</h4>
                        <p class="text-sm text-slate-300 mt-1">Celebrating our continued legacy in building literary
                            excellence and author success.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>

    <!-- Swiper JS and CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .book-showcase-swiper {
            width: 100%;
            padding-top: 40px;
            padding-bottom: 20px;
        }

        .book-showcase-swiper .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 115px;
            height: 155px;
            /* Removing harsh shadow, relying on subtle 3D lighting */
            transition: transform 0.5s ease;
        }

        @media (min-width: 640px) {
            .book-showcase-swiper .swiper-slide {
                width: 150px;
                height: 200px;
            }
        }

        @media (min-width: 1024px) {
            .book-showcase-swiper .swiper-slide {
                width: 195px;
                height: 260px;
            }
        }

        /* Active hover effect instead of heavy shadow */
        .book-showcase-swiper .swiper-slide:hover {
            transform: translateY(-5px);
        }

        /* 3D Book wrapper with negative rotation to show the right pages (like the design) */
        .book-3d-showcase {
            position: relative;
            width: 160px;
            height: 240px;
            transform-style: preserve-3d;
            transform: rotateX(5deg) rotateY(-25deg);
            transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        
        .swiper-slide:hover .book-3d-showcase {
            transform: rotateX(2deg) rotateY(-5deg) translateY(-10px) translateZ(30px);
        }

        .book-3d-showcase .book-face {
            position: absolute;
            backface-visibility: hidden;
        }

        .book-3d-showcase .book-front {
            inset: 0;
            transform: translateZ(15px);
            border-radius: 2px 6px 6px 2px;
            overflow: hidden;
            box-shadow: inset 4px 0 10px rgba(0,0,0,0.1);
            border-left: 1px solid rgba(255,255,255,0.2);
        }

        .book-3d-showcase .book-back {
            inset: 0;
            transform: rotateY(180deg) translateZ(15px);
            background: #0f131a;
            border-radius: 6px 2px 2px 6px;
            border-right: 1px solid rgba(255,255,255,0.1);
        }

        .book-3d-showcase .book-spine {
            width: 30px;
            height: 100%;
            left: 50%;
            top: 0;
            margin-left: -15px;
            transform: rotateY(-90deg) translateZ(80px);
            background: linear-gradient(to right, #05070a, #151a24 20%, #0a0d14 80%, #05070a);
            border-left: 1px solid rgba(255,255,255,0.05);
        }

        .book-3d-showcase .book-pages-right {
            width: 26px;
            height: 96%;
            top: 2%;
            left: 50%;
            margin-left: -13px;
            transform: rotateY(90deg) translateZ(77px);
            background: repeating-linear-gradient(to right, #e2e8f0, #e2e8f0 2px, #cbd5e1 3px, #f8fafc 3px);
            box-shadow: inset 0 0 10px rgba(0,0,0,0.1);
        }

        .book-3d-showcase .book-pages-top {
            width: 96%;
            height: 26px;
            left: 2%;
            top: 50%;
            margin-top: -13px;
            transform: rotateX(90deg) translateZ(117px);
            background: repeating-linear-gradient(to bottom, #e2e8f0, #e2e8f0 2px, #cbd5e1 3px, #f8fafc 3px);
        }

        .book-3d-showcase .book-pages-bottom {
            width: 96%;
            height: 26px;
            left: 2%;
            top: 50%;
            margin-top: -13px;
            transform: rotateX(-90deg) translateZ(117px);
            background: #cbd5e1;
        }

        @media (min-width: 640px) {
            .book-3d-showcase {
                width: 200px;
                height: 300px;
            }
            .book-3d-showcase .book-front { transform: translateZ(20px); }
            .book-3d-showcase .book-back { transform: rotateY(180deg) translateZ(20px); }
            
            .book-3d-showcase .book-spine {
                width: 40px; margin-left: -20px; transform: rotateY(-90deg) translateZ(100px);
            }
            .book-3d-showcase .book-pages-right {
                width: 36px; margin-left: -18px; transform: rotateY(90deg) translateZ(97px);
            }
            .book-3d-showcase .book-pages-top {
                height: 36px; margin-top: -18px; transform: rotateX(90deg) translateZ(147px);
            }
            .book-3d-showcase .book-pages-bottom {
                height: 36px; margin-top: -18px; transform: rotateX(-90deg) translateZ(147px);
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.book-showcase-swiper', {
                grabCursor: true,
                centeredSlides: true,
                loop: true,
                slidesPerView: 2, // Mobile default
                speed: 1000, // Smooth easing
                spaceBetween: 10, // Books closer together
                autoplay: {
                    delay: 4000, // Auto-scroll every 4 seconds
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true, // Pause on hover
                },
                breakpoints: {
                    640: {
                        slidesPerView: 3, // Tablet
                        spaceBetween: 15,
                    },
                    1024: {
                        slidesPerView: 5, // Exactly 5 books visible like the design
                        spaceBetween: 15, // Reduced gap between books
                    }
                }
            });
        });
    </script>

@endsection