@extends('layouts.web')

@section('content')
    <section id="bookstore"
        class="py-20 xl:py-28 2xl:py-32 min-h-screen flex flex-col justify-center bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 transition-colors">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span
                    class="text-xs font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Catalog</span>
                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl 2xl:text-5xl font-extrabold text-slate-900 dark:text-white mt-1">
                    Browse the Academy Bookstore</h2>
                <p class="text-xs sm:text-sm text-slate-400 mt-2">Acquire physical paperbacks or download direct eBooks.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                <!-- Book Card 1 -->
                <div
                    class="group flex flex-col bg-slate-50 dark:bg-slate-950 border border-slate-200/60 dark:border-slate-800/60 rounded-xl overflow-hidden">
                    <div class="aspect-[4/5] overflow-hidden bg-slate-100 relative">
                        <img src="/images/book_coding.png" alt="Mastering Modern Code"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <span
                            class="text-[9px] uppercase font-bold text-blue-600 dark:text-blue-400 block mb-1">Development</span>
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-2">Mastering Modern Code</h3>
                        <p class="text-slate-400 text-[11px] leading-relaxed mb-4 flex-1">Advanced patterns, systems
                            design, and functional frameworks.</p>
                        <div
                            class="flex items-center justify-between pt-3 border-t border-slate-200/50 dark:border-slate-800/50 mt-auto">
                            <span class="text-sm font-bold text-slate-950 dark:text-white">$29.99</span>
                            <button
                                class="px-3 py-1.5 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-[10px] transition-colors">Buy
                                E-Book</button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 2 -->
                <div
                    class="group flex flex-col bg-slate-50 dark:bg-slate-950 border border-slate-200/60 dark:border-slate-800/60 rounded-xl overflow-hidden">
                    <div class="aspect-[4/5] overflow-hidden bg-slate-100 relative">
                        <img src="/images/book_design.png" alt="The Art of Visual Systems"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <span
                            class="text-[9px] uppercase font-bold text-rose-600 dark:text-rose-400 block mb-1">Design</span>
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-2">The Art of Visual Systems</h3>
                        <p class="text-slate-400 text-[11px] leading-relaxed mb-4 flex-1">Bauhaus systems, visual grid
                            structures, and layouts.</p>
                        <div
                            class="flex items-center justify-between pt-3 border-t border-slate-200/50 dark:border-slate-800/50 mt-auto">
                            <span class="text-sm font-bold text-slate-950 dark:text-white">$34.99</span>
                            <button
                                class="px-3 py-1.5 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-[10px] transition-colors">Buy
                                E-Book</button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 3 -->
                <div
                    class="group flex flex-col bg-slate-50 dark:bg-slate-950 border border-slate-200/60 dark:border-slate-800/60 rounded-xl overflow-hidden">
                    <div
                        class="aspect-[4/5] overflow-hidden bg-slate-900 flex items-center justify-center p-6 text-center text-white relative">
                        <div>
                            <p class="text-[8px] uppercase tracking-wider text-blue-400 mb-1">Business Scale</p>
                            <h4 class="text-base font-bold mb-2">Startup Scaleup</h4>
                            <p class="text-[8px] text-slate-400">By R. Cunningham</p>
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <span
                            class="text-[9px] uppercase font-bold text-indigo-600 dark:text-indigo-400 block mb-1">Business</span>
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-2">Startup Scaleup</h3>
                        <p class="text-slate-400 text-[11px] leading-relaxed mb-4 flex-1">Complete blueprint for
                            launching and expanding lean products.</p>
                        <div
                            class="flex items-center justify-between pt-3 border-t border-slate-200/50 dark:border-slate-800/50 mt-auto">
                            <span class="text-sm font-bold text-slate-950 dark:text-white">$24.99</span>
                            <button
                                class="px-3 py-1.5 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-[10px] transition-colors">Buy
                                E-Book</button>
                        </div>
                    </div>
                </div>

                <!-- Book Card 4 -->
                <div
                    class="group flex flex-col bg-slate-50 dark:bg-slate-950 border border-slate-200/60 dark:border-slate-800/60 rounded-xl overflow-hidden">
                    <div
                        class="aspect-[4/5] overflow-hidden bg-slate-900 flex items-center justify-center p-6 text-center text-white relative">
                        <div>
                            <p class="text-[8px] uppercase tracking-wider text-amber-400 mb-1">Kids Story</p>
                            <h4 class="text-base font-bold mb-2">Little Bear's Forest</h4>
                            <p class="text-[8px] text-slate-400">By Martha Vance</p>
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col">
                        <span
                            class="text-[9px] uppercase font-bold text-orange-600 dark:text-orange-400 block mb-1">Children's</span>
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-2">Little Bear's Forest</h3>
                        <p class="text-slate-400 text-[11px] leading-relaxed mb-4 flex-1">Beautiful illustrated
                            full-color children's tale of forest wildlife.</p>
                        <div
                            class="flex items-center justify-between pt-3 border-t border-slate-200/50 dark:border-slate-800/50 mt-auto">
                            <span class="text-sm font-bold text-slate-950 dark:text-white">$14.99</span>
                            <button
                                class="px-3 py-1.5 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-[10px] transition-colors">Buy
                                E-Book</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
