@extends('layouts.web')

@section('title', 'Books Academy Bookstore — Browse Our Catalog')
@section('meta_title', 'Books Academy Bookstore — Browse Our Catalog')
@section('meta_description', 'Browse the Books Academy Bookstore catalog. Acquire physical paperbacks or download direct eBooks from our talented authors.')
@section('meta_keywords', 'books academy bookstore, buy books, ebooks, paperbacks, catalog, online bookstore')

@section('content')

@php
    $books = [];
    $categories = [];
    if (isset($dbBooks) && count($dbBooks) > 0) {
        foreach ($dbBooks as $b) {
            $cat = trim($b->category) ?: 'General';
            $books[] = [
                'id' => 'db-' . $b->id,
                'image' => asset('storage/' . $b->image),
                'back_image' => $b->back_image ? asset('storage/' . $b->back_image) : asset('storage/' . $b->image),
                'spine_image' => $b->spine_image ? asset('storage/' . $b->spine_image) : asset('storage/' . $b->image),
                'title' => $b->title,
                'author' => $b->author,
                'category' => $cat,
                'price' => number_format($b->price, 2),
                'description' => $b->description ?: 'Dive into the contents of this excellent book, perfectly tailored for enhancing your skills and broadening your horizons. This comprehensive guide covers everything you need to know, starting from the very basics and moving all the way up to advanced topics.',
            ];
            if (!in_array($cat, $categories)) {
                $categories[] = $cat;
            }
        }
    }
@endphp

