@extends('layouts.web')

@section('content')
    <!-- Centered Large Logo (L02) with Connection & Glide Animation -->
    <section class="relative w-full min-h-screen flex items-start justify-center -mt-20 pt-24 sm:pt-32 md:pt-40 lg:pt-48 px-4">
        <div id="logo-container" class="relative w-full max-w-[280px] sm:max-w-[350px] md:max-w-[500px] lg:max-w-[600px] 2xl:max-w-[800px] mx-auto opacity-0 transition-all duration-[1200ms] ease-out" style="transform: translateY(100px); will-change: transform, opacity;">
            <!-- Full Static Logo (shown after animation completes) -->
            <img id="logo-large" src="{{ asset('images/L02.png') }}" alt="BooksAcademy Logo Large"
                class="h-auto w-full object-contain drop-shadow-md origin-center opacity-0 transition-opacity duration-500 will-change-transform">
            
            <!-- Left Half (animated) -->
            <img id="logo-half-left" src="{{ asset('images/L02.png') }}" alt="BooksAcademy Logo Left"
                class="absolute inset-0 h-auto w-full object-contain drop-shadow-md origin-center logo-half"
                style="clip-path: inset(0 50% 0 0); transform: translateX(-150px); opacity: 0; transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1), opacity 1.2s ease-out; will-change: transform, opacity;">
            
            <!-- Right Half (animated) -->
            <img id="logo-half-right" src="{{ asset('images/L02.png') }}" alt="BooksAcademy Logo Right"
                class="absolute inset-0 h-auto w-full object-contain drop-shadow-md origin-center logo-half"
                style="clip-path: inset(0 0 0 50%); transform: translateX(150px); opacity: 0; transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1), opacity 1.2s ease-out; will-change: transform, opacity;">
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about-us"
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-white dark:bg-slate-900 border-y border-slate-200 dark:border-slate-800 transition-colors">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-5">
                    <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Who We
                        Are</span>
                    <h2
                        class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        A Professional Academy for Independent Authors</h2>
                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed text-sm">
                        Books Academy was established to close the gap between creators and global libraries. We offer
                        transparent self-publishing solutions, detailed copy-editing guides, illustration layout
                        alignment, and direct distribution lines into main marketplaces.
                    </p>
                    <div class="flex items-center gap-8 pt-4">
                        <div>
                            <span class="text-3xl font-extrabold text-slate-950 dark:text-white block">1.5k+</span>
                            <span class="text-xs text-slate-400">Published Authors</span>
                        </div>
                        <div>
                            <span class="text-3xl font-extrabold text-slate-950 dark:text-white block">45</span>
                            <span class="text-xs text-slate-400">Distribution Networks</span>
                        </div>
                    </div>
                </div>

                <div
                    class="p-8 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-4">
                    <h3 class="font-bold text-sm uppercase tracking-wider text-slate-400">Core Foundations</h3>
                    <ul class="space-y-3.5 text-xs text-slate-600 dark:text-slate-300">
                        <li class="flex items-start gap-2.5">
                            <span class="text-blue-600 font-bold">✓</span>
                            <span><strong>Full Intellectual Rights:</strong> Authors retain 100% copyright ownership and
                                metadata controls.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-blue-600 font-bold">✓</span>
                            <span><strong>Editorial Review:</strong> Advanced proofreading audits before catalog
                                listings.</span>
                        </li>
                        <li class="flex items-start gap-2.5">
                            <span class="text-blue-600 font-bold">✓</span>
                            <span><strong>Global Systems:</strong> Immediate setups in Amazon KDP, Apple Books, and
                                Ingram network indexes.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Writers Choose Our House (First Layout: Credentials) -->
    <section
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-5">
                <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Writer
                    Experience</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                    Full Control. Direct Distribution.</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">
                    Traditional publishing setups require full copyright signovers and return minimal net royalties.
                    Books Academy leaves creative control where it belongs—with the author.
                </p>
                <div class="space-y-2.5 text-xs font-medium text-slate-600 dark:text-slate-300">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                        <span>Keep 100% of book permissions and copyright listings.</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                        <span>Secure up to 85% royalties on paperback and digital prints.</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                        <span>Direct consulting with dedicated design editors.</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-center">
                    <span class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white">100%</span>
                    <span class="block text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-wider">Author
                        Ownership</span>
                </div>
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-center">
                    <span class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white">85%</span>
                    <span class="block text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-wider">Net
                        Royalties</span>
                </div>
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-center">
                    <span class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white">24/7</span>
                    <span class="block text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-wider">Author
                        Support</span>
                </div>
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-center">
                    <span class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white">Ingram</span>
                    <span class="block text-[10px] text-slate-400 mt-1 uppercase font-bold tracking-wider">Global
                        Distribution</span>
                </div>
            </div>
        </div>
    </section>

    <!-- The Journey to Publication & Spotlight -->
    <section
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-white dark:bg-slate-900 border-y border-slate-200 dark:border-slate-800 transition-colors">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Our
                    Pipeline</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                    The Journey to Publication</h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-2">A clean, transparent pathway from manuscript draft to
                    global catalog launches.</p>
            </div>

            <!-- Timeline steps -->
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 mb-16 text-center justify-center">
                <div
                    class="p-5 rounded-xl border border-slate-200/80 dark:border-slate-800/80 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span
                        class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs inline-flex items-center justify-center">1</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white pt-1">Manuscript Review</h4>
                    <p class="text-[11px] text-slate-500 leading-relaxed">Evaluation of draft files for structure,
                        spelling, and structural flow.</p>
                </div>
                <div
                    class="p-5 rounded-xl border border-slate-200/80 dark:border-slate-800/80 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span
                        class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs inline-flex items-center justify-center">2</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white pt-1">Design & Layout</h4>
                    <p class="text-[11px] text-slate-500 leading-relaxed">Book cover designing, interior typesetting,
                        and artwork alignment.</p>
                </div>
                <div
                    class="p-5 rounded-xl border border-slate-200/80 dark:border-slate-800/80 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span
                        class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs inline-flex items-center justify-center">3</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white pt-1">Proof Audits</h4>
                    <p class="text-[11px] text-slate-500 leading-relaxed">Verification of physical paperback drafts and
                        digital Kindle proofs.</p>
                </div>
                <div
                    class="p-5 rounded-xl border border-slate-200/80 dark:border-slate-800/80 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span
                        class="w-6 h-6 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs inline-flex items-center justify-center">4</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white pt-1">Distribution</h4>
                    <p class="text-[11px] text-slate-500 leading-relaxed">File uploads to Kindle KDP, Apple Bookstore,
                        and global libraries.</p>
                </div>
                <div class="p-5 rounded-xl border border-blue-600 bg-blue-50/10 dark:bg-blue-900/10 space-y-2">
                    <span
                        class="w-6 h-6 rounded-full bg-blue-600 text-white font-bold text-xs inline-flex items-center justify-center">5</span>
                    <h4 class="font-bold text-sm text-blue-600 dark:text-blue-400 pt-1">Spotlight Launch</h4>
                    <p class="text-[11px] text-slate-500 leading-relaxed">Press wires distribution, marketing ads, and
                        book launching.</p>
                </div>
            </div>

            <!-- Bestseller Spotlight block -->
            <div
                class="p-6 sm:p-8 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 flex flex-col sm:flex-row items-center gap-6">
                <div class="w-20 h-28 bg-slate-900 rounded-lg overflow-hidden shadow flex-shrink-0">
                    <img src="/images/book_design.png" alt="Spotlight Book" class="w-full h-full object-cover">
                </div>
                <div class="flex-1 space-y-2 text-center sm:text-left">
                    <span
                        class="px-2.5 py-0.5 rounded bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-[10px] font-bold uppercase tracking-wider">Featured
                        Launch</span>
                    <h4 class="text-lg font-bold text-slate-900 dark:text-white">"The Art of Visual Systems" by Sarah
                        Jennings</h4>
                    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed">
                        Sarah Jennings' layout compilation reached the top design indexes in under two weeks. Utilizing
                        our Full Color package and marketing channels, her work reached universities worldwide.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- The Literary Media Lounge -->
    <section id="media-lounge"
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Multimedia</span>
            <h2
                class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                The Literary Media Lounge</h2>
            <p class="text-xs sm:text-sm text-slate-400 mt-2">Listen to podcast discussions and watch writer panel
                releases.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 lg:gap-8">
            <!-- Lounge item 1 -->
            <div
                class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 flex items-center gap-5">
                <div
                    class="w-16 h-16 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-600 flex items-center justify-center text-2xl flex-shrink-0">
                    🎙️
                </div>
                <div class="flex-1 space-y-1">
                    <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider">Podcast • Episode
                        48</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white">Designing Book Covers that Sell</h4>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 leading-normal"> Sarah Jennings breaks down
                        cover formats and type alignments.</p>
                    <button onclick="alert('Playing audio...');"
                        class="text-xs font-bold text-blue-600 hover:text-blue-500 transition-colors pt-1">Listen
                        Episode →</button>
                </div>
            </div>

            <!-- Lounge item 2 -->
            <div
                class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 flex items-center gap-5">
                <div
                    class="w-16 h-16 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-600 flex items-center justify-center text-2xl flex-shrink-0">
                    🎥
                </div>
                <div class="flex-1 space-y-1">
                    <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider">Video Interview</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white">From Manuscript to Series A</h4>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 leading-normal">R. Cunningham details
                        publishing and organizing startup books.</p>
                    <a href="#intro-video"
                        class="text-xs font-bold text-blue-600 hover:text-blue-500 transition-colors pt-1 block">Watch
                        Video →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Voices from the Penholders -->
    <section
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-white dark:bg-slate-900 border-y border-slate-200 dark:border-slate-800 transition-colors">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Author
                    Testimonials</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                    Voices from the Penholders</h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-2">Publishing testimonials from writers who worked with
                    our house.</p>
            </div>

            @if(isset($authors) && $authors->count() > 0)
                <div class="flex overflow-x-auto gap-6 pb-6 snap-x scroll-smooth" style="scrollbar-width: thin;">
                    @foreach($authors as $author)
                        @php
                            $initials = collect(explode(' ', $author->name))->map(function($segment) { return strtoupper(substr($segment, 0, 1)); })->take(2)->join('');
                            $bookTitle = $author->publishedBooks->first() ? 'Author of *"' . $author->publishedBooks->first()->title . '"*' : 'Independent Author';
                        @endphp
                        <div class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-4 min-w-[300px] sm:min-w-[350px] snap-center shrink-0">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs flex items-center justify-center">
                                    {{ $initials }}
                                </div>
                                <div>
                                    <h4 class="font-bold text-xs text-slate-900 dark:text-white">{{ $author->name }}</h4>
                                    <p class="text-[10px] text-slate-400">{{ $bookTitle }}</p>
                                </div>
                            </div>
                            <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed italic">
                                "Publishing through Books Academy gave me the control I needed over my creative work. The process was seamless and incredibly supportive."
                            </p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    <!-- Quote 1 -->
                    <div
                        class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-4">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs flex items-center justify-center">
                                AM</div>
                            <div>
                                <h4 class="font-bold text-xs text-slate-900 dark:text-white">Alvin Mercer</h4>
                                <p class="text-[10px] text-slate-400">Author of *"Coded Thoughts"*</p>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed italic">
                            "The design dashboard permitted me to upload and proof layouts directly. Simple, clean, and
                            professional support throughout the process."
                        </p>
                    </div>

                    <!-- Quote 2 -->
                    <div
                        class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-4">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs flex items-center justify-center">
                                MV</div>
                            <div>
                                <h4 class="font-bold text-xs text-slate-900 dark:text-white">Martha Vance</h4>
                                <p class="text-[10px] text-slate-400">Author of *"Children of the Wild"*</p>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed italic">
                            "Children's book illustrations need precise color alignment. Their formatting team verified
                            files and set up spreads beautifully."
                        </p>
                    </div>

                    <!-- Quote 3 -->
                    <div
                        class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-4">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 font-bold text-xs flex items-center justify-center">
                                HS</div>
                            <div>
                                <h4 class="font-bold text-xs text-slate-900 dark:text-white">Howard Stark</h4>
                                <p class="text-[10px] text-slate-400">Author of *"Startup Architecture"*</p>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed italic">
                            "Direct global distributions in Amazon and Barnes & Noble allowed my textbook to go live
                            worldwide within 48 hours."
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Global Collaborations Section -->
    <section
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Bookstore Partners</span>
            <h2
                class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                Global Collaborations</h2>
            <p class="text-xs sm:text-sm text-slate-400 mt-2">Publishing channels and distributors helping list Books
                Academy titles.</p>
        </div>

        <div
            class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6 items-center text-slate-400 dark:text-slate-500 font-bold text-xs text-center">
            <div class="py-3 px-4 border border-slate-200 dark:border-slate-800 rounded-lg">Amazon Kindle</div>
            <div class="py-3 px-4 border border-slate-200 dark:border-slate-800 rounded-lg">Barnes & Noble</div>
            <div class="py-3 px-4 border border-slate-200 dark:border-slate-800 rounded-lg">IngramSpark</div>
            <div class="py-3 px-4 border border-slate-200 dark:border-slate-800 rounded-lg">Google Books</div>
            <div class="py-3 px-4 border border-slate-200 dark:border-slate-800 rounded-lg">Kobo Books</div>
            <div class="py-3 px-4 border border-slate-200 dark:border-slate-800 rounded-lg">Apple Books</div>
        </div>
    </section>

    <!-- Voices of Appreciation -->
    <section
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-white dark:bg-slate-900 border-y border-slate-200 dark:border-slate-800 transition-colors">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span
                    class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Achievements</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                    Voices of Appreciation</h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-2">Literary medals and partner recognitions received by
                    our catalog titles.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 text-center">
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span class="text-2xl block">🏆</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white">Independent Press Award</h4>
                    <p class="text-[11px] text-slate-500">Selected as a premier publishing design platform (2025).</p>
                </div>
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span class="text-2xl block">⭐</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white">Trustpilot 4.9 Rating</h4>
                    <p class="text-[11px] text-slate-500">High-score ratings verified by our author community.</p>
                </div>
                <div
                    class="p-6 rounded-xl border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 space-y-2">
                    <span class="text-2xl block">🎖️</span>
                    <h4 class="font-bold text-sm text-slate-900 dark:text-white">Literary Layout Medal</h4>
                    <p class="text-[11px] text-slate-500">Commended for publishing high-end children's layouts.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Writers Choose Our House (Second Layout: Comparative Table) -->
    <section
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Comparative Audit</span>
            <h2
                class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                Why Writers Choose Our House</h2>
            <p class="text-xs sm:text-sm text-slate-400 mt-2">See how publishing rates contrast against traditional
                houses.</p>
        </div>

        <!-- Comparison Table -->
        <div
            class="overflow-hidden rounded-xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[600px] text-left border-collapse text-xs sm:text-sm">
                    <thead>
                        <tr class="bg-slate-900 dark:bg-slate-950 text-white">
                            <th class="p-4 sm:p-5 font-bold">Feature Details</th>
                            <th class="p-4 sm:p-5 font-bold text-blue-400">Books Academy</th>
                            <th class="p-4 sm:p-5 font-bold">Traditional Houses</th>
                            <th class="p-4 sm:p-5 font-bold">Standard Self-Pubs</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-150 dark:divide-slate-800 text-slate-600 dark:text-slate-300">
                        <tr>
                            <td class="p-4 sm:p-5 font-bold text-slate-900 dark:text-white">Book Copyrights</td>
                            <td class="p-4 sm:p-5 text-blue-600 dark:text-blue-400 font-bold">100% Author Owned</td>
                            <td class="p-4 sm:p-5 text-slate-400">Assigned to Publisher</td>
                            <td class="p-4 sm:p-5 text-slate-400">Partial Control</td>
                        </tr>
                        <tr>
                            <td class="p-4 sm:p-5 font-bold text-slate-900 dark:text-white">Author Royalties</td>
                            <td class="p-4 sm:p-5 text-blue-600 dark:text-blue-400 font-bold">Up to 85% Net</td>
                            <td class="p-4 sm:p-5 text-slate-400">8% to 15% Net</td>
                            <td class="p-4 sm:p-5 text-slate-400">30% to 50% Net</td>
                        </tr>
                        <tr>
                            <td class="p-4 sm:p-5 font-bold text-slate-900 dark:text-white">Design & Formatting</td>
                            <td class="p-4 sm:p-5 text-blue-600 dark:text-blue-400 font-bold">Artist Collaborations</td>
                            <td class="p-4 sm:p-5 text-slate-400">Publisher Decisions Only</td>
                            <td class="p-4 sm:p-5 text-slate-400">Standard Web Templates</td>
                        </tr>
                        <tr>
                            <td class="p-4 sm:p-5 font-bold text-slate-900 dark:text-white">Wholesale Placements</td>
                            <td class="p-4 sm:p-5 text-blue-600 dark:text-blue-400 font-bold">Global 1-Click Launch</td>
                            <td class="p-4 sm:p-5 text-slate-400">Selective Distribution</td>
                            <td class="p-4 sm:p-5 text-slate-400">Validation Failures Common</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>



@endsection
