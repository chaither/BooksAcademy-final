@extends('layouts.web')

@section('content')
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
@endsection
