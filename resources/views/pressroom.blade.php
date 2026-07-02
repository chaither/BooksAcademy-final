@extends('layouts.web')

@section('content')
<style>
    /* Pressroom specific styles */
    .hero-bg-overlay {
        background: linear-gradient(to right, rgba(251, 250, 246, 0.95) 0%, rgba(251, 250, 246, 0.7) 40%, rgba(251, 250, 246, 0.3) 100%);
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
        border-top: 1px dashed #d1d5db; /* slate-300 */
        z-index: 0;
    }

    .stat-node {
        position: relative;
        z-index: 10;
        background: white;
    }

    .badge-featured {
        background: linear-gradient(to right, #C9A227, #eab308);
        clip-path: polygon(0 0, 100% 0, 90% 100%, 0 100%);
        padding: 4px 16px 4px 12px;
    }

    .glass-search {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
    }
    
    .gradient-overlay-dark {
        background: linear-gradient(to right, rgba(15,27,61,0.95) 0%, rgba(15,27,61,0.7) 50%, rgba(15,27,61,0) 100%),
                    linear-gradient(to top, rgba(15,27,61,0.9) 0%, transparent 50%);
    }

    /* Custom line clamp for descriptions */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
</style>

<div class="bg-[#FBFAF6] min-h-screen pb-20">
    
    <!-- Hero Section -->
    <section class="relative w-full h-[600px] flex items-center pt-20">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/cover6.png') }}" alt="Pressroom Background" class="w-full h-full object-cover object-top opacity-80">
            <div class="absolute inset-0 hero-bg-overlay"></div>
            <!-- Bottom fade to background color -->
            <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-[#FBFAF6] to-transparent"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Top Search Bar (Floating) -->
            <div class="absolute top-0 right-4 sm:right-8 w-full max-w-xs sm:max-w-sm mt-8">
                <div class="glass-search rounded-full flex items-center px-4 py-2.5 shadow-sm border border-white/50">
                    <input type="text" placeholder="Search news..." class="w-full bg-transparent border-none focus:ring-0 text-sm text-slate-700 placeholder-slate-400 outline-none">
                    <button class="text-slate-400 hover:text-[#0F1B3D] transition-colors shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Hero Typography -->
            <div class="max-w-2xl mt-12 sm:mt-0 pt-10">
                <div class="flex items-center gap-4 mb-4">
                    <span class="text-[10px] font-bold text-[#C9A227] uppercase tracking-[0.2em]">BOOKS ACADEMY NEWSROOM</span>
                    <div class="h-[1px] w-12 bg-[#C9A227]"></div>
                    <!-- Small diamond -->
                    <div class="w-1.5 h-1.5 transform rotate-45 bg-[#C9A227] -ml-2"></div>
                </div>
                
                <h1 class="text-5xl sm:text-6xl font-serif text-[#0F1B3D] leading-tight mb-6">
                    Latest <span class="text-[#C9A227]">Stories</span> in<br>Publishing & Literature
                </h1>
                
                <p class="text-sm text-slate-500 font-medium leading-relaxed max-w-lg">
                    Stay connected with the newest book launches, publishing milestones, literary awards, global partnerships, author events, and industry insights from Books Academy.
                </p>

                <!-- Decorative elements matching the mockup under the text -->
                <div class="mt-8 flex items-center gap-2 opacity-50">
                    <div class="w-1 h-1 transform rotate-45 bg-[#C9A227]"></div>
                    <div class="h-[1px] w-8 bg-[#C9A227]"></div>
                    <div class="w-1 h-1 transform rotate-45 bg-[#C9A227]"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Stats Bar (Overlapping) -->
    <div class="relative z-20 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 mb-16">
        <div class="bg-white/95 backdrop-blur-md rounded-[2rem] shadow-[0_20px_40px_rgba(15,27,61,0.05)] border border-slate-100 p-6 sm:p-8 flex flex-col lg:flex-row items-center gap-8 lg:gap-12">
            
            <!-- Journey Title -->
            <div class="text-center shrink-0 pr-8 lg:border-r border-slate-200">
                <h3 class="text-2xl font-serif font-bold text-[#0F1B3D]">2026</h3>
                <p class="text-[10px] uppercase font-bold text-slate-400 tracking-widest mt-1">Our Journey<br>Continues</p>
            </div>

            <!-- Timeline Flow -->
            <div class="w-full timeline-dotted-line flex justify-between items-start">
                
                <div class="stat-node text-center px-4 flex flex-col items-center group">
                    <div class="w-12 h-12 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mb-3 group-hover:border-[#C9A227] group-hover:shadow-md transition-all">
                        <!-- Book Icon -->
                        <svg class="w-6 h-6 text-[#C9A227]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h4 class="text-xs font-bold text-[#0F1B3D]">Book Launch</h4>
                    <p class="text-[9px] text-slate-400 mt-0.5">New Releases</p>
                </div>

                <div class="stat-node text-center px-4 flex flex-col items-center group">
                    <div class="w-12 h-12 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mb-3 group-hover:border-[#C9A227] group-hover:shadow-md transition-all">
                        <!-- People Icon -->
                        <svg class="w-6 h-6 text-[#C9A227]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h4 class="text-xs font-bold text-[#0F1B3D]">Author Event</h4>
                    <p class="text-[9px] text-slate-400 mt-0.5">Meet & Connect</p>
                </div>

                <div class="stat-node text-center px-4 flex flex-col items-center group">
                    <div class="w-12 h-12 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mb-3 group-hover:border-[#C9A227] group-hover:shadow-md transition-all">
                        <!-- Trophy Icon -->
                        <svg class="w-6 h-6 text-[#C9A227]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    </div>
                    <h4 class="text-xs font-bold text-[#0F1B3D]">Award</h4>
                    <p class="text-[9px] text-slate-400 mt-0.5">Achievements</p>
                </div>

                <div class="stat-node text-center px-4 flex flex-col items-center group">
                    <div class="w-12 h-12 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mb-3 group-hover:border-[#C9A227] group-hover:shadow-md transition-all">
                        <!-- Globe Icon -->
                        <svg class="w-6 h-6 text-[#C9A227]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-xs font-bold text-[#0F1B3D]">Global Expansion</h4>
                    <p class="text-[9px] text-slate-400 mt-0.5">New Partnerships</p>
                </div>

                <div class="stat-node text-center px-4 flex flex-col items-center group">
                    <div class="w-12 h-12 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center mb-3 group-hover:border-[#C9A227] group-hover:shadow-md transition-all">
                        <!-- Clipboard Icon -->
                        <svg class="w-6 h-6 text-[#C9A227]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    </div>
                    <h4 class="text-xs font-bold text-[#0F1B3D]">Publishing Update</h4>
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
                <button class="px-5 py-2 rounded-full bg-[#0F1B3D] text-white text-[11px] font-bold tracking-wider shrink-0">All</button>
                <button class="px-5 py-2 rounded-full bg-white border border-slate-200 text-slate-600 hover:text-[#0F1B3D] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Publishing</button>
                <button class="px-5 py-2 rounded-full bg-white border border-slate-200 text-slate-600 hover:text-[#0F1B3D] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Awards</button>
                <button class="px-5 py-2 rounded-full bg-white border border-slate-200 text-slate-600 hover:text-[#0F1B3D] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Book Launches</button>
                <button class="px-5 py-2 rounded-full bg-white border border-slate-200 text-slate-600 hover:text-[#0F1B3D] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Events</button>
                <button class="px-5 py-2 rounded-full bg-white border border-slate-200 text-slate-600 hover:text-[#0F1B3D] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Marketing</button>
                <button class="px-5 py-2 rounded-full bg-white border border-slate-200 text-slate-600 hover:text-[#0F1B3D] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Authors</button>
                <button class="px-5 py-2 rounded-full bg-white border border-slate-200 text-slate-600 hover:text-[#0F1B3D] text-[11px] font-bold tracking-wider shrink-0 transition-colors">Collaborations</button>
            </div>

            <!-- Sort Dropdown -->
            <div class="shrink-0">
                <select class="appearance-none bg-white border border-slate-200 rounded-full px-5 py-2 pr-8 text-[11px] font-bold text-slate-600 outline-none cursor-pointer" style="background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23475569%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'); background-repeat: no-repeat; background-position: right .7em top 50%; background-size: .65em auto;">
                    <option value="newest">Newest First</option>
                    <option value="oldest">Oldest First</option>
                    <option value="popular">Most Popular</option>
                </select>
            </div>
        </div>

        <!-- News Grid Layout -->
        <div class="grid grid-cols-12 gap-6 mb-16">
            
            <!-- ROW 1 -->
            <!-- Featured Large Article (col-span-8) -->
            <div class="col-span-12 lg:col-span-8 rounded-[1.5rem] overflow-hidden relative min-h-[400px] group shadow-sm hover:shadow-xl transition-shadow cursor-pointer">
                <!-- Background Image (Tokyo Tower placeholder) -->
                <img src="https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?q=80&w=1200" alt="Tokyo Distribution Center" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <!-- Overlay -->
                <div class="absolute inset-0 gradient-overlay-dark mix-blend-multiply"></div>
                <div class="absolute inset-0 gradient-overlay-dark"></div>

                <!-- Content -->
                <div class="absolute inset-0 p-8 sm:p-10 flex flex-col justify-between">
                    <div>
                        <div class="badge-featured text-[10px] font-bold text-white uppercase tracking-wider inline-block mb-6">
                            FEATURED
                        </div>
                        <div class="flex items-center gap-3 text-[10px] font-bold text-white uppercase tracking-wider mb-4 opacity-90">
                            <span class="text-[#C9A227]">PUBLISHING</span>
                            <span>•</span>
                            <span>June 5, 2026</span>
                            <span>•</span>
                            <span class="bg-red-500 px-2 py-0.5 rounded text-[9px] flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> LIVE</span>
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-serif font-bold text-white leading-tight max-w-xl mb-4">
                            Books Academy Opens Tokyo Distribution Center
                        </h2>
                        <p class="text-sm text-slate-300 max-w-md line-clamp-2 leading-relaxed">
                            Providing high-speed print-on-demand services across Southeast Asia to facilitate quicker author royalties and seamless global reach.
                        </p>
                    </div>

                    <div>
                        <button class="bg-gradient-to-r from-[#C9A227] to-[#eab308] text-white px-6 py-2.5 rounded-full text-[11px] font-bold tracking-widest uppercase hover:-translate-y-0.5 transition-transform flex items-center gap-2">
                            Read Story
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Top Article (col-span-4) -->
            <div class="col-span-12 md:col-span-6 lg:col-span-4 bg-white rounded-[1.5rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition-shadow group flex flex-col cursor-pointer">
                <div class="h-48 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=600" alt="Writers Retreat" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <span class="text-[10px] font-bold text-indigo-600 uppercase tracking-widest mb-2">EVENTS</span>
                    <div class="flex items-center gap-2 text-[10px] text-slate-400 font-medium mb-3">
                        <span>May 28, 2026</span>
                        <span>•</span>
                        <span>5 min read</span>
                    </div>
                    <h3 class="text-lg font-serif font-bold text-[#0F1B3D] mb-2 leading-snug group-hover:text-[#C9A227] transition-colors">
                        Annual Writers Retreat & Masterclass Series
                    </h3>
                    <p class="text-[13px] text-slate-500 leading-relaxed line-clamp-3 mb-6 flex-1">
                        Register now for online publishing seminars focused on creative illustration, character building, and targeted marketing strategies for independent authors.
                    </p>
                    <div class="flex justify-end mt-auto text-slate-300 hover:text-[#0F1B3D]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- ROW 2: 4 Standard Articles -->
            
            <!-- Article 1 -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 bg-white rounded-[1.5rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition-shadow group flex flex-col cursor-pointer">
                <div class="h-40 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1563461660947-507ef49e9c47?q=80&w=600" alt="Awards" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <span class="text-[9px] font-bold text-[#C9A227] uppercase tracking-widest mb-2">AWARDS</span>
                    <div class="flex items-center gap-2 text-[10px] text-slate-400 font-medium mb-2">
                        <span>May 15, 2026</span>
                        <span>•</span>
                        <span>4 min read</span>
                    </div>
                    <h3 class="text-base font-serif font-bold text-[#0F1B3D] mb-2 leading-tight group-hover:text-[#C9A227] transition-colors">
                        Independent Penholder Awards Finalists Released
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed line-clamp-3 mb-4 flex-1">
                        We congratulate four Books Academy authors who have been shortlisted in three global categories for their exceptional works this year.
                    </p>
                    <div class="flex justify-end mt-auto text-slate-300 hover:text-[#0F1B3D]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Article 2 -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 bg-white rounded-[1.5rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition-shadow group flex flex-col cursor-pointer">
                <div class="h-40 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=600" alt="Handshake" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <span class="text-[9px] font-bold text-blue-500 uppercase tracking-widest mb-2">COLLABORATIONS</span>
                    <div class="flex items-center gap-2 text-[10px] text-slate-400 font-medium mb-2">
                        <span>May 12, 2026</span>
                        <span>•</span>
                        <span>6 min read</span>
                    </div>
                    <h3 class="text-base font-serif font-bold text-[#0F1B3D] mb-2 leading-tight group-hover:text-blue-500 transition-colors">
                        New Partnership with Global Publishing Alliance
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed line-clamp-3 mb-4 flex-1">
                        Strengthening our global presence and expanding physical distribution opportunities for authors worldwide in over 50 countries.
                    </p>
                    <div class="flex justify-end mt-auto text-slate-300 hover:text-[#0F1B3D]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Article 3 -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 bg-white rounded-[1.5rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition-shadow group flex flex-col cursor-pointer">
                <div class="h-40 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=600" alt="Book" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <span class="text-[9px] font-bold text-[#C9A227] uppercase tracking-widest mb-2">BOOK LAUNCHES</span>
                    <div class="flex items-center gap-2 text-[10px] text-slate-400 font-medium mb-2">
                        <span>May 8, 2026</span>
                        <span>•</span>
                        <span>3 min read</span>
                    </div>
                    <h3 class="text-base font-serif font-bold text-[#0F1B3D] mb-2 leading-tight group-hover:text-[#C9A227] transition-colors">
                        New Children's Book Series Now Available
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed line-clamp-3 mb-4 flex-1">
                        A heartwarming collection of stories written by emerging authors for young readers, beautifully illustrated by our in-house team.
                    </p>
                    <div class="flex justify-end mt-auto text-slate-300 hover:text-[#0F1B3D]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Article 4 -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 bg-white rounded-[1.5rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg transition-shadow group flex flex-col cursor-pointer">
                <div class="h-40 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1455390582262-044cdead2708?q=80&w=600" alt="Writing" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <span class="text-[9px] font-bold text-emerald-500 uppercase tracking-widest mb-2">PUBLISHING</span>
                    <div class="flex items-center gap-2 text-[10px] text-slate-400 font-medium mb-2">
                        <span>May 2, 2026</span>
                        <span>•</span>
                        <span>4 min read</span>
                    </div>
                    <h3 class="text-base font-serif font-bold text-[#0F1B3D] mb-2 leading-tight group-hover:text-emerald-500 transition-colors">
                        How to Market Your Book Like a Pro
                    </h3>
                    <p class="text-xs text-slate-500 leading-relaxed line-clamp-3 mb-4 flex-1">
                        Expert tips on building your author brand, utilizing social media campaigns, and reaching your ideal readers effectively.
                    </p>
                    <div class="flex justify-end mt-auto text-slate-300 hover:text-[#0F1B3D]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom Banner (Explore More Stories) -->
        <div class="w-full bg-[#0F1B3D] rounded-[2rem] overflow-hidden relative flex flex-col md:flex-row items-center p-8 sm:p-12 lg:p-16 mb-8 shadow-2xl">
            <!-- Background effects -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#0F1B3D] via-[#0F1B3D]/90 to-transparent z-10"></div>
            
            <!-- Glowing Book Graphic Placeholder -->
            <div class="absolute right-0 top-0 bottom-0 w-1/2 opacity-60 mix-blend-screen z-0 bg-[url('https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=800')] bg-cover bg-center">
            </div>

            <div class="relative z-20 max-w-lg">
                <span class="text-[10px] font-bold text-[#C9A227] uppercase tracking-widest mb-3 block">EXPLORE MORE</span>
                <h2 class="text-3xl sm:text-4xl font-serif font-bold text-white mb-4">Explore More Stories</h2>
                <p class="text-sm text-slate-300 leading-relaxed mb-8">
                    Discover publishing insights, author success stories, literary events, and industry news from around the world.
                </p>
                <div class="flex flex-wrap items-center gap-4">
                    <button class="bg-gradient-to-r from-[#C9A227] to-[#eab308] text-[#0F1B3D] px-6 py-3 rounded-full text-xs font-bold tracking-widest uppercase hover:-translate-y-0.5 transition-transform flex items-center gap-2">
                        Browse Pressroom
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </button>
                    <button class="text-white hover:text-[#C9A227] text-xs font-bold tracking-widest uppercase transition-colors flex items-center gap-2 px-4 py-3">
                        <div class="w-8 h-8 rounded-full border border-current flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3 ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg>
                        </div>
                        Watch Overview
                    </button>
                </div>
            </div>
        </div>

    </main>
</div>

@endsection
