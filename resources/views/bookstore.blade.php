@extends('layouts.web')

@section('content')
<style>
    /* Robust 3D Book CSS */
    .book-wrapper {
        perspective: 1200px;
    }
    .book-3d {
        position: relative;
        width: 140px;
        height: 200px;
        transform-style: preserve-3d;
        transform: rotateX(8deg) rotateY(-28deg);
        transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
        z-index: 10;
    }
    .group:hover .book-3d {
        transform: rotateX(2deg) rotateY(-5deg) translateY(-15px) translateZ(30px);
    }
    
    .book-face {
        position: absolute;
        backface-visibility: hidden;
    }
    
    .book-front {
        inset: 0;
        transform: translateZ(15px);
        border-radius: 2px 6px 6px 2px;
        overflow: hidden;
        box-shadow: inset 4px 0 10px rgba(0,0,0,0.1);
        border-left: 1px solid rgba(255,255,255,0.2);
    }
    
    .book-back {
        inset: 0;
        transform: rotateY(180deg) translateZ(15px);
        background: #0f131a;
        border-radius: 6px 2px 2px 6px;
        border-right: 1px solid rgba(255,255,255,0.1);
    }
    
    .book-spine {
        width: 30px;
        height: 100%;
        left: 50%;
        top: 0;
        margin-left: -15px;
        transform: rotateY(-90deg) translateZ(70px);
        background: linear-gradient(to right, #05070a, #151a24 20%, #0a0d14 80%, #05070a);
        display: flex;
        align-items: center;
        justify-content: center;
        border-left: 1px solid rgba(255,255,255,0.05);
    }
    
    .book-pages-right {
        width: 28px;
        height: 96%;
        top: 2%;
        left: 50%;
        margin-left: -14px;
        transform: rotateY(90deg) translateZ(67px);
        background: repeating-linear-gradient(to right, #e2e8f0, #e2e8f0 2px, #cbd5e1 3px, #f8fafc 3px);
        box-shadow: inset 0 0 10px rgba(0,0,0,0.1);
    }
    
    .book-pages-top {
        width: 96%;
        height: 28px;
        left: 2%;
        top: 50%;
        margin-top: -14px;
        transform: rotateX(90deg) translateZ(97px);
        background: repeating-linear-gradient(to bottom, #e2e8f0, #e2e8f0 2px, #cbd5e1 3px, #f8fafc 3px);
    }
    
    .book-pages-bottom {
        width: 96%;
        height: 28px;
        left: 2%;
        top: 50%;
        margin-top: -14px;
        transform: rotateX(-90deg) translateZ(97px);
        background: #cbd5e1;
    }

    /* Base Shadow that follows the book */
    .book-shadow {
        position: absolute;
        bottom: -20px;
        left: 0;
        right: 0;
        height: 20px;
        background: rgba(0,0,0,0.6);
        border-radius: 50%;
        filter: blur(8px);
        transform: translateZ(-20px) rotateX(80deg);
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
    .group:hover .book-shadow {
        filter: blur(15px);
        opacity: 0.5;
        bottom: -35px;
    }
</style>

    <section id="bookstore"
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-[#0a0d14] border-t border-white/5 transition-colors">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-semibold text-[#d4af37] uppercase tracking-[0.2em]">Catalog</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-serif text-white mt-3 tracking-wide">
                    Browse the Academy Bookstore
                </h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-4 font-light tracking-wide">
                    Acquire physical paperbacks or download direct eBooks.
                </p>
            </div>

            <!-- Search Bar -->
            <div class="max-w-xl mx-auto mb-16 relative">
                <input type="text" id="bookSearch" placeholder="Search by title, author, or category..." class="w-full bg-[#0f131a] border border-[#d4af37]/30 rounded-full py-4 px-8 text-white placeholder-slate-500 focus:outline-none focus:border-[#d4af37] focus:ring-1 focus:ring-[#d4af37]/50 transition-colors text-sm font-light">
                <div class="absolute right-6 top-1/2 -translate-y-1/2 text-[#d4af37]/60">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10" id="booksGrid">
                @for ($i = 0; $i < 4; $i++)
                
                <!-- Book Card 1 -->
                <div class="group flex flex-col bg-[#0f131a] border border-white/5 rounded-2xl transition-all duration-500 hover:border-[#d4af37]/40 hover:shadow-[0_0_30px_rgba(212,175,55,0.1)] relative">
                    <!-- 3D Book Container (NO overflow-hidden here!) -->
                    <div class="relative flex justify-center items-center h-[340px] bg-gradient-to-b from-[#151a24] to-[#0f131a] rounded-t-2xl book-wrapper">
                        <!-- Pedestal -->
                        <div class="absolute bottom-10 w-48 h-12 z-0">
                            <div class="absolute inset-0 bg-[#d4af37] rounded-[50%] blur-xl opacity-20 transform scale-y-50 translate-y-2"></div>
                            <div class="absolute inset-0 bg-[#0a0d14] border border-[#d4af37]/20 rounded-[50%] shadow-[inset_0_-5px_15px_rgba(0,0,0,0.8)]"></div>
                            <div class="absolute inset-0 -translate-y-2 bg-gradient-to-br from-[#1e2532] to-[#0f131a] border border-t-[#d4af37]/40 border-x-[#d4af37]/20 border-b-transparent rounded-[50%] shadow-[inset_0_2px_4px_rgba(255,255,255,0.05)]"></div>
                        </div>

                        <!-- The Book -->
                        <div class="book-3d">
                            <div class="book-face book-front">
                                <img src="/images/book_coding.png" alt="Mastering Modern Code" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-tr from-black/30 via-transparent to-white/10 pointer-events-none"></div>
                            </div>
                            <div class="book-face book-back"></div>
                            <div class="book-face book-spine">
                                <span class="text-[8px] text-[#d4af37] tracking-[0.3em] uppercase -rotate-90 whitespace-nowrap opacity-80">Mastering Modern Code</span>
                            </div>
                            <div class="book-face book-pages-right"></div>
                            <div class="book-face book-pages-top"></div>
                            <div class="book-face book-pages-bottom"></div>
                            <div class="book-shadow"></div>
                        </div>
                    </div>

                    <!-- Content Details -->
                    <div class="p-6 flex-1 flex flex-col relative z-10 bg-[#0f131a] rounded-b-2xl border-t border-white/5">
                        <span class="text-[9px] uppercase font-semibold tracking-widest text-[#d4af37] block mb-2">Development</span>
                        <h3 class="text-lg font-serif font-medium text-white mb-1">Mastering Modern Code</h3>
                        <p class="text-slate-400 text-xs font-light italic mb-6">By Alexander Rheinberg</p>
                        
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-xl font-serif text-white tracking-wide">$29.99</span>
                            <button class="w-11 h-11 rounded-full border border-white/10 flex items-center justify-center text-slate-300 hover:border-[#d4af37] hover:bg-[#d4af37] hover:text-[#0a0d14] transition-all duration-300 group/btn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 2 -->
                <div class="group flex flex-col bg-[#0f131a] border border-white/5 rounded-2xl transition-all duration-500 hover:border-[#d4af37]/40 hover:shadow-[0_0_30px_rgba(212,175,55,0.1)] relative">
                    <div class="relative flex justify-center items-center h-[340px] bg-gradient-to-b from-[#151a24] to-[#0f131a] rounded-t-2xl book-wrapper">
                        <div class="absolute bottom-10 w-48 h-12 z-0">
                            <div class="absolute inset-0 bg-[#d4af37] rounded-[50%] blur-xl opacity-20 transform scale-y-50 translate-y-2"></div>
                            <div class="absolute inset-0 bg-[#0a0d14] border border-[#d4af37]/20 rounded-[50%] shadow-[inset_0_-5px_15px_rgba(0,0,0,0.8)]"></div>
                            <div class="absolute inset-0 -translate-y-2 bg-gradient-to-br from-[#1e2532] to-[#0f131a] border border-t-[#d4af37]/40 border-x-[#d4af37]/20 border-b-transparent rounded-[50%] shadow-[inset_0_2px_4px_rgba(255,255,255,0.05)]"></div>
                        </div>

                        <div class="book-3d">
                            <div class="book-face book-front">
                                <img src="/images/book_design.png" alt="The Art of Visual Systems" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-tr from-black/30 via-transparent to-white/10 pointer-events-none"></div>
                            </div>
                            <div class="book-face book-back"></div>
                            <div class="book-face book-spine">
                                <span class="text-[8px] text-[#d4af37] tracking-[0.3em] uppercase -rotate-90 whitespace-nowrap opacity-80">Art of Visual Systems</span>
                            </div>
                            <div class="book-face book-pages-right"></div>
                            <div class="book-face book-pages-top"></div>
                            <div class="book-face book-pages-bottom"></div>
                            <div class="book-shadow"></div>
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col relative z-10 bg-[#0f131a] rounded-b-2xl border-t border-white/5">
                        <span class="text-[9px] uppercase font-semibold tracking-widest text-[#d4af37] block mb-2">Design</span>
                        <h3 class="text-lg font-serif font-medium text-white mb-1">The Art of Visual Systems</h3>
                        <p class="text-slate-400 text-xs font-light italic mb-6">By Elena Rostova</p>
                        
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-xl font-serif text-white tracking-wide">$34.99</span>
                            <button class="w-11 h-11 rounded-full border border-white/10 flex items-center justify-center text-slate-300 hover:border-[#d4af37] hover:bg-[#d4af37] hover:text-[#0a0d14] transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 3 -->
                <div class="group flex flex-col bg-[#0f131a] border border-white/5 rounded-2xl transition-all duration-500 hover:border-[#d4af37]/40 hover:shadow-[0_0_30px_rgba(212,175,55,0.1)] relative">
                    <div class="relative flex justify-center items-center h-[340px] bg-gradient-to-b from-[#151a24] to-[#0f131a] rounded-t-2xl book-wrapper">
                        <div class="absolute bottom-10 w-48 h-12 z-0">
                            <div class="absolute inset-0 bg-[#d4af37] rounded-[50%] blur-xl opacity-20 transform scale-y-50 translate-y-2"></div>
                            <div class="absolute inset-0 bg-[#0a0d14] border border-[#d4af37]/20 rounded-[50%] shadow-[inset_0_-5px_15px_rgba(0,0,0,0.8)]"></div>
                            <div class="absolute inset-0 -translate-y-2 bg-gradient-to-br from-[#1e2532] to-[#0f131a] border border-t-[#d4af37]/40 border-x-[#d4af37]/20 border-b-transparent rounded-[50%] shadow-[inset_0_2px_4px_rgba(255,255,255,0.05)]"></div>
                        </div>

                        <div class="book-3d">
                            <div class="book-face book-front bg-slate-900 flex items-center justify-center p-4 text-center text-white border-l-0">
                                <div>
                                    <p class="text-[8px] uppercase tracking-[0.2em] text-blue-400 mb-1">Business</p>
                                    <h4 class="text-base font-serif font-bold mb-2">Startup<br>Scaleup</h4>
                                    <div class="h-px w-10 bg-blue-500/50 mx-auto my-3"></div>
                                    <p class="text-[8px] text-slate-400">R. Cunningham</p>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-tr from-black/30 via-transparent to-white/10 pointer-events-none"></div>
                            </div>
                            <div class="book-face book-back"></div>
                            <div class="book-face book-spine">
                                <span class="text-[8px] text-[#d4af37] tracking-[0.3em] uppercase -rotate-90 whitespace-nowrap opacity-80">Startup Scaleup</span>
                            </div>
                            <div class="book-face book-pages-right"></div>
                            <div class="book-face book-pages-top"></div>
                            <div class="book-face book-pages-bottom"></div>
                            <div class="book-shadow"></div>
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col relative z-10 bg-[#0f131a] rounded-b-2xl border-t border-white/5">
                        <span class="text-[9px] uppercase font-semibold tracking-widest text-[#d4af37] block mb-2">Business</span>
                        <h3 class="text-lg font-serif font-medium text-white mb-1">Startup Scaleup</h3>
                        <p class="text-slate-400 text-xs font-light italic mb-6">By R. Cunningham</p>
                        
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-xl font-serif text-white tracking-wide">$24.99</span>
                            <button class="w-11 h-11 rounded-full border border-white/10 flex items-center justify-center text-slate-300 hover:border-[#d4af37] hover:bg-[#d4af37] hover:text-[#0a0d14] transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 4 -->
                <div class="group flex flex-col bg-[#0f131a] border border-white/5 rounded-2xl transition-all duration-500 hover:border-[#d4af37]/40 hover:shadow-[0_0_30px_rgba(212,175,55,0.1)] relative">
                    <div class="relative flex justify-center items-center h-[340px] bg-gradient-to-b from-[#151a24] to-[#0f131a] rounded-t-2xl book-wrapper">
                        <div class="absolute bottom-10 w-48 h-12 z-0">
                            <div class="absolute inset-0 bg-[#d4af37] rounded-[50%] blur-xl opacity-20 transform scale-y-50 translate-y-2"></div>
                            <div class="absolute inset-0 bg-[#0a0d14] border border-[#d4af37]/20 rounded-[50%] shadow-[inset_0_-5px_15px_rgba(0,0,0,0.8)]"></div>
                            <div class="absolute inset-0 -translate-y-2 bg-gradient-to-br from-[#1e2532] to-[#0f131a] border border-t-[#d4af37]/40 border-x-[#d4af37]/20 border-b-transparent rounded-[50%] shadow-[inset_0_2px_4px_rgba(255,255,255,0.05)]"></div>
                        </div>

                        <div class="book-3d">
                            <div class="book-face book-front bg-emerald-950 flex items-center justify-center p-4 text-center text-white border-l-0">
                                <div>
                                    <p class="text-[8px] uppercase tracking-[0.2em] text-emerald-400 mb-1">Kids Story</p>
                                    <h4 class="text-base font-serif font-bold mb-2">Little Bear's<br>Forest</h4>
                                    <div class="h-px w-10 bg-emerald-500/50 mx-auto my-3"></div>
                                    <p class="text-[8px] text-emerald-200">Martha Vance</p>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-tr from-black/30 via-transparent to-white/10 pointer-events-none"></div>
                            </div>
                            <div class="book-face book-back"></div>
                            <div class="book-face book-spine">
                                <span class="text-[8px] text-[#d4af37] tracking-[0.3em] uppercase -rotate-90 whitespace-nowrap opacity-80">Little Bear's Forest</span>
                            </div>
                            <div class="book-face book-pages-right"></div>
                            <div class="book-face book-pages-top"></div>
                            <div class="book-face book-pages-bottom"></div>
                            <div class="book-shadow"></div>
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col relative z-10 bg-[#0f131a] rounded-b-2xl border-t border-white/5">
                        <span class="text-[9px] uppercase font-semibold tracking-widest text-[#d4af37] block mb-2">Children's</span>
                        <h3 class="text-lg font-serif font-medium text-white mb-1">Little Bear's Forest</h3>
                        <p class="text-slate-400 text-xs font-light italic mb-6">By Martha Vance</p>
                        
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-xl font-serif text-white tracking-wide">$14.99</span>
                            <button class="w-11 h-11 rounded-full border border-white/10 flex items-center justify-center text-slate-300 hover:border-[#d4af37] hover:bg-[#d4af37] hover:text-[#0a0d14] transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <!-- Empty State -->
            <div id="noResults" class="hidden text-center py-20">
                <p class="text-slate-400 text-lg font-light">No books found matching your search.</p>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('bookSearch');
            const bookCards = document.querySelectorAll('#booksGrid > .group');
            const noResults = document.getElementById('noResults');

            searchInput.addEventListener('input', function(e) {
                const term = e.target.value.toLowerCase();
                let visibleCount = 0;

                bookCards.forEach(card => {
                    const title = card.querySelector('h3')?.textContent.toLowerCase() || '';
                    const author = card.querySelector('p.italic')?.textContent.toLowerCase() || '';
                    const category = card.querySelector('span.tracking-widest')?.textContent.toLowerCase() || '';
                    
                    if (title.includes(term) || author.includes(term) || category.includes(term)) {
                        card.style.display = 'flex';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                if (visibleCount === 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
