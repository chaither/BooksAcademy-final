<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::patch('/admin/users/{user}', [AdminController::class, 'updateUserDashboard'])->name('admin.users.update-dashboard');
    Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    
    // Royalty Report Routes
    Route::post('/admin/users/{user}/royalty-reports', [AdminController::class, 'uploadRoyaltyReport'])->name('admin.users.royalty-reports.store');
    Route::get('/royalty-reports/{royaltyReport}/download', [AdminController::class, 'downloadRoyaltyReport'])->name('royalty-reports.download');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