<style>
    /* Reset Browser Default Outlines */
    #bookSearch:focus, #categoryFilter:focus, #bookSearch, #categoryFilter {
        outline: none !important;
        box-shadow: none !important;
        -webkit-tap-highlight-color: transparent;
    }

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

    /* Modal 3D Book CSS */
    .modal-book-wrapper {
        perspective: 1500px;
    }
    .modal-book-3d {
        position: relative;
        width: 240px;
        height: 348px;
        transform-style: preserve-3d;
        animation: spin-y 12s linear infinite;
    }
    @keyframes spin-y {
        0% { transform: rotateY(0deg) rotateX(5deg); }
        100% { transform: rotateY(360deg) rotateX(5deg); }
    }
    .modal-book-face {
        position: absolute;
        backface-visibility: hidden;
    }
    .modal-book-front {
        inset: 0;
        transform: translateZ(18px);
        border-radius: 2px 6px 6px 2px;
        overflow: hidden;
        box-shadow: inset 4px 0 10px rgba(0,0,0,0.1);
        border-left: 1px solid rgba(255,255,255,0.2);
    }
    .modal-book-back {
        inset: 0;
        transform: rotateY(180deg) translateZ(18px);
        border-radius: 6px 2px 2px 6px;
        overflow: hidden;
        border-right: 1px solid rgba(255,255,255,0.1);
    }
    .modal-book-spine {
        width: 36px;
        height: 100%;
        left: 50%;
        top: 0;
        margin-left: -18px;
        transform: rotateY(-90deg) translateZ(120px);
        background: linear-gradient(to right, #05070a, #151a24 20%, #0a0d14 80%, #05070a);
        display: flex;
        align-items: center;
        justify-content: center;
        border-left: 1px solid rgba(255,255,255,0.05);
    }
    .modal-book-pages-right {
        width: 32px;
        height: 96%;
        top: 2%;
        left: 50%;
        margin-left: -16px;
        transform: rotateY(90deg) translateZ(117px);
        background: repeating-linear-gradient(to right, #e2e8f0, #e2e8f0 2px, #cbd5e1 3px, #f8fafc 3px);
        box-shadow: inset 0 0 10px rgba(0,0,0,0.1);
    }
    .modal-book-pages-top {
        width: 96%;
        height: 32px;
        left: 2%;
        top: 50%;
        margin-top: -16px;
        transform: rotateX(90deg) translateZ(171px);
        background: repeating-linear-gradient(to bottom, #e2e8f0, #e2e8f0 2px, #cbd5e1 3px, #f8fafc 3px);
    }
    .modal-book-pages-bottom {
        width: 96%;
        height: 32px;
        left: 2%;
        top: 50%;
        margin-top: -16px;
        transform: rotateX(-90deg) translateZ(171px);
        background: #cbd5e1;
    }
</style>

    <section id="bookstore"
        class="relative py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-[#0a0d14] border-t border-white/5 transition-colors overflow-hidden">
        
        <!-- Background Image with Soft Ambient Overlay -->
        <div class="absolute inset-0 z-0 pointer-events-none">
            <img src="/images/bookstore.png" alt="Bookstore Background" class="w-full h-full object-cover object-center opacity-75 filter contrast-105 scale-100">
            <!-- Subtle top and bottom edge gradients only for seamless page blending -->
            <div class="absolute inset-0 bg-gradient-to-b from-[#0a0d14] via-[#0a0d14]/30 to-[#0a0d14]"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-flex items-center gap-2 text-xs font-semibold text-[#d4af37] uppercase tracking-[0.25em] px-4 py-1.5 rounded-full bg-[#d4af37]/10 border border-[#d4af37]/20 backdrop-blur-md shadow-[0_0_15px_rgba(212,175,55,0.15)] mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#d4af37] animate-pulse"></span>
                    Academy Catalog
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl 2xl:text-6xl font-serif text-white tracking-wide leading-tight drop-shadow-md">
                    Browse the <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-amber-100 to-[#d4af37]">Academy Bookstore</span>
                </h2>
                <p class="text-sm sm:text-base text-slate-300 max-w-xl mx-auto mt-4 font-light tracking-wide leading-relaxed">
                    Acquire physical paperbacks or download direct eBooks.
                </p>
            </div>

            <!-- Luxury Integrated Search & Category Filter Bar -->
            <div class="max-w-4xl mx-auto mb-16 px-2">
                <div class="relative flex items-center bg-gradient-to-r from-[#0f131a]/95 via-[#151a24]/95 to-[#0f131a]/95 backdrop-blur-xl border border-[#d4af37]/35 rounded-full shadow-[0_0_30px_rgba(212,175,55,0.1)] focus-within:border-[#d4af37] focus-within:shadow-[0_0_35px_rgba(212,175,55,0.2)] hover:border-[#d4af37]/50 transition-all duration-500 p-2 pl-6">
                    
                    <!-- Search Icon (Left) -->
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-[#d4af37]/10 text-[#d4af37] shrink-0 mr-3 shadow-[inset_0_0_10px_rgba(212,175,55,0.2)]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <!-- Search Input (Center) -->
                    <input type="text" id="bookSearch" placeholder="Search by title, author, or category..." class="w-full bg-transparent text-white placeholder-slate-400 focus:outline-none focus:ring-0 border-none outline-none text-sm font-light py-2">

                    <!-- Filter Badge Pill (Right Inside Bar) -->
                    <div class="relative shrink-0 flex items-center ml-2">
                        <div class="flex items-center gap-2 bg-[#181f2c] border border-[#d4af37]/40 hover:border-[#d4af37] hover:bg-[#1e2738] transition-all duration-300 rounded-full px-4 py-2 shadow-sm relative group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#d4af37] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            <select id="categoryFilter" class="bg-transparent text-slate-200 font-medium text-xs border-none outline-none focus:outline-none focus:ring-0 cursor-pointer pr-5 appearance-none">
                                <option value="all" class="bg-[#0f131a] text-slate-200">All Categories</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ strtolower($cat) }}" class="bg-[#0f131a] text-slate-200">{{ $cat }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-[#d4af37]">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10" id="booksGrid">
                @foreach ($books as $book)
                <!-- Book Card {{ $book['id'] }} -->
                <div class="group flex flex-col bg-[#0f131a] border border-white/5 rounded-2xl transition-all duration-500 hover:border-[#d4af37]/40 hover:shadow-[0_0_30px_rgba(212,175,55,0.1)] relative book-card cursor-pointer" data-title="{{ $book['title'] }}" data-author="{{ $book['author'] }}" data-category="{{ $book['category'] }}" data-price="{{ $book['price'] }}" data-image="{{ $book['image'] }}" data-back-image="{{ $book['back_image'] ?? $book['image'] }}" data-spine-image="{{ $book['spine_image'] ?? $book['image'] }}" data-description="{{ $book['description'] ?? '' }}">
                    <div class="relative flex justify-center items-center h-[340px] bg-gradient-to-b from-[#151a24] to-[#0f131a] rounded-t-2xl book-wrapper">
                        <div class="absolute bottom-10 w-48 h-12 z-0">
                            <div class="absolute inset-0 bg-[#d4af37] rounded-[50%] blur-xl opacity-20 transform scale-y-50 translate-y-2"></div>
                            <div class="absolute inset-0 bg-[#0a0d14] border border-[#d4af37]/20 rounded-[50%] shadow-[inset_0_-5px_15px_rgba(0,0,0,0.8)]"></div>
                            <div class="absolute inset-0 -translate-y-2 bg-gradient-to-br from-[#1e2532] to-[#0f131a] border border-t-[#d4af37]/40 border-x-[#d4af37]/20 border-b-transparent rounded-[50%] shadow-[inset_0_2px_4px_rgba(255,255,255,0.05)]"></div>
                        </div>

                        <div class="book-3d">
                            <div class="book-face book-front">
                                <img src="{{ (str_starts_with($book['image'], '/') || str_starts_with($book['image'], 'http')) ? $book['image'] : '/images/' . $book['image'] }}" alt="{{ $book['title'] }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-tr from-black/30 via-transparent to-white/10 pointer-events-none"></div>
                            </div>
                            <div class="book-face book-back"></div>
                            <div class="book-face book-spine">
                                <span class="text-[8px] text-[#d4af37] tracking-[0.3em] uppercase -rotate-90 whitespace-nowrap opacity-80">{{ $book['title'] }}</span>
                            </div>
                            <div class="book-face book-pages-right"></div>
                            <div class="book-face book-pages-top"></div>
                            <div class="book-face book-pages-bottom"></div>
                            <div class="book-shadow"></div>
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col relative z-10 bg-[#0f131a] rounded-b-2xl border-t border-white/5">
                        <span class="text-[9px] uppercase font-semibold tracking-widest text-[#d4af37] block mb-2">{{ $book['category'] }}</span>
                        <h3 class="text-lg font-serif font-medium text-white mb-1">{{ $book['title'] }}</h3>
                        <p class="text-slate-400 text-xs font-light italic mb-6">By {{ $book['author'] }}</p>
                        
                        <div class="flex items-center justify-between mt-auto">
                            <span class="text-xl font-serif text-white tracking-wide">${{ $book['price'] }}</span>
                            <button class="w-11 h-11 rounded-full border border-white/10 flex items-center justify-center text-slate-300 hover:border-[#d4af37] hover:bg-[#d4af37] hover:text-[#0a0d14] transition-all duration-300" onclick="event.stopPropagation()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination Controls -->
            <div id="pagination" class="mt-12 flex justify-center items-center space-x-2">
                <button id="prevPage" class="px-4 py-2 rounded-full border border-white/10 text-slate-300 hover:border-[#d4af37] hover:text-[#d4af37] disabled:opacity-50 disabled:cursor-not-allowed transition-colors text-sm">Previous</button>
                <span id="pageInfo" class="text-slate-400 text-sm px-4">Page 1 of 3</span>
                <button id="nextPage" class="px-4 py-2 rounded-full border border-white/10 text-slate-300 hover:border-[#d4af37] hover:text-[#d4af37] disabled:opacity-50 disabled:cursor-not-allowed transition-colors text-sm">Next</button>
            </div>

            <!-- Empty State -->
            <div id="noResults" class="hidden text-center py-20">
                <p class="text-slate-400 text-lg font-light">No books found matching your search.</p>
            </div>

            <!-- Book Details Modal -->
            <div id="bookModal" class="fixed inset-0 z-50 hidden items-center justify-center">
                <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" id="modalBackdrop"></div>
                <div class="relative bg-[#0f131a] border border-[#d4af37]/30 rounded-2xl p-6 max-w-4xl w-full mx-4 shadow-[0_0_50px_rgba(0,0,0,0.5)] transform scale-95 opacity-0 transition-all duration-300 flex flex-col sm:flex-row gap-8" id="modalContent">
                    <button id="closeModal" class="absolute top-4 right-4 text-slate-400 hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    
                    <div class="w-full sm:w-1/2 flex justify-center items-center modal-book-wrapper py-8 overflow-visible">
                        <div class="modal-book-3d">
                            <div class="modal-book-face modal-book-front">
                                <img id="modalImage" src="" alt="Book Cover" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-tr from-black/30 via-transparent to-white/10 pointer-events-none"></div>
                            </div>
                            <div class="modal-book-face modal-book-back">
                                <img id="modalBackImage" src="" alt="Book Back Cover" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-tr from-black/30 via-transparent to-white/10 pointer-events-none"></div>
                            </div>
                            <div class="modal-book-face modal-book-spine overflow-hidden">
                                <img id="modalSpineImage" src="" alt="Book Spine" class="absolute inset-0 w-full h-full object-fill">
                                <div class="absolute inset-0 bg-black/40 pointer-events-none"></div>
                                <span id="modalSpineTitle" class="relative z-10 text-[10px] text-white tracking-[0.3em] uppercase -rotate-90 whitespace-nowrap drop-shadow-md">Book Title</span>
                            </div>
                            <div class="modal-book-face modal-book-pages-right"></div>
                            <div class="modal-book-face modal-book-pages-top"></div>
                            <div class="modal-book-face modal-book-pages-bottom"></div>
                        </div>
                    </div>
                    
                    <div class="w-full sm:w-1/2 flex flex-col justify-center">
                        <span id="modalCategory" class="text-xs uppercase font-semibold tracking-widest text-[#d4af37] block mb-2">Category</span>
                        <h2 id="modalTitle" class="text-2xl sm:text-3xl font-serif text-white mb-2 leading-tight">Book Title</h2>
                        <p id="modalAuthor" class="text-slate-400 text-sm italic mb-6">By Author</p>
                        
                        <div class="mb-6">
                            <p id="modalDescription" class="text-slate-300 text-sm font-light leading-relaxed transition-all duration-300"></p>
                            <button id="seeMoreBtn" class="text-[#d4af37] font-semibold text-xs uppercase tracking-widest hover:text-white mt-3 hidden focus:outline-none transition-colors">See More</button>
                        </div>
                        
                        <div class="flex items-end justify-between mb-6">
                            <span id="modalPrice" class="text-3xl font-serif text-white tracking-wide">$19.99</span>
                        </div>
                        
                        <div class="flex flex-col gap-3">
                            <button class="w-full py-3 bg-[#d4af37] hover:bg-[#b5952f] text-[#0a0d14] font-semibold rounded-full transition-colors flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Add to Cart
                            </button>
                            <button class="w-full py-3 border border-[#d4af37] text-[#d4af37] hover:bg-[#d4af37]/10 font-semibold rounded-full transition-colors">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('bookSearch');
            const categorySelect = document.getElementById('categoryFilter');
            const categoryPills = document.querySelectorAll('.category-pill');
            const bookCards = Array.from(document.querySelectorAll('#booksGrid > .group'));
            const noResults = document.getElementById('noResults');
            
            const prevBtn = document.getElementById('prevPage');
            const nextBtn = document.getElementById('nextPage');
            const pageInfo = document.getElementById('pageInfo');
            const paginationContainer = document.getElementById('pagination');

            let currentPage = 1;
            const itemsPerPage = 12;
            let selectedCategory = 'all';
            let filteredCards = [...bookCards];

            function renderPagination() {
                const totalPages = Math.ceil(filteredCards.length / itemsPerPage);
                
                if (totalPages <= 1) {
                    paginationContainer.style.display = 'none';
                } else {
                    paginationContainer.style.display = 'flex';
                    pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;
                    prevBtn.disabled = currentPage === 1;
                    nextBtn.disabled = currentPage === totalPages;
                }

                // Hide all cards
                bookCards.forEach(card => card.style.display = 'none');

                // Show cards for current page
                const start = (currentPage - 1) * itemsPerPage;
                const end = start + itemsPerPage;
                
                filteredCards.slice(start, end).forEach(card => {
                    card.style.display = 'flex';
                });

                if (filteredCards.length === 0) {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }

            function filterBooks() {
                const term = (searchInput ? searchInput.value : '').toLowerCase().trim();

                filteredCards = bookCards.filter(card => {
                    const title = (card.getAttribute('data-title') || '').toLowerCase();
                    const author = (card.getAttribute('data-author') || '').toLowerCase();
                    const category = (card.getAttribute('data-category') || '').toLowerCase();

                    const matchesSearch = !term || title.includes(term) || author.includes(term) || category.includes(term);
                    const matchesCategory = selectedCategory === 'all' || category === selectedCategory;

                    return matchesSearch && matchesCategory;
                });

                currentPage = 1;
                renderPagination();
            }

            if (searchInput) {
                searchInput.addEventListener('input', filterBooks);
            }

            if (categorySelect) {
                categorySelect.addEventListener('change', function(e) {
                    selectedCategory = e.target.value;
                    updatePillUI(selectedCategory);
                    filterBooks();
                });
            }

            categoryPills.forEach(pill => {
                pill.addEventListener('click', function() {
                    selectedCategory = this.getAttribute('data-category');
                    if (categorySelect) {
                        categorySelect.value = selectedCategory;
                    }
                    updatePillUI(selectedCategory);
                    filterBooks();
                });
            });

            function updatePillUI(cat) {
                categoryPills.forEach(p => {
                    if (p.getAttribute('data-category') === cat) {
                        p.classList.add('bg-[#d4af37]', 'text-[#0a0d14]', 'active-pill');
                        p.classList.remove('bg-[#0f131a]', 'text-slate-300', 'border', 'border-white/10');
                    } else {
                        p.classList.remove('bg-[#d4af37]', 'text-[#0a0d14]', 'active-pill');
                        p.classList.add('bg-[#0f131a]', 'text-slate-300', 'border', 'border-white/10');
                    }
                });
            }

            prevBtn.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    renderPagination();
                    document.getElementById('bookstore').scrollIntoView({ behavior: 'smooth' });
                }
            });

            nextBtn.addEventListener('click', () => {
                const totalPages = Math.ceil(filteredCards.length / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    renderPagination();
                    document.getElementById('bookstore').scrollIntoView({ behavior: 'smooth' });
                }
            });

            // Initial filter & render
            filterBooks();

            // Modal Logic
            const modal = document.getElementById('bookModal');
            const modalBackdrop = document.getElementById('modalBackdrop');
            const modalContent = document.getElementById('modalContent');
            const closeModalBtn = document.getElementById('closeModal');
            
            const modalImage = document.getElementById('modalImage');
            const modalTitle = document.getElementById('modalTitle');
            const modalAuthor = document.getElementById('modalAuthor');
            const modalCategory = document.getElementById('modalCategory');
            const modalPrice = document.getElementById('modalPrice');

            const modalDescription = document.getElementById('modalDescription');
            const seeMoreBtn = document.getElementById('seeMoreBtn');
            let fullDescription = '';
            let isExpanded = false;

            seeMoreBtn.addEventListener('click', () => {
                isExpanded = !isExpanded;
                if (isExpanded) {
                    modalDescription.textContent = fullDescription;
                    seeMoreBtn.textContent = 'See Less';
                } else {
                    const words = fullDescription.split(' ');
                    modalDescription.textContent = words.slice(0, 100).join(' ') + '...';
                    seeMoreBtn.textContent = 'See More';
                }
            });

            function openModal(card) {
                const title = card.getAttribute('data-title');
                const author = card.getAttribute('data-author');
                const category = card.getAttribute('data-category');
                const price = card.getAttribute('data-price');
                const image = card.getAttribute('data-image');
                const backImage = card.getAttribute('data-back-image');
                const spineImage = card.getAttribute('data-spine-image');
                fullDescription = card.getAttribute('data-description') || '';

                const resolveImgSrc = (src) => {
                    if (!src) return '';
                    if (src.startsWith('/') || src.startsWith('http')) return src;
                    return `/images/${src}`;
                };

                modalTitle.textContent = title;
                modalAuthor.textContent = `By ${author}`;
                modalCategory.textContent = category;
                modalPrice.textContent = price.includes('$') ? price : `$${price}`;
                modalImage.src = resolveImgSrc(image);
                
                const modalBackImage = document.getElementById('modalBackImage');
                const modalSpineImage = document.getElementById('modalSpineImage');
                const modalSpineTitle = document.getElementById('modalSpineTitle');
                if (modalBackImage) modalBackImage.src = resolveImgSrc(backImage);
                if (modalSpineImage) modalSpineImage.src = resolveImgSrc(spineImage);
                if (modalSpineTitle) modalSpineTitle.textContent = title;
                
                const words = fullDescription.split(' ');
                if (words.length > 100) {
                    isExpanded = false;
                    modalDescription.textContent = words.slice(0, 100).join(' ') + '...';
                    seeMoreBtn.classList.remove('hidden');
                    seeMoreBtn.textContent = 'See More';
                } else {
                    modalDescription.textContent = fullDescription;
                    seeMoreBtn.classList.add('hidden');
                }

                modal.classList.remove('hidden');
                modal.classList.add('flex');
                
                setTimeout(() => {
                    modalContent.classList.remove('scale-95', 'opacity-0');
                    modalContent.classList.add('scale-100', 'opacity-100');
                }, 10);
            }

            function closeModal() {
                modalContent.classList.remove('scale-100', 'opacity-100');
                modalContent.classList.add('scale-95', 'opacity-0');
                
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }, 300);
            }

            bookCards.forEach(card => {
                card.addEventListener('click', () => openModal(card));
            });

            closeModalBtn.addEventListener('click', closeModal);
            modalBackdrop.addEventListener('click', closeModal);
        });
    </script>
@endsection
