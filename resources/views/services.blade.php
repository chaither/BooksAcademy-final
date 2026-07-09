@extends('layouts.web')

@section('content')
    <!-- Services Section (Publishing: Children's, B&W, Full Color, Marketing, Add-ons) -->
    <section id="services"
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-black transition-colors relative overflow-hidden">
        
        <!-- Background Layer with Image -->
        <div class="absolute inset-0 w-full h-full z-0">
            <img src="{{ asset('images/bookstore.png') }}" class="w-full h-full object-cover opacity-30 object-center blur-[2px]">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a0502] via-[#0a0502]/80 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0502] via-transparent to-[#0a0502]"></div>
        </div>

        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-semibold text-[#d4af37] uppercase tracking-[0.2em]">Our Solutions</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-serif text-white mt-3 tracking-wide">
                    Publishing & Marketing Services</h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-4 font-light tracking-wide">Professional design layouts, print catalogs, and
                    promotional setups.</p>
            </div>

            <!-- Simple Tab Selectors -->
            <div class="flex flex-wrap items-center justify-center gap-3 mb-12" id="services-selector">
                <button onclick="selectServiceCard('children')" id="btn-srv-children"
                    class="px-5 py-2.5 rounded-full text-xs font-medium uppercase tracking-wider border border-[#d4af37] bg-[#d4af37] text-[#0a0d14] hover:shadow-[0_0_15px_rgba(212,175,55,0.3)] transition-all">
                    Children's Books
                </button>
                <button onclick="selectServiceCard('bw')" id="btn-srv-bw"
                    class="px-5 py-2.5 rounded-full text-xs font-medium uppercase tracking-wider border border-white/10 text-slate-300 hover:border-[#d4af37] hover:text-[#d4af37] transition-all">
                    Black & White
                </button>
                <button onclick="selectServiceCard('color')" id="btn-srv-color"
                    class="px-5 py-2.5 rounded-full text-xs font-medium uppercase tracking-wider border border-white/10 text-slate-300 hover:border-[#d4af37] hover:text-[#d4af37] transition-all">
                    Full Color
                </button>
                <button onclick="selectServiceCard('marketing')" id="btn-srv-marketing"
                    class="px-5 py-2.5 rounded-full text-xs font-medium uppercase tracking-wider border border-white/10 text-slate-300 hover:border-[#d4af37] hover:text-[#d4af37] transition-all">
                    Marketing
                </button>
                <button onclick="selectServiceCard('addons')" id="btn-srv-addons"
                    class="px-5 py-2.5 rounded-full text-xs font-medium uppercase tracking-wider border border-white/10 text-slate-300 hover:border-[#d4af37] hover:text-[#d4af37] transition-all">
                    Add-ons
                </button>
            </div>

            <!-- Detail Grid (Toggled dynamically, only displaying active selection) -->
            <div class="max-w-2xl mx-auto bg-[#0f131a] border border-white/5 rounded-2xl p-8 lg:p-10 shadow-[0_8px_30px_rgb(0,0,0,0.4)] relative"
                id="services-details-container">
                <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent opacity-50 rounded-2xl pointer-events-none"></div>

                <!-- Content injected/toggled via JS -->
                <div id="service-content-body" class="space-y-6 relative z-10 text-slate-300">
                    <!-- Dynamic Text -->
                </div>

            </div>
        </div>
    </section>
@endsection
