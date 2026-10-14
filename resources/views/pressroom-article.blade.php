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
                        ],
                        4 => [
                            'tag' => 'PROGRAMS',
                            'date' => 'June 18, 2026',
                            'read_time' => '4 min read',
                            'title' => 'The Golden PATHWAY Initiative 🌟',
                            'subtitle' => 'Books Academy launches the Golden PATHWAY initiative to elevate and support authors on their journey to international success.',
                            'video' => asset('images/Video_1 (1).mp4'),
                            'author' => 'Sarah Jenkins',
                            'author_role' => 'Global Events Coordinator',
                            'content' => '
                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    <strong>Golden PATHWAY: Independent Bookstore Placement 📚</strong>
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Give your book the opportunity to be discovered where readers love to browse: independent bookstores.
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Through our Book Placement Program, Books Academy helps authors showcase their books in physical independent bookstores, putting your work directly in front of real readers and local book communities.
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    From the shelf to the hands of a curious reader, physical bookstore placement can help increase your book’s visibility, credibility, and discoverability beyond the online marketplace.
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Your story deserves a place on the shelf.
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Let’s help put your book where readers can find it.
                                                </p>

                                                <p class="text-[#d4af37] font-bold mt-8 text-sm">
                                                    #BookPlacement #IndependentBookstores #BooksAcademy #BookMarketing #AuthorSuccess #BookVisibility #IndieBookstores #Authors #Publishing #BookPromotion
                                                </p>

                                                <div class="my-12 relative group carousel-wrapper">
                                                    <button class="absolute left-2 sm:-left-4 top-1/2 -translate-y-1/2 z-10 bg-black/60 hover:bg-[#d4af37] text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition-all prev-btn shadow-lg" aria-label="Previous">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                                    </button>
                                                    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-2 hide-scrollbar scroll-smooth carousel-container">
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/z1.jpg') . '" alt="Golden Pathway Gallery 1" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                        <div class="snap-center shrink-0 w-[90%] sm:w-[75%] md:w-[65%]">
                                                            <img src="' . asset('images/z2.jpg') . '" alt="Golden Pathway Gallery 2" class="w-full h-80 md:h-[28rem] object-cover rounded-2xl shadow-lg border border-white/10 cursor-zoom-in zoomable-image" draggable="false">
                                                        </div>
                                                    </div>
                                                    <button class="absolute right-2 sm:-right-4 top-1/2 -translate-y-1/2 z-10 bg-black/60 hover:bg-[#d4af37] text-white p-3 rounded-full opacity-0 group-hover:opacity-100 transition-all next-btn shadow-lg" aria-label="Next">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                    </button>
                                                </div>'
                        ],
                        5 => [
                            'tag' => 'PRESS RELEASE',
                            'date' => 'November 24, 2025',
                            'read_time' => '4 min read',
                            'title' => 'Fred Beck’s "When God Works Incognito" Reveals Divine Presence in Everyday Life 📖✨',
                            'subtitle' => 'Official Press Release Distribution: Reaching millions of readers and major media newswires across the United States and Canada.',
                            'video' => asset('images/pressroom.mp4'),
                            'author' => 'Books Academy Media Relations',
                            'author_role' => 'Global Press & Media Distribution',
                            'content' => '
                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Books Academy is thrilled to announce the official international press release distribution for <strong>Fred Beck\'s</strong> deeply moving autobiographical work, <em>"When God Works Incognito: Autobiographical Vignettes (Thoughts & Memories of My Life & Lifetime)"</em>.
                                                </p>

                                                <!-- Author & Book Feature Card -->
                                                <div class="my-8 p-6 sm:p-8 rounded-3xl bg-gradient-to-br from-[#0f131a] via-[#141923] to-[#0f131a] border border-[#d4af37]/30 shadow-2xl flex flex-col md:flex-row items-center gap-6 sm:gap-8">
                                                    <div class="w-full md:w-5/12 shrink-0 flex justify-center">
                                                        <div class="relative group">
                                                            <img src="' . asset('images/lounge3.png') . '" alt="When God Works Incognito Book Cover" class="h-64 sm:h-72 object-contain rounded-2xl shadow-2xl border border-white/10 hover:scale-105 transition-transform duration-300 zoomable-image cursor-zoom-in">
                                                            <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-[#d4af37] text-[#0a0d14] text-[10px] font-bold px-3 py-0.5 rounded-full uppercase tracking-wider shadow-md whitespace-nowrap">
                                                                Click to Zoom Cover
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 text-slate-300 space-y-4 text-center md:text-left">
                                                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase bg-[#d4af37]/15 text-[#d4af37] border border-[#d4af37]/30">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-[#d4af37] animate-pulse"></span>
                                                            Featured Author Spotlight
                                                        </div>
                                                        <h3 class="text-2xl font-serif font-bold text-white leading-tight">When God Works Incognito</h3>
                                                        <p class="text-xs text-slate-400 uppercase tracking-widest font-semibold">By Fred Beck</p>
                                                        <p class="text-sm text-slate-300 leading-relaxed">
                                                            A poignant collection of autobiographical vignettes capturing heartfelt memories, enduring faith, and subtle moments of divine grace woven throughout an extraordinary lifetime.
                                                        </p>
                                                        <div class="pt-2 flex flex-wrap items-center justify-center md:justify-start gap-3">
                                                            <a href="https://www.youtube.com/watch?v=EoZFSRthP10&t=4s" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs font-bold text-white bg-red-600 hover:bg-red-700 transition-all shadow-lg hover:shadow-red-600/30 hover:-translate-y-0.5">
                                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                                                Watch Author Interview
                                                            </a>
                                                            <a href="' . asset('images/Press_Release_Fred_Beck.pdf') . '" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs font-bold text-[#0a0d14] bg-[#d4af37] hover:bg-[#eab308] transition-all shadow-lg hover:shadow-[#d4af37]/30 hover:-translate-y-0.5">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                                Download Official Report
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h3 class="text-2xl font-serif font-bold text-white mt-10 mb-4">Unprecedented Media Syndication & Reach</h3>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    The press release made an immediate impact upon its global broadcast, achieving search visibility across leading engines, tier-one news networks, and accredited regional affiliates. The syndication campaign has introduced Fred Beck’s inspirational message to diverse readers and community media leaders across North America.
                                                </p>

                                                <!-- Key Statistics Grid -->
                                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 my-8">
                                                    <div class="bg-[#0f131a] border border-white/10 rounded-2xl p-5 text-center shadow-lg">
                                                        <div class="text-2xl sm:text-3xl font-bold text-[#d4af37]">150M+</div>
                                                        <div class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-1">Monthly Visitors</div>
                                                    </div>
                                                    <div class="bg-[#0f131a] border border-white/10 rounded-2xl p-5 text-center shadow-lg">
                                                        <div class="text-2xl sm:text-3xl font-bold text-emerald-400">850+</div>
                                                        <div class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-1">Media Outlets & Reprints</div>
                                                    </div>
                                                    <div class="bg-[#0f131a] border border-white/10 rounded-2xl p-5 text-center shadow-lg">
                                                        <div class="text-2xl sm:text-3xl font-bold text-sky-400">50 States</div>
                                                        <div class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-1">US & Canada Coverage</div>
                                                    </div>
                                                    <div class="bg-[#0f131a] border border-white/10 rounded-2xl p-5 text-center shadow-lg">
                                                        <div class="text-2xl sm:text-3xl font-bold text-purple-400">Tier-1</div>
                                                        <div class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-1">Major TV Networks</div>
                                                    </div>
                                                </div>

                                                <h3 class="text-2xl font-serif font-bold text-white mt-10 mb-4">Visible on Major Newswires & Broadcasters</h3>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Fred Beck’s release was picked up and syndicated across prominent global newswires including <strong>AP News</strong>, <strong>National Law Review</strong>, <strong>Google News</strong>, <strong>ChatGPT</strong>, <strong>Bing</strong>, <strong>Yahoo</strong>, <strong>United States Newswire</strong>, <strong>Canada Newswire</strong>, and <strong>Texas Newswire</strong>.
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-4">
                                                    Key independent broadcast network affiliates tracking the publication:
                                                </p>

                                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 my-6 text-sm">
                                                    <div class="bg-[#0f131a]/80 border border-white/5 rounded-xl p-3.5 flex items-center gap-3">
                                                        <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] shrink-0"></span>
                                                        <span class="text-slate-300"><strong>KXAN NBC 36</strong> — Austin, TX</span>
                                                    </div>
                                                    <div class="bg-[#0f131a]/80 border border-white/5 rounded-xl p-3.5 flex items-center gap-3">
                                                        <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] shrink-0"></span>
                                                        <span class="text-slate-300"><strong>KDAF CW 33</strong> — Dallas, TX</span>
                                                    </div>
                                                    <div class="bg-[#0f131a]/80 border border-white/5 rounded-xl p-3.5 flex items-center gap-3">
                                                        <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] shrink-0"></span>
                                                        <span class="text-slate-300"><strong>WPIX CW 11</strong> — New York City, NY</span>
                                                    </div>
                                                    <div class="bg-[#0f131a]/80 border border-white/5 rounded-xl p-3.5 flex items-center gap-3">
                                                        <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] shrink-0"></span>
                                                        <span class="text-slate-300"><strong>KTVI FOX 2</strong> — St. Louis, MO</span>
                                                    </div>
                                                    <div class="bg-[#0f131a]/80 border border-white/5 rounded-xl p-3.5 flex items-center gap-3">
                                                        <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] shrink-0"></span>
                                                        <span class="text-slate-300"><strong>KRON MyNetworkTV 4</strong> — San Francisco, CA</span>
                                                    </div>
                                                    <div class="bg-[#0f131a]/80 border border-white/5 rounded-xl p-3.5 flex items-center gap-3">
                                                        <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] shrink-0"></span>
                                                        <span class="text-slate-300"><strong>Bloomberg Terminal, Muck Rack & Moody’s</strong></span>
                                                    </div>
                                                </div>

                                                <!-- PDF Document Viewer Container -->
                                                <div class="my-12 rounded-3xl bg-[#0f131a] border border-white/10 p-6 sm:p-8 shadow-2xl">
                                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-white/10">
                                                        <div>
                                                            <div class="flex items-center gap-2 text-xs font-bold text-[#d4af37] uppercase tracking-wider mb-1">
                                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9.5 8.5h-2v2h2v-2zm0-4h-2v2h2v-2zm7 8h-5v-1.5h5v1.5zm0-3h-5v-1.5h5v1.5zm0-3h-5V9h5v1.5z"/></svg>
                                                                Official Distribution Report
                                                            </div>
                                                            <h4 class="text-lg font-bold text-white">Press_Release_Fred_Beck.pdf</h4>
                                                            <p class="text-xs text-slate-400 mt-1">Complete 10-page media pickup and syndication verification report.</p>
                                                        </div>
                                                        <div class="flex flex-wrap items-center gap-3">
                                                            <a href="' . asset('images/Press_Release_Fred_Beck.pdf') . '" target="_blank" class="px-5 py-2.5 rounded-full text-xs font-bold text-white bg-white/10 hover:bg-white/20 transition-all flex items-center gap-2 border border-white/10">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                                                Open PDF
                                                            </a>
                                                            <a href="' . asset('images/Press_Release_Fred_Beck.pdf') . '" download="Press_Release_Fred_Beck.pdf" class="px-5 py-2.5 rounded-full text-xs font-bold text-[#0a0d14] bg-[#d4af37] hover:bg-[#eab308] transition-all flex items-center gap-2 shadow-lg hover:shadow-[#d4af37]/30">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                                Download Report
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="mt-6 rounded-2xl overflow-hidden border border-white/10 bg-slate-950 shadow-inner">
                                                        <iframe src="' . asset('images/Press_Release_Fred_Beck.pdf') . '" class="w-full h-[600px] sm:h-[750px] border-0" title="Fred Beck Press Release Distribution Report"></iframe>
                                                    </div>
                                                </div>

                                                <p class="text-[#d4af37] font-bold mt-8 text-sm">
                                                    #WhenGodWorksIncognito <br> #FredBeck <br> #PressRelease <br> #BooksAcademy <br> #BookDistribution <br> #MediaCoverage <br> #Inspirational <br> #ChristianNonFiction
                                                </p>
                                            '
                        ],
                        6 => [
                            'tag' => 'PRESS RELEASE',
                            'date' => 'November 24, 2025',
                            'read_time' => '5 min read',
                            'title' => 'Robert Tisch’s "Crossing the Wild Pacific" is a Journey into Nature and Self-Discovery 🌊⛵',
                            'subtitle' => 'Official Press Release Distribution: Syndicated across major US & Canadian newswires, environmental channels, and top broadcast networks.',
                            'video' => asset('images/ROBERT TISCHJ TESTIMONIAL.mp4'),
                            'author' => 'Books Academy Media Relations',
                            'author_role' => 'Global Press & Media Distribution',
                            'content' => '
                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Books Academy is proud to announce the international press release distribution for <strong>Robert R. Tisch\'s</strong> exhilarating maritime memoir, <em>"Crossing the Wild Pacific: Captain\'s Log of the Yacht Argo"</em>.
                                                </p>

                                                <!-- Author & Book Feature Card -->
                                                <div class="my-8 p-6 sm:p-8 rounded-3xl bg-gradient-to-br from-[#0f131a] via-[#141923] to-[#0f131a] border border-[#d4af37]/30 shadow-2xl flex flex-col md:flex-row items-center gap-6 sm:gap-8">
                                                    <div class="w-full md:w-5/12 shrink-0 flex justify-center">
                                                        <div class="relative group">
                                                            <img src="' . asset('images/lounge2.png') . '" alt="Robert Tisch Holding Crossing the Wild Pacific" class="h-64 sm:h-72 object-contain rounded-2xl shadow-2xl border border-white/10 hover:scale-105 transition-transform duration-300 zoomable-image cursor-zoom-in">
                                                            <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 bg-[#d4af37] text-[#0a0d14] text-[10px] font-bold px-3 py-0.5 rounded-full uppercase tracking-wider shadow-md whitespace-nowrap">
                                                                Click to Zoom Photo
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-1 text-slate-300 space-y-4 text-center md:text-left">
                                                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-[10px] font-bold tracking-wider uppercase bg-[#d4af37]/15 text-[#d4af37] border border-[#d4af37]/30">
                                                            <span class="w-1.5 h-1.5 rounded-full bg-[#d4af37] animate-pulse"></span>
                                                            Featured Author Spotlight
                                                        </div>
                                                        <h3 class="text-2xl font-serif font-bold text-white leading-tight">Crossing the Wild Pacific</h3>
                                                        <p class="text-xs text-slate-400 uppercase tracking-widest font-semibold">By Robert R. Tisch</p>
                                                        <p class="text-sm text-slate-300 leading-relaxed">
                                                            A high-seas journey of resilience, environmental wonder, and personal introspection as Captain Robert Tisch navigates the unpredictable expanses of the Pacific Ocean aboard the Yacht Argo.
                                                        </p>
                                                        <div class="pt-2 flex flex-wrap items-center justify-center md:justify-start gap-3">
                                                            <a href="https://www.youtube.com/watch?v=GYHQYqv9zIE" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs font-bold text-white bg-red-600 hover:bg-red-700 transition-all shadow-lg hover:shadow-red-600/30 hover:-translate-y-0.5">
                                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                                                Watch Author Interview
                                                            </a>
                                                            <a href="' . asset('images/Robert_Tisch_Press_Release.pdf') . '" target="_blank" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs font-bold text-[#0a0d14] bg-[#d4af37] hover:bg-[#eab308] transition-all shadow-lg hover:shadow-[#d4af37]/30 hover:-translate-y-0.5">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                                Download Official Report
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h3 class="text-2xl font-serif font-bold text-white mt-10 mb-4">Massive Media Pickup Across Travel, Environment & Maritime Press</h3>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    Distributed across multiple targeted newswires, Robert Tisch’s press release achieved an extraordinary presence across environmental publications, adventure travel networks, and national media channels throughout the United States and Canada.
                                                </p>

                                                <!-- Key Statistics Grid -->
                                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 my-8">
                                                    <div class="bg-[#0f131a] border border-white/10 rounded-2xl p-5 text-center shadow-lg">
                                                        <div class="text-2xl sm:text-3xl font-bold text-[#d4af37]">150M+</div>
                                                        <div class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-1">Monthly Visitors</div>
                                                    </div>
                                                    <div class="bg-[#0f131a] border border-white/10 rounded-2xl p-5 text-center shadow-lg">
                                                        <div class="text-2xl sm:text-3xl font-bold text-emerald-400">850+</div>
                                                        <div class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-1">Media Outlets & Reprints</div>
                                                    </div>
                                                    <div class="bg-[#0f131a] border border-white/10 rounded-2xl p-5 text-center shadow-lg">
                                                        <div class="text-2xl sm:text-3xl font-bold text-sky-400">4 Channels</div>
                                                        <div class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-1">Publishing, Travel & Eco</div>
                                                    </div>
                                                    <div class="bg-[#0f131a] border border-white/10 rounded-2xl p-5 text-center shadow-lg">
                                                        <div class="text-2xl sm:text-3xl font-bold text-purple-400">Tier-1</div>
                                                        <div class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-1">Major TV Networks</div>
                                                    </div>
                                                </div>

                                                <h3 class="text-2xl font-serif font-bold text-white mt-10 mb-4">Syndicated on Major Newswires & Environmental Hubs</h3>

                                                <p class="text-slate-300 leading-relaxed mb-6">
                                                    The press release appeared across leading national platforms including <strong>AP News</strong>, <strong>National Law Review</strong>, <strong>The Texas Environmentalist</strong>, <strong>Texan Culture Today</strong>, <strong>Texas Travel Wire</strong>, <strong>Canada Travel Daily</strong>, <strong>Culture Times of Canada</strong>, <strong>Bookworld Canada</strong>, and the <strong>Canadian Environmental News Wire</strong>.
                                                </p>

                                                <p class="text-slate-300 leading-relaxed mb-4">
                                                    Prominent television stations and syndication points broadcasting the release include:
                                                </p>

                                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 my-6 text-sm">
                                                    <div class="bg-[#0f131a]/80 border border-white/5 rounded-xl p-3.5 flex items-center gap-3">
                                                        <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] shrink-0"></span>
                                                        <span class="text-slate-300"><strong>KXAN NBC 36</strong> — Austin, TX</span>
                                                    </div>
                                                    <div class="bg-[#0f131a]/80 border border-white/5 rounded-xl p-3.5 flex items-center gap-3">
                                                        <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] shrink-0"></span>
                                                        <span class="text-slate-300"><strong>WGN 9</strong> — Chicago, IL</span>
                                                    </div>
                                                    <div class="bg-[#0f131a]/80 border border-white/5 rounded-xl p-3.5 flex items-center gap-3">
                                                        <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] shrink-0"></span>
                                                        <span class="text-slate-300"><strong>WPIX CW 11</strong> — New York City, NY</span>
                                                    </div>
                                                    <div class="bg-[#0f131a]/80 border border-white/5 rounded-xl p-3.5 flex items-center gap-3">
                                                        <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] shrink-0"></span>
                                                        <span class="text-slate-300"><strong>KRON MyNetworkTV 4</strong> — San Francisco, CA</span>
                                                    </div>
                                                    <div class="bg-[#0f131a]/80 border border-white/5 rounded-xl p-3.5 flex items-center gap-3">
                                                        <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] shrink-0"></span>
                                                        <span class="text-slate-300"><strong>WPHL MyNetworkTV 17</strong> — Philadelphia, PA</span>
                                                    </div>
                                                    <div class="bg-[#0f131a]/80 border border-white/5 rounded-xl p-3.5 flex items-center gap-3">
                                                        <span class="w-2.5 h-2.5 rounded-full bg-[#d4af37] shrink-0"></span>
                                                        <span class="text-slate-300"><strong>Bloomberg Terminal, Muck Rack & Moody’s</strong></span>
                                                    </div>
                                                </div>

                                                <!-- Video Player Section (Author Testimonial) -->
                                                <div class="my-10 rounded-3xl bg-[#0f131a] border border-white/10 p-6 sm:p-8 shadow-2xl">
                                                    <div class="flex items-center gap-2 text-xs font-bold text-[#d4af37] uppercase tracking-wider mb-2">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                                        Author Video Testimonial
                                                    </div>
                                                    <h4 class="text-xl font-bold text-white mb-2">Hear from Captain Robert Tisch</h4>
                                                    <p class="text-xs text-slate-400 mb-6">Captain Robert Tisch shares his experience working with Books Academy and bringing Crossing the Wild Pacific to global readers.</p>
                                                    <div class="rounded-2xl overflow-hidden border border-white/10 bg-black aspect-video max-w-3xl mx-auto shadow-2xl">
                                                        <video controls playsinline class="w-full h-full object-cover">
                                                            <source src="' . asset('images/ROBERT TISCHJ TESTIMONIAL.mp4') . '" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                </div>

                                                <!-- PDF Document Viewer Container -->
                                                <div class="my-12 rounded-3xl bg-[#0f131a] border border-white/10 p-6 sm:p-8 shadow-2xl">
                                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-white/10">
                                                        <div>
                                                            <div class="flex items-center gap-2 text-xs font-bold text-[#d4af37] uppercase tracking-wider mb-1">
                                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-9.5 8.5h-2v2h2v-2zm0-4h-2v2h2v-2zm7 8h-5v-1.5h5v1.5zm0-3h-5v-1.5h5v1.5zm0-3h-5V9h5v1.5z"/></svg>
                                                                Official Distribution Report
                                                            </div>
                                                            <h4 class="text-lg font-bold text-white">Robert_Tisch_Press_Release.pdf</h4>
                                                            <p class="text-xs text-slate-400 mt-1">Complete 11-page media pickup and syndication verification report.</p>
                                                        </div>
                                                        <div class="flex flex-wrap items-center gap-3">
                                                            <a href="' . asset('images/Robert_Tisch_Press_Release.pdf') . '" target="_blank" class="px-5 py-2.5 rounded-full text-xs font-bold text-white bg-white/10 hover:bg-white/20 transition-all flex items-center gap-2 border border-white/10">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                                                Open PDF
                                                            </a>
                                                            <a href="' . asset('images/Robert_Tisch_Press_Release.pdf') . '" download="Robert_Tisch_Press_Release.pdf" class="px-5 py-2.5 rounded-full text-xs font-bold text-[#0a0d14] bg-[#d4af37] hover:bg-[#eab308] transition-all flex items-center gap-2 shadow-lg hover:shadow-[#d4af37]/30">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                                Download Report
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="mt-6 rounded-2xl overflow-hidden border border-white/10 bg-slate-950 shadow-inner">
                                                        <iframe src="' . asset('images/Robert_Tisch_Press_Release.pdf') . '" class="w-full h-[600px] sm:h-[750px] border-0" title="Robert Tisch Press Release Distribution Report"></iframe>
                                                    </div>
                                                </div>

                                                <p class="text-[#d4af37] font-bold mt-8 text-sm">
                                                    #CrossingTheWildPacific #RobertTisch #PressRelease #BooksAcademy #BookDistribution #MaritimeAdventure #TravelAndEnvironment #NatureWriting
                                                </p>
                                            '
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