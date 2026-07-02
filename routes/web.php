<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReportController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $authors = User::with('publishedBooks')->where('is_admin', false)->take(50)->get();

    return view('welcome', compact('authors'));
});

Route::get('/services', function () {
    return view('services');
})->name('services');
Route::get('/bookstore', function () {
    return view('bookstore');
})->name('bookstore');
Route::get('/pressroom', function () {
    return view('pressroom');
})->name('pressroom');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::patch('/admin/users/{user}', [AdminController::class, 'updateUserDashboard'])->name('admin.users.update-dashboard');
    Route::patch('/admin/users/{user}/password', [AdminController::class, 'updateUserPassword'])->name('admin.users.update-password');
    Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    // Royalty Report Routes
    Route::post('/admin/users/{user}/royalty-reports', [AdminController::class, 'uploadRoyaltyReport'])->name('admin.users.royalty-reports.store');
    Route::get('/royalty-reports/{royaltyReport}/view', [AdminController::class, 'viewRoyaltyReport'])->name('royalty-reports.view');
    Route::get('/royalty-reports/{royaltyReport}/download', [AdminController::class, 'downloadRoyaltyReport'])->name('royalty-reports.download');
    Route::delete('/admin/royalty-reports/{royaltyReport}', [AdminController::class, 'deleteRoyaltyReport'])->name('admin.royalty-reports.delete');

    // Published Books Routes
    Route::post('/admin/users/{user}/published-books', [AdminController::class, 'storePublishedBook'])->name('admin.users.published-books.store');
    Route::delete('/admin/published-books/{publishedBook}', [AdminController::class, 'deletePublishedBook'])->name('admin.published-books.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User PDF Uploads
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
});

require __DIR__.'/auth.php';
