@php
    $weeklyRoyaltiesJson = json_encode($user->weeklyRoyalties ?? []);
@endphp

<div x-data="userRoyaltyDashboard({{ $weeklyRoyaltiesJson }})" class="space-y-6">

    <!-- Top Hero Card Container with subtle background texture & Glassmorphism -->
    <div class="relative overflow-hidden rounded-3xl border border-indigo-200/50 dark:border-slate-800/80 shadow-xl bg-slate-900 min-h-[310px] flex flex-col justify-center p-6 sm:p-10 transition-all"
         style="background-image: url('{{ asset('images/dashboard.png') }}'); background-size: cover; background-position: center;">
        
        <!-- Vibrant Multi-Layer Gradient Overlays for Light/Dark modes -->
        <div class="absolute inset-0 bg-gradient-to-r from-amber-50/80 via-amber-50/65 to-indigo-100/70 dark:from-slate-950/92 dark:via-slate-950/85 dark:to-slate-900/85 pointer-events-none"></div>
        <div class="absolute -right-20 -top-20 w-80 h-80 bg-indigo-500/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-20 -bottom-20 w-80 h-80 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 space-y-5 max-w-4xl">
            <!-- Private Author Portal Subtitle & Status Badge -->
            <div class="flex flex-wrap items-center gap-3">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-extrabold text-indigo-900 dark:text-indigo-300 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md uppercase tracking-widest border border-indigo-200/60 dark:border-indigo-800/60 shadow-xs">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    PRIVATE AUTHOR PORTAL
                </span>

                <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-slate-700 dark:text-slate-300 bg-white/60 dark:bg-slate-800/60 backdrop-blur-sm px-2.5 py-0.5 rounded-full border border-slate-200/50 dark:border-slate-700/50">
                    <svg class="w-3.5 h-3.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Live Workspace Sync
                </span>
            </div>

            <!-- Workspace Title -->
            <div>
                <h1 class="text-2xl sm:text-4xl font-black text-slate-900 dark:text-white tracking-tight drop-shadow-xs">
                    {{ $user->dashboard_title ?? 'Author Onboarding Workspace' }}
                </h1>
                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 font-medium mt-1">
                    Manage your sales performance, weekly royalty statements, and published assets.
                </p>
            </div>

            <!-- Message from Admin / Editorial Board Glassmorphism Banner -->
            <div class="bg-white/85 dark:bg-slate-900/85 backdrop-blur-xl border-l-4 border-l-indigo-600 dark:border-l-indigo-400 border-white/80 dark:border-slate-800 rounded-2xl p-5 sm:p-6 shadow-md transition-all hover:shadow-lg">
                <div class="flex items-start gap-4">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-indigo-600 to-indigo-700 text-white flex items-center justify-center shrink-0 shadow-md shadow-indigo-500/20 mt-0.5">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A2.5 2.5 0 013 11.2V8.8A2.5 2.5 0 015.436 6.317M15 13a3 3 0 000-6M15 7h.01M18 7h.01" />
                        </svg>
                    </div>
                    <div class="space-y-1">
                        <div class="flex items-center gap-2">
                            <h4 class="font-extrabold text-xs uppercase text-indigo-700 dark:text-indigo-400 tracking-wider">
                                MESSAGE FROM ADMIN / EDITORIAL BOARD
                            </h4>
                            <span class="text-[10px] px-2 py-0.5 rounded-full bg-indigo-100 dark:bg-indigo-950 text-indigo-700 dark:text-indigo-300 font-bold">Official Notice</span>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-800 dark:text-slate-200 leading-relaxed font-medium whitespace-pre-line">
                            {{ $user->dashboard_content ?? 'Welcome to Books Academy! Your draft is currently under review by our design and illustration editorial board. Please check back soon.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Main Royalty Reports & Statements Container -->
    <div class="bg-white/80 dark:bg-slate-950/80 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800/80 rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm">
        
        <!-- Dashboard Header: Title + Date Filter Dropdown & Actions -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 border-b border-slate-200/70 dark:border-slate-800/80 pb-5">
            <div>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-indigo-50 dark:bg-indigo-950/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 border border-indigo-100 dark:border-indigo-900/40">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h2 class="text-base sm:text-lg font-black text-slate-900 dark:text-white tracking-tight">
                        Royalty Reports & Statements
                    </h2>
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-1">Real-time breakdown of sales, earnings curve, and weekly payout schedules</p>
            </div>

            <!-- Toolbar Actions: Date Selector, Theme Switcher, Print -->
            <div class="flex flex-wrap items-center gap-2.5">
                <!-- Date Filter Dropdown -->
                <div class="relative text-left">
                    <button @click="dateOpen = !dateOpen" @click.away="dateOpen = false" type="button" class="inline-flex items-center justify-between gap-2.5 px-4 py-2.5 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl text-xs font-bold text-slate-700 dark:text-slate-200 shadow-xs hover:border-indigo-300 dark:hover:border-indigo-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                        <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span x-text="selectedMonthText">May 1 – May 31, 2025</span>
                        <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" :class="{ 'rotate-180': dateOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Options -->
                    <div x-show="dateOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 mt-2 w-60 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-2xl z-50 py-2 text-xs text-slate-700 dark:text-slate-200 divide-y divide-slate-100 dark:divide-slate-800" style="display: none;">
                        <div class="py-1">
                            <button @click="setMonth(5, 2025, 'May 1 – May 31, 2025')" class="w-full text-left px-4 py-2 hover:bg-indigo-50 dark:hover:bg-indigo-950/40 hover:text-indigo-600 dark:hover:text-indigo-400 font-bold flex items-center justify-between">
                                <span>May 1 – May 31, 2025</span>
                                <span class="text-[9px] px-1.5 py-0.5 rounded-full bg-indigo-100 text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300 font-bold">Current</span>
                            </button>
                            <button @click="setMonth(4, 2025, 'April 1 – April 30, 2025')" class="w-full text-left px-4 py-2 hover:bg-indigo-50 dark:hover:bg-indigo-950/40 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium">
                                April 1 – April 30, 2025
                            </button>
                            <button @click="setMonth(3, 2025, 'March 1 – March 31, 2025')" class="w-full text-left px-4 py-2 hover:bg-indigo-50 dark:hover:bg-indigo-950/40 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium">
                                March 1 – March 31, 2025
                            </button>
                            <button @click="setMonth(2, 2025, 'February 1 – Feb 28, 2025')" class="w-full text-left px-4 py-2 hover:bg-indigo-50 dark:hover:bg-indigo-950/40 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium">
                                February 1 – Feb 28, 2025
                            </button>
                            <button @click="setMonth(1, 2025, 'January 1 – Jan 31, 2025')" class="w-full text-left px-4 py-2 hover:bg-indigo-50 dark:hover:bg-indigo-950/40 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium">
                                January 1 – Jan 31, 2025
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Theme Switcher -->
                <button @click="toggleTheme()" type="button" class="inline-flex items-center justify-center p-2.5 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all shadow-xs" title="Toggle Light/Dark Theme">
                    <template x-if="!isDark">
                        <svg class="w-4 h-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                        </svg>
                    </template>
                    <template x-if="isDark">
                        <svg class="w-4 h-4 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </template>
                </button>

                <!-- Print Action Button -->
                <button onclick="window.print()" type="button" class="inline-flex items-center gap-1.5 px-3.5 py-2.5 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl text-xs font-bold text-slate-700 dark:text-slate-200 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all shadow-xs" title="Print Statement">
                    <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 00-2 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    <span class="hidden sm:inline">Print Statement</span>
                </button>
            </div>
        </div>

        <!-- 4 Key Stat Cards with Top Accent Glow & Mini Sparklines -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <!-- Card 1: Total Royalties -->
            <div class="group relative overflow-hidden bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 rounded-2xl p-5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-indigo-300 dark:hover:border-indigo-700">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-500 to-blue-500"></div>
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-[11px] font-extrabold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider mb-1">
                            Total Royalties
                        </h3>
                        <div class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white tracking-tight" x-text="totalRoyaltiesFormatted">
                            ₱0.00
                        </div>
                        <div class="flex items-center gap-1 mt-2 text-[11px] text-emerald-600 dark:text-emerald-400 font-bold">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            <span>Live calculated</span>
                        </div>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 flex items-center justify-center shrink-0 border border-indigo-100 dark:border-indigo-900/40 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Mini Sparkline Decor -->
                <div class="mt-3 pt-2 border-t border-slate-100 dark:border-slate-800/60 flex items-center justify-between text-[10px] text-slate-400 font-medium">
                    <span>Monthly payout cycle</span>
                    <span class="font-bold text-indigo-600 dark:text-indigo-400" x-text="currentWeeks.length + ' Weeks'"></span>
                </div>
            </div>

            <!-- Card 2: Weekly Average -->
            <div class="group relative overflow-hidden bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 rounded-2xl p-5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-emerald-300 dark:hover:border-emerald-700">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-400"></div>
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-[11px] font-extrabold text-emerald-600 dark:text-emerald-400 uppercase tracking-wider mb-1">
                            Weekly Average
                        </h3>
                        <div class="text-2xl sm:text-3xl font-black text-emerald-600 dark:text-emerald-400 tracking-tight" x-text="weeklyAverageFormatted">
                            ₱0.00
                        </div>
                        <div class="flex items-center gap-1 mt-2 text-[11px] text-slate-500 dark:text-slate-400 font-semibold">
                            <span>Per active cycle week</span>
                        </div>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 border border-emerald-100 dark:border-emerald-900/40 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>

                <div class="mt-3 pt-2 border-t border-slate-100 dark:border-slate-800/60 flex items-center justify-between text-[10px] text-slate-400 font-medium">
                    <span>Avg per sale</span>
                    <span class="font-bold text-emerald-600 dark:text-emerald-400" x-text="totalBooksSold > 0 ? ('₱' + Math.round(totalRoyalties / totalBooksSold).toLocaleString()) : '₱0'"></span>
                </div>
            </div>

            <!-- Card 3: Total Books Sold -->
            <div class="group relative overflow-hidden bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 rounded-2xl p-5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-purple-300 dark:hover:border-purple-700">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-purple-500 to-indigo-500"></div>
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-[11px] font-extrabold text-purple-600 dark:text-purple-400 uppercase tracking-wider mb-1">
                            Total Books Sold
                        </h3>
                        <div class="text-2xl sm:text-3xl font-black text-purple-700 dark:text-purple-300 tracking-tight" x-text="totalBooksSold">
                            0
                        </div>
                        <div class="flex items-center gap-1 mt-2 text-[11px] text-purple-600 dark:text-purple-400 font-bold">
                            <span>Sum of weekly sales</span>
                        </div>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-purple-50 dark:bg-purple-950/60 text-purple-600 dark:text-purple-400 flex items-center justify-center shrink-0 border border-purple-100 dark:border-purple-900/40 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>

                <div class="mt-3 pt-2 border-t border-slate-100 dark:border-slate-800/60 flex items-center justify-between text-[10px] text-slate-400 font-medium">
                    <span>Units aggregate</span>
                    <span class="font-bold text-purple-600 dark:text-purple-400" x-text="totalBooksSold + ' Copies'"></span>
                </div>
            </div>

            <!-- Card 4: Last Payment -->
            <div class="group relative overflow-hidden bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 rounded-2xl p-5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-amber-300 dark:hover:border-amber-700">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-500 to-orange-400"></div>
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="text-[11px] font-extrabold text-amber-600 dark:text-amber-400 uppercase tracking-wider mb-1">
                            Last Payment
                        </h3>
                        <div class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white tracking-tight" x-text="lastPaymentAmount">
                            ₱0.00
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 font-semibold mt-1" x-text="lastPaymentPeriod">
                            N/A
                        </p>
                    </div>
                    <div class="w-11 h-11 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 flex items-center justify-center shrink-0 border border-amber-100 dark:border-amber-900/40 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <div class="mt-3 pt-2 border-t border-slate-100 dark:border-slate-800/60 flex items-center justify-between text-[10px] text-slate-400 font-medium">
                    <span>Payout status</span>
                    <span class="font-bold text-emerald-600 dark:text-emerald-400">Verified</span>
                </div>
            </div>

        </div>

        <!-- 2 Column Breakdown & Enhanced Interactive Line Graph -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            
            <!-- Left Column: Enhanced SVG Curve Line Chart (7 cols) -->
            <div class="lg:col-span-7 bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 rounded-3xl p-6 sm:p-7 shadow-xs flex flex-col justify-between relative overflow-hidden">
                <div>
                    <!-- Header with Title, Mode Switcher & Chart Style Switcher -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4 pb-3 border-b border-slate-100 dark:border-slate-800/70">
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-xs sm:text-sm font-black text-slate-900 dark:text-white uppercase tracking-wider">
                                    WEEKLY ROYALTY OVERVIEW
                                </h3>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-indigo-50 dark:bg-indigo-950 text-indigo-600 dark:text-indigo-400 border border-indigo-200/50 dark:border-indigo-800/50" x-text="metricMode === 'revenue' ? 'Revenue (₱)' : 'Sales (Units)'">
                                </span>
                            </div>
                            <p class="text-xs text-slate-400 mt-0.5 font-normal" x-text="'Performance trend curve for ' + selectedMonthText"></p>
                        </div>

                        <!-- Graph Controls: Metric Toggle & Style Toggle -->
                        <div class="flex items-center gap-2 self-start sm:self-auto">
                            <!-- Revenue vs Units Toggle -->
                            <div class="bg-slate-100 dark:bg-slate-800 p-1 rounded-xl flex items-center text-[11px] font-bold">
                                <button @click="metricMode = 'revenue'" :class="{ 'bg-white dark:bg-slate-900 text-indigo-600 dark:text-indigo-400 shadow-xs': metricMode === 'revenue', 'text-slate-500 dark:text-slate-400': metricMode !== 'revenue' }" class="px-2.5 py-1 rounded-lg transition-all">
                                    ₱ Revenue
                                </button>
                                <button @click="metricMode = 'units'" :class="{ 'bg-white dark:bg-slate-900 text-purple-600 dark:text-purple-400 shadow-xs': metricMode === 'units', 'text-slate-500 dark:text-slate-400': metricMode !== 'units' }" class="px-2.5 py-1 rounded-lg transition-all">
                                    Units
                                </button>
                            </div>

                            <!-- Chart Type Dropdown Pill -->
                            <div class="relative" x-data="{ chartTypeOpen: false }">
                                <button @click="chartTypeOpen = !chartTypeOpen" @click.away="chartTypeOpen = false" type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800 text-xs font-semibold text-slate-700 dark:text-slate-200 shadow-xs transition-colors">
                                    <svg class="w-3.5 h-3.5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                    </svg>
                                    <span class="capitalize" x-text="chartStyle">Area</span>
                                    <svg class="w-3 h-3 text-slate-400 transition-transform duration-200" :class="{ 'rotate-180': chartTypeOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div x-show="chartTypeOpen" x-transition class="absolute right-0 mt-1.5 w-32 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-xl z-30 py-1 text-xs text-slate-700 dark:text-slate-200" style="display: none;">
                                    <button @click="chartStyle = 'area'; chartTypeOpen = false" class="w-full text-left px-3 py-1.5 hover:bg-indigo-50 dark:hover:bg-indigo-950/40 hover:text-indigo-600 dark:hover:text-indigo-400 font-semibold">
                                        Area Spline
                                    </button>
                                    <button @click="chartStyle = 'line'; chartTypeOpen = false" class="w-full text-left px-3 py-1.5 hover:bg-indigo-50 dark:hover:bg-indigo-950/40 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium">
                                        Smooth Line
                                    </button>
                                    <button @click="chartStyle = 'bar'; chartTypeOpen = false" class="w-full text-left px-3 py-1.5 hover:bg-indigo-50 dark:hover:bg-indigo-950/40 hover:text-indigo-600 dark:hover:text-indigo-400 font-medium">
                                        Bar Columns
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Metrics Ribbon above chart -->
                    <div class="grid grid-cols-3 gap-2 mb-3 bg-slate-50/70 dark:bg-slate-800/40 p-2.5 rounded-xl border border-slate-100 dark:border-slate-800 text-center">
                        <div>
                            <span class="text-[10px] text-slate-400 uppercase font-bold block">Peak Weekly</span>
                            <span class="text-xs font-black text-indigo-600 dark:text-indigo-400" x-text="peakWeeklyFormatted">₱0.00</span>
                        </div>
                        <div>
                            <span class="text-[10px] text-slate-400 uppercase font-bold block">Avg / Book</span>
                            <span class="text-xs font-black text-emerald-600 dark:text-emerald-400" x-text="avgPerBookFormatted">₱0.00</span>
                        </div>
                        <div>
                            <span class="text-[10px] text-slate-400 uppercase font-bold block">Active Weeks</span>
                            <span class="text-xs font-black text-purple-600 dark:text-purple-400" x-text="activeWeeksCount + ' / ' + currentWeeks.length"></span>
                        </div>
                    </div>

                    <!-- SVG Dynamic Interactive Graph Canvas -->
                    <div class="relative w-full overflow-hidden pt-1" @mouseleave="activePoint = null">
                        <svg viewBox="0 0 540 240" class="w-full h-auto text-slate-400 overflow-visible">
                            <defs>
                                <!-- Multi-color dynamic linear gradients -->
                                <linearGradient id="royaltyAreaGradient" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#6366f1" stop-opacity="0.35" />
                                    <stop offset="60%" stop-color="#4f46e5" stop-opacity="0.12" />
                                    <stop offset="100%" stop-color="#4f46e5" stop-opacity="0.0" />
                                </linearGradient>

                                <linearGradient id="unitsAreaGradient" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#a855f7" stop-opacity="0.35" />
                                    <stop offset="60%" stop-color="#9333ea" stop-opacity="0.12" />
                                    <stop offset="100%" stop-color="#9333ea" stop-opacity="0.0" />
                                </linearGradient>

                                <linearGradient id="royaltyLineGradient" x1="0" y1="0" x2="1" y2="0">
                                    <stop offset="0%" stop-color="#4f46e5"/>
                                    <stop offset="50%" stop-color="#6366f1"/>
                                    <stop offset="100%" stop-color="#3b82f6"/>
                                </linearGradient>

                                <linearGradient id="unitsLineGradient" x1="0" y1="0" x2="1" y2="0">
                                    <stop offset="0%" stop-color="#9333ea"/>
                                    <stop offset="50%" stop-color="#a855f7"/>
                                    <stop offset="100%" stop-color="#ec4899"/>
                                </linearGradient>

                                <linearGradient id="barGradient" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#6366f1" />
                                    <stop offset="100%" stop-color="#4338ca" />
                                </linearGradient>

                                <!-- Soft drop shadow filter -->
                                <filter id="softGlow" x="-20%" y="-20%" width="140%" height="140%">
                                    <feDropShadow dx="0" dy="6" stdDeviation="5" flood-color="#4f46e5" flood-opacity="0.32" />
                                </filter>
                            </defs>

                            <!-- Y-Axis Grid Lines & Scales -->
                            <g class="grid-lines">
                                <line x1="75" y1="25" x2="495" y2="25" stroke="currentColor" stroke-opacity="0.08" stroke-dasharray="4 4" />
                                <text x="62" y="29" text-anchor="end" font-size="10" font-weight="700" fill="#94a3b8" x-text="maxScaleFormatted(1.0)"></text>

                                <line x1="75" y1="60" x2="495" y2="60" stroke="currentColor" stroke-opacity="0.08" stroke-dasharray="4 4" />
                                <text x="62" y="64" text-anchor="end" font-size="10" font-weight="600" fill="#94a3b8" x-text="maxScaleFormatted(0.75)"></text>

                                <line x1="75" y1="95" x2="495" y2="95" stroke="currentColor" stroke-opacity="0.08" stroke-dasharray="4 4" />
                                <text x="62" y="99" text-anchor="end" font-size="10" font-weight="600" fill="#94a3b8" x-text="maxScaleFormatted(0.5)"></text>

                                <line x1="75" y1="130" x2="495" y2="130" stroke="currentColor" stroke-opacity="0.08" stroke-dasharray="4 4" />
                                <text x="62" y="134" text-anchor="end" font-size="10" font-weight="600" fill="#94a3b8" x-text="maxScaleFormatted(0.25)"></text>
                                <line x1="75" y1="165" x2="495" y2="165" stroke="currentColor" stroke-opacity="0.18" stroke-width="1.5" />
                                <text x="62" y="169" text-anchor="end" font-size="10" font-weight="700" fill="#94a3b8">0</text>
                            </g>

                            <line x-show="activePoint !== null && chartPoints[activePoint]" :x1="chartPoints[activePoint]?.x || 0" y1="25" :x2="chartPoints[activePoint]?.x || 0" y2="165" stroke="#6366f1" stroke-width="1.5" stroke-dasharray="3 3" opacity="0.75" />

                            <g x-show="chartStyle === 'bar'">
                                <template x-for="(pt, idx) in chartPoints" :key="'bar-' + idx">
                                    <rect @mouseenter="activePoint = idx" :x="pt.x - 18" :y="pt.y" width="36" :height="Math.max(4, 165 - pt.y)" rx="6" :fill="metricMode === 'revenue' ? 'url(#barGradient)' : '#a855f7'" opacity="0.85" class="transition-all duration-300 hover:opacity-100 cursor-pointer" />
                                </template>
                            </g>

                            <g x-show="chartStyle !== 'bar'">
                                <path x-show="chartStyle === 'area'" :d="solidAreaD" :fill="metricMode === 'revenue' ? 'url(#royaltyAreaGradient)' : 'url(#unitsAreaGradient)'" />
                                <path :d="solidPathD" fill="none" :stroke="metricMode === 'revenue' ? 'url(#royaltyLineGradient)' : 'url(#unitsLineGradient)'" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" filter="url(#softGlow)" />
                                <path :d="projectionPathD" fill="none" stroke="#a5b4fc" stroke-width="2.5" stroke-dasharray="4 4" stroke-linecap="round" />
                            </g>

                            <g>
                                <template x-for="(pt, idx) in chartPoints" :key="'node-' + idx">
                                    <g @mouseenter="activePoint = idx" class="cursor-pointer group">
                                        <circle :cx="pt.x" :cy="pt.y" r="16" fill="transparent" />
                                        <circle x-show="activePoint === idx" :cx="pt.x" :cy="pt.y" r="10" fill="#6366f1" opacity="0.3" class="animate-ping" />
                                        <circle :cx="pt.x" :cy="pt.y" :r="activePoint === idx ? 6 : (pt.isActive ? 4.5 : 3.5)" :fill="activePoint === idx ? '#4f46e5' : (pt.isActive ? (metricMode === 'revenue' ? '#4f46e5' : '#a855f7') : '#cbd5e1')" stroke="#ffffff" stroke-width="2.5" class="transition-all duration-200 group-hover:scale-150" />
                                        <text :x="pt.x" y="190" text-anchor="middle" font-size="10" font-weight="800" :fill="activePoint === idx ? '#4f46e5' : '#475569'" class="dark:fill-slate-300 transition-colors" x-text="pt.week"></text>
                                        <text :x="pt.x" y="204" text-anchor="middle" font-size="9" font-weight="500" fill="#94a3b8" class="dark:fill-slate-400" x-text="pt.period"></text>
                                    </g>
                                </template>
                            </g>
                        </svg>

                        <div x-show="activePoint !== null && chartPoints[activePoint]" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="mt-2 p-3.5 bg-slate-900/95 dark:bg-slate-900/95 backdrop-blur-xl text-white rounded-2xl text-xs flex items-center justify-between shadow-2xl border border-slate-700/80">
                            <div class="space-y-0.5">
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-400 font-extrabold" x-text="chartPoints[activePoint]?.week"></span>
                                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-slate-800 text-slate-300 font-semibold" x-text="chartPoints[activePoint]?.period"></span>
                                </div>
                                <div class="text-[11px] text-slate-300">
                                    Books Sold: <span class="font-bold text-white" x-text="chartPoints[activePoint]?.sold + ' Copies'"></span>
                                </div>
                            </div>
                            <div class="text-right space-y-0.5">
                                <div class="text-sm font-black text-emerald-400" x-text="chartPoints[activePoint]?.amountFormatted"></div>
                                <div class="flex items-center justify-end gap-1 text-[10px] font-semibold" :class="getGrowth(activePoint) >= 0 ? 'text-emerald-400' : 'text-rose-400'">
                                    <span x-text="getGrowthLabel(activePoint)"></span>
                                    <span class="px-1.5 py-0.5 rounded bg-slate-800 text-slate-300 font-bold" x-text="chartPoints[activePoint]?.status"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 rounded-3xl p-6 sm:p-7 shadow-xs flex flex-col justify-between overflow-hidden">
                <div>
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="text-xs font-black text-indigo-600 dark:text-indigo-400 uppercase tracking-wider">
                                Weekly Royalty Breakdown
                            </h3>
                            <p class="text-[11px] text-slate-400 mt-0.5 font-medium" x-text="selectedMonthText"></p>
                        </div>
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400" x-text="currentWeeks.length + ' Periods'"></span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50/90 dark:bg-slate-800/60 text-[10px] font-extrabold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                    <th class="py-3 px-3 rounded-l-xl">Week</th>
                                    <th class="py-3 px-3">Period</th>
                                    <th class="py-3 px-3 text-center">Sales</th>
                                    <th class="py-3 px-3 text-right">Royalty</th>
                                    <th class="py-3 px-3 text-center rounded-r-xl">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60 text-xs">
                                <template x-for="(w, idx) in currentWeeks" :key="idx">
                                    <tr @mouseenter="activePoint = idx" @mouseleave="activePoint = null" :class="{ 'bg-indigo-50/70 dark:bg-indigo-950/40': activePoint === idx }" class="hover:bg-indigo-50/50 dark:hover:bg-indigo-950/30 transition-colors cursor-pointer">
                                        <td class="py-3.5 px-3 font-extrabold text-slate-900 dark:text-white" x-text="w.week"></td>
                                        <td class="py-3.5 px-3 text-slate-600 dark:text-slate-400 font-medium text-[11px]" x-text="w.period"></td>
                                        <td class="py-3.5 px-3 text-center">
                                            <div class="font-bold text-slate-800 dark:text-slate-200" x-text="w.sold"></div>
                                            <div class="w-12 bg-slate-100 dark:bg-slate-800 h-1.5 rounded-full mx-auto mt-1 overflow-hidden">
                                                <div class="bg-gradient-to-r from-indigo-500 to-cyan-400 h-full rounded-full transition-all" :style="'width: ' + Math.min(100, Math.round((w.sold / (maxSoldVolume || 1)) * 100)) + '%'"></div>
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-3 text-right font-black text-slate-900 dark:text-white" x-text="w.amountFormatted"></td>
                                        <td class="py-3.5 px-3 text-center">
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-extrabold"
                                                  :class="{
                                                      'bg-emerald-100 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800/40': w.status === 'Paid',
                                                      'bg-amber-100 dark:bg-amber-950/60 text-amber-700 dark:text-amber-300 border border-amber-200 dark:border-amber-800/40': w.status === 'Processing',
                                                      'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-700/50': w.status === 'Upcoming'
                                                  }">
                                                <span class="w-1.5 h-1.5 rounded-full"
                                                      :class="{
                                                          'bg-emerald-500 animate-pulse': w.status === 'Paid',
                                                          'bg-amber-500 animate-pulse': w.status === 'Processing',
                                                          'bg-slate-400': w.status === 'Upcoming'
                                                      }"></span>
                                                <span x-text="w.status"></span>
                                            </span>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                            <tfoot>
                                <tr class="bg-slate-50/80 dark:bg-slate-800/80 border-t border-slate-200 dark:border-slate-800 font-black text-xs">
                                    <td colspan="2" class="py-3.5 px-3 text-slate-800 dark:text-slate-200">Monthly Total</td>
                                    <td class="py-3.5 px-3 text-center text-purple-700 dark:text-purple-300" x-text="totalBooksSold + ' Sold'"></td>
                                    <td class="py-3.5 px-3 text-right text-indigo-600 dark:text-indigo-400" x-text="totalRoyaltiesFormatted"></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- Published Books Portfolio Card -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 rounded-3xl p-6 sm:p-7 shadow-xs space-y-5">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-slate-100 dark:border-slate-800/70 pb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-purple-50 dark:bg-purple-950/60 text-purple-600 dark:text-purple-400 flex items-center justify-center border border-purple-100 dark:border-purple-900/40 shrink-0">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-black text-slate-900 dark:text-white uppercase tracking-wider">
                            My Published Books & Catalog Portfolio
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">Official titles published by Books Academy for your author account</p>
                    </div>
                </div>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-extrabold bg-purple-50 dark:bg-purple-950/80 text-purple-700 dark:text-purple-300 border border-purple-200 dark:border-purple-800/60 self-start sm:self-auto">
                    <span class="w-2 h-2 rounded-full bg-purple-500 animate-pulse"></span>
                    {{ $user->publishedBooks ? $user->publishedBooks->count() : 0 }} Published {{ Str::plural('Title', $user->publishedBooks ? $user->publishedBooks->count() : 0) }}
                </span>
            </div>

            @if ($user->publishedBooks && $user->publishedBooks->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach ($user->publishedBooks as $book)
                        <div class="group relative overflow-hidden bg-slate-50/70 dark:bg-slate-800/40 border border-slate-200/80 dark:border-slate-800 rounded-2xl p-4 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:border-purple-300 dark:hover:border-purple-700 flex items-start gap-4">
                            <!-- Cover Image or Decorative Fallback -->
                            @if ($book->cover_image_path)
                                <img src="{{ asset('storage/' . $book->cover_image_path) }}" alt="{{ $book->title }}" class="w-16 h-22 object-cover rounded-xl shadow-md shrink-0 group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-16 h-22 rounded-xl bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 p-2.5 flex flex-col justify-between text-white shrink-0 shadow-md group-hover:scale-105 transition-transform duration-300">
                                    <div class="w-4 h-4 rounded-full bg-white/20 flex items-center justify-center">
                                        <svg class="w-2.5 h-2.5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                                    </div>
                                    <span class="text-[9px] font-black leading-tight line-clamp-2 uppercase tracking-tighter opacity-90">{{ $book->title }}</span>
                                </div>
                            @endif

                            <div class="min-w-0 flex-1 space-y-1.5 py-0.5">
                                <span class="inline-flex items-center gap-1 text-[10px] font-extrabold uppercase tracking-wider text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/60 px-2 py-0.5 rounded-md border border-emerald-200 dark:border-emerald-800/50">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Published & Distributed
                                </span>
                                <h4 class="font-extrabold text-sm text-slate-900 dark:text-white leading-snug truncate" title="{{ $book->title }}">
                                    {{ $book->title }}
                                </h4>
                                <p class="text-[11px] text-slate-500 dark:text-slate-400 font-medium">
                                    Author: <span class="font-bold text-slate-700 dark:text-slate-200">{{ $user->name }}</span>
                                </p>
                                <div class="pt-1 flex items-center justify-between text-[10px] text-slate-400 font-medium border-t border-slate-200/60 dark:border-slate-700/50 mt-2">
                                    <span>Added {{ $book->created_at ? $book->created_at->format('M d, Y') : 'Recently' }}</span>
                                    <span class="text-indigo-600 dark:text-indigo-400 font-bold group-hover:underline">Active Title</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-8 rounded-2xl bg-slate-50/50 dark:bg-slate-800/30 border border-dashed border-slate-200 dark:border-slate-800 text-center space-y-2">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-500 mx-auto flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h4 class="text-xs font-extrabold text-slate-700 dark:text-slate-300">No Published Books Cataloged Yet</h4>
                    <p class="text-xs text-slate-400 max-w-md mx-auto">When the administrator adds a published book to your profile, it will appear here in your author workspace portfolio.</p>
                </div>
            @endif
        </div>

        @if ($user->royaltyReports && $user->royaltyReports->count() > 0)
            <div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 rounded-3xl p-6 sm:p-7 shadow-xs space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-lg bg-red-50 dark:bg-red-950/60 text-red-500 flex items-center justify-center border border-red-100 dark:border-red-900/40">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xs font-black text-slate-900 dark:text-white uppercase tracking-wider">
                            Uploaded PDF Statements & Official Documents
                        </h3>
                    </div>
                    <span class="text-xs text-slate-400 font-bold px-2.5 py-0.5 rounded-full bg-slate-100 dark:bg-slate-800">{{ $user->royaltyReports->count() }} File(s)</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ($user->royaltyReports as $report)
                        <div class="flex items-center justify-between p-4 rounded-2xl border border-slate-200/80 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/40 hover:border-indigo-300 dark:hover:border-indigo-700 hover:shadow-md transition-all">
                            <div class="flex items-center gap-3">
                                <div class="p-3 bg-red-100/70 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-xl shrink-0">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <h4 class="font-extrabold text-xs text-slate-900 dark:text-slate-100 truncate max-w-[180px]">{{ $report->title }}</h4>
                                    <p class="text-[10px] text-slate-400 font-medium mt-0.5">Uploaded {{ $report->created_at->format('M d, Y') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <a href="{{ route('royalty-reports.view', $report->id) }}" class="px-3 py-1.5 rounded-xl bg-indigo-50 hover:bg-indigo-100 dark:bg-indigo-950/60 dark:hover:bg-indigo-900/60 text-[11px] font-bold text-indigo-700 dark:text-indigo-300 transition-colors" target="_blank">
                                    View PDF
                                </a>
                                <a href="{{ route('royalty-reports.download', $report->id) }}" class="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-[11px] font-bold text-slate-700 dark:text-slate-300 transition-colors" target="_blank">
                                    Download
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>

<script>
function userRoyaltyDashboard(dbRoyalties) {
    return {
        dbRoyalties: dbRoyalties || [],
        selectedYear: 2025,
        selectedMonthNum: 5, // Default May
        selectedMonthText: 'May 1 – May 31, 2025',
        dateOpen: false,
        activePoint: null,
        metricMode: 'revenue', // 'revenue' or 'units'
        chartStyle: 'area', // 'area', 'line', or 'bar'
        isDark: document.documentElement.classList.contains('dark'),

        toggleTheme() {
            this.isDark = !this.isDark;
            if (this.isDark) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
        },

        setMonth(monthNum, yearNum, label) {
            this.selectedMonthNum = monthNum;
            this.selectedYear = yearNum;
            this.selectedMonthText = label;
            this.dateOpen = false;
        },

        get currentWeeks() {
            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            const year = parseInt(this.selectedYear);
            const month = parseInt(this.selectedMonthNum);
            
            const daysInMonth = new Date(year, month, 0).getDate();
            const weekCount = daysInMonth > 28 ? 5 : 4;
            const monthShort = monthNames[month - 1];

            // Filter DB records
            const dbRecords = this.dbRoyalties.filter(r => r.year == year && r.month == month);

            // Default demo curve data when user has no database records entered for selected month
            const defaultDemoData = [
                { sold: 28, amount: 1400, status: 'Paid' },
                { sold: 56, amount: 2800, status: 'Paid' },
                { sold: 42, amount: 2100, status: 'Paid' },
                { sold: 68, amount: 3400, status: 'Processing' },
                { sold: 35, amount: 1750, status: 'Upcoming' },
            ];

            const result = [];
            for (let i = 1; i <= weekCount; i++) {
                let startDay = (i - 1) * 7 + 1;
                let endDay = i === 5 ? daysInMonth : Math.min(i * 7, daysInMonth);
                let periodLabel = `${monthShort} ${startDay} – ${monthShort} ${endDay}`;

                const existing = dbRecords.find(r => r.week_number == i);
                const demo = defaultDemoData[i - 1] || { sold: 20, amount: 1000, status: 'Upcoming' };

                const sold = existing ? parseInt(existing.books_sold) : (dbRecords.length > 0 ? 0 : demo.sold);
                const amount = existing ? parseFloat(existing.royalty_amount) : (dbRecords.length > 0 ? 0 : demo.amount);
                const status = existing ? existing.status : (dbRecords.length > 0 ? (i === weekCount ? 'Upcoming' : 'Paid') : demo.status);

                result.push({
                    week_number: i,
                    week: `Week ${i}`,
                    period: existing ? existing.period_label : periodLabel,
                    sold: sold,
                    amount: amount,
                    amountFormatted: '₱' + amount.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}),
                    status: status,
                    gross: '₱' + (amount * 5).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})
                });
            }
            return result;
        },

        get totalRoyalties() {
            return this.currentWeeks.reduce((sum, w) => sum + w.amount, 0);
        },

        get totalRoyaltiesFormatted() {
            return '₱' + this.totalRoyalties.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        },

        get totalBooksSold() {
            return this.currentWeeks.reduce((sum, w) => sum + w.sold, 0);
        },

        get weeklyAverage() {
            const activeWeeks = this.currentWeeks.filter(w => w.amount > 0).length || this.currentWeeks.length || 1;
            return this.totalRoyalties / activeWeeks;
        },

        get weeklyAverageFormatted() {
            return '₱' + this.weeklyAverage.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        },

        get lastPaymentAmount() {
            const paidWeek = [...this.currentWeeks].reverse().find(w => w.status === 'Paid');
            return paidWeek ? paidWeek.amountFormatted : '₱0.00';
        },

        get lastPaymentPeriod() {
            const paidWeek = [...this.currentWeeks].reverse().find(w => w.status === 'Paid');
            return paidWeek ? paidWeek.period : 'N/A';
        },

        get peakWeeklyFormatted() {
            const max = Math.max(...this.currentWeeks.map(w => w.amount), 0);
            return '₱' + max.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        },

        get avgPerBookFormatted() {
            if (this.totalBooksSold <= 0) return '₱0.00';
            return '₱' + Math.round(this.totalRoyalties / this.totalBooksSold).toLocaleString();
        },

        get activeWeeksCount() {
            return this.currentWeeks.filter(w => w.sold > 0 || w.amount > 0).length;
        },

        get maxSoldVolume() {
            return Math.max(...this.currentWeeks.map(x => x.sold), 1);
        },

        get maxPriceScale() {
            const points = this.currentWeeks;
            if (this.metricMode === 'units') {
                const maxSold = Math.max(...points.map(w => w.sold), 10);
                return Math.ceil((maxSold * 1.25) / 5) * 5 || 20;
            } else {
                const activeAmounts = points.map(w => w.amount);
                const maxAmount = Math.max(...activeAmounts, 2000);
                return Math.ceil((maxAmount * 1.25) / 1000) * 1000 || 4000;
            }
        },

        maxScaleFormatted(multiplier) {
            const val = Math.round(this.maxPriceScale * multiplier);
            if (this.metricMode === 'units') {
                return val.toLocaleString() + ' pcs';
            }
            return '₱' + val.toLocaleString();
        },

        get chartPoints() {
            const points = this.currentWeeks;
            const count = points.length;
            const startX = 75;
            const endX = 495;
            const stepX = (endX - startX) / (count - 1 || 1);
            
            const maxVal = this.maxPriceScale;
            const topY = 25;
            const bottomY = 165;
            const heightY = bottomY - topY;

            return points.map((pt, i) => {
                const x = startX + (i * stepX);
                const val = this.metricMode === 'units' ? pt.sold : pt.amount;
                const y = bottomY - ((val / (maxVal || 1)) * heightY);
                const isActive = pt.sold > 0 || pt.amount > 0 || pt.status !== 'Upcoming';
                return { x, y, isActive, ...pt };
            });
        },

        get solidPoints() {
            const pts = this.chartPoints;
            const active = pts.filter(p => p.isActive);
            return active.length > 0 ? active : pts;
        },

        get solidPathD() {
            const pts = this.solidPoints;
            if (!pts.length) return '';
            if (pts.length === 1) return `M ${pts[0].x},${pts[0].y}`;

            let path = `M ${pts[0].x},${pts[0].y}`;
            for (let i = 0; i < pts.length - 1; i++) {
                const curr = pts[i];
                const next = pts[i + 1];
                const ctrlX = (curr.x + next.x) / 2;
                path += ` C ${ctrlX},${curr.y} ${ctrlX},${next.y} ${next.x},${next.y}`;
            }
            return path;
        },

        get solidAreaD() {
            const pts = this.solidPoints;
            if (!pts.length) return '';
            const bottomY = 165;
            let path = `M ${pts[0].x},${bottomY} L ${pts[0].x},${pts[0].y}`;
            for (let i = 0; i < pts.length - 1; i++) {
                const curr = pts[i];
                const next = pts[i + 1];
                const ctrlX = (curr.x + next.x) / 2;
                path += ` C ${ctrlX},${curr.y} ${ctrlX},${next.y} ${next.x},${next.y}`;
            }
            path += ` L ${pts[pts.length - 1].x},${bottomY} Z`;
            return path;
        },

        get projectionPathD() {
            const solid = this.solidPoints;
            const all = this.chartPoints;
            if (solid.length < all.length) {
                const lastSolid = solid[solid.length - 1];
                const nextPt = all[solid.length];
                if (lastSolid && nextPt) {
                    return `M ${lastSolid.x},${lastSolid.y} L ${nextPt.x},${nextPt.y}`;
                }
            }
            return '';
        },

        getGrowth(index) {
            if (index <= 0) return 0;
            const curr = this.currentWeeks[index]?.amount || 0;
            const prev = this.currentWeeks[index - 1]?.amount || 0;
            if (prev === 0) return curr > 0 ? 100 : 0;
            return Math.round(((curr - prev) / prev) * 100);
        },

        getGrowthLabel(index) {
            const growth = this.getGrowth(index);
            if (index === 0) return 'Baseline Week';
            if (growth > 0) return `+${growth}% vs previous week`;
            if (growth < 0) return `${growth}% vs previous week`;
            return 'Same as previous week';
        }
    }
}
</script>
