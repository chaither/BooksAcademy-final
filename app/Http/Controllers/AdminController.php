<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RoyaltyReport;
use App\Models\PublishedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Show the main dashboard based on role.
     */
    public function index()
    {
        $currentUser = auth()->user();

        if ($currentUser->is_admin) {
            // Admin sees all regular users
            $users = User::with(['royaltyReports', 'publishedBooks'])->where('is_admin', false)->latest()->get();
            return view('dashboard', [
                'users' => $users,
                'isAdmin' => true
            ]);
        }

        // Regular user sees their own dashboard details
        $currentUser->load(['royaltyReports', 'publishedBooks']);
        return view('dashboard', [
            'user' => $currentUser,
            'isAdmin' => false
        ]);
    }

    /**
     * Store new user credentials.
     */
    public function storeUser(Request $request)
    {
        // Check authorization
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dashboard_title' => 'My Bookshelf Workspace',
            'dashboard_content' => 'Welcome to Books Academy! Your account has been created by the administrator. Feel free to explore our Bookstore or consult with designers.',
        ]);

        return redirect()->route('dashboard')->with('status', 'user-created');
    }

    /**
     * Update target user's custom dashboard details.
     */
    public function updateUserDashboard(Request $request, User $user)
    {
        // Check authorization
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'dashboard_title' => ['required', 'string', 'max:255'],
            'dashboard_content' => ['required', 'string'],
        ]);

        $user->update([
            'dashboard_title' => $request->dashboard_title,
            'dashboard_content' => $request->dashboard_content,
        ]);

        return redirect()->route('dashboard')->with('status', 'dashboard-updated');
    }

    /**
     * Update target user's password.
     */
    public function updateUserPassword(Request $request, User $user)
    {
        // Check authorization
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dashboard')->with('status', 'password-updated');
    }

    /**
     * Delete user credentials.
     */
    public function deleteUser(User $user)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $user->delete();

        return redirect()->route('dashboard')->with('status', 'user-deleted');
    }

    /**
     * Upload a royalty report for a specific user.
     */
    public function uploadRoyaltyReport(Request $request, User $user)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'report_file' => ['required', 'file', 'mimes:pdf', 'max:10240'], // Max 10MB PDF
        ]);

        $path = $request->file('report_file')->store('royalty-reports', 'public');

        $user->royaltyReports()->create([
            'title' => $request->title,
            'file_path' => $path,
        ]);

        return redirect()->route('dashboard')->with('status', 'report-uploaded');
    }

    /**
     * Download a specific royalty report.
     */
    public function downloadRoyaltyReport(RoyaltyReport $royaltyReport)
    {
        $currentUser = auth()->user();

        // Allow download if admin OR if the user owns the report
        if ($currentUser->is_admin || $currentUser->id === $royaltyReport->user_id) {
            return Storage::disk('public')->download($royaltyReport->file_path);
        }

        abort(403);
    }

    /**
     * Store a new published book for a specific user.
     */
    public function storePublishedBook(Request $request, User $user)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'], // Max 5MB Image
        ]);

        $path = null;
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('published-books', 'public');
        }

        $user->publishedBooks()->create([
            'title' => $request->title,
            'cover_image_path' => $path,
        ]);

        return redirect()->route('dashboard')->with('status', 'book-published');
    }

    /**
     * Delete a published book.
     */
    public function deletePublishedBook(PublishedBook $publishedBook)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        if ($publishedBook->cover_image_path) {
            Storage::disk('public')->delete($publishedBook->cover_image_path);
        }

        $publishedBook->delete();

        return redirect()->route('dashboard')->with('status', 'book-deleted');
    }
}
