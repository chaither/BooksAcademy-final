@php
    $quarterlyRoyaltiesJson = json_encode($user->quarterlyRoyalties ?? []);
    
    // Map published books with their quarterly sales
    $booksData = ($user->publishedBooks ?? collect())->map(function ($book) {
        return [
            'id' => $book->id,
            'title' => $book->title,
            'cover_image_path' => $book->cover_image_path ? asset('storage/' . $book->cover_image_path) : null,
            'flag_images' => collect($book->flag_images ?? [])->map(fn($path) => asset('storage/' . $path))->toArray(),
            'sales' => $book->quarterlySales ?? []
        ];
    });
    $booksDataJson = json_encode($booksData);
@endphp

<div x-data="userRoyaltyDashboard({{ $quarterlyRoyaltiesJson }}, {{ $booksDataJson }})" class="space-y-6">

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
                    Manage your sales performance, quarterly royalty statements, and published assets.
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
                            {{ $user->dashboard_content ?? "Welcome to Books Academy, {$user->name}! We are thrilled to have you here. Your personalized author portal is fully synced with our publishing system. You can monitor your sales performance, view quarterly royalty statements, and access official documents right here. We look forward to publishing your next masterpiece!" }}
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
                <p class="text-xs text-slate-500 dark:text-slate-400 font-medium mt-1">Real-time breakdown of sales, quarterly earnings curves, and payout schedules</p>
            </div>

            <!-- Toolbar Actions: Date Selector, Theme Switcher, Print -->
            <div class="flex flex-wrap items-center gap-2.5">
                <!-- Year Filter Dropdown -->
                <div class="relative text-left">
                    <button @click="dateOpen = !dateOpen" @click.away="dateOpen = false" type="button" class="inline-flex items-center justify-between gap-2.5 px-4 py-2.5 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl text-xs font-bold text-slate-700 dark:text-slate-200 shadow-xs hover:border-indigo-300 dark:hover:border-indigo-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                        <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span x-text="'Year: ' + selectedYear">Year: 2025</span>
                        <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" :class="{ 'rotate-180': dateOpen }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Dropdown Options -->
                    <div x-show="dateOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 mt-2 w-48 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-2xl z-50 py-2 text-xs text-slate-700 dark:text-slate-200" style="display: none;">
                        <div class="py-1">
                            <template x-for="year in availableYears" :key="year">
                                <button @click="selectedYear = year; dateOpen = false" 
                                        :class="selectedYear === year ? 'font-bold bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400' : 'font-medium'"
                                        class="w-full text-left px-4 py-2 hover:bg-indigo-50 dark:hover:bg-indigo-950/40 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center justify-between"
                                        type="button">
                                    <span x-text="year"></span>
                                </button>
                            </template>
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

        <!-- Dynamic Reports Area -->
        <div x-show="hasData" class="space-y-6">
            <!-- 3 Key Stat Cards with Top Accent Glow & Mini Sparklines -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            
                <!-- Card 1: Total Books Sold -->
                <div class="group relative overflow-hidden bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 rounded-2xl p-5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-purple-300 dark:hover:border-purple-700">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-purple-500 to-indigo-500"></div>
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-[11px] font-extrabold text-purple-600 dark:text-purple-400 uppercase tracking-wider mb-1">
                                Total Books Sold
                            </h3>
                            <div class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white tracking-tight" x-text="totalBooksSold.toLocaleString()">
                                0
                            </div>
                            <div class="flex items-center gap-1 mt-2 text-[11px] text-purple-600 dark:text-purple-400 font-bold">
                                <span>Sum of quarterly sales</span>
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
                        <span class="font-bold text-purple-600 dark:text-purple-400" x-text="selectedPeriod === 'all' ? 'All Year' : 'Q' + selectedPeriod">All Year</span>
                    </div>
                </div>

                <!-- Card 2: Total Royalties -->
                <div class="group relative overflow-hidden bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 rounded-2xl p-5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-indigo-300 dark:hover:border-indigo-700">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-500 to-blue-500"></div>
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-[11px] font-extrabold text-indigo-600 dark:text-indigo-400 uppercase tracking-wider mb-1">
                                Total Royalties
                            </h3>
                            <div class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white tracking-tight" x-text="totalRoyaltiesFormatted">
                                $0.00
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

                    <div class="mt-3 pt-2 border-t border-slate-100 dark:border-slate-800/60 flex items-center justify-between text-[10px] text-slate-400 font-medium">
                        <span>Royalty aggregate</span>
                        <span class="font-bold text-indigo-600 dark:text-indigo-400" x-text="selectedPeriod === 'all' ? 'All Year' : 'Q' + selectedPeriod">All Year</span>
                    </div>
                </div>

                <!-- Card 4: Paid to Date -->
                <div class="group relative overflow-hidden bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 rounded-2xl p-5 shadow-xs transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-amber-300 dark:hover:border-amber-700">
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-500 to-orange-400"></div>
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-[11px] font-extrabold text-amber-600 dark:text-amber-400 uppercase tracking-wider mb-1">
                                Paid to Date
                            </h3>
                            <div class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white tracking-tight" x-text="paidToDateFormatted">
                                $0.00
                            </div>
                            <p class="text-[10px] text-slate-500 dark:text-slate-400 font-semibold mt-1.5" x-text="paidToDateLabel">
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

            <!-- 2 Column Breakdown & Enhanced Interactive Bar Graph -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                
                <!-- Left Column: Enhanced SVG Bar Chart (7 cols) -->
                <div class="lg:col-span-7 bg-[#0b0f19] dark:bg-[#0b0f19] border border-slate-800/80 rounded-3xl p-6 sm:p-7 shadow-2xl flex flex-col justify-between relative overflow-hidden">
                    <div>
                        <!-- Header with Title, Mode Switcher -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4 pb-3 border-b border-slate-800/60">
                            <div>
                                <div class="flex items-center gap-2">
                                    <h3 class="text-xs sm:text-sm font-black text-white uppercase tracking-wider">
                                        BOOKS SOLD BY QUARTER
                                    </h3>
                                </div>
                                <p class="text-xs text-slate-400 mt-0.5 font-normal" x-text="'Performance trend for ' + selectedYear"></p>
                            </div>

                            <!-- Graph Controls: Metric Toggle -->
                            <div class="flex items-center gap-2 self-start sm:self-auto">
                                <div class="bg-slate-900/80 p-1 rounded-full flex items-center text-[10px] font-extrabold border border-slate-800/70">
                                    <button @click="metricMode = 'revenue'" :class="{ 'bg-slate-800 text-indigo-400 border border-slate-700/40': metricMode === 'revenue', 'text-slate-400 hover:text-slate-200': metricMode !== 'revenue' }" class="px-3 py-1.5 rounded-full transition-all duration-200 focus:outline-none">
                                        $ Royalties
                                    </button>
                                    <button @click="metricMode = 'units'" :class="{ 'bg-purple-600 text-white shadow-xs border border-purple-500/30': metricMode === 'units', 'text-slate-400 hover:text-slate-200': metricMode !== 'units' }" class="px-3 py-1.5 rounded-full transition-all duration-200 focus:outline-none">
                                        Books Sold
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- SVG Dynamic Interactive Graph Canvas -->
                        <div class="relative w-full overflow-hidden pt-1" @mouseleave="activePoint = null">
                            <svg viewBox="0 0 540 220" class="w-full h-auto text-slate-400 overflow-visible">
                                <defs>
                                    <linearGradient id="barGradient" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#818cf8" />
                                        <stop offset="100%" stop-color="#4f46e5" />
                                    </linearGradient>
                                    <linearGradient id="purpleBarGradient" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#c084fc" />
                                        <stop offset="100%" stop-color="#7c3aed" />
                                    </linearGradient>
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

                                <g>
                                    <!-- Q1 Bar -->
                                    <g @mouseenter="activePoint = 0" @click="selectedPeriod = (selectedPeriod == 1 ? 'all' : 1)" class="cursor-pointer">
                                        <!-- Transparent interaction zone -->
                                        <rect x="50" y="20" width="50" height="150" fill="transparent" />
                                        <!-- The actual bar -->
                                        <rect x="57" 
                                              :y="165 - Math.max(4, (((metricMode === 'revenue' ? (yearQuarters[0] ? yearQuarters[0].amount : 0) : (yearQuarters[0] ? yearQuarters[0].sold : 0)) / maxChartValue) * 140))" 
                                              width="36" 
                                              :height="Math.max(4, (((metricMode === 'revenue' ? (yearQuarters[0] ? yearQuarters[0].amount : 0) : (yearQuarters[0] ? yearQuarters[0].sold : 0)) / maxChartValue) * 140))" 
                                              rx="6" 
                                              :fill="metricMode === 'revenue' ? 'url(#barGradient)' : 'url(#purpleBarGradient)'" 
                                              :opacity="selectedPeriod == 1 ? 1.0 : (selectedPeriod === 'all' ? (activePoint === 0 ? 1.0 : 0.85) : 0.4)" 
                                              class="transition-all duration-300 hover:opacity-100" />
                                        <!-- Axis Labels -->
                                        <text x="75" y="185" text-anchor="middle" font-size="10" font-weight="800" :fill="selectedPeriod == 1 ? '#a78bfa' : '#64748b'" class="transition-colors">Q1</text>
                                        <text x="75" y="198" text-anchor="middle" font-size="9" font-weight="600" fill="#64748b">Jan – Mar</text>
                                    </g>

                                    <!-- Q2 Bar -->
                                    <g @mouseenter="activePoint = 1" @click="selectedPeriod = (selectedPeriod == 2 ? 'all' : 2)" class="cursor-pointer">
                                        <!-- Transparent interaction zone -->
                                        <rect x="190" y="20" width="50" height="150" fill="transparent" />
                                        <!-- The actual bar -->
                                        <rect x="197" 
                                              :y="165 - Math.max(4, (((metricMode === 'revenue' ? (yearQuarters[1] ? yearQuarters[1].amount : 0) : (yearQuarters[1] ? yearQuarters[1].sold : 0)) / maxChartValue) * 140))" 
                                              width="36" 
                                              :height="Math.max(4, (((metricMode === 'revenue' ? (yearQuarters[1] ? yearQuarters[1].amount : 0) : (yearQuarters[1] ? yearQuarters[1].sold : 0)) / maxChartValue) * 140))" 
                                              rx="6" 
                                              :fill="metricMode === 'revenue' ? 'url(#barGradient)' : 'url(#purpleBarGradient)'" 
                                              :opacity="selectedPeriod == 2 ? 1.0 : (selectedPeriod === 'all' ? (activePoint === 1 ? 1.0 : 0.85) : 0.4)" 
                                              class="transition-all duration-300 hover:opacity-100" />
                                        <!-- Axis Labels -->
                                        <text x="215" y="185" text-anchor="middle" font-size="10" font-weight="800" :fill="selectedPeriod == 2 ? '#a78bfa' : '#64748b'" class="transition-colors">Q2</text>
                                        <text x="215" y="198" text-anchor="middle" font-size="9" font-weight="600" fill="#64748b">Apr – Jun</text>
                                    </g>

                                    <!-- Q3 Bar -->
                                    <g @mouseenter="activePoint = 2" @click="selectedPeriod = (selectedPeriod == 3 ? 'all' : 3)" class="cursor-pointer">
                                        <!-- Transparent interaction zone -->
                                        <rect x="330" y="20" width="50" height="150" fill="transparent" />
                                        <!-- The actual bar -->
                                        <rect x="337" 
                                              :y="165 - Math.max(4, (((metricMode === 'revenue' ? (yearQuarters[2] ? yearQuarters[2].amount : 0) : (yearQuarters[2] ? yearQuarters[2].sold : 0)) / maxChartValue) * 140))" 
                                              width="36" 
                                              :height="Math.max(4, (((metricMode === 'revenue' ? (yearQuarters[2] ? yearQuarters[2].amount : 0) : (yearQuarters[2] ? yearQuarters[2].sold : 0)) / maxChartValue) * 140))" 
                                              rx="6" 
                                              :fill="metricMode === 'revenue' ? 'url(#barGradient)' : 'url(#purpleBarGradient)'" 
                                              :opacity="selectedPeriod == 3 ? 1.0 : (selectedPeriod === 'all' ? (activePoint === 2 ? 1.0 : 0.85) : 0.4)" 
                                              class="transition-all duration-300 hover:opacity-100" />
                                        <!-- Axis Labels -->
                                        <text x="355" y="185" text-anchor="middle" font-size="10" font-weight="800" :fill="selectedPeriod == 3 ? '#a78bfa' : '#64748b'" class="transition-colors">Q3</text>
                                        <text x="355" y="198" text-anchor="middle" font-size="9" font-weight="600" fill="#64748b">Jul – Sep</text>
                                    </g>

                                    <!-- Q4 Bar -->
                                    <g @mouseenter="activePoint = 3" @click="selectedPeriod = (selectedPeriod == 4 ? 'all' : 4)" class="cursor-pointer">
                                        <!-- Transparent interaction zone -->
                                        <rect x="470" y="20" width="50" height="150" fill="transparent" />
                                        <!-- The actual bar -->
                                        <rect x="477" 
                                              :y="165 - Math.max(4, (((metricMode === 'revenue' ? (yearQuarters[3] ? yearQuarters[3].amount : 0) : (yearQuarters[3] ? yearQuarters[3].sold : 0)) / maxChartValue) * 140))" 
                                              width="36" 
                                              :height="Math.max(4, (((metricMode === 'revenue' ? (yearQuarters[3] ? yearQuarters[3].amount : 0) : (yearQuarters[3] ? yearQuarters[3].sold : 0)) / maxChartValue) * 140))" 
                                              rx="6" 
                                              :fill="metricMode === 'revenue' ? 'url(#barGradient)' : 'url(#purpleBarGradient)'" 
                                              :opacity="selectedPeriod == 4 ? 1.0 : (selectedPeriod === 'all' ? (activePoint === 3 ? 1.0 : 0.85) : 0.4)" 
                                              class="transition-all duration-300 hover:opacity-100" />
                                        <!-- Axis Labels -->
                                        <text x="495" y="185" text-anchor="middle" font-size="10" font-weight="800" :fill="selectedPeriod == 4 ? '#a78bfa' : '#64748b'" class="transition-colors">Q4</text>
                                        <text x="495" y="198" text-anchor="middle" font-size="9" font-weight="600" fill="#64748b">Oct – Dec</text>
                                    </g>
                                </g>
                            </svg>

                            <div x-show="activePoint !== null" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="mt-2 p-3.5 bg-slate-900/95 dark:bg-slate-900/95 backdrop-blur-xl text-white rounded-2xl text-xs flex items-center justify-between shadow-2xl border border-slate-700/80">
                                <div class="space-y-0.5">
                                    <div class="flex items-center gap-2">
                                        <span class="text-indigo-400 font-extrabold" x-text="yearQuarters[activePoint]?.label"></span>
                                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-slate-800 text-slate-300 font-semibold" x-text="yearQuarters[activePoint]?.period"></span>
                                    </div>
                                    <div class="text-[11px] text-slate-300">
                                        Books Sold: <span class="font-bold text-white" x-text="yearQuarters[activePoint]?.sold + ' Copies'"></span>
                                    </div>
                                </div>
                                <div class="text-right space-y-0.5">
                                    <div class="text-sm font-black text-emerald-400" x-text="'$' + yearQuarters[activePoint]?.amount.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})"></div>
                                    <span class="px-1.5 py-0.5 rounded bg-slate-800 text-slate-300 font-bold" x-text="yearQuarters[activePoint]?.status"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Quarterly Summary Table (5 cols) -->
                <div class="lg:col-span-5 bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 rounded-3xl p-6 sm:p-7 shadow-xs flex flex-col justify-between overflow-hidden">
                    <div>
                        <div class="flex items-center justify-between mb-5">
                            <div>
                                <h3 class="text-xs font-black text-indigo-600 dark:text-indigo-400 uppercase tracking-wider">
                                    Quarterly Summary
                                </h3>
                                <p class="text-[11px] text-slate-400 mt-0.5 font-medium" x-text="'Summary table for ' + selectedYear"></p>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-slate-50/90 dark:bg-slate-800/60 text-[10px] font-extrabold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                        <th class="py-3 px-3 rounded-l-xl">Quarter</th>
                                        <th class="py-3 px-3">Period</th>
                                        <th class="py-3 px-3 text-center">Books Sold</th>
                                        <th class="py-3 px-3 text-right">Royalties</th>
                                        <th class="py-3 px-3 text-center rounded-r-xl">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60 text-xs">
                                    <template x-for="(q, idx) in yearQuarters" :key="q.quarter">
                                        <tr @mouseenter="activePoint = idx" @mouseleave="activePoint = null" @click="selectedPeriod = (selectedPeriod == q.quarter ? 'all' : q.quarter)" :class="{ 'bg-indigo-50/70 dark:bg-indigo-950/40': activePoint === idx || selectedPeriod == q.quarter }" class="hover:bg-indigo-50/50 dark:hover:bg-indigo-950/30 transition-colors cursor-pointer">
                                            <td class="py-3.5 px-3 font-extrabold text-slate-900 dark:text-white" x-text="q.name"></td>
                                            <td class="py-3.5 px-3 text-slate-600 dark:text-slate-400 font-medium text-[11px]" x-text="q.period"></td>
                                            <td class="py-3.5 px-3 text-center font-bold text-slate-800 dark:text-slate-200" x-text="q.sold"></td>
                                            <td class="py-3.5 px-3 text-right font-black text-slate-900 dark:text-white" x-text="'$' + q.amount.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})"></td>
                                            <td class="py-3.5 px-3 text-center">
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-extrabold"
                                                      :class="{
                                                          'bg-emerald-100 dark:bg-emerald-950/60 text-emerald-700 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800/40': q.status === 'Paid',
                                                          'bg-amber-100 dark:bg-amber-950/60 text-amber-700 dark:text-amber-300 border border-amber-200 dark:border-amber-800/40': q.status === 'Processing',
                                                          'bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-700/50': q.status === 'Upcoming'
                                                      }">
                                                    <span class="w-1.5 h-1.5 rounded-full"
                                                          :class="{
                                                              'bg-emerald-500 animate-pulse': q.status === 'Paid',
                                                              'bg-amber-500 animate-pulse': q.status === 'Processing',
                                                              'bg-slate-400': q.status === 'Upcoming'
                                                          }"></span>
                                                    <span x-text="q.status"></span>
                                                </span>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                                <tfoot>
                                    <tr class="bg-slate-50/80 dark:bg-slate-800/80 border-t border-slate-200 dark:border-slate-800 font-black text-xs">
                                        <td colspan="2" class="py-3.5 px-3 text-slate-800 dark:text-slate-200">Total</td>
                                        <td class="py-3.5 px-3 text-center text-purple-700 dark:text-purple-300" x-text="yearQuarters.reduce((sum, q) => sum + q.sold, 0).toLocaleString()"></td>
                                        <td class="py-3.5 px-3 text-right text-indigo-600 dark:text-indigo-400" x-text="'$' + yearQuarters.reduce((sum, q) => sum + q.amount, 0).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})"></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Row: Top Selling Books table -->
            <div class="bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 rounded-3xl p-6 sm:p-7 shadow-xs">
                <div class="flex items-center justify-between mb-5 pb-3 border-b border-slate-100 dark:border-slate-800/70">
                    <div>
                        <h3 class="text-xs sm:text-sm font-black text-slate-900 dark:text-white uppercase tracking-wider">
                            Top Selling Books (<span x-text="selectedPeriod === 'all' ? 'All Year' : 'Q' + selectedPeriod">All Year</span>)
                        </h3>
                        <p class="text-xs text-slate-400 mt-0.5 font-normal">Real-time copy distribution, total royalties, and country sales breakdown.</p>
                    </div>

                    <!-- Period Quick Toggle Dropdown -->
                    <select x-model="selectedPeriod" class="px-3 py-1.5 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-xs font-bold text-slate-700 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                        <option value="all">All Year</option>
                        <option value="1">Q1 (Jan - Mar)</option>
                        <option value="2">Q2 (Apr - Jun)</option>
                        <option value="3">Q3 (Jul - Sep)</option>
                        <option value="4">Q4 (Oct - Dec)</option>
                    </select>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/90 dark:bg-slate-800/60 text-[10px] font-extrabold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                <th class="py-3 px-3 rounded-l-xl w-12">#</th>
                                <th class="py-3 px-3">Book Title</th>
                                <th class="py-3 px-3 text-center">Books Sold</th>
                                <th class="py-3 px-3 text-right">Royalties</th>
                                <th class="py-3 px-3 text-right rounded-r-xl">Countries Sold</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60 text-xs">
                            <template x-for="(book, index) in bookSalesList" :key="book.id">
                                <tr class="hover:bg-slate-50/50 dark:hover:bg-indigo-950/20 transition-colors">
                                    <td class="py-3.5 px-3 font-extrabold text-slate-400" x-text="index + 1"></td>
                                    <td class="py-3.5 px-3">
                                        <div class="flex items-center gap-3">
                                            <template x-if="book.cover_image_path">
                                                <img :src="book.cover_image_path" class="w-9 h-12 object-cover rounded shadow-xs border border-slate-200/50 dark:border-slate-800">
                                            </template>
                                            <template x-if="!book.cover_image_path">
                                                <div class="w-9 h-12 bg-indigo-50 dark:bg-indigo-950/50 border border-indigo-100/40 rounded flex items-center justify-center text-indigo-500">
                                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                                    </svg>
                                                </div>
                                            </template>
                                            <span class="font-extrabold text-slate-800 dark:text-slate-100" x-text="book.title"></span>
                                        </div>
                                    </td>
                                    <td class="py-3.5 px-3 text-center font-bold text-slate-700 dark:text-slate-300" x-text="book.sold.toLocaleString()"></td>
                                    <td class="py-3.5 px-3 text-right font-black text-indigo-600 dark:text-indigo-400" x-text="book.royaltiesFormatted"></td>
                                    <td class="py-3.5 px-3">
                                        <template x-if="book.sold > 0">
                                            <div class="flex items-center justify-end -space-x-2 overflow-hidden">
                                                <template x-for="(flagUrl, fIdx) in book.flag_images.slice(0, 4)" :key="fIdx">
                                                    <img :src="flagUrl"
                                                         class="relative inline-block h-8 w-8 rounded-full object-cover ring-2 ring-white dark:ring-slate-900 z-10 hover:z-20 transition-all border border-slate-200/50 dark:border-slate-800">
                                                </template>
                                                <template x-if="book.flag_images.length > 4">
                                                    <div class="relative inline-flex items-center justify-center h-8 w-8 rounded-full bg-slate-800 dark:bg-slate-700 ring-2 ring-white dark:ring-slate-900 text-[10px] font-bold text-white z-0">
                                                        <span x-text="(book.flag_images.length - 4) + '+'"></span>
                                                    </div>
                                                </template>
                                                <template x-if="book.flag_images.length === 0">
                                                    <span class="text-slate-400 dark:text-slate-500 italic text-[11px] pr-2">None</span>
                                                </template>
                                            </div>
                                        </template>
                                        <template x-if="book.sold === 0">
                                            <div class="flex items-center justify-end">
                                                <span class="text-slate-400 dark:text-slate-500 italic text-[11px] pr-2">None</span>
                                            </div>
                                        </template>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>

        </div> <!-- This ends the dynamic reports area content grid -->

        <!-- Empty State when no data is saved for the selected year -->
        <div x-show="!hasData" class="flex flex-col items-center justify-center py-16 px-4 text-center bg-slate-50/50 dark:bg-slate-900/30 rounded-3xl border border-dashed border-slate-200 dark:border-slate-800">
            <div class="w-16 h-16 rounded-2xl bg-indigo-50 dark:bg-indigo-950/60 flex items-center justify-center text-indigo-500 dark:text-indigo-400 mb-4 border border-indigo-100/55 dark:border-indigo-900/30 shadow-xs">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-base font-extrabold text-slate-800 dark:text-slate-200 tracking-tight">No Royalty Data Published</h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 font-medium max-w-sm mt-1">
                Official quarterly statements and sales figures for <span class="font-bold text-indigo-600 dark:text-indigo-400" x-text="selectedYear"></span> have not been posted by the admin yet.
            </p>
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
function userRoyaltyDashboard(dbRoyalties, dbBooks) {
    return {
        dbRoyalties: dbRoyalties || [],
        dbBooks: dbBooks || [],
        selectedYear: 2025,
        selectedPeriod: 'all', // 'all', '1', '2', '3', '4'
        dateOpen: false,
        activePoint: null,
        metricMode: 'units', // default to units (Books Sold) to match "Books Sold by Quarter" in screenshot
        isDark: document.documentElement.classList.contains('dark'),

        init() {
            const years = this.availableYears;
            if (years.length > 0) {
                this.selectedYear = years[0];
            } else {
                this.selectedYear = new Date().getFullYear();
            }
        },

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

        get availableYears() {
            const list = [];
            this.dbRoyalties.forEach(r => {
                const yr = parseInt(r.year);
                if (!list.includes(yr)) {
                    list.push(yr);
                }
            });
            if (list.length === 0) {
                list.push(new Date().getFullYear());
            }
            return list.sort((a, b) => b - a);
        },

        get hasData() {
            return this.dbRoyalties.some(r => r.year == this.selectedYear);
        },

        get yearQuarters() {
            const quarters = [
                { quarter: 1, name: 'Q1', period: 'Jan – Mar', label: '1st Quarter' },
                { quarter: 2, name: 'Q2', period: 'Apr – Jun', label: '2nd Quarter' },
                { quarter: 3, name: 'Q3', period: 'Jul – Sep', label: '3rd Quarter' },
                { quarter: 4, name: 'Q4', period: 'Oct – Dec', label: '4th Quarter' }
            ];
            return quarters.map(q => {
                const existing = this.dbRoyalties.find(r => r.year == this.selectedYear && r.quarter == q.quarter);
                return {
                    ...q,
                    sold: existing ? parseInt(existing.books_sold) : 0,
                    amount: existing ? parseFloat(existing.royalty_amount) : 0.00,
                    status: existing ? existing.status : 'Upcoming'
                };
            });
        },

        get totalBooksSold() {
            if (this.selectedPeriod === 'all') {
                return this.yearQuarters.reduce((sum, q) => sum + q.sold, 0);
            }
            const q = this.yearQuarters.find(x => x.quarter == this.selectedPeriod);
            return q ? q.sold : 0;
        },

        get totalRoyalties() {
            if (this.selectedPeriod === 'all') {
                return this.yearQuarters.reduce((sum, q) => sum + q.amount, 0);
            }
            const q = this.yearQuarters.find(x => x.quarter == this.selectedPeriod);
            return q ? q.amount : 0.00;
        },

        get totalRoyaltiesFormatted() {
            return '$' + this.totalRoyalties.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        },

        get averageRoyalty() {
            if (this.totalBooksSold <= 0) return 0;
            return this.totalRoyalties / this.totalBooksSold;
        },

        get averageRoyaltyFormatted() {
            return '$' + this.averageRoyalty.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        },

        get paidToDate() {
            return this.yearQuarters.filter(q => q.status === 'Paid').reduce((sum, q) => sum + q.amount, 0);
        },

        get paidToDateFormatted() {
            return '$' + this.paidToDate.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        },

        get paidToDateLabel() {
            const paidQuarters = this.yearQuarters.filter(q => q.status === 'Paid');
            if (paidQuarters.length === 0) return 'No paid quarters';
            const maxQuarter = Math.max(...paidQuarters.map(q => q.quarter));
            const endDates = {
                1: 'Mar 31',
                2: 'Jun 30',
                3: 'Sep 30',
                4: 'Dec 31'
            };
            return `As of ${endDates[maxQuarter]}, ${this.selectedYear}`;
        },

        get lastPaymentAmount() {
            const paidQuarters = [...this.yearQuarters].filter(q => q.status === 'Paid');
            if (paidQuarters.length === 0) return '$0.00';
            const latest = paidQuarters[paidQuarters.length - 1];
            return '$' + latest.amount.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
        },

        get lastPaymentPeriod() {
            const paidQuarters = [...this.yearQuarters].filter(q => q.status === 'Paid');
            if (paidQuarters.length === 0) return 'N/A';
            const latest = paidQuarters[paidQuarters.length - 1];
            return `${latest.name} ${this.selectedYear}`;
        },

        get maxChartValue() {
            const values = this.yearQuarters.map(q => this.metricMode === 'revenue' ? q.amount : q.sold);
            return Math.max(...values, 100);
        },

        maxScaleFormatted(multiplier) {
            const val = Math.round(this.maxChartValue * multiplier);
            if (this.metricMode === 'units') {
                return val.toLocaleString() + ' copies';
            }
            return '$' + val.toLocaleString();
        },

        get bookSalesList() {
            const list = this.dbBooks.map(book => {
                let sold = 0;
                let royalties = 0.00;
                
                if (this.selectedPeriod === 'all') {
                    const sales = (book.sales || []).filter(s => s.year == this.selectedYear);
                    sold = sales.reduce((sum, s) => sum + s.books_sold, 0);
                    royalties = sales.reduce((sum, s) => sum + parseFloat(s.royalty_amount), 0);
                } else {
                    const sale = (book.sales || []).find(s => s.year == this.selectedYear && s.quarter == this.selectedPeriod);
                    if (sale) {
                        sold = sale.books_sold;
                        royalties = parseFloat(sale.royalty_amount);
                    }
                }
                
                return {
                    id: book.id,
                    title: book.title,
                    cover_image_path: book.cover_image_path,
                    sold: sold,
                    royalties: royalties,
                    royaltiesFormatted: '$' + royalties.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}),
                    flag_images: book.flag_images || []
                };
            });

            // Sort by sold count desc
            return list.sort((a, b) => b.sold - a.sold);
        }
    }
}
</script>
