<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-8 text-center sm:text-left">
        <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white mb-2">Welcome Back</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400">Log in to access your publishing dashboard.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5 relative z-10">
        @csrf

        <!-- Email Address -->
        <div class="relative group">
            <label for="email" class="block text-[11px] uppercase tracking-wider font-bold text-slate-500 dark:text-slate-400 mb-2 transition-colors group-focus-within:text-blue-600 dark:group-focus-within:text-blue-400">Email Address</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" /></svg>
                </div>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="author@example.com" class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-slate-200 dark:border-slate-700/50 bg-white/50 dark:bg-slate-900/50 text-slate-900 dark:text-white placeholder-slate-400 focus:border-blue-600 dark:focus:border-blue-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-blue-600/10 outline-none text-sm transition-all shadow-sm backdrop-blur-sm">
            </div>
            @if($errors->has('email'))
                <p class="text-xs text-red-500 mt-2 font-medium flex items-center gap-1.5 animate-pulse">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    {{ $errors->first('email') }}
                </p>
            @endif
        </div>

        <!-- Password -->
        <div class="relative group">
            <div class="flex justify-between items-center mb-2">
                <label for="password" class="block text-[11px] uppercase tracking-wider font-bold text-slate-500 dark:text-slate-400 transition-colors group-focus-within:text-blue-600 dark:group-focus-within:text-blue-400">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-bold text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition-colors" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 group-focus-within:text-blue-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" /></svg>
                </div>
                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-slate-200 dark:border-slate-700/50 bg-white/50 dark:bg-slate-900/50 text-slate-900 dark:text-white placeholder-slate-400 focus:border-blue-600 dark:focus:border-blue-500 focus:bg-white dark:focus:bg-slate-900 focus:ring-4 focus:ring-blue-600/10 outline-none text-sm transition-all shadow-sm backdrop-blur-sm">
            </div>
            @if($errors->has('password'))
                <p class="text-xs text-red-500 mt-2 font-medium flex items-center gap-1.5 animate-pulse">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    {{ $errors->first('password') }}
                </p>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="flex items-center pt-1">
            <div class="relative flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="peer h-4 w-4 shrink-0 rounded border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-900 text-blue-600 focus:ring-2 focus:ring-blue-600/20 focus:ring-offset-0 cursor-pointer transition-all">
            </div>
            <label for="remember_me" class="ml-2 text-sm font-medium text-slate-600 dark:text-slate-400 cursor-pointer select-none">Remember me next time</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="group relative w-full flex justify-center py-3.5 px-4 mt-2 border border-transparent text-sm font-extrabold rounded-xl text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-600/30 transition-all shadow-lg hover:shadow-blue-600/30 overflow-hidden">
            <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-400/0 via-white/20 to-blue-400/0 -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></div>
            <span class="relative flex items-center gap-2">
                Sign In to Account
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 group-hover:translate-x-1 transition-transform"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" /></svg>
            </span>
        </button>

        @if (Route::has('register'))
            <div class="text-center text-sm font-medium text-slate-500 dark:text-slate-400 mt-6 pt-6 border-t border-slate-200 dark:border-slate-800">
                Don't have an account? 
                <a href="{{ route('register') }}" class="font-bold text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition-colors ml-1 hover:underline">Apply as Author</a>
            </div>
        @endif
    </form>
    
    <style>
        @keyframes shimmer {
            100% {
                transform: translateX(100%);
            }
        }
    </style>
</x-guest-layout>
