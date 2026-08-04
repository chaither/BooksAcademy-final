<?php

namespace App\Http\Controllers;

use App\Models\BookstoreBook;
use App\Models\PublishedBook;
use App\Models\RoyaltyReport;
use App\Models\User;
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
            // Admin sees all regular users and bookstore books
            $users = User::with(['royaltyReports', 'publishedBooks'])->where('is_admin', false)->latest()->get();
            $bookstoreBooks = BookstoreBook::latest()->get();

            return view('dashboard', [
                'users' => $users,
                'bookstoreBooks' => $bookstoreBooks,
                'isAdmin' => true,
            ]);
        }

        // Regular user sees their own dashboard details
        $currentUser->load(['royaltyReports', 'publishedBooks']);

        return view('dashboard', [
            'user' => $currentUser,
            'isAdmin' => false,
        ]);
    }

    /**
     * Store new user credentials.
     */
    public function storeUser(Request $request)
    {
        // Check authorization
        if (! auth()->user()->is_admin) {
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
        if (! auth()->user()->is_admin) {
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
        if (! auth()->user()->is_admin) {
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
        if (! auth()->user()->is_admin) {
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
        if (! auth()->user()->is_admin) {
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
     * View a specific royalty report.
     */
    public function viewRoyaltyReport(RoyaltyReport $royaltyReport)
    {
        $currentUser = auth()->user();

        // Allow view if admin OR if the user owns the report
        if ($currentUser->is_admin || $currentUser->id === $royaltyReport->user_id) {
            return Storage::disk('public')->response($royaltyReport->file_path);
        }

        abort(403);
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
        if (! auth()->user()->is_admin) {
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
        if (! auth()->user()->is_admin) {
            abort(403);
        }

        if ($publishedBook->cover_image_path) {
            Storage::disk('public')->delete($publishedBook->cover_image_path);
        }

        $publishedBook->delete();

        return redirect()->route('dashboard')->with('status', 'book-deleted');
    }

    /**
     * Delete a royalty report.
     */
    public function deleteRoyaltyReport(RoyaltyReport $royaltyReport)
    {
        if (! auth()->user()->is_admin) {
            abort(403);
        }

        if ($royaltyReport->file_path) {
            Storage::disk('public')->delete($royaltyReport->file_path);
        }

        $royaltyReport->delete();

        return redirect()->route('dashboard')->with('status', 'report-deleted');
    }

    /**
     * Store a new book in the Bookstore catalog.
     */
    public function storeBookstoreBook(Request $request)
    {
        if (! auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'buy_url' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
            'back_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
            'spine_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
        ]);

        $imagePath = $request->file('image')->store('bookstore-books', 'public');

        $backImagePath = null;
        if ($request->hasFile('back_image')) {
            $backImagePath = $request->file('back_image')->store('bookstore-books', 'public');
        }

        $spineImagePath = null;
        if ($request->hasFile('spine_image')) {
            $spineImagePath = $request->file('spine_image')->store('bookstore-books', 'public');
        }

        BookstoreBook::create([
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category ?: 'General',
            'price' => $request->price,
            'buy_url' => $request->buy_url,
            'description' => $request->description,
            'image' => $imagePath,
            'back_image' => $backImagePath,
            'spine_image' => $spineImagePath,
        ]);

        return redirect()->route('dashboard')->with('status', 'bookstore-book-added');
    }

    /**
     * Delete a book from the Bookstore catalog.
     */
    public function deleteBookstoreBook(BookstoreBook $book)
    {
        if (! auth()->user()->is_admin) {
            abort(403);
        }

        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }
        if ($book->back_image) {
            Storage::disk('public')->delete($book->back_image);
        }
        if ($book->spine_image) {
            Storage::disk('public')->delete($book->spine_image);
        }

        $book->delete();

        return redirect()->route('dashboard')->with('status', 'bookstore-book-deleted');
    }

    /**
     * Update an existing book in the Bookstore catalog.
     */
    public function updateBookstoreBook(Request $request, BookstoreBook $book)
    {
        if (! auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'buy_url' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
            'back_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
            'spine_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'],
        ]);

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category ?: 'General',
            'price' => $request->price,
            'buy_url' => $request->buy_url,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }
            $data['image'] = $request->file('image')->store('bookstore-books', 'public');
        }

        if ($request->hasFile('back_image')) {
            if ($book->back_image) {
                Storage::disk('public')->delete($book->back_image);
            }
            $data['back_image'] = $request->file('back_image')->store('bookstore-books', 'public');
        }

        if ($request->hasFile('spine_image')) {
            if ($book->spine_image) {
                Storage::disk('public')->delete($book->spine_image);
            }
            $data['spine_image'] = $request->file('spine_image')->store('bookstore-books', 'public');
        }

        $book->update($data);

        return redirect()->route('dashboard')->with('status', 'bookstore-book-updated');
    }
}
