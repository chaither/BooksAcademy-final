@extends('layouts.web')

@section('content')
    <style>
        .gradient-overlay-dark {
            background: linear-gradient(to top, rgba(10, 13, 20, 1) 0%, rgba(10, 13, 20, 0.7) 40%, rgba(10, 13, 20, 0) 100%);
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>

    <div class="bg-[#0a0d14] min-h-screen pb-20">
        <!-- Hero Header -->
        <section class="relative w-full h-[60vh] min-h-[400px] flex items-end">
            <div class="absolute inset-0 z-0">
                @php
                    $articles = [
                        1 => [
                            'tag' => 'PUBLISHING',
                            'date' => 'June 5, 2026',
                            'read_time' => '5 min read',
                            'title' => 'Books Academy in New York Times Square!',
                            'subtitle' => 'From the pages of great stories to the heart of the world’s most iconic advertising destination.',
                            'video' => asset('images/nytt01.mp4'),
                            'author' => 'David Chen',
                            'author_role' => 'Head of Global Operations',
                            'content' => '
                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Books Academy in New York Times Square! 🗽✨
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    From the pages of great stories to the heart of the world’s most iconic advertising destination, Books Academy proudly shines in New York Times Square through our premium billboard services.
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Standing tall among the world’s biggest brands, this milestone reflects our commitment to expanding global visibility and creating impactful moments that inspire audiences everywhere.
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Turning bold ideas into unforgettable impressions—one billboard at a time.
                                                </p>

                                                <p class="text-[#d4af37] font-bold mt-8 text-sm">
                                                    #BooksAcademy <br> #TimesSquare <br> #NewYork <br> #BillboardAdvertising <br> #GlobalVisibility <br> #BrandAwareness <br> #Innovation <br> #Publishing
                                                </p>

                                                <div class="my-12 relative group carousel-wrapper">
                                                    <button class="absolute left-2 sm:-left-4 top-1/2 -translate-y-1/2 z-10 bg-black/60 hover:bg-[#d4af37] text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition-all prev-btn shadow-lg" aria-label="Previous">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    </button>
                                                    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-2 hide-scrollbar scroll-smooth carousel-container">
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/nyt2.JPG') . '" alt="Times Square 1" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/nyt3.JPG') . '" alt="Times Square 2" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/nyt4.JPG') . '" alt="Times Square 3" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/nyt5.JPG') . '" alt="Times Square 4" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                       
                                                    </div>
                                                    <button class="absolute right-2 sm:-right-4 top-1/2 -translate-y-1/2 z-10 bg-black/60 hover:bg-[#d4af37] text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition-all next-btn shadow-lg" aria-label="Next">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                    </button>
                                                </div>
                                            '
                        ],
                        2 => [
                            'tag' => 'EVENTS',
                            'date' => 'May 28, 2026',
                            'read_time' => '5 min read',
                            'title' => 'Welcome to Frankfurt! 📚',
                            'subtitle' => 'Books Academy proudly takes part in the 2025 Frankfurt Book Fair, where stories, ideas, and innovation come together on the global stage.',
                            'video' => asset('images/fr1.mp4'),
                            'author' => 'Sarah Jenkins',
                            'author_role' => 'Event Coordinator',
                            'content' => '
                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Welcome to Frankfurt 📚
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Books Academy proudly takes part in the 2025 Frankfurt Book Fair, where stories, ideas, and innovation come together on the global stage.
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Join us as we connect with publishers, authors, educators, and book enthusiasts from around the world, showcasing our passion for learning, collaboration, and the future of publishing.
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Here’s to new partnerships, inspiring conversations, and an unforgettable journey at one of the world’s largest literary events.
                                                </p>

                                                <p class="text-[#d4af37] font-bold mt-8 text-sm">
                                                    #FrankfurtBookFair2025 <br> #BooksAcademy <br> #Publishing <br> #Books <br> #Education <br> #Frankfurt <br> #GlobalConnections
                                                </p>

                                                <div class="my-12 relative group carousel-wrapper">
                                                    <button class="absolute left-2 sm:-left-4 top-1/2 -translate-y-1/2 z-10 bg-black/60 hover:bg-[#d4af37] text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition-all prev-btn shadow-lg" aria-label="Previous">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    </button>
                                                    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-2 hide-scrollbar scroll-smooth carousel-container">
                                                       
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/fr2.JPG') . '" alt="Frankfurt 2" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/fr3.JPG') . '" alt="Frankfurt 3" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/fr4.JPG') . '" alt="Frankfurt 4" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/fr5.JPG') . '" alt="Frankfurt 5" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                    </div>
                                                    <button class="absolute right-2 sm:-right-4 top-1/2 -translate-y-1/2 z-10 bg-black/60 hover:bg-[#d4af37] text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition-all next-btn shadow-lg" aria-label="Next">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                    </button>
                                                </div>'
                        ],
                        3 => [
                            'tag' => 'EXHIBITIONS',
                            'date' => 'May 15, 2026',
                            'read_time' => '4 min read',
                            'title' => 'Welcome to Taipei! 🇹🇼📚',
                            'subtitle' => 'Books Academy is delighted to be part of the Taipei International Book Exhibition.',
                            'video' => asset('images/t1.mp4'),
                            'author' => 'Mark Robinson',
                            'author_role' => 'Global Events Coordinator',
                            'content' => '
                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Welcome to Taipei! 🇹🇼📚
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Books Academy is delighted to be part of the Taipei International Book Exhibition, where stories, knowledge, and creativity bring people together from around the world.
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    As we explore new ideas and connect with publishers, authors, educators, and industry professionals, we celebrate the power of books to inspire, educate, and create meaningful global partnerships.
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Here’s to an exciting journey filled with innovation, collaboration, and endless possibilities.
                                                </p>

                                                <p class="text-[#d4af37] font-bold mt-8 text-sm">
                                                    #TaipeiInternationalBookExhibition <br> #BooksAcademy <br> #Publishing <br> #Books <br> #Education <br> #Taipei <br> #GlobalConnections
                                                </p>

                                                <div class="my-12 relative group carousel-wrapper">
                                                    <button class="absolute left-2 sm:-left-4 top-1/2 -translate-y-1/2 z-10 bg-black/60 hover:bg-[#d4af37] text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition-all prev-btn shadow-lg" aria-label="Previous">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    </button>
                                                    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-2 hide-scrollbar scroll-smooth carousel-container">
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/t2.jpg') . '" alt="Taipei 1" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/t3.jpg') . '" alt="Taipei 2" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/t4.jpg') . '" alt="Taipei 3" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/t5.jpg') . '" alt="Taipei 4" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/t6.jpg') . '" alt="Taipei 5" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                    </div>
                                                    <button class="absolute right-2 sm:-right-4 top-1/2 -translate-y-1/2 z-10 bg-black/60 hover:bg-[#d4af37] text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition-all next-btn shadow-lg" aria-label="Next">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                    </button>
                                                </div>'
                        ]
                    ];

                    $article = $articles[$id] ?? $articles[1];
                @endphp
                <video autoplay loop muted playsinline class="w-full h-full object-cover">
                    <source src="{{ $article['video'] }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="absolute inset-0 gradient-overlay-dark"></div>
            </div>

            <div class="relative z-10 w-full max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
                <div class="flex items-center gap-3 text-xs font-bold text-white uppercase tracking-wider mb-4 opacity-90">
                    <span class="text-[#d4af37]">{{ $article['tag'] }}</span>
                    <span>•</span>
                    <span>{{ $article['date'] }}</span>
                    <span>•</span>
                    <span>{{ $article['read_time'] }}</span>
                </div>

                <h1 class="text-4xl sm:text-5xl md:text-6xl font-serif font-bold text-white leading-tight mb-6">
                    {{ $article['title'] }}
                </h1>

                <p class="text-lg text-slate-300 font-medium max-w-2xl">
                    {{ $article['subtitle'] }}
                </p>
            </div>
        </section>

        <!-- Content Section -->
        <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-20">
            <!-- Author/Share Bar -->
            <div
                class="bg-[#0f131a] rounded-2xl border border-white/10 p-6 flex flex-wrap items-center justify-between gap-4 mb-12 shadow-xl">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-slate-800 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=200" alt="Author"
                            class="w-full h-full object-cover">
                    </div>
                    <div>
                        <div class="text-sm font-bold text-white">{{ $article['author'] }}</div>
                        <div class="text-xs text-slate-400">{{ $article['author_role'] }}</div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-xs text-slate-400 font-bold uppercase tracking-wider mr-2">Share</span>
                    <button
                        class="w-10 h-10 rounded-full bg-[#1a1e27] text-white flex items-center justify-center hover:bg-[#d4af37] transition-colors border border-white/5">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </button>
                    <button
                        class="w-10 h-10 rounded-full bg-[#1a1e27] text-white flex items-center justify-center hover:bg-[#d4af37] transition-colors border border-white/5">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Article Body -->
            <div
                class="prose prose-invert prose-lg max-w-none prose-headings:font-serif prose-headings:text-white prose-a:text-[#d4af37] prose-img:rounded-2xl">
                {!! $article['content'] !!}
            </div>

            <!-- Back to Pressroom Link -->
            <div class="mt-16 border-t border-white/10 pt-8 pb-12 flex justify-center">
                <a href="{{ route('pressroom') }}"
                    class="flex items-center gap-2 text-slate-400 hover:text-[#d4af37] font-bold text-sm uppercase tracking-widest transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Pressroom
                </a>
            </div>
        </main>
    </div>

    <!-- Zoom Modal -->
    <div id="imageModal"
        class="fixed inset-0 z-[100] hidden items-center justify-center bg-[#0a0d14]/95 opacity-0 transition-opacity duration-300 backdrop-blur-md">
        <button id="closeModal"
            class="absolute top-6 right-6 text-slate-300 hover:text-[#d4af37] transition-colors z-50 bg-black/20 p-2 rounded-full">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <img id="modalImage" src=""
            class="max-w-[95vw] max-h-[90vh] object-contain rounded-xl shadow-2xl scale-95 transition-transform duration-300">
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Lightbox Logic
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            const closeBtn = document.getElementById('closeModal');
            let isDragging = false;
            let startPos = 0;

            document.querySelectorAll('.zoomable-image').forEach(img => {
                img.addEventListener('mousedown', (e) => {
                    isDragging = false;
                    startPos = e.pageX;
                });

                img.addEventListener('mouseup', (e) => {
                    // Only trigger click if the mouse hasn't moved much (it's not a drag)
                    if (Math.abs(e.pageX - startPos) < 10) {
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                        // Small delay to allow display flex to apply before animating opacity
                        setTimeout(() => {
                            modal.classList.remove('opacity-0');
                            modalImg.classList.remove('scale-95');
                            modalImg.classList.add('scale-100');
                        }, 10);
                        modalImg.src = img.src;
                        document.body.style.overflow = 'hidden'; // prevent background scrolling
                    }
                });
            });

            const closeModal = () => {
                modal.classList.add('opacity-0');
                modalImg.classList.remove('scale-100');
                modalImg.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.style.overflow = 'auto';
                }, 300);
            };

            closeBtn.addEventListener('click', closeModal);
            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });

            // Carousel Navigation Logic
            const wrappers = document.querySelectorAll('.carousel-wrapper');
            wrappers.forEach(wrapper => {
                const container = wrapper.querySelector('.carousel-container');
                const prevBtn = wrapper.querySelector('.prev-btn');
                const nextBtn = wrapper.querySelector('.next-btn');

                if (container && prevBtn && nextBtn) {
                    prevBtn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        // Get width of one item + gap (gap-4 = 16px)
                        const itemWidth = container.firstElementChild.clientWidth + 16;
                        container.scrollBy({ left: -itemWidth, behavior: 'smooth' });
                    });

                    nextBtn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        const itemWidth = container.firstElementChild.clientWidth + 16;
                        container.scrollBy({ left: itemWidth, behavior: 'smooth' });
                    });
                }
            });
        });
    </script>
@endsection