<?php

namespace App\Http\Controllers;

use App\Models\BookstoreBook;
use App\Models\PublishedBook;
use App\Models\RoyaltyReport;
use App\Models\User;
use App\Models\UserQuarterlyRoyalty;
use App\Models\PublishedBookQuarterlySale;
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
            $users = User::with(['royaltyReports', 'publishedBooks.quarterlySales', 'quarterlyRoyalties'])->where('is_admin', false)->latest()->get();
            $bookstoreBooks = BookstoreBook::latest()->get();

            return view('dashboard', [
                'users' => $users,
                'bookstoreBooks' => $bookstoreBooks,
                'isAdmin' => true,
            ]);
        }

        // Regular user sees their own dashboard details
        $currentUser->load(['royaltyReports', 'publishedBooks.quarterlySales', 'quarterlyRoyalties']);

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
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:5120'], // Max 5MB Image
            'flag_images' => ['nullable', 'array'],
            'flag_images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'], // Max 2MB per flag image
        ]);

        $path = null;
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('published-books', 'public');
        }

        $flagPaths = [];
        if ($request->hasFile('flag_images')) {
            foreach ($request->file('flag_images') as $file) {
                $flagPaths[] = $file->store('flag-images', 'public');
            }
        }

        $user->publishedBooks()->create([
            'title' => $request->title,
            'cover_image_path' => $path,
            'flag_images' => $flagPaths,
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

        if ($publishedBook->flag_images && is_array($publishedBook->flag_images)) {
            foreach ($publishedBook->flag_images as $fPath) {
                Storage::disk('public')->delete($fPath);
            }
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

    /**
     * Store or update quarterly royalty records and book sales for a specific user and year.
     */
    public function storeQuarterlyRoyalties(Request $request, User $user)
    {
        if (! auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'year' => ['required', 'integer'],
            'quarters' => ['required', 'array'],
            'quarters.*.quarter' => ['required', 'integer', 'min:1', 'max:4'],
            'quarters.*.status' => ['required', 'string'],
            'quarters.*.book_sales' => ['nullable', 'array'],
            'quarters.*.book_sales.*.published_book_id' => ['required', 'integer'],
            'quarters.*.book_sales.*.books_sold' => ['required', 'integer', 'min:0'],
            'quarters.*.book_sales.*.royalty_amount' => ['required', 'numeric', 'min:0'],
        ]);

        $year = (int) $request->year;

        foreach ($request->quarters as $qData) {
            $quarter = (int) $qData['quarter'];
            $status = $qData['status'];
            $bookSales = $qData['book_sales'] ?? [];

            // Calculate aggregate totals
            $totalBooksSold = 0;
            $totalRoyaltyAmount = 0.00;

            foreach ($bookSales as $sale) {
                $totalBooksSold += (int) $sale['books_sold'];
                $totalRoyaltyAmount += (float) $sale['royalty_amount'];

                PublishedBookQuarterlySale::updateOrCreate(
                    [
                        'published_book_id' => (int) $sale['published_book_id'],
                        'year' => $year,
                        'quarter' => $quarter,
                    ],
                    [
                        'books_sold' => (int) $sale['books_sold'],
                        'royalty_amount' => (float) $sale['royalty_amount'],
                    ]
                );
            }

            UserQuarterlyRoyalty::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'year' => $year,
                    'quarter' => $quarter,
                ],
                [
                    'books_sold' => $totalBooksSold,
                    'royalty_amount' => $totalRoyaltyAmount,
                    'status' => $status,
                ]
            );
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Quarterly royalty records updated successfully!',
            ]);
        }

        return redirect()->route('dashboard')->with('status', 'quarterly-royalties-updated');
    }

    /**
     * Get quarterly royalty records and book sales for a specific user and year.
     */
    public function getQuarterlyRoyalties(Request $request, User $user)
    {
        if (! auth()->user()->is_admin && auth()->id() !== $user->id) {
            abort(403);
        }

        $year = (int) ($request->query('year') ?? date('Y'));

        $records = UserQuarterlyRoyalty::where('user_id', $user->id)
            ->where('year', $year)
            ->orderBy('quarter', 'asc')
            ->get();

        // Also fetch book-by-book sales for this user's published books for this year
        $bookIds = $user->publishedBooks->pluck('id');
        $bookSales = PublishedBookQuarterlySale::whereIn('published_book_id', $bookIds)
            ->where('year', $year)
            ->get();

        return response()->json([
            'year' => $year,
            'records' => $records,
            'bookSales' => $bookSales,
        ]);
    }
}
