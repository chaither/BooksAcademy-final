@extends('layouts.web')

@section('content')
    <!-- Left Aligned Large Logo and Hero Content -->
    <section class="relative w-full min-h-[100dvh] flex flex-col justify-between -mt-24 pt-32 pb-8 px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12" style="background-image: url('{{ asset('images/cover1.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/20 via-black/5 to-transparent pointer-events-none z-0"></div>
        
        <!-- Top Hero Content -->
        <div class="w-full max-w-7xl mx-auto flex-1 flex flex-col justify-center mt-12 sm:mt-16 z-10">
            <div class="max-w-2xl space-y-5">
                <!-- Welcome text -->
                <div class="flex items-center gap-4">
                    <h4 class="text-xs sm:text-sm font-semibold tracking-[0.25em] text-slate-800 uppercase">Welcome To</h4>
                </div>
                
                <!-- Logo replaces BOOKS ACADEMY text -->
                <div id="logo-container" class="relative w-full max-w-[350px] sm:max-w-[450px] md:max-w-[600px] lg:max-w-[750px] xl:max-w-[850px] opacity-0 transition-all duration-[1200ms] ease-out -ml-16" style="transform: translateY(30px); will-change: transform, opacity;">
                    <img id="logo-large" src="{{ asset('images/L02.png') }}" alt="BooksAcademy Logo Large"
                        class="h-auto w-full object-contain origin-left opacity-0 transition-opacity duration-500 will-change-transform  -mt-10 -mb-24 " >
                    
                    <img id="logo-half-left" src="{{ asset('images/L02.png') }}" alt="BooksAcademy Logo Left"
                        class="absolute inset-0 h-auto w-full object-contain origin-left logo-half"
                        style="clip-path: inset(0 50% 0 0); transform: translateX(-40px); opacity: 0; transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1), opacity 1.2s ease-out;">
                    
                    <img id="logo-half-right" src="{{ asset('images/L02.png') }}" alt="BooksAcademy Logo Right"
                        class="absolute inset-0 h-auto w-full object-contain origin-left logo-half"
                        style="clip-path: inset(0 0 0 50%); transform: translateX(60px); opacity: 0; transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1), opacity 1.2s ease-out;">
                </div>

                <!-- Subtitle -->
                <p class="text-[10.5px] sm:text-xs font-bold tracking-[0.2em] text-slate-700 uppercase pt-2">Publishing Dreams, Creating Literary Excellence</p>

                <!-- Description -->
                <div class="text-sm sm:text-base text-slate-700 leading-relaxed font-serif pt-2 space-y-1">
                    <p>Empowering writers. Enriching readers.</p>
                    <p>We publish exceptional stories and</p>
                    <p>build a legacy of literary brilliance.</p>
                </div>

                <!-- Buttons -->
                <div class="flex items-center gap-4 pt-6">
                    <a href="{{ route('services') }}" class="px-6 py-3 rounded border border-transparent bg-[#111827] text-[#C4A052] text-xs sm:text-sm font-semibold tracking-wider hover:bg-slate-800 transition-colors flex items-center gap-2">
                        EXPLORE OUR SERVICES <span>&rarr;</span>
                    </a>
                    <a href="{{ route('bookstore') }}" class="px-6 py-3 rounded border border-[#C4A052] text-[#C4A052] text-xs sm:text-sm font-semibold tracking-wider hover:bg-[#C4A052] hover:text-white transition-colors flex items-center gap-2">
                        VISIT BOOKSTORE <span>&rarr;</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Feature Columns (Over dark blue wave) -->
        <div class="w-full max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center text-[#E5D3B3] pt-16 lg:pt-32 pb-4 z-10">
            <!-- Feature 1 -->
            <div class="flex flex-col items-center gap-3 border-transparent sm:border-r border-[#C4A052]/30 last:border-0 relative">
                <div class="w-12 h-12 rounded-full border border-[#C4A052] flex items-center justify-center text-[#C4A052] bg-[#111827]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                </div>
                <div class="px-2">
                    <h5 class="text-[#C4A052] text-xs sm:text-sm font-serif uppercase tracking-widest mb-1.5">Expert Publishing</h5>
                    <p class="text-[10px] sm:text-[11px] text-slate-300">Professional publishing<br>with a personal touch.</p>
                </div>
            </div>
            
            <!-- Feature 2 -->
            <div class="flex flex-col items-center gap-3 border-transparent lg:border-r border-[#C4A052]/30 last:border-0 relative">
                <div class="w-12 h-12 rounded-full border border-[#C4A052] flex items-center justify-center text-[#C4A052] bg-[#111827]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <div class="px-2">
                    <h5 class="text-[#C4A052] text-xs sm:text-sm font-serif uppercase tracking-widest mb-1.5">Author Support</h5>
                    <p class="text-[10px] sm:text-[11px] text-slate-300">Guiding authors from<br>manuscript to masterpiece.</p>
                </div>
            </div>
            
            <!-- Feature 3 -->
            <div class="flex flex-col items-center gap-3 border-transparent sm:border-r border-[#C4A052]/30 last:border-0 relative">
                <div class="w-12 h-12 rounded-full border border-[#C4A052] flex items-center justify-center text-[#C4A052] bg-[#111827]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                </div>
                <div class="px-2">
                    <h5 class="text-[#C4A052] text-xs sm:text-sm font-serif uppercase tracking-widest mb-1.5">Quality & Excellence</h5>
                    <p class="text-[10px] sm:text-[11px] text-slate-300">Committed to the highest<br>standards in every book.</p>
                </div>
            </div>
            
            <!-- Feature 4 -->
            <div class="flex flex-col items-center gap-3 border-transparent border-[#C4A052]/30 last:border-0 relative">
                <div class="w-12 h-12 rounded-full border border-[#C4A052] flex items-center justify-center text-[#C4A052] bg-[#111827]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <div class="px-2">
                    <h5 class="text-[#C4A052] text-xs sm:text-sm font-serif uppercase tracking-widest mb-1.5">Legacy Building</h5>
                    <p class="text-[10px] sm:text-[11px] text-slate-300">Creating timeless stories<br>that inspire generations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about-us" class="relative py-24 xl:py-32 2xl:py-40 min-h-screen flex flex-col justify-center bg-[#Fdfbf7] dark:bg-slate-900 border-y border-[#C4A052]/20 transition-colors overflow-hidden">
        
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/cover4.png') }}" alt="About Us Background" class="w-full h-full object-cover opacity-100 mix-blend-multiply dark:mix-blend-screen dark:opacity-30">
        </div>
        
        <!-- Main container -->
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 relative z-10 flex flex-col gap-16">
            
            <!-- Top 3 columns -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-8 items-start">
                
                <!-- Left Column: Who We Are -->
                <div class="space-y-8 opacity-0 transition-all duration-1000 ease-out translate-y-10" id="about-col-1">
                    <div class="space-y-4">
                        <span class="text-[10px] font-bold text-[#C4A052] uppercase tracking-[0.25em] flex items-center gap-4">
                            <span class="w-8 h-[1px] bg-[#C4A052]"></span>
                            Who We Are
                        </span>
                        <h2 class="text-3xl sm:text-4xl xl:text-5xl font-serif text-slate-900 dark:text-white leading-[1.15]">
                            A Professional <br class="hidden lg:block">Academy for <br class="hidden lg:block">
                            <span class="italic text-[#C4A052]">Independent Authors</span>
                        </h2>
                    </div>
                    
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-sm">
                        Books Academy bridges the gap between creators and global markets. We provide transparent self-publishing solutions, expert editorial support, stunning design, and worldwide distribution to help your book succeed.
                    </p>
                    
                    <div class="flex flex-wrap items-center gap-4">
                        <a href="{{ route('services') }}" class="px-6 py-3 rounded bg-[#111827] text-white text-xs font-semibold hover:bg-slate-800 transition-colors flex items-center gap-2 shadow-lg shadow-[#111827]/20">
                            Explore Our Services <span class="text-slate-400">&rarr;</span>
                        </a>
                        <button class="px-6 py-3 rounded border border-[#C4A052]/50 text-slate-700 dark:text-slate-300 text-xs font-semibold hover:bg-[#C4A052]/5 transition-colors flex items-center gap-2">
                            <span class="w-5 h-5 rounded-full bg-[#C4A052] text-white flex items-center justify-center text-[10px]">▶</span>
                            How It Works
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-3 gap-4 pt-6 mt-2">
                        <div class="text-center sm:text-left space-y-2 relative pr-4">
                            <div class="w-10 h-10 mx-auto sm:mx-0 rounded-full border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] bg-[#Fdfbf7] shadow-inner mb-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <h5 class="font-bold text-[11px] text-slate-800 uppercase tracking-widest">Author<br>First</h5>
                            <p class="text-[9px] text-slate-500 leading-tight">We protect your<br>rights and royalties.</p>
                        </div>
                        <div class="text-center sm:text-left space-y-2 relative border-l border-[#C4A052]/20 pl-4">
                            <div class="w-10 h-10 mx-auto sm:mx-0 rounded-full border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] bg-[#Fdfbf7] shadow-inner mb-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <h5 class="font-bold text-[11px] text-slate-800 uppercase tracking-widest">Expert<br>Support</h5>
                            <p class="text-[9px] text-slate-500 leading-tight">From manuscript<br>to marketplace.</p>
                        </div>
                        <div class="text-center sm:text-left space-y-2 relative border-l border-[#C4A052]/20 pl-4">
                            <div class="w-10 h-10 mx-auto sm:mx-0 rounded-full border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] bg-[#Fdfbf7] shadow-inner mb-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h5 class="font-bold text-[11px] text-slate-800 uppercase tracking-widest">Global<br>Reach</h5>
                            <p class="text-[9px] text-slate-500 leading-tight">Your book,<br>worldwide.</p>
                        </div>
                    </div>
                </div>

                <!-- Middle Column: Bookshelf & Quote -->
                <div class="flex flex-col items-center opacity-0 transition-all duration-1000 ease-out translate-y-10 delay-200 mt-12 lg:mt-0" id="about-col-2">
                    <span class="text-[10px] font-bold text-[#C4A052] uppercase tracking-[0.2em] mb-10 text-center">Featured Books by our authors</span>
                    
                    <!-- Bookshelf Container -->
                    <div class="relative w-full max-w-[380px] mx-auto flex items-end justify-center" style="perspective: 1200px;">
                        <!-- Books -->
                        <div class="flex items-end justify-center gap-4 mb-[2px] relative z-10 w-full px-6">
                            
                            <!-- Book 1: The Quiet Path -->
                            <div class="group relative w-[30%] aspect-[2/3] rounded-r-md rounded-l-sm shadow-[-10px_10px_20px_rgba(0,0,0,0.4)] transform -rotate-2 hover:rotate-0 hover:-translate-y-4 transition-all duration-500 cursor-pointer overflow-hidden bg-[#e6dbcb] border-l-[3px] border-white/60">
                                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=400&q=80')] bg-cover bg-center opacity-50 mix-blend-multiply"></div>
                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/40 via-white/10 to-transparent"></div>
                                <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-white/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                
                                <div class="relative z-10 flex flex-col h-full items-center justify-start text-center p-3 pt-5">
                                    <span class="text-[14px] font-serif text-slate-900 leading-[1.1]">The<br>Quiet<br>Path</span>
                                    <span class="text-[6px] text-slate-800 mt-2 tracking-widest uppercase font-medium">A Journey Inward</span>
                                    <span class="mt-auto text-[7px] text-slate-900 font-bold tracking-[0.15em] uppercase pb-2">Lena Morgan</span>
                                </div>
                            </div>

                            <!-- Book 2: Beyond The Page -->
                            <div class="group relative w-[38%] aspect-[2/3] rounded-r-md rounded-l-sm shadow-[-15px_15px_25px_rgba(0,0,0,0.6)] transform hover:-translate-y-5 transition-all duration-500 cursor-pointer z-10 overflow-hidden bg-[#0c162d] border-l-[3px] border-[#D4B886]/40 -translate-y-3">
                                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1516979187457-637abb4f9353?w=400&q=80')] bg-cover bg-center opacity-40"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-[#0c162d] via-[#0c162d]/50 to-transparent"></div>
                                <div class="absolute inset-y-0 left-0 w-4 bg-gradient-to-r from-black/60 via-white/10 to-transparent"></div>
                                <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                
                                <div class="relative z-10 flex flex-col h-full items-center justify-start text-center p-3 pt-6">
                                    <span class="text-[15px] font-serif text-[#E5D3B3] leading-[1.2] mb-1">BEYOND<br>THE PAGE</span>
                                    <span class="text-[7px] text-slate-300 tracking-wider">Turning Ideas into<br>Lasting Impact</span>
                                    <div class="mt-auto mb-4 relative">
                                        <svg class="w-8 h-8 text-[#E5D3B3]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3 h-3 bg-[#E5D3B3] rounded-full blur-[8px] opacity-80"></div>
                                    </div>
                                    <span class="text-[7px] text-[#E5D3B3] font-bold tracking-[0.15em] uppercase pb-2">Adrian Holloway</span>
                                </div>
                            </div>

                            <!-- Book 3: Waves of Change -->
                            <div class="group relative w-[30%] aspect-[2/3] rounded-r-md rounded-l-sm shadow-[-10px_10px_20px_rgba(0,0,0,0.4)] transform rotate-2 hover:rotate-0 hover:-translate-y-4 transition-all duration-500 cursor-pointer overflow-hidden bg-[#264653] border-l-[3px] border-white/30">
                                <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1498673394965-85cb14905c89?w=400&q=80')] bg-cover bg-center opacity-50 mix-blend-screen"></div>
                                <div class="absolute inset-0 bg-gradient-to-t from-[#264653] via-transparent to-transparent"></div>
                                <div class="absolute inset-y-0 left-0 w-3 bg-gradient-to-r from-black/50 via-white/10 to-transparent"></div>
                                <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-white/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                
                                <div class="relative z-10 flex flex-col h-full items-center justify-start text-center p-3 pt-5">
                                    <span class="text-[13px] font-serif text-white uppercase tracking-wider leading-[1.2]">Waves of<br>Change</span>
                                    <span class="text-[6px] text-emerald-50 mt-2 tracking-widest font-light">Stories of Resilience<br>and Hope</span>
                                    <span class="mt-auto text-[7px] text-white font-bold tracking-[0.15em] uppercase pb-2">Maya Sterling</span>
                                </div>
                            </div>
                        </div>

                        <!-- Shelf Graphic -->
                        <div class="absolute bottom-0 left-[-6%] right-[-6%] h-[14px] bg-[#1a1d24] rounded-full shadow-[0_10px_30px_rgba(0,0,0,0.4)] z-20 border-t border-white/10"></div>
                    </div>
                    
                    <!-- Shelf Glow (Yellow Light) -->
                    <div class="relative w-full flex justify-center h-32 -mt-1 pointer-events-none z-0">
                        <!-- Intense center strip right under the shelf -->
                        <div class="absolute top-0 w-28 h-4 bg-[#ffe299] opacity-70 blur-[8px]"></div>
                        <!-- Main light bulb glow -->
                        <div class="absolute top-0 w-48 h-20 bg-[#ffc642] opacity-40 blur-[24px] rounded-b-full"></div>
                        <!-- Wide diffused ambient light -->
                        <div class="absolute top-0 w-[90%] h-32 bg-gradient-to-b from-[#C4A052]/20 via-[#C4A052]/5 to-transparent blur-[30px]"></div>
                    </div>

                    <!-- Testimonial Quote -->
                    <div class="text-center mt-10 space-y-4 relative w-full px-6 min-h-[130px] flex flex-col justify-center">
                        <span class="absolute -top-6 left-4 text-5xl text-[#C4A052] opacity-30 font-serif leading-none">"</span>
                        <div id="testimonial-content" class="transition-opacity duration-300 opacity-100">
                            <p id="testimonial-text" class="text-xs text-slate-600 dark:text-slate-400 italic leading-relaxed">
                                Books Academy made my publishing journey smooth, professional, and truly empowering.
                            </p>
                            <p id="testimonial-author" class="text-[9px] text-slate-500 font-bold uppercase tracking-widest mt-4">- Sarah J., Published Author</p>
                        </div>
                        
                        <div class="flex justify-between items-center w-full mt-2 absolute bottom-0 left-0 px-6">
                            <button id="testimonial-prev" class="w-7 h-7 rounded-full bg-slate-800 text-white flex items-center justify-center text-[10px] hover:bg-[#C4A052] transition-colors shadow-lg focus:outline-none">&lt;</button>
                            <div class="flex justify-center gap-2" id="testimonial-dots">
                                <!-- Dots will be managed by JS -->
                                <button class="w-1.5 h-1.5 rounded-full bg-slate-800 transition-colors focus:outline-none" data-index="0"></button>
                                <button class="w-1.5 h-1.5 rounded-full bg-slate-300 transition-colors focus:outline-none" data-index="1"></button>
                                <button class="w-1.5 h-1.5 rounded-full bg-slate-300 transition-colors focus:outline-none" data-index="2"></button>
                            </div>
                            <button id="testimonial-next" class="w-7 h-7 rounded-full bg-slate-800 text-white flex items-center justify-center text-[10px] hover:bg-[#C4A052] transition-colors shadow-lg focus:outline-none">&gt;</button>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Core Foundations -->
                <div class="relative opacity-0 transition-all duration-1000 ease-out translate-y-10 delay-[400ms] mt-12 lg:mt-0" id="about-col-3">
                    <div class="p-8 rounded-2xl bg-[#0f172a] shadow-2xl space-y-8 relative overflow-hidden h-full flex flex-col border border-slate-800">
                        <h3 class="font-bold text-[10px] text-white uppercase tracking-[0.2em] flex items-center gap-3">
                            <div class="w-8 h-8 rounded bg-slate-800 border border-slate-700 flex items-center justify-center text-[#C4A052] shadow-inner shadow-black/50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            Core Foundations
                        </h3>
                        
                        <ul class="space-y-6 flex-1">
                            <!-- Item 1 -->
                            <li class="flex items-start gap-4 pb-5 border-b border-slate-800/50">
                                <div class="w-8 h-8 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-[#C4A052] flex-shrink-0 shadow-inner shadow-black/50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <div>
                                    <strong class="text-white text-[13px] block mb-1">Full Intellectual Rights</strong>
                                    <span class="text-slate-400 text-[11px] leading-relaxed block">Authors retain 100% copyright ownership and metadata controls.</span>
                                </div>
                            </li>
                            <!-- Item 2 -->
                            <li class="flex items-start gap-4 pb-5 border-b border-slate-800/50">
                                <div class="w-8 h-8 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-[#C4A052] flex-shrink-0 shadow-inner shadow-black/50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </div>
                                <div>
                                    <strong class="text-white text-[13px] block mb-1">Editorial Excellence</strong>
                                    <span class="text-slate-400 text-[11px] leading-relaxed block">Advanced proofreading and editorial reviews before listing.</span>
                                </div>
                            </li>
                            <!-- Item 3 -->
                            <li class="flex items-start gap-4 pb-5 border-b border-slate-800/50">
                                <div class="w-8 h-8 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-[#C4A052] flex-shrink-0 shadow-inner shadow-black/50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                                </div>
                                <div>
                                    <strong class="text-white text-[13px] block mb-1">Global Distribution</strong>
                                    <span class="text-slate-400 text-[11px] leading-relaxed block">Immediate setups in Amazon KDP, Apple Books, Ingram, and more.</span>
                                </div>
                            </li>
                            <!-- Item 4 -->
                            <li class="flex items-start gap-4">
                                <div class="w-8 h-8 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center text-[#C4A052] flex-shrink-0 shadow-inner shadow-black/50">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                </div>
                                <div>
                                    <strong class="text-white text-[13px] block mb-1">Transparent & Fair</strong>
                                    <span class="text-slate-400 text-[11px] leading-relaxed block">Clear processes, fair pricing, and dedicated support.</span>
                                </div>
                            </li>
                        </ul>
                        
                        <div class="mt-4 bg-gradient-to-r from-[#D4B886] to-[#C4A052] p-4 rounded-xl flex items-center justify-between cursor-pointer hover:shadow-lg hover:shadow-[#C4A052]/20 hover:-translate-y-0.5 transition-all group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded bg-white/20 flex items-center justify-center text-white">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </div>
                                <div>
                                    <strong class="text-white text-[11px] block mb-0.5">Ready to bring your book to life?</strong>
                                    <span class="text-white/80 text-[9px] block">Join thousands of authors who trust us.</span>
                                </div>
                            </div>
                            <div class="w-7 h-7 rounded-full bg-white flex items-center justify-center text-[#C4A052] text-xs group-hover:translate-x-1 transition-transform">
                                &rarr;
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <!-- Bottom Banner Stats -->
            <div class="w-full bg-[#0f172a] rounded-2xl p-8 shadow-2xl opacity-0 transition-all duration-1000 ease-out translate-y-10 delay-[600ms] border border-slate-800" id="about-banner">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-4 divide-x-0 md:divide-x divide-slate-800/50">
                    <!-- Stat 1 -->
                    <div class="flex items-center justify-center gap-4 group cursor-default">
                        <div class="w-10 h-10 rounded-full bg-slate-800/50 border border-slate-700/50 flex items-center justify-center text-[#C4A052] group-hover:bg-[#C4A052] group-hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </div>
                        <div>
                            <strong class="text-[#C4A052] text-xl font-serif block group-hover:scale-105 transition-transform origin-left">1.5K+</strong>
                            <span class="text-white text-[9px] tracking-wider uppercase block mt-0.5">Published Authors</span>
                        </div>
                    </div>
                    <!-- Stat 2 -->
                    <div class="flex items-center justify-center gap-4 md:pl-4 group cursor-default">
                        <div class="w-10 h-10 rounded-full bg-slate-800/50 border border-slate-700/50 flex items-center justify-center text-[#C4A052] group-hover:bg-[#C4A052] group-hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <div>
                            <strong class="text-[#C4A052] text-xl font-serif block group-hover:scale-105 transition-transform origin-left">2.3K+</strong>
                            <span class="text-white text-[9px] tracking-wider uppercase block mt-0.5">Books Published</span>
                        </div>
                    </div>
                    <!-- Stat 3 -->
                    <div class="flex items-center justify-center gap-4 md:pl-4 group cursor-default">
                        <div class="w-10 h-10 rounded-full bg-slate-800/50 border border-slate-700/50 flex items-center justify-center text-[#C4A052] group-hover:bg-[#C4A052] group-hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                        </div>
                        <div>
                            <strong class="text-[#C4A052] text-xl font-serif block group-hover:scale-105 transition-transform origin-left">45</strong>
                            <span class="text-white text-[9px] tracking-wider uppercase block mt-0.5">Distribution Networks</span>
                        </div>
                    </div>
                    <!-- Stat 4 -->
                    <div class="flex items-center justify-center gap-4 md:pl-4 group cursor-default">
                        <div class="w-10 h-10 rounded-full bg-slate-800/50 border border-slate-700/50 flex items-center justify-center text-[#C4A052] group-hover:bg-[#C4A052] group-hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <div>
                            <strong class="text-[#C4A052] text-xl font-serif block group-hover:scale-105 transition-transform origin-left">98%</strong>
                            <span class="text-white text-[9px] tracking-wider uppercase block mt-0.5">Author Satisfaction</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

   

    <!-- Why Writers Choose Our House (Writer Experience) -->
    <section class="relative py-24 xl:py-32 2xl:py-40 min-h-screen flex flex-col justify-center overflow-hidden bg-[#FDFBF7] dark:bg-slate-900 border-b border-[#C4A052]/20 transition-colors">
        
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/cover2.png') }}" alt="Background Texture" class="w-full h-full object-cover opacity-100 mix-blend-multiply dark:mix-blend-screen dark:opacity-30">
        </div>

        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                
                <!-- Left Column -->
                <div class="space-y-8">
                    <!-- Headings -->
                    <div class="space-y-4">
                        <span class="text-[10px] font-bold text-[#C4A052] uppercase tracking-[0.2em]">Writer Experience</span>
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-serif text-[#1b253b] dark:text-white leading-[1.1]">
                            Full Control.<br><span class="text-[#1b253b] dark:text-[#C4A052]">Direct Distribution.</span>
                        </h2>
                        <div class="w-12 h-0.5 bg-[#C4A052] my-4"></div>
                        <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed max-w-md pt-2">
                            Traditional publishing setups require full copyright signovers and return minimal net royalties. Books Academy leaves creative control where it belongs—with the author.
                        </p>
                    </div>

                    <!-- List Items -->
                    <div class="space-y-6 pt-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#1b253b] dark:bg-[#C4A052] flex items-center justify-center text-[#C4A052] dark:text-white flex-shrink-0 shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-[#1b253b] dark:text-white">Keep 100% of book permissions</h4>
                                <p class="text-[11px] text-slate-500 mt-0.5">and copyright listings.</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#1b253b] dark:bg-[#C4A052] flex items-center justify-center text-[#C4A052] dark:text-white flex-shrink-0 shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-[#1b253b] dark:text-white">Secure up to 85% royalties</h4>
                                <p class="text-[11px] text-slate-500 mt-0.5">on paperback and digital prints.</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#1b253b] dark:bg-[#C4A052] flex items-center justify-center text-[#C4A052] dark:text-white flex-shrink-0 shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-[#1b253b] dark:text-white">Direct consulting with</h4>
                                <p class="text-[11px] text-slate-500 mt-0.5">dedicated design editors.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Card -->
                    <div class="bg-white/60 dark:bg-slate-800/60 backdrop-blur-md rounded-xl p-5 border border-[#C4A052]/20 flex items-center gap-6 mt-8 max-w-[420px] shadow-xl shadow-[#C4A052]/5">
                        <div class="w-10 h-10 rounded-full bg-[#C4A052] flex items-center justify-center text-white flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <div class="flex-1">
                            <h5 class="text-[11px] font-bold text-[#1b253b] dark:text-white">Your story. Your rights. Our platform.</h5>
                            <p class="text-[9px] text-slate-500 mt-0.5">We're here to empower your journey<br>from manuscript to marketplace.</p>
                        </div>
                        <div class="text-[#C4A052] font-serif text-sm italic whitespace-nowrap transform -rotate-2 pr-2">
                            Let's publish<br>together.
                        </div>
                    </div>
                </div>

                <!-- Right Column (Large Card) -->
                <div class="bg-white dark:bg-slate-800 rounded-[2rem] shadow-2xl p-8 lg:p-10 border border-[#C4A052]/10 relative overflow-hidden group hover:shadow-[#C4A052]/10 transition-shadow duration-500">
                    <div class="mb-8">
                        <h3 class="text-3xl font-serif text-[#1b253b] dark:text-white leading-[1.2]">Built for Authors.</h3>
                        <h3 class="text-3xl font-serif text-[#C4A052] italic leading-[1.2]">Focused on You.</h3>
                        <div class="w-12 h-0.5 bg-[#C4A052] mt-5"></div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 sm:gap-6 mb-8">
                        <!-- 100% -->
                        <div class="bg-[#FDFBF7] dark:bg-slate-900 rounded-2xl p-6 text-center border border-[#C4A052]/10 shadow-sm hover:shadow-md transition-shadow group-hover:-translate-y-1 duration-300">
                            <div class="w-10 h-10 mx-auto rounded-full border border-emerald-500/30 flex items-center justify-center text-emerald-600 mb-4 bg-white dark:bg-slate-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <span class="text-2xl font-bold text-[#1b253b] dark:text-white block">100%</span>
                            <span class="text-[7px] font-bold text-slate-800 dark:text-slate-300 uppercase tracking-widest mt-1.5 block">Author Ownership</span>
                            <p class="text-[8px] text-slate-500 mt-2.5 leading-relaxed px-2">You keep 100% control of your copyright and rights.</p>
                        </div>

                        <!-- 85% -->
                        <div class="bg-[#FDFBF7] dark:bg-slate-900 rounded-2xl p-6 text-center border border-[#C4A052]/10 shadow-sm hover:shadow-md transition-shadow group-hover:-translate-y-1 duration-300 delay-75">
                            <div class="w-10 h-10 mx-auto rounded-full border border-[#C4A052]/30 flex items-center justify-center text-[#C4A052] mb-4 bg-white dark:bg-slate-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                            </div>
                            <span class="text-2xl font-bold text-[#1b253b] dark:text-white block">85%</span>
                            <span class="text-[7px] font-bold text-slate-800 dark:text-slate-300 uppercase tracking-widest mt-1.5 block">Net Royalties</span>
                            <p class="text-[8px] text-slate-500 mt-2.5 leading-relaxed px-2">Earn up to 85% royalties on paperback and digital prints.</p>
                        </div>

                        <!-- 24/7 -->
                        <div class="bg-[#FDFBF7] dark:bg-slate-900 rounded-2xl p-6 text-center border border-[#C4A052]/10 shadow-sm hover:shadow-md transition-shadow group-hover:-translate-y-1 duration-300 delay-100">
                            <div class="w-10 h-10 mx-auto rounded-full border border-blue-500/30 flex items-center justify-center text-blue-500 mb-4 bg-white dark:bg-slate-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <span class="text-2xl font-bold text-[#1b253b] dark:text-white block">24/7</span>
                            <span class="text-[7px] font-bold text-slate-800 dark:text-slate-300 uppercase tracking-widest mt-1.5 block">Author Support</span>
                            <p class="text-[8px] text-slate-500 mt-2.5 leading-relaxed px-2">Our team is here for you, anytime you need us.</p>
                        </div>

                        <!-- Ingram -->
                        <div class="bg-[#FDFBF7] dark:bg-slate-900 rounded-2xl p-6 text-center border border-[#C4A052]/10 shadow-sm hover:shadow-md transition-shadow group-hover:-translate-y-1 duration-300 delay-150">
                            <div class="w-10 h-10 mx-auto rounded-full border border-purple-500/30 flex items-center justify-center text-purple-600 mb-4 bg-white dark:bg-slate-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                            </div>
                            <span class="text-2xl font-serif text-[#1b253b] dark:text-white block tracking-wide">Ingram</span>
                            <span class="text-[7px] font-bold text-slate-800 dark:text-slate-300 uppercase tracking-widest mt-1.5 block">Global Distribution</span>
                            <p class="text-[8px] text-slate-500 mt-2.5 leading-relaxed px-2">Your book, available worldwide through Ingram distribution.</p>
                        </div>
                    </div>

                    <!-- Bottom CTA Banner -->
                    <div class="bg-[#1b253b] dark:bg-[#0f1523] rounded-xl p-5 flex items-center justify-between shadow-inner transition-transform group-hover:scale-[1.02] duration-500">
                        <div class="flex items-center gap-4">
                            <div class="text-[#C4A052]">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <p class="text-[9px] text-slate-300 pr-4 border-r border-slate-600/50 leading-relaxed">We empower authors with the tools,<br>support, and freedom to succeed.</p>
                        </div>
                        <a href="#" class="text-[10px] font-serif italic text-[#C4A052] hover:text-white transition-colors flex items-center gap-2 pr-2">
                            Start your<br>journey today &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Happenings Section -->
    <section id="latest-happenings" class="relative py-24 xl:py-32 2xl:py-40 border-b border-[#C4A052]/20 transition-colors overflow-hidden">
        
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/cover4.png') }}" alt="Latest Happenings Background" class="w-full h-full object-cover opacity-100 mix-blend-multiply dark:mix-blend-screen dark:opacity-30">
        </div>

        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 relative z-10">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16 opacity-0 transition-all duration-1000 ease-out translate-y-10" id="happenings-header">
                <div class="space-y-4 max-w-xl">
                    <span class="text-[10px] font-bold text-[#C4A052] uppercase tracking-[0.25em] flex items-center gap-4">
                        <span class="w-8 h-[1px] bg-[#C4A052]"></span>
                        Stay Updated
                    </span>
                    <h2 class="text-4xl sm:text-5xl font-serif text-[#1b253b] dark:text-white leading-[1.1]">
                        Latest <span class="italic text-[#C4A052]">Happenings</span>
                    </h2>
                    <p class="text-[13px] text-slate-600 dark:text-slate-400 pt-2 leading-relaxed max-w-md">
                        News, events, and achievements—discover what's new in the world of books and beyond.
                    </p>
                </div>
                <a href="#" class="inline-flex items-center gap-3 text-[10px] font-bold uppercase tracking-widest text-[#1b253b] dark:text-slate-300 hover:text-[#C4A052] transition-colors group">
                    View All Updates 
                    <span class="w-8 h-8 rounded-full border border-[#1b253b]/20 dark:border-slate-600 flex items-center justify-center group-hover:border-[#C4A052] group-hover:text-[#C4A052] transition-all">&rarr;</span>
                </a>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <article class="group bg-white dark:bg-slate-900 rounded-3xl overflow-hidden hover:shadow-2xl hover:shadow-[#C4A052]/10 transition-all duration-500 hover:-translate-y-2 opacity-0 translate-y-10 border border-white/40 dark:border-slate-800" id="happening-card-1">
                    <div class="aspect-[16/11] overflow-hidden relative p-3 pb-0">
                        <div class="w-full h-full rounded-2xl overflow-hidden relative">
                            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=600&q=80')] bg-cover bg-center group-hover:scale-105 transition-transform duration-700"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-80"></div>
                            <div class="absolute bottom-4 left-4">
                                <span class="px-4 py-1.5 bg-[#C4A052] text-[#1b253b] text-[9px] font-bold uppercase tracking-widest rounded-full shadow-lg">Book Launch</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-[1px] bg-[#C4A052]"></div>
                            <time class="text-[9px] text-slate-500 font-bold uppercase tracking-widest block">Oct 24, 2026</time>
                        </div>
                        <h3 class="text-[22px] font-serif text-[#1b253b] dark:text-white group-hover:text-[#C4A052] transition-colors leading-[1.3]">
                            <a href="#">"The Quiet Path" Reaches #1 on Bestseller List</a>
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed line-clamp-3 pt-2">
                            Lena Morgan's breathtaking new release has captured the hearts of readers worldwide, securing the top spot in literary fiction just one week after launch.
                        </p>
                    </div>
                </article>

                <!-- Card 2 -->
                <article class="group bg-white dark:bg-slate-900 rounded-3xl overflow-hidden hover:shadow-2xl hover:shadow-[#C4A052]/10 transition-all duration-500 hover:-translate-y-2 opacity-0 translate-y-10 delay-[200ms] border border-white/40 dark:border-slate-800" id="happening-card-2">
                    <div class="aspect-[16/11] overflow-hidden relative p-3 pb-0">
                        <div class="w-full h-full rounded-2xl overflow-hidden relative">
                            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1561489422-45de3d015e3e?w=600&q=80')] bg-cover bg-center group-hover:scale-105 transition-transform duration-700"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-80"></div>
                            <div class="absolute bottom-4 left-4">
                                <span class="px-4 py-1.5 bg-[#1b253b] text-white text-[9px] font-bold uppercase tracking-widest rounded-full shadow-lg">Award</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-[1px] bg-[#C4A052]"></div>
                            <time class="text-[9px] text-slate-500 font-bold uppercase tracking-widest block">Oct 18, 2026</time>
                        </div>
                        <h3 class="text-[22px] font-serif text-[#1b253b] dark:text-white group-hover:text-[#C4A052] transition-colors leading-[1.3]">
                            <a href="#">Books Academy Wins Publishing Excellence Award</a>
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed line-clamp-3 pt-2">
                            We are honored to receive the prestigious 2026 Publishing Excellence Award for our unwavering commitment to author rights and transparent publishing.
                        </p>
                    </div>
                </article>

                <!-- Card 3 -->
                <article class="group bg-white dark:bg-slate-900 rounded-3xl overflow-hidden hover:shadow-2xl hover:shadow-[#C4A052]/10 transition-all duration-500 hover:-translate-y-2 opacity-0 translate-y-10 delay-[400ms] border border-white/40 dark:border-slate-800" id="happening-card-3">
                    <div class="aspect-[16/11] overflow-hidden relative p-3 pb-0">
                        <div class="w-full h-full rounded-2xl overflow-hidden relative">
                            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1515162816999-a0c47dc192f7?w=600&q=80')] bg-cover bg-center group-hover:scale-105 transition-transform duration-700"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-80"></div>
                            <div class="absolute bottom-4 left-4">
                                <span class="px-4 py-1.5 bg-[#1b253b] text-white text-[9px] font-bold uppercase tracking-widest rounded-full shadow-lg">Event</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-[1px] bg-[#C4A052]"></div>
                            <time class="text-[9px] text-slate-500 font-bold uppercase tracking-widest block">Nov 05, 2026</time>
                        </div>
                        <h3 class="text-[22px] font-serif text-[#1b253b] dark:text-white group-hover:text-[#C4A052] transition-colors leading-[1.3]">
                            <a href="#">Upcoming Masterclass: Building Your Author Brand</a>
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed line-clamp-3 pt-2">
                            Join our expert panel for an exclusive online masterclass on how to build a resilient, recognizable author brand in today's saturated digital marketplace.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Journey to Publication (Storytelling Scroll) -->
    <section id="journey-section" class="relative py-32 xl:py-48 bg-[#020617] text-white overflow-hidden border-t border-slate-800">
        
        <!-- Ambient Glowing Backgrounds -->
        <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
            <div class="floating-shape absolute top-0 left-1/4 w-[500px] h-[500px] bg-blue-900/30 rounded-full mix-blend-screen filter blur-[120px]"></div>
            <div class="floating-shape absolute top-1/3 right-0 w-[600px] h-[600px] bg-[#C4A052]/20 rounded-full mix-blend-screen filter blur-[150px]"></div>
            <div class="floating-shape absolute bottom-0 left-1/3 w-[800px] h-[800px] bg-indigo-900/20 rounded-full mix-blend-screen filter blur-[150px]"></div>
            
            <!-- Floating Particles (will be animated via GSAP) -->
            <div class="journey-particles absolute inset-0 opacity-50 bg-[radial-gradient(ellipse_at_center,_rgba(255,255,255,0.1)_0%,_transparent_1px)] bg-[length:30px_30px]"></div>
        </div>

        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 relative z-10">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-32 md:mb-48 opacity-0 translate-y-10" id="journey-header">
                <span class="text-xs font-bold text-[#C4A052] uppercase tracking-[0.3em] flex items-center justify-center gap-4 mb-6">
                    <span class="w-12 h-[1px] bg-[#C4A052]"></span>
                    The Process
                    <span class="w-12 h-[1px] bg-[#C4A052]"></span>
                </span>
                <h2 class="text-5xl md:text-6xl xl:text-7xl font-serif text-white leading-[1.1] mb-8">
                    Journey to <br><span class="italic text-[#C4A052]">Publication</span>
                </h2>
                <p class="text-lg text-slate-400 leading-relaxed font-light">
                    Experience the evolution of your manuscript from a raw draft to a globally distributed masterpiece. Walk with us through every defining chapter.
                </p>
            </div>

            <!-- Vertical Timeline Container -->
            <div class="relative max-w-5xl mx-auto" id="timeline-container">
                
                <!-- The Track (Background Line) -->
                <div class="absolute left-[40px] md:left-1/2 transform md:-translate-x-1/2 top-0 bottom-0 w-[2px] bg-slate-800 rounded-full"></div>
                
                <!-- The Fill (Progress Line) -->
                <div id="timeline-progress" class="absolute left-[40px] md:left-1/2 transform md:-translate-x-1/2 top-0 w-[2px] bg-gradient-to-b from-blue-500 via-[#C4A052] to-emerald-500 rounded-full origin-top h-0">
                    <!-- Glowing Head -->
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-4 h-4 bg-white rounded-full shadow-[0_0_20px_8px_rgba(196,160,82,0.6)]"></div>
                </div>

                <div class="space-y-24 md:space-y-40 pb-24">
                    
                    <!-- Step 01 -->
                    <div class="journey-step relative flex flex-col md:flex-row items-start md:items-center w-full group">
                        <div class="hidden md:block md:w-1/2 pr-16 text-right opacity-0 md:group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                            <span class="text-8xl font-serif text-white/5 font-bold italic tracking-tighter">01</span>
                        </div>
                        
                        <!-- Timeline Node -->
                        <div class="absolute left-[40px] md:left-1/2 transform -translate-x-1/2 w-10 h-10 md:w-14 md:h-14 rounded-full bg-[#0f172a] border-4 border-slate-800 flex items-center justify-center z-10 step-node transition-colors duration-500 mt-4 md:mt-0">
                            <span class="text-slate-500 font-bold text-xs md:text-sm node-number">01</span>
                        </div>

                        <!-- Card -->
                        <div class="w-full md:w-1/2 pl-[90px] md:pl-16 step-card opacity-0 translate-x-10">
                            <div class="p-8 md:p-10 rounded-3xl bg-white/5 backdrop-blur-xl border border-white/10 hover:bg-white/10 hover:border-[#C4A052]/50 transition-all duration-500 group-hover:-translate-y-2 shadow-2xl relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/20 rounded-bl-full blur-3xl"></div>
                                <div class="w-12 h-12 rounded-2xl bg-blue-500/20 flex items-center justify-center text-blue-400 mb-6">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <h3 class="text-2xl font-serif text-white mb-3 group-hover:text-[#C4A052] transition-colors">Manuscript Submission</h3>
                                <p class="text-sm text-slate-400 leading-relaxed">The journey begins. You upload your life's work. Our system securely logs your manuscript, ensuring 100% copyright protection from day one.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 02 -->
                    <div class="journey-step relative flex flex-col md:flex-row-reverse items-start md:items-center w-full group">
                        <div class="hidden md:block md:w-1/2 pl-16 text-left opacity-0 md:group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                            <span class="text-8xl font-serif text-white/5 font-bold italic tracking-tighter">02</span>
                        </div>
                        
                        <div class="absolute left-[40px] md:left-1/2 transform -translate-x-1/2 w-10 h-10 md:w-14 md:h-14 rounded-full bg-[#0f172a] border-4 border-slate-800 flex items-center justify-center z-10 step-node transition-colors duration-500 mt-4 md:mt-0">
                            <span class="text-slate-500 font-bold text-xs md:text-sm node-number">02</span>
                        </div>

                        <div class="w-full md:w-1/2 pl-[90px] md:pl-0 md:pr-16 step-card opacity-0 -translate-x-10 text-left md:text-right">
                            <div class="p-8 md:p-10 rounded-3xl bg-white/5 backdrop-blur-xl border border-white/10 hover:bg-white/10 hover:border-[#C4A052]/50 transition-all duration-500 group-hover:-translate-y-2 shadow-2xl relative overflow-hidden flex flex-col md:items-end">
                                <div class="absolute top-0 left-0 w-32 h-32 bg-[#C4A052]/20 rounded-br-full blur-3xl"></div>
                                <div class="w-12 h-12 rounded-2xl bg-[#C4A052]/20 flex items-center justify-center text-[#C4A052] mb-6">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                </div>
                                <h3 class="text-2xl font-serif text-white mb-3 group-hover:text-[#C4A052] transition-colors">Editorial Review</h3>
                                <p class="text-sm text-slate-400 leading-relaxed md:text-right">Expert editors conduct a deep-dive evaluation of your draft. We focus on structural flow, narrative pacing, and overall market readiness.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 03 -->
                    <div class="journey-step relative flex flex-col md:flex-row items-start md:items-center w-full group">
                        <div class="hidden md:block md:w-1/2 pr-16 text-right opacity-0 md:group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                            <span class="text-8xl font-serif text-white/5 font-bold italic tracking-tighter">03</span>
                        </div>
                        
                        <div class="absolute left-[40px] md:left-1/2 transform -translate-x-1/2 w-10 h-10 md:w-14 md:h-14 rounded-full bg-[#0f172a] border-4 border-slate-800 flex items-center justify-center z-10 step-node transition-colors duration-500 mt-4 md:mt-0">
                            <span class="text-slate-500 font-bold text-xs md:text-sm node-number">03</span>
                        </div>

                        <div class="w-full md:w-1/2 pl-[90px] md:pl-16 step-card opacity-0 translate-x-10">
                            <div class="p-8 md:p-10 rounded-3xl bg-white/5 backdrop-blur-xl border border-white/10 hover:bg-white/10 hover:border-[#C4A052]/50 transition-all duration-500 group-hover:-translate-y-2 shadow-2xl relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/20 rounded-bl-full blur-3xl"></div>
                                <div class="w-12 h-12 rounded-2xl bg-emerald-500/20 flex items-center justify-center text-emerald-400 mb-6">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </div>
                                <h3 class="text-2xl font-serif text-white mb-3 group-hover:text-[#C4A052] transition-colors">Publishing Agreement</h3>
                                <p class="text-sm text-slate-400 leading-relaxed">We formalize our partnership. You retain full copyright ownership while we agree on royalty splits, distribution channels, and timelines.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 04 -->
                    <div class="journey-step relative flex flex-col md:flex-row-reverse items-start md:items-center w-full group">
                        <div class="hidden md:block md:w-1/2 pl-16 text-left opacity-0 md:group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                            <span class="text-8xl font-serif text-white/5 font-bold italic tracking-tighter">04</span>
                        </div>
                        
                        <div class="absolute left-[40px] md:left-1/2 transform -translate-x-1/2 w-10 h-10 md:w-14 md:h-14 rounded-full bg-[#0f172a] border-4 border-slate-800 flex items-center justify-center z-10 step-node transition-colors duration-500 mt-4 md:mt-0">
                            <span class="text-slate-500 font-bold text-xs md:text-sm node-number">04</span>
                        </div>

                        <div class="w-full md:w-1/2 pl-[90px] md:pl-0 md:pr-16 step-card opacity-0 -translate-x-10 text-left md:text-right">
                            <div class="p-8 md:p-10 rounded-3xl bg-white/5 backdrop-blur-xl border border-white/10 hover:bg-white/10 hover:border-[#C4A052]/50 transition-all duration-500 group-hover:-translate-y-2 shadow-2xl relative overflow-hidden flex flex-col md:items-end">
                                <div class="absolute top-0 left-0 w-32 h-32 bg-purple-500/20 rounded-br-full blur-3xl"></div>
                                <div class="w-12 h-12 rounded-2xl bg-purple-500/20 flex items-center justify-center text-purple-400 mb-6">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <h3 class="text-2xl font-serif text-white mb-3 group-hover:text-[#C4A052] transition-colors">Book Production</h3>
                                <p class="text-sm text-slate-400 leading-relaxed md:text-right">Our designers bring your book to life. This includes custom cover design, interior typesetting, formatting for Kindle, and final proof audits.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 05 -->
                    <div class="journey-step relative flex flex-col md:flex-row items-start md:items-center w-full group">
                        <div class="hidden md:block md:w-1/2 pr-16 text-right opacity-0 md:group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                            <span class="text-8xl font-serif text-white/5 font-bold italic tracking-tighter">05</span>
                        </div>
                        
                        <div class="absolute left-[40px] md:left-1/2 transform -translate-x-1/2 w-10 h-10 md:w-14 md:h-14 rounded-full bg-[#0f172a] border-4 border-slate-800 flex items-center justify-center z-10 step-node transition-colors duration-500 mt-4 md:mt-0">
                            <span class="text-slate-500 font-bold text-xs md:text-sm node-number">05</span>
                        </div>

                        <div class="w-full md:w-1/2 pl-[90px] md:pl-16 step-card opacity-0 translate-x-10">
                            <div class="p-8 md:p-10 rounded-3xl bg-white/5 backdrop-blur-xl border border-white/10 hover:bg-white/10 hover:border-[#C4A052]/50 transition-all duration-500 group-hover:-translate-y-2 shadow-2xl relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-cyan-500/20 rounded-bl-full blur-3xl"></div>
                                <div class="w-12 h-12 rounded-2xl bg-cyan-500/20 flex items-center justify-center text-cyan-400 mb-6">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                </div>
                                <h3 class="text-2xl font-serif text-white mb-3 group-hover:text-[#C4A052] transition-colors">Printing & Distribution</h3>
                                <p class="text-sm text-slate-400 leading-relaxed">Files are locked. We initiate print-on-demand setups and upload your manuscript to Ingram, Amazon KDP, and Apple Books for global reach.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 06 -->
                    <div class="journey-step relative flex flex-col md:flex-row-reverse items-start md:items-center w-full group">
                        <div class="hidden md:block md:w-1/2 pl-16 text-left opacity-0 md:group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                            <span class="text-8xl font-serif text-white/5 font-bold italic tracking-tighter">06</span>
                        </div>
                        
                        <div class="absolute left-[40px] md:left-1/2 transform -translate-x-1/2 w-10 h-10 md:w-14 md:h-14 rounded-full bg-[#0f172a] border-4 border-slate-800 flex items-center justify-center z-10 step-node transition-colors duration-500 mt-4 md:mt-0">
                            <span class="text-slate-500 font-bold text-xs md:text-sm node-number">06</span>
                        </div>

                        <div class="w-full md:w-1/2 pl-[90px] md:pl-0 md:pr-16 step-card opacity-0 -translate-x-10 text-left md:text-right">
                            <div class="p-8 md:p-10 rounded-3xl bg-white/5 backdrop-blur-xl border border-white/10 hover:bg-white/10 hover:border-[#C4A052]/50 transition-all duration-500 group-hover:-translate-y-2 shadow-2xl relative overflow-hidden flex flex-col md:items-end">
                                <div class="absolute top-0 left-0 w-32 h-32 bg-pink-500/20 rounded-br-full blur-3xl"></div>
                                <div class="w-12 h-12 rounded-2xl bg-pink-500/20 flex items-center justify-center text-pink-400 mb-6">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                                </div>
                                <h3 class="text-2xl font-serif text-white mb-3 group-hover:text-[#C4A052] transition-colors">Marketing & Promotion</h3>
                                <p class="text-sm text-slate-400 leading-relaxed md:text-right">The buzz begins. We deploy targeted social media campaigns, author interviews, and press wire distributions to build anticipation.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 07 -->
                    <div class="journey-step relative flex flex-col md:flex-row items-start md:items-center w-full group">
                        <div class="hidden md:block md:w-1/2 pr-16 text-right opacity-0 md:group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                            <span class="text-8xl font-serif text-white/5 font-bold italic tracking-tighter">07</span>
                        </div>
                        
                        <div class="absolute left-[40px] md:left-1/2 transform -translate-x-1/2 w-10 h-10 md:w-14 md:h-14 rounded-full bg-[#0f172a] border-4 border-slate-800 flex items-center justify-center z-10 step-node transition-colors duration-500 mt-4 md:mt-0">
                            <span class="text-slate-500 font-bold text-xs md:text-sm node-number">07</span>
                        </div>

                        <div class="w-full md:w-1/2 pl-[90px] md:pl-16 step-card opacity-0 translate-x-10">
                            <div class="p-8 md:p-10 rounded-3xl bg-white/5 backdrop-blur-xl border border-white/10 hover:bg-white/10 hover:border-[#C4A052]/50 transition-all duration-500 group-hover:-translate-y-2 shadow-2xl relative overflow-hidden">
                                <div class="absolute top-0 right-0 w-32 h-32 bg-sky-500/20 rounded-bl-full blur-3xl"></div>
                                <div class="w-12 h-12 rounded-2xl bg-sky-500/20 flex items-center justify-center text-sky-400 mb-6">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h3 class="text-2xl font-serif text-white mb-3 group-hover:text-[#C4A052] transition-colors">Global Publication</h3>
                                <p class="text-sm text-slate-400 leading-relaxed">Launch Day. Your book is officially published and available for purchase in bookstores and online retailers across the globe.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Step 08 -->
                    <div class="journey-step relative flex flex-col md:flex-row-reverse items-start md:items-center w-full group">
                        <div class="hidden md:block md:w-1/2 pl-16 text-left opacity-0 md:group-hover:opacity-100 transition-opacity duration-700 pointer-events-none">
                            <span class="text-8xl font-serif text-[#C4A052]/10 font-bold italic tracking-tighter">08</span>
                        </div>
                        
                        <div class="absolute left-[40px] md:left-1/2 transform -translate-x-1/2 w-12 h-12 md:w-16 md:h-16 rounded-full bg-[#1b253b] border-4 border-[#C4A052] shadow-[0_0_30px_rgba(196,160,82,0.5)] flex items-center justify-center z-10 step-node final-node mt-3 md:mt-0">
                            <svg class="w-6 h-6 text-[#C4A052]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        </div>

                        <div class="w-full md:w-1/2 pl-[90px] md:pl-0 md:pr-16 step-card opacity-0 -translate-x-10 text-left md:text-right">
                            <div class="p-8 md:p-10 rounded-3xl bg-[#C4A052]/10 backdrop-blur-xl border border-[#C4A052]/40 hover:bg-[#C4A052]/20 transition-all duration-500 shadow-[0_0_50px_rgba(196,160,82,0.15)] relative overflow-hidden flex flex-col md:items-end">
                                <h3 class="text-3xl font-serif text-[#C4A052] mb-4">Author Success Spotlight</h3>
                                <p class="text-sm text-slate-300 leading-relaxed md:text-right mb-8">You are now a published author. Enjoy the royalties, track your global sales, and start thinking about your next masterpiece.</p>
                                
                                <a href="#" class="inline-flex items-center gap-3 px-8 py-4 bg-[#C4A052] text-[#0f172a] rounded-full font-bold text-xs uppercase tracking-widest hover:bg-white hover:-translate-y-1 transition-all duration-300 shadow-lg shadow-[#C4A052]/30 group">
                                    Start Your Journey
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
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

            @if(isset($authors) && $authors->count() > 0)
                <div class="flex overflow-x-auto gap-6 pb-6 snap-x scroll-smooth" style="scrollbar-width: thin;">
                    @foreach($authors as $author)
                        @php
                            $initials = collect(explode(' ', $author->name))->map(function($segment) { return strtoupper(substr($segment, 0, 1)); })->take(2)->join('');
                            $bookTitle = $author->publishedBooks->first() ? 'Author of *"' . $author->publishedBooks->first()->title . '"*' : 'Independent Author';
                        @endphp
                        <div class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-4 min-w-[300px] sm:min-w-[350px] snap-center shrink-0">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs flex items-center justify-center">
                                    {{ $initials }}
                                </div>
                                <div>
                                    <h4 class="font-bold text-xs text-slate-900 dark:text-white">{{ $author->name }}</h4>
                                    <p class="text-[10px] text-slate-400">{{ $bookTitle }}</p>
                                </div>
                            </div>
                            <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed italic">
                                "Publishing through Books Academy gave me the control I needed over my creative work. The process was seamless and incredibly supportive."
                            </p>
                        </div>
                    @endforeach
                </div>
            @else
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
            @endif
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

    



@endsection
