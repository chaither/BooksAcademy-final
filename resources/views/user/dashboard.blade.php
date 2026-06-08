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

    <!-- Royalty Reports Section -->
    <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-slate-800 mt-6">
        <h4 class="font-bold text-xs uppercase text-slate-400 tracking-wider">Royalty Reports & Statements</h4>
        
        @if ($user->royaltyReports->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach ($user->royaltyReports as $report)
                    <div class="flex items-center justify-between p-4 rounded-lg border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-red-50 dark:bg-red-900/20 text-red-500 rounded">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-xs text-slate-800 dark:text-slate-200">{{ $report->title }}</h5>
                                <p class="text-[9px] text-slate-400 mt-0.5">Uploaded {{ $report->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <a href="{{ route('royalty-reports.download', $report->id) }}" class="px-3 py-1.5 rounded bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-[10px] font-bold text-slate-700 dark:text-slate-300 transition-colors" target="_blank">
                            Download PDF
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-6 text-center rounded-lg border border-dashed border-slate-300 dark:border-slate-700">
                <p class="text-xs text-slate-500">No royalty reports have been uploaded to your workspace yet.</p>
            </div>
        @endif
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
