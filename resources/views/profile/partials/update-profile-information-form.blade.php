<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Your account details and profile information.") }}
        </p>
    </header>

    <div class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" type="text" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700/60 text-gray-600 dark:text-gray-300 cursor-not-allowed select-none" :value="$user->name" disabled readonly />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" type="email" class="mt-1 block w-full bg-gray-100 dark:bg-gray-700/60 text-gray-600 dark:text-gray-300 cursor-not-allowed select-none" :value="$user->email" disabled readonly />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/40 dark:text-amber-300">
                        {{ __('Email Unverified') }}
                    </span>
                </div>
            @else
                <div class="mt-2">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300">
                        {{ __('Verified Account') }}
                    </span>
                </div>
            @endif
        </div>

        <!-- Published Books Portfolio Section -->
        <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-md font-semibold text-gray-900 dark:text-gray-100">
                        {{ __('My Published Books') }}
                    </h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        {{ __('Titles published and managed by Books Academy Editorial Board.') }}
                    </p>
                </div>
                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-indigo-100 dark:bg-indigo-900/40 text-indigo-700 dark:text-indigo-300">
                    {{ $user->publishedBooks ? $user->publishedBooks->count() : 0 }} {{ Str::plural('Title', $user->publishedBooks ? $user->publishedBooks->count() : 0) }}
                </span>
            </div>

            @if ($user->publishedBooks && $user->publishedBooks->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ($user->publishedBooks as $book)
                        <div class="flex items-center gap-3 p-3 rounded-xl bg-gray-50 dark:bg-gray-700/40 border border-gray-200 dark:border-gray-700">
                            @if ($book->cover_image_path)
                                <img src="{{ asset('storage/' . $book->cover_image_path) }}" alt="{{ $book->title }}" class="w-12 h-16 object-cover rounded-md shadow-xs shrink-0">
                            @else
                                <div class="w-12 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-md flex items-center justify-center text-white shrink-0 shadow-xs">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                            @endif
                            <div class="min-w-0 flex-1">
                                <h4 class="font-bold text-sm text-gray-900 dark:text-gray-100 truncate">{{ $book->title }}</h4>
                                <span class="inline-flex items-center gap-1 mt-1 text-[10px] font-semibold text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-950/50 px-2 py-0.5 rounded-full border border-emerald-200 dark:border-emerald-800">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Published
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-4 rounded-xl bg-gray-50 dark:bg-gray-700/30 border border-dashed border-gray-300 dark:border-gray-600 text-center">
                    <p class="text-xs text-gray-500 dark:text-gray-400 italic">No published books added yet by the administrator.</p>
                </div>
            @endif
        </div>
    </div>
</section>
