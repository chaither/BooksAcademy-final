<div x-data="{ currentTab: 'authors' }" class="flex flex-col md:flex-row gap-8">
    
    <!-- Sidebar Navigation -->
    <div class="w-full md:w-64 shrink-0">
        <div class="bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-4 shadow-sm space-y-2">
            <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 px-2">Navigation</h3>
            
            <button @click="currentTab = 'authors'" :class="currentTab === 'authors' ? 'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 font-bold' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-900'" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors text-left focus:outline-none">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                Authors
            </button>
            
            <button @click="currentTab = 'new-author'" :class="currentTab === 'new-author' ? 'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 font-bold' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-900'" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition-colors text-left focus:outline-none">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" /></svg>
                New Author
            </button>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1">
        
        <!-- ================= AUTHORS TAB ================= -->
        <div x-show="currentTab === 'authors'" style="display: none;" x-init="$el.style.display = 'block'">
            <div class="bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl overflow-hidden shadow-sm">
                <div class="p-6 border-b border-slate-200 dark:border-slate-800">
                    <h3 class="text-base font-bold text-slate-900 dark:text-white">Active Authors & Dashboards</h3>
                    <p class="text-xs text-slate-400">View authors, configure their workspace messages, and upload royalty reports.</p>
                </div>
                
                @if (session('status') == 'report-uploaded')
                    <div class="m-4 p-4 rounded-lg bg-green-50 dark:bg-green-900/10 border border-green-200 dark:border-green-800/30 text-green-600 dark:text-green-400 text-xs font-semibold">
                        ✓ Royalty report uploaded successfully!
                    </div>
                @endif
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-slate-50 dark:bg-slate-900 text-slate-500 font-bold uppercase border-b border-slate-200 dark:border-slate-800">
                                <th class="p-4">Author Details</th>
                                <th class="p-4">Dashboard Status</th>
                                <th class="p-4">Reports</th>
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
                                        <div class="font-semibold text-slate-700 dark:text-slate-300 truncate max-w-[150px]">{{ $u->dashboard_title ?? 'No title' }}</div>
                                        <div class="text-[10px] text-slate-400 mt-0.5 truncate max-w-[150px]">{{ $u->dashboard_content ?? 'No content' }}</div>
                                    </td>
                                    <td class="p-4">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-[10px] font-bold bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400">
                                            {{ $u->royaltyReports->count() }} Reports
                                        </span>
                                    </td>
                                    <td class="p-4 text-right space-x-2 whitespace-nowrap">
                                        <button onclick="toggleDashboardForm({{ $u->id }})" class="px-2.5 py-1.5 rounded border border-slate-200 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-900 text-[10px] font-bold text-blue-600 dark:text-blue-400 transition-colors">
                                            Manage
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
                                
                                <!-- Inline Editor & Upload Row (Collapsed by default) -->
                                <tr id="editor-row-{{ $u->id }}" class="hidden bg-slate-50 dark:bg-slate-900/40">
                                    <td colspan="4" class="p-6 border-b border-slate-200 dark:border-slate-800">
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                            
                                            <!-- Edit Dashboard Workspace -->
                                            <form method="POST" action="{{ route('admin.users.update-dashboard', $u->id) }}" class="space-y-4">
                                                @csrf
                                                @method('PATCH')
                                                <div>
                                                    <h4 class="font-bold text-xs text-slate-900 dark:text-white">Workspace Configuration</h4>
                                                    <p class="text-[10px] text-slate-400">Design the welcome headers displayed in their private portal.</p>
                                                </div>
                                                <div>
                                                    <label class="block text-[9px] uppercase font-bold text-slate-400 mb-1.5">Dashboard Title</label>
                                                    <input type="text" name="dashboard_title" required value="{{ $u->dashboard_title }}" class="w-full px-3 py-2 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:outline-none text-xs">
                                                </div>
                                                <div>
                                                    <label class="block text-[9px] uppercase font-bold text-slate-400 mb-1.5">Welcome Message</label>
                                                    <textarea name="dashboard_content" required rows="3" class="w-full px-3 py-2 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:outline-none text-xs resize-none">{{ $u->dashboard_content }}</textarea>
                                                </div>
                                                <button type="submit" class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold text-[10px] transition-colors">
                                                    Save Dashboard
                                                </button>
                                            </form>
                                            
                                            <!-- Upload Royalty Report -->
                                            <form method="POST" action="{{ route('admin.users.royalty-reports.store', $u->id) }}" enctype="multipart/form-data" class="space-y-4 pt-6 lg:pt-0 lg:border-l lg:border-slate-200 lg:dark:border-slate-800 lg:pl-8">
                                                @csrf
                                                <div>
                                                    <h4 class="font-bold text-xs text-slate-900 dark:text-white">Upload Royalty Report</h4>
                                                    <p class="text-[10px] text-slate-400">Securely deliver a PDF royalty statement to this author.</p>
                                                </div>
                                                <div>
                                                    <label class="block text-[9px] uppercase font-bold text-slate-400 mb-1.5">Report Title</label>
                                                    <input type="text" name="title" required placeholder="e.g. Q1 2026 Royalty Statement" class="w-full px-3 py-2 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:outline-none text-xs">
                                                    @if($errors->has('title'))
                                                        <p class="text-[10px] text-red-500 mt-1">{{ $errors->first('title') }}</p>
                                                    @endif
                                                </div>
                                                <div>
                                                    <label class="block text-[9px] uppercase font-bold text-slate-400 mb-1.5">PDF File</label>
                                                    <input type="file" name="report_file" required accept="application/pdf" class="w-full px-3 py-2 rounded border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 text-slate-900 dark:text-white focus:outline-none text-xs">
                                                    @if($errors->has('report_file'))
                                                        <p class="text-[10px] text-red-500 mt-1">{{ $errors->first('report_file') }}</p>
                                                    @endif
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <button type="submit" class="px-4 py-2 rounded bg-green-600 hover:bg-green-700 text-white font-bold text-[10px] transition-colors">
                                                        Upload PDF
                                                    </button>
                                                    <button type="button" onclick="toggleDashboardForm({{ $u->id }})" class="px-4 py-2 rounded border border-slate-200 dark:border-slate-800 text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-900 font-bold text-[10px] transition-colors">
                                                        Close panel
                                                    </button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-6 text-center text-slate-400 italic">No regular authors registered yet. Switch to "New Author" to create one.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ================= NEW AUTHOR TAB ================= -->
        <div x-show="currentTab === 'new-author'" style="display: none;">
            <div class="bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-800 rounded-xl p-6 shadow-sm space-y-4 max-w-xl">
                <div>
                    <h3 class="text-base font-bold text-slate-900 dark:text-white">Create User Credentials</h3>
                    <p class="text-xs text-slate-400">Generate credentials for a new author/user. They will automatically get a private workspace.</p>
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
        </div>

    </div>
</div>
