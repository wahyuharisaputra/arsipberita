<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\PublicController;

// Public Routes
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/berita/{id}', [PublicController::class, 'show'])->name('berita.show');

// Admin Auth Routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Protected Routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    // Kategori Routes
    Route::resource('admin/kategori', \App\Http\Controllers\KategoriController::class)->except(['create', 'show', 'edit']);
    
    // Berita Routes
    Route::resource('admin/berita', \App\Http\Controllers\BeritaController::class);
});
