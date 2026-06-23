@extends('layouts.web')

@section('content')
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
@endsection
