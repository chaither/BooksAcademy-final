@extends('layouts.web')

@section('content')
    <style>
        /* Pressroom specific styles */
        .hero-bg-overlay {
            background: linear-gradient(to right, rgba(10, 13, 20, 0.95) 0%, rgba(10, 13, 20, 0.7) 40%, rgba(10, 13, 20, 0.3) 100%);
        }

        .timeline-dotted-line {
            position: relative;
        }

        .timeline-dotted-line::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 0;
            border-top: 1px dashed #d1d5db;
            /* slate-300 */
            z-index: 0;
        }

        .stat-node {
            position: relative;
            z-index: 10;
            background: #0f131a;
        }

        .badge-featured {
            background: linear-gradient(to right, #d4af37, #eab308);
            clip-path: polygon(0 0, 100% 0, 90% 100%, 0 100%);
            padding: 4px 16px 4px 12px;
        }

        .glass-search {
            background: rgba(15, 19, 26, 0.9);
            backdrop-filter: blur(10px);
        }

        .gradient-overlay-dark {
            background: linear-gradient(to right, rgba(10, 13, 20, 0.95) 0%, rgba(10, 13, 20, 0.7) 50%, rgba(10, 13, 20, 0) 100%),
                linear-gradient(to top, rgba(10, 13, 20, 0.9) 0%, transparent 50%);
        }

        /* Custom line clamp for descriptions */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <div class="bg-[#0a0d14] min-h-screen pb-20">

        <!-- Hero Section -->
        <section class="relative w-full h-[600px] flex items-center pt-20">
            <!-- Background Video -->
            <div class="absolute inset-0 z-0">
                <video autoplay loop muted playsinline class="w-full h-full object-cover object-top opacity-80">
                    <source src="{{ asset('images/pressroom.mp4') }}" type="video/mp4">
                    <img src="{{ asset('images/cover6.png') }}" alt="Pressroom Background"
                        class="w-full h-full object-cover object-top opacity-80">
                </video>
                <div class="absolute inset-0 hero-bg-overlay"></div>
                <!-- Bottom fade to background color -->
                <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-[#0a0d14] to-transparent"></div>
            </div>

            <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Top Search Bar (Floating) -->
                <div class="absolute top-0 right-4 sm:right-8 w-full max-w-xs sm:max-w-sm mt-8">
                    <div class="glass-search rounded-full flex items-center px-4 py-2.5 shadow-sm border border-white/10">
                        <input type="text" placeholder="Search news..."
                            class="w-full bg-transparent border-none focus:ring-0 text-sm text-slate-300 placeholder-slate-400 outline-none">
                        <button class="text-slate-400 hover:text-white transition-colors shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Hero Typography -->
                <div class="max-w-2xl mt-12 sm:mt-0 pt-10">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="text-[10px] font-bold text-[#d4af37] uppercase tracking-[0.2em]">BOOKS ACADEMY
                            NEWSROOM</span>
                        <div class="h-[1px] w-12 bg-[#d4af37]"></div>
                        <!-- Small diamond -->
                        <div class="w-1.5 h-1.5 transform rotate-45 bg-[#d4af37] -ml-2"></div>
                    </div>

                    <h1 class="text-5xl sm:text-6xl font-serif text-white leading-tight mb-6">
                        Latest <span class="text-[#d4af37]">Stories</span> in<br>Publishing & Literature
                    </h1>

                    <p class="text-sm text-slate-400 font-medium leading-relaxed max-w-lg">
                        Stay connected with the newest book launches, publishing milestones, literary awards, global
                        partnerships, author events, and industry insights from Books Academy.
                    </p>

                    <!-- Decorative elements matching the mockup under the text -->
                    <div class="mt-8 flex items-center gap-2 opacity-50">
                        <div class="w-1 h-1 transform rotate-45 bg-[#d4af37]"></div>
                        <div class="h-[1px] w-8 bg-[#d4af37]"></div>
                        <div class="w-1 h-1 transform rotate-45 bg-[#d4af37]"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Timeline Stats Bar (Overlapping) -->
        <div class="relative z-20 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 mb-16">
            <div
                class="bg-[#0f131a]/95 backdrop-blur-md rounded-[2rem] shadow-[0_20px_40px_rgba(10, 13, 20,0.05)] border border-white/5 p-6 sm:p-8 flex flex-col lg:flex-row items-center gap-8 lg:gap-12">

                <!-- Journey Title -->
                <div class="text-center shrink-0 pr-8 lg:border-r border-white/10">
                    <h3 class="text-2xl font-serif font-bold text-white">2026</h3>
                    <p class="text-[10px] uppercase font-bold text-slate-400 tracking-widest mt-1">Our Journey<br>Continues
                    </p>
                </div>

                <!-- Timeline Flow -->
                <div class="w-full timeline-dotted-line flex justify-between items-start">

                    <div class="stat-node text-center px-4 flex flex-col items-center group">
                        <div
                            class="w-12 h-12 rounded-full bg-[#0f131a] border border-white/5 flex items-center justify-center mb-3 group-hover:border-[#d4af37] group-hover:shadow-md transition-all">
                            <!-- Book Icon -->
                            <svg class="w-6 h-6 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-xs font-bold text-white">Book Launch</h4>
                        <p class="text-[9px] text-slate-400 mt-0.5">New Releases</p>
                    </div>

                    <div class="stat-node text-center px-4 flex flex-col items-center group">
                        <div
                            class="w-12 h-12 rounded-full bg-[#0f131a] border border-white/5 flex items-center justify-center mb-3 group-hover:border-[#d4af37] group-hover:shadow-md transition-all">
                            <!-- People Icon -->
                            <svg class="w-6 h-6 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-xs font-bold text-white">Author Event</h4>
                        <p class="text-[9px] text-slate-400 mt-0.5">Meet & Connect</p>
                    </div>

                    <div class="stat-node text-center px-4 flex flex-col items-center group">
                        <div
                            class="w-12 h-12 rounded-full bg-[#0f131a] border border-white/5 flex items-center justify-center mb-3 group-hover:border-[#d4af37] group-hover:shadow-md transition-all">
                            <!-- Trophy Icon -->
                            <svg class="w-6 h-6 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-xs font-bold text-white">Award</h4>
                        <p class="text-[9px] text-slate-400 mt-0.5">Achievements</p>
                    </div>

                    <div class="stat-node text-center px-4 flex flex-col items-center group">
                        <div
                            class="w-12 h-12 rounded-full bg-[#0f131a] border border-white/5 flex items-center justify-center mb-3 group-hover:border-[#d4af37] group-hover:shadow-md transition-all">
                            <!-- Globe Icon -->
                            <svg class="w-6 h-6 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-xs font-bold text-white">Global Expansion</h4>
                        <p class="text-[9px] text-slate-400 mt-0.5">New Partnerships</p>
                    </div>

                    <div class="stat-node text-center px-4 flex flex-col items-center group">
                        <div
                            class="w-12 h-12 rounded-full bg-[#0f131a] border border-white/5 flex items-center justify-center mb-3 group-hover:border-[#d4af37] group-hover:shadow-md transition-all">
                            <!-- Clipboard Icon -->
                            <svg class="w-6 h-6 text-[#d4af37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                                </path>
                            </svg>
                        </div>
                        <h4 class="text-xs font-bold text-white">Publishing Update</h4>
                        <p class="text-[9px] text-slate-400 mt-0.5">Industry Insights</p>
                    </div>

                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Filters & Sort Bar -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-6 mb-10">
                <!-- Categories Pill Menu -->
                <div class="flex items-center gap-2 overflow-x-auto w-full sm:w-auto pb-2 sm:pb-0 scrollbar-hide">
                    <button
                        class="px-5 py-2 rounded-full bg-[#d4af37] text-[#0a0d14] text-[11px] font-bold tracking-wider shrink-0">All</button>
                    <button
                        class="px-5 py-2 rounded-full bg-[#0f131a] border border-white/10 text-slate-300 hover:text-[#0a0d14] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Publishing</button>
                    <button
                        class="px-5 py-2 rounded-full bg-[#0f131a] border border-white/10 text-slate-300 hover:text-[#0a0d14] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Awards</button>
                    <button
                        class="px-5 py-2 rounded-full bg-[#0f131a] border border-white/10 text-slate-300 hover:text-[#0a0d14] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Book
                        Launches</button>
                    <button
                        class="px-5 py-2 rounded-full bg-[#0f131a] border border-white/10 text-slate-300 hover:text-[#0a0d14] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Events</button>
                    <button
                        class="px-5 py-2 rounded-full bg-[#0f131a] border border-white/10 text-slate-300 hover:text-[#0a0d14] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Marketing</button>
                    <button
                        class="px-5 py-2 rounded-full bg-[#0f131a] border border-white/10 text-slate-300 hover:text-[#0a0d14] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Authors</button>
                    <button
                        class="px-5 py-2 rounded-full bg-[#0f131a] border border-white/10 text-slate-300 hover:text-[#0a0d14] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Collaborations</button>
                </div>

                <!-- Sort Dropdown -->
                <div class="shrink-0">
                    <select
                        class="appearance-none bg-[#0f131a] border border-white/10 rounded-full px-5 py-2 pr-8 text-[11px] font-bold text-slate-300 outline-none cursor-pointer"
                        style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23475569%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right .7em top 50%; background-size: .65em auto;">
                        <option value="newest">Newest First</option>
                        <option value="oldest">Oldest First</option>
                        <option value="popular">Most Popular</option>
                    </select>
                </div>
            </div>

            <!-- News Grid Layout -->
            <div class="grid grid-cols-12 gap-6 mb-16">

                <!-- ROW 1 -->
                <!-- Article 1 -->
                <a href="{{ route('pressroom.article', 1) }}"
                    class="block col-span-12 lg:col-span-8 rounded-[1.5rem] overflow-hidden relative min-h-[400px] group shadow-sm hover:shadow-xl transition-shadow cursor-pointer">
                    <img src="{{ asset('images/nyt2.JPG') }}" alt="Times Square"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 gradient-overlay-dark mix-blend-multiply"></div>
                    <div class="absolute inset-0 gradient-overlay-dark"></div>

                    <div class="absolute inset-0 p-8 sm:p-10 flex flex-col justify-between">
                        <div>
                            <div
                                class="badge-featured text-[10px] font-bold text-white uppercase tracking-wider inline-block mb-6">
                                FEATURED
                            </div>
                            <div
                                class="flex items-center gap-3 text-[10px] font-bold text-white uppercase tracking-wider mb-4 opacity-90">
                                <span class="text-[#d4af37]">PUBLISHING</span>
                                <span>•</span>
                                <span>June 5, 2026</span>
                                <span>•</span>
                                <span class="bg-red-500 px-2 py-0.5 rounded text-[9px] flex items-center gap-1"><span
                                        class="w-1.5 h-1.5 rounded-full bg-[#0f131a] animate-pulse"></span> LIVE</span>
                            </div>
                            <h2 class="text-3xl sm:text-4xl font-serif font-bold text-white leading-tight max-w-xl mb-4">
                                Books Academy in New York Times Square!
                            </h2>
                            <p class="text-sm text-slate-300 max-w-md line-clamp-2 leading-relaxed">
                                From the pages of great stories to the heart of the world’s most iconic advertising
                                destination.
                            </p>
                        </div>

                        <div>
                            <button
                                class="bg-gradient-to-r from-[#d4af37] to-[#eab308] text-white px-6 py-2.5 rounded-full text-[11px] font-bold tracking-widest uppercase hover:-translate-y-0.5 transition-transform flex items-center gap-2">
                                Read Story
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </a>

                <!-- Article 2 -->
                <a href="{{ route('pressroom.article', 2) }}"
                    class="block col-span-12 md:col-span-6 lg:col-span-4 bg-[#0f131a] rounded-[1.5rem] overflow-hidden border border-white/5 shadow-sm hover:shadow-lg transition-shadow group flex flex-col cursor-pointer">
                    <div class="h-48 overflow-hidden relative">
                        <img src="{{ asset('images/fr2.JPG') }}" alt="Frankfurt Book Fair"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <span class="text-[10px] font-bold text-indigo-600 uppercase tracking-widest mb-2">EVENTS</span>
                        <div class="flex items-center gap-2 text-[10px] text-slate-400 font-medium mb-3">
                            <span>May 28, 2026</span>
                            <span>•</span>
                            <span>5 min read</span>
                        </div>
                        <h3
                            class="text-xl font-serif font-bold text-white mb-2 leading-tight group-hover:text-indigo-500 transition-colors">
                            Welcome to Frankfurt! 📚
                        </h3>
                        <p class="text-sm text-slate-400 leading-relaxed line-clamp-3 mb-6 flex-1">
                            Books Academy proudly takes part in the 2025 Frankfurt Book Fair, where stories, ideas, and
                            innovation come together on the global stage.
                        </p>
                        <div class="flex justify-end mt-auto text-slate-300 hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Article 3 -->
                <a href="{{ route('pressroom.article', 3) }}"
                    class="block col-span-12 md:col-span-6 lg:col-span-12 bg-[#0f131a] rounded-[1.5rem] overflow-hidden border border-white/5 shadow-sm hover:shadow-lg transition-shadow group flex flex-col md:flex-row cursor-pointer">
                    <div class="w-full md:w-2/5 h-64 md:h-auto overflow-hidden relative">
                        <img src="{{ asset('images/t2.jpg') }}" alt="Taipei International Book Exhibition"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="w-full md:w-3/5 p-8 flex flex-col flex-1 justify-center">
                        <span class="text-[10px] font-bold text-[#d4af37] uppercase tracking-widest mb-2">EXHIBITIONS</span>
                        <div class="flex items-center gap-2 text-[10px] text-slate-400 font-medium mb-4">
                            <span>May 15, 2026</span>
                            <span>•</span>
                            <span>4 min read</span>
                        </div>
                        <h3
                            class="text-2xl font-serif font-bold text-white mb-3 leading-tight group-hover:text-[#d4af37] transition-colors">
                            Welcome to Taipei! 🇹🇼📚
                        </h3>
                        <p class="text-sm text-slate-400 leading-relaxed mb-6">
                            Books Academy is delighted to be part of the Taipei International Book Exhibition.
                        </p>
                        <div
                            class="flex items-center text-slate-300 hover:text-[#d4af37] text-xs font-bold uppercase tracking-wider transition-colors mt-auto">
                            Read Full Announcement
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </a>

            </div>

            <!-- Bottom Banner (Explore More Stories) -->
            <div
                class="w-full bg-[#d4af37] rounded-[2rem] overflow-hidden relative flex flex-col md:flex-row items-center p-8 sm:p-12 lg:p-16 mb-8 shadow-2xl">
                <!-- Background effects -->
                <div class="absolute inset-0 bg-gradient-to-r from-[#0F1B3D] via-[#0F1B3D]/90 to-transparent z-10"></div>

                <!-- Glowing Book Graphic Placeholder -->
                <div
                    class="absolute right-0 top-0 bottom-0 w-1/2 opacity-60 mix-blend-screen z-0 bg-[url('https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=800')] bg-cover bg-center">
                </div>

                <div class="relative z-20 max-w-lg">
                    <span class="text-[10px] font-bold text-[#d4af37] uppercase tracking-widest mb-3 block">EXPLORE
                        MORE</span>
                    <h2 class="text-3xl sm:text-4xl font-serif font-bold text-white mb-4">Explore More Stories</h2>
                    <p class="text-sm text-slate-300 leading-relaxed mb-8">
                        Discover publishing insights, author success stories, literary events, and industry news from around
                        the world.
                    </p>
                    <div class="flex flex-wrap items-center gap-4">
                        <button
                            class="bg-gradient-to-r from-[#d4af37] to-[#eab308] text-white px-6 py-3 rounded-full text-xs font-bold tracking-widest uppercase hover:-translate-y-0.5 transition-transform flex items-center gap-2">
                            Browse Pressroom
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                        <button
                            class="text-white hover:text-[#d4af37] text-xs font-bold tracking-widest uppercase transition-colors flex items-center gap-2 px-4 py-3">
                            <div
                                class="w-8 h-8 rounded-full border border-current flex items-center justify-center shrink-0">
                                <svg class="w-3 h-3 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"></path>
                                </svg>
                            </div>
                            Watch Overview
                        </button>
                    </div>
                </div>
            </div>

        </main>
    </div>

@endsection