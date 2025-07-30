<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\MemberController;



Route::get('/', [DashboardController::class, 'main'])->name('main');

// Redirect root to login
Route::get('/login', function () {
    return redirect('/login');
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Books routes
    Route::resource('books', BookController::class);
    
    // Borrowing routes
    Route::resource('borrowing', BorrowingController::class);
    Route::post('/borrowing/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowing.return');
    
    // Members routes
    Route::resource('members', MemberController::class);
});