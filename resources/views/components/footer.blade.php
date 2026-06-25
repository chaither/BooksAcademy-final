<footer class="bg-[#0F1B3D] border-t border-[#C9A227]/20 relative overflow-hidden text-[#F8F5EE]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-16 md:py-24">
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 md:gap-8">
            <!-- Brand Column -->
            <div class="md:col-span-2 space-y-6">
                <a href="{{ url('/') }}" class="inline-block transition-opacity hover:opacity-80">
                    <img src="{{ asset('images/L01.png') }}" alt="BooksAcademy Logo" class="h-16 w-auto object-contain brightness-0 invert">
                </a>
                <p class="text-sm text-slate-400 max-w-sm leading-relaxed font-serif italic">
                    Elevating literary voices through premium publishing experiences and global distribution networks.
                </p>
                <!-- Social Links -->
                <div class="flex items-center gap-4 pt-4">
                    <a href="#" aria-label="Facebook" class="w-10 h-10 rounded-full border border-slate-700 flex items-center justify-center text-slate-400 hover:text-[#C9A227] hover:border-[#C9A227] transition-all group">
                        <span class="text-xs font-bold uppercase tracking-wider group-hover:scale-110 transition-transform">Fb</span>
                    </a>
                    <a href="#" aria-label="Twitter" class="w-10 h-10 rounded-full border border-slate-700 flex items-center justify-center text-slate-400 hover:text-[#C9A227] hover:border-[#C9A227] transition-all group">
                        <span class="text-xs font-bold uppercase tracking-wider group-hover:scale-110 transition-transform">Tw</span>
                    </a>
                    <a href="#" aria-label="Instagram" class="w-10 h-10 rounded-full border border-slate-700 flex items-center justify-center text-slate-400 hover:text-[#C9A227] hover:border-[#C9A227] transition-all group">
                        <span class="text-xs font-bold uppercase tracking-wider group-hover:scale-110 transition-transform">Ig</span>
                    </a>
                </div>
            </div>

            <!-- Links Column 1 -->
            <div class="space-y-6">
                <h4 class="text-xs font-bold uppercase tracking-[0.2em] text-[#C9A227]">Navigation</h4>
                <ul class="space-y-4 text-sm text-slate-400">
                    <li><a href="{{ url('/#about-us') }}" class="hover:text-white hover:translate-x-1 inline-block transition-transform">About Us</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-white hover:translate-x-1 inline-block transition-transform">Services</a></li>
                    <li><a href="{{ route('bookstore') }}" class="hover:text-white hover:translate-x-1 inline-block transition-transform">Bookstore</a></li>
                    <li><a href="{{ route('pressroom') }}" class="hover:text-white hover:translate-x-1 inline-block transition-transform">Pressroom</a></li>
                </ul>
            </div>

            <!-- Links Column 2 -->
            <div class="space-y-6">
                <h4 class="text-xs font-bold uppercase tracking-[0.2em] text-[#C9A227]">Connect</h4>
                <ul class="space-y-4 text-sm text-slate-400">
                    <li><a href="{{ route('contact') }}" class="hover:text-white hover:translate-x-1 inline-block transition-transform">Contact Us</a></li>
                    @if (Route::has('login'))
                        <li><a href="{{ route('login') }}" class="hover:text-white hover:translate-x-1 inline-block transition-transform">Author Portal</a></li>
                    @endif
                    <li><a href="#" class="hover:text-white hover:translate-x-1 inline-block transition-transform">Careers</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-16 md:mt-24 pt-8 border-t border-slate-800 flex flex-col md:flex-row items-center justify-between gap-6">
            <p class="text-xs text-slate-500 font-medium">
                &copy; {{ date('Y') }} Books Academy Inc. All rights reserved. Laravel v{{ Illuminate\Foundation\Application::VERSION }}
            </p>
            <div class="flex flex-wrap justify-center md:justify-end gap-6 text-xs text-slate-500 font-medium">
                <a href="#" class="hover:text-[#C9A227] transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-[#C9A227] transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-[#C9A227] transition-colors">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>
