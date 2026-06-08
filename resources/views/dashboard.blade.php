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
                @include('admin.dashboard')
            @else
                <!-- ================= USER PRIVATE DASHBOARD ================= -->
                @include('user.dashboard')
            @endif

        </div>
    </div>

    @if ($isAdmin)
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
    @endif
</x-app-layout>
