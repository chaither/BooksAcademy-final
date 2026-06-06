<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-lg text-slate-800 dark:text-slate-100 leading-tight">
                {{ $isAdmin ? __('Administrator Control Center') : __('Author Workspace') }}
            </h2>
            <span class="text-xs px-2.5 py-1 rounded bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 font-bold uppercase tracking-wider">
                {{ $isAdmin ? 'Admin' : 'Author' }}
            </span>
        </div>
    </x-slot>

    <div class="py-12 text-slate-800 dark:text-slate-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Success/Status Alert Banner -->
            @if (session('status') == 'user-created')
                <div class="p-4 rounded-lg bg-green-50 dark:bg-green-900/10 border border-green-200 dark:border-green-800/30 text-green-600 dark:text-green-400 text-xs font-semibold">
                    ✓ User credentials created successfully!
                </div>
            @endif
            @if (session('status') == 'dashboard-updated')
                <div class="p-4 rounded-lg bg-green-50 dark:bg-green-900/10 border border-green-200 dark:border-green-800/30 text-green-600 dark:text-green-400 text-xs font-semibold">
                    ✓ User's dashboard content updated successfully!
                </div>
            @endif
            @if (session('status') == 'user-deleted')
                <div class="p-4 rounded-lg bg-red-50 dark:bg-red-900/10 border border-red-200 dark:border-red-800/30 text-red-600 dark:text-red-400 text-xs font-semibold">
                    ✓ User deleted successfully!
                </div>
            @endif

            @if ($isAdmin)
                <!-- ================= ADMIN DASHBOARD ================= -->
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left: Create User Form -->
                    <div class="bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-6 shadow-sm space-y-4">
                        <div>
                            <h3 class="text-base font-bold text-slate-900 dark:text-white">Create User Credentials</h3>
                            <p class="text-xs text-slate-400">Generate credentials for a new author/user.</p>
                        </div>
                        
                        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4 pt-2">
                            @csrf
                            <div>
                                <label class="block text-[10px] uppercase font-bold text-slate-400 mb-1.5">Full Name</label>
                                <input type="text" name="name" required placeholder="John Doe" class="w-full px-3 py-2 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:border-blue-600 focus:outline-none text-xs">
                                @if($errors->has('name'))
                                    <p class="text-[10px] text-red-500 mt-1">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div>
                                <label class="block text-[10px] uppercase font-bold text-slate-400 mb-1.5">Email Address</label>
                                <input type="email" name="email" required placeholder="author@domain.com" class="w-full px-3 py-2 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:border-blue-600 focus:outline-none text-xs">
                                @if($errors->has('email'))
                                    <p class="text-[10px] text-red-500 mt-1">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div>
                                <label class="block text-[10px] uppercase font-bold text-slate-400 mb-1.5">Password</label>
                                <input type="password" name="password" required placeholder="••••••••" class="w-full px-3 py-2 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white placeholder-slate-400 focus:border-blue-600 focus:outline-none text-xs">
                                <p class="text-[9px] text-slate-400 mt-1">Minimum 8 characters.</p>
                                @if($errors->has('password'))
                                    <p class="text-[10px] text-red-500 mt-1">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                            <button type="submit" class="w-full py-2.5 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition-colors">
                                Create Account
                            </button>
                        </form>
                    </div>

                    <!-- Right: User Listing & Dashboard Editor -->
                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
                            <div class="p-6 border-b border-slate-200 dark:border-slate-800">
                                <h3 class="text-base font-bold text-slate-900 dark:text-white">Active Authors & Dashboards</h3>
                                <p class="text-xs text-slate-400">View authors and configure their custom dashboard workspace messages.</p>
                            </div>
                            
                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse text-xs">
                                    <thead>
                                        <tr class="bg-slate-50 dark:bg-slate-900 text-slate-500 font-bold uppercase border-b border-slate-200 dark:border-slate-800">
                                            <th class="p-4">Author Details</th>
                                            <th class="p-4">Dashboard Status</th>
                                            <th class="p-4 text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100 dark:divide-slate-900">
                                        @forelse ($users as $u)
                                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-900/50 transition-colors">
                                                <td class="p-4">
                                                    <div class="font-bold text-slate-900 dark:text-white">{{ $u->name }}</div>
                                                    <div class="text-[10px] text-slate-400 mt-0.5">{{ $u->email }}</div>
                                                </td>
                                                <td class="p-4">
                                                    <div class="font-semibold text-slate-700 dark:text-slate-300 truncate max-w-xs">{{ $u->dashboard_title ?? 'No title' }}</div>
                                                    <div class="text-[10px] text-slate-400 mt-0.5 truncate max-w-xs">{{ $u->dashboard_content ?? 'No content' }}</div>
                                                </td>
                                                <td class="p-4 text-right space-x-2 whitespace-nowrap">
                                                    <button onclick="toggleDashboardForm({{ $u->id }})" class="px-2.5 py-1.5 rounded border border-slate-200 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-900 text-[10px] font-bold text-blue-600 dark:text-blue-400 transition-colors">
                                                        Edit Dashboard
                                                    </button>
                                                    <form method="POST" action="{{ route('admin.users.delete', $u->id) }}" onsubmit="return confirm('Are you sure you want to delete this user?');" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="px-2.5 py-1.5 rounded border border-transparent hover:border-red-200 dark:hover:border-red-900/35 hover:bg-red-50 dark:hover:bg-red-950/20 text-[10px] font-bold text-red-500 transition-colors">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <!-- Inline Editor Row (Collapsed by default) -->
                                            <tr id="editor-row-{{ $u->id }}" class="hidden bg-slate-50 dark:bg-slate-900/40">
                                                <td colspan="3" class="p-6 border-b border-slate-200 dark:border-slate-800">
                                                    <form method="POST" action="{{ route('admin.users.update-dashboard', $u->id) }}" class="space-y-4 max-w-xl">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div>
                                                            <h4 class="font-bold text-xs text-slate-900 dark:text-white">Configure Dashboard for {{ $u->name }}</h4>
                                                            <p class="text-[10px] text-slate-400">Design the welcome headers and work instructions displayed in their private portal.</p>
                                                        </div>
                                                        <div>
                                                            <label class="block text-[9px] uppercase font-bold text-slate-400 mb-1.5">Dashboard Title / Heading</label>
                                                            <input type="text" name="dashboard_title" required value="{{ $u->dashboard_title }}" class="w-full px-3 py-2 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:outline-none text-xs">
                                                        </div>
                                                        <div>
                                                            <label class="block text-[9px] uppercase font-bold text-slate-400 mb-1.5">Dashboard Welcome Message / Instructions</label>
                                                            <textarea name="dashboard_content" required rows="3" class="w-full px-3 py-2 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:outline-none text-xs resize-none">{{ $u->dashboard_content }}</textarea>
                                                        </div>
                                                        <div class="flex items-center gap-2">
                                                            <button type="submit" class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-[10px] transition-colors">
                                                                Save Dashboard Changes
                                                            </button>
                                                            <button type="button" onclick="toggleDashboardForm({{ $u->id }})" class="px-4 py-2 rounded border border-slate-200 dark:border-slate-800 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-900 font-bold text-[10px] transition-colors">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="p-6 text-center text-slate-400 italic">No regular authors registered yet. Use the credentials form to create one.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                <!-- ================= USER PRIVATE DASHBOARD ================= -->
                <div class="bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-8 shadow-sm space-y-6">
                    <div class="border-b border-slate-100 dark:border-slate-900 pb-4">
                        <span class="text-xs text-blue-600 dark:text-blue-400 font-bold uppercase tracking-wider">Private Author Portal</span>
                        <h1 class="text-2xl font-extrabold text-slate-900 dark:text-white mt-1">
                            {{ $user->dashboard_title ?? 'My Bookshelf Workspace' }}
                        </h1>
                    </div>

                    <div class="p-6 rounded-lg bg-slate-50 dark:bg-slate-900/40 border border-slate-150 dark:border-slate-850">
                        <h4 class="font-bold text-xs uppercase text-slate-400 tracking-wider mb-2">Message from Admin / Editorial Board</h4>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed whitespace-pre-line">
                            {{ $user->dashboard_content ?? 'Welcome to Books Academy! Your private workspace is loading.' }}
                        </p>
                    </div>

                    <!-- Extra decorative workflow list for visual completeness -->
                    <div class="space-y-4 pt-4">
                        <h4 class="font-bold text-xs uppercase text-slate-400 tracking-wider">Workspace Checklist</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
                            <div class="p-4 rounded-lg border border-slate-200 dark:border-slate-800">
                                <span class="block text-slate-400 mb-1">Step 1</span>
                                <span class="font-bold block text-slate-800 dark:text-white">Manuscript Upload</span>
                                <span class="text-[10px] text-green-500 font-semibold block mt-1.5">✓ Uploaded & Completed</span>
                            </div>
                            <div class="p-4 rounded-lg border border-slate-200 dark:border-slate-800">
                                <span class="block text-slate-400 mb-1">Step 2</span>
                                <span class="font-bold block text-slate-800 dark:text-white">Editorial Review</span>
                                <span class="text-[10px] text-blue-600 dark:text-blue-400 font-semibold block mt-1.5">⚡ In Progress</span>
                            </div>
                            <div class="p-4 rounded-lg border border-slate-200 dark:border-slate-800">
                                <span class="block text-slate-400 mb-1">Step 3</span>
                                <span class="font-bold block text-slate-800 dark:text-white">Formatting & Art</span>
                                <span class="text-[10px] text-slate-400 block mt-1.5">🔒 Awaiting Step 2</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <!-- Toggle scripts for Admin panel forms -->
    <script>
        function toggleDashboardForm(userId) {
            const formRow = document.getElementById(`editor-row-${userId}`);
            if (formRow.classList.contains('hidden')) {
                formRow.classList.remove('hidden');
            } else {
                formRow.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>
