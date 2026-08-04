@extends('layouts.web')

@section('content')
    <!-- Services Section (Publishing & Marketing Services) -->
    <section id="services"
        class="py-16 lg:py-24 xl:py-28 min-h-screen flex flex-col justify-center bg-[#070a12] transition-colors relative overflow-hidden text-white">
        
        <!-- Ambient Glowing Background Lighting (Red & Dark Blue Glows) -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-red-600/15 rounded-full blur-[140px] pointer-events-none z-0"></div>
        <div class="absolute bottom-10 right-10 w-[500px] h-[500px] bg-blue-900/20 rounded-full blur-[140px] pointer-events-none z-0"></div>
        <div class="absolute top-10 left-10 w-[400px] h-[400px] bg-rose-900/10 rounded-full blur-[120px] pointer-events-none z-0"></div>

        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 relative z-10 space-y-12">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto">
                <span class="text-xs font-bold text-red-500 uppercase tracking-[0.25em] drop-shadow-sm">OUR SOLUTIONS</span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-serif font-bold text-white mt-2 tracking-tight">
                    Publishing & <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 via-rose-300 to-amber-200">Marketing Services</span>
                </h1>
                <p class="text-sm sm:text-base text-slate-400 mt-3 font-light tracking-wide max-w-xl mx-auto">
                    Professional design layouts, print catalogs, and promotional setups tailored to your publishing success.
                </p>
            </div>

            <!-- Tab Selectors (Matching reference image header pills) -->
            <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3.5 max-w-4xl mx-auto" id="services-selector">
                <button onclick="selectServiceCard('children')" id="btn-srv-children"
                    class="px-5 py-3 rounded-2xl text-xs sm:text-sm font-semibold tracking-wide border border-red-600 bg-red-600 text-white shadow-[0_0_20px_rgba(220,38,38,0.4)] transition-all flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span>CHILDREN'S BOOKS</span>
                </button>
                <button onclick="selectServiceCard('bw')" id="btn-srv-bw"
                    class="px-5 py-3 rounded-2xl text-xs sm:text-sm font-medium tracking-wide border border-white/10 bg-white/5 text-slate-300 hover:border-red-500/50 hover:text-white transition-all flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>BLACK & WHITE</span>
                </button>
                <button onclick="selectServiceCard('color')" id="btn-srv-color"
                    class="px-5 py-3 rounded-2xl text-xs sm:text-sm font-medium tracking-wide border border-white/10 bg-white/5 text-slate-300 hover:border-red-500/50 hover:text-white transition-all flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                    </svg>
                    <span>FULL COLOR</span>
                </button>
                <button onclick="selectServiceCard('marketing')" id="btn-srv-marketing"
                    class="px-5 py-3 rounded-2xl text-xs sm:text-sm font-medium tracking-wide border border-white/10 bg-white/5 text-slate-300 hover:border-red-500/50 hover:text-white transition-all flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                    <span>MARKETING</span>
                </button>
                <button onclick="selectServiceCard('addons')" id="btn-srv-addons"
                    class="px-5 py-3 rounded-2xl text-xs sm:text-sm font-medium tracking-wide border border-white/10 bg-white/5 text-slate-300 hover:border-red-500/50 hover:text-white transition-all flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                    </svg>
                    <span>ADD-ONS</span>
                </button>
            </div>

            <!-- Top Feature Badges Row -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 max-w-3xl mx-auto pt-2">
                <div class="flex items-center gap-3 bg-white/5 border border-white/10 rounded-xl p-3.5 backdrop-blur-md">
                    <div class="w-10 h-10 rounded-full bg-blue-600/20 border border-blue-400/30 flex items-center justify-center text-blue-400 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-white uppercase tracking-wider">GLOBAL REACH</div>
                        <div class="text-[11px] text-slate-400">Available Worldwide</div>
                    </div>
                </div>
                <div class="flex items-center gap-3 bg-white/5 border border-white/10 rounded-xl p-3.5 backdrop-blur-md">
                    <div class="w-10 h-10 rounded-full bg-red-600/20 border border-red-400/30 flex items-center justify-center text-red-400 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-white uppercase tracking-wider">PREMIUM QUALITY</div>
                        <div class="text-[11px] text-slate-400">Top-tier materials & printing</div>
                    </div>
                </div>
                <div class="flex items-center gap-3 bg-white/5 border border-white/10 rounded-xl p-3.5 backdrop-blur-md">
                    <div class="w-10 h-10 rounded-full bg-amber-500/20 border border-amber-400/30 flex items-center justify-center text-amber-400 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.684a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-white uppercase tracking-wider">DEDICATED SUPPORT</div>
                        <div class="text-[11px] text-slate-400">From concept to completion</div>
                    </div>
                </div>
            </div>

            <!-- MAIN SERVICE DISPLAY CARD (Lower Side Design matching mockup image) -->
            <div id="service-showcase-container" class="max-w-6xl mx-auto transition-all duration-300">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    
                    <!-- Left Side: Book Mockup Stack with Paint Splatters & Metallic Badge -->
                    <div class="lg:col-span-5 relative flex items-center justify-center p-4">
                        <!-- Watercolor / Paint Splatter Backdrop Decorative Element -->
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                            <div class="w-72 h-72 sm:w-80 sm:h-80 rounded-full bg-gradient-to-tr from-red-600/30 via-rose-500/20 to-sky-500/30 blur-2xl transform -rotate-6"></div>
                        </div>

                        <!-- 3D Book Mockup Display -->
                        <div class="relative z-10 transform hover:scale-[1.02] transition-transform duration-300 group">
                            <img id="service-book-image" src="{{ asset('images/service_children.png') }}"
                                alt="Service Book Mockup"
                                class="w-full max-w-sm sm:max-w-md mx-auto object-contain drop-shadow-[0_20px_40px_rgba(0,0,0,0.8)] rounded-xl">
                            
                            <!-- Metallic Badge Overlay (Bottom-left of book mockup) -->
                            <div class="absolute -bottom-4 -left-2 sm:bottom-2 sm:-left-4 z-20 bg-gradient-to-br from-[#1a2333] via-[#0d131f] to-[#121927] border border-[#d4af37]/60 rounded-full w-24 h-24 sm:w-28 sm:h-28 flex flex-col items-center justify-center text-center shadow-[0_10px_25px_rgba(0,0,0,0.6)] group-hover:rotate-3 transition-transform">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#d4af37] mb-0.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M5 16L3 5l5.5 5L12 4l3.5 6L21 5l-2 11H5zm14 3c0 .6-.4 1-1 1H6c-.6 0-1-.4-1-1v-1h14v1z"/>
                                </svg>
                                <span class="text-[9px] uppercase tracking-wider text-[#d4af37] font-semibold" id="service-badge-sub">MADE FOR</span>
                                <span class="text-[10px] sm:text-[11px] font-bold text-white uppercase tracking-tight leading-tight px-1" id="service-badge-main">YOUNG READERS</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side: Light Slate Service Detail Card -->
                    <div class="lg:col-span-7">
                        <div class="bg-slate-100/95 text-slate-900 rounded-3xl p-6 sm:p-10 shadow-2xl border border-white/50 relative overflow-hidden backdrop-blur-md">
                            
                            <!-- Red Circle Icon Badge -->
                            <div class="flex items-center gap-4 mb-4">
                                <div id="service-icon-box" class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center shadow-inner shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 id="service-title" class="text-2xl sm:text-3xl font-serif font-bold text-slate-900 tracking-tight leading-snug">
                                        Children's Book Publishing Package
                                    </h2>
                                    <div class="w-12 h-1 bg-red-600 rounded-full mt-2"></div>
                                </div>
                            </div>

                            <!-- Description -->
                            <p id="service-desc" class="text-sm sm:text-base text-slate-600 leading-relaxed mb-6 font-normal">
                                Perfect square and landscape sizes designed for nursery books, containing storyboard coordinates, proof checks, softcover prints, and artwork allocations.
                            </p>

                            <!-- Checkmark Features List (2x2 Grid) -->
                            <div class="mb-8">
                                <ul id="service-points-grid" class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 text-sm font-medium text-slate-800">
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-5 h-5 rounded-full bg-red-100 text-red-600 flex items-center justify-center text-xs font-bold shrink-0">✓</span>
                                        <span>Custom artist spreads</span>
                                    </li>
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-5 h-5 rounded-full bg-red-100 text-red-600 flex items-center justify-center text-xs font-bold shrink-0">✓</span>
                                        <span>Square size paper formats</span>
                                    </li>
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-5 h-5 rounded-full bg-red-100 text-red-600 flex items-center justify-center text-xs font-bold shrink-0">✓</span>
                                        <span>High-density color checks</span>
                                    </li>
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-5 h-5 rounded-full bg-red-100 text-red-600 flex items-center justify-center text-xs font-bold shrink-0">✓</span>
                                        <span>Paperback and hardcover options</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- Card Footer: Available Globally & Request Quote Button -->
                            <div class="pt-6 border-t border-slate-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-slate-200/80 flex items-center justify-center text-slate-600 shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h1.5a2.5 2.5 0 002.5-2.5V11a2 2 0 012-2h1.055M11 20.055V18a2 2 0 012-2h1a2 2 0 002-2v-1a2 2 0 012-2h2.945M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs font-bold text-slate-800 uppercase tracking-wider">AVAILABLE GLOBALLY</div>
                                        <div class="text-xs text-slate-500">We ship to authors and publishers around the world.</div>
                                    </div>
                                </div>
                                <a href="{{ route('contact') }}"
                                    class="w-full sm:w-auto px-7 py-3.5 rounded-2xl bg-red-600 hover:bg-red-700 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-lg shadow-red-600/30 flex items-center justify-center gap-2 group hover:scale-105 shrink-0">
                                    <span>REQUEST QUOTE</span>
                                    <span class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center group-hover:translate-x-1 transition-transform">
                                        →
                                    </span>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- BOTTOM FEATURE BAR (4 Feature Columns matching mockup bottom section) -->
            <div class="max-w-6xl mx-auto bg-[#0b101c]/90 border border-white/10 rounded-2xl p-6 lg:p-8 shadow-2xl backdrop-blur-md mt-12">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                    
                    <!-- Feature 1 -->
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-rose-500/20 border border-rose-500/30 flex items-center justify-center text-rose-400 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-white uppercase tracking-wider">QUALITY DESIGN</h4>
                            <p class="text-xs text-slate-400 mt-0.5 leading-relaxed">High-quality layouts and print-ready files.</p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-500/20 border border-blue-500/30 flex items-center justify-center text-blue-400 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-white uppercase tracking-wider">PRINT READY</h4>
                            <p class="text-xs text-slate-400 mt-0.5 leading-relaxed">Professional output for any format.</p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-amber-500/20 border border-amber-500/30 flex items-center justify-center text-amber-400 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-white uppercase tracking-wider">EFFECTIVE MARKETING</h4>
                            <p class="text-xs text-slate-400 mt-0.5 leading-relaxed">Creative materials that bring your stories to life.</p>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-emerald-500/20 border border-emerald-500/30 flex items-center justify-center text-emerald-400 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-xs font-bold text-white uppercase tracking-wider">RELIABLE SERVICE</h4>
                            <p class="text-xs text-slate-400 mt-0.5 leading-relaxed">End-to-end support from start to finish.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
