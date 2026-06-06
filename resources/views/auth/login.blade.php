<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-[10px] uppercase font-bold text-slate-400 mb-1.5">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="name@domain.com" class="w-full px-3.5 py-2.5 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:border-blue-600 focus:outline-none text-xs transition-colors">
            @if($errors->has('email'))
                <p class="text-xs text-red-500 mt-1.5 font-medium flex items-center gap-1">
                    <span>⚠️</span> {{ $errors->first('email') }}
                </p>
            @endif
        </div>

        <!-- Password -->
        <div>
            <div class="flex justify-between items-center mb-1.5">
                <label for="password" class="block text-[10px] uppercase font-bold text-slate-400">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-blue-600 hover:text-blue-500 transition-colors" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" class="w-full px-3.5 py-2.5 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:border-blue-600 focus:outline-none text-xs transition-colors">
            @if($errors->has('password'))
                <p class="text-xs text-red-500 mt-1.5 font-medium flex items-center gap-1">
                    <span>⚠️</span> {{ $errors->first('password') }}
                </p>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="rounded border-slate-300 dark:border-slate-800 dark:bg-slate-900 text-blue-600 focus:ring-blue-600 focus:ring-offset-0 w-3.5 h-3.5 cursor-pointer">
            <label for="remember_me" class="ms-2 text-xs font-medium text-slate-500 dark:text-slate-400 cursor-pointer">Remember me next time</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-3.5 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition-colors shadow-sm">
            Sign In to Account
        </button>

        @if (Route::has('register'))
            <div class="text-center text-xs text-slate-500 dark:text-slate-400 mt-6 pt-4 border-t border-slate-150 dark:border-slate-850">
                Don't have an account? 
                <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:underline">Register now</a>
            </div>
        @endif
    </form>
</x-guest-layout>
