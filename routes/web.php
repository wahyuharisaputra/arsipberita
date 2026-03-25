<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BeritaController;
use App\Http\Middleware\AdminMiddleware;

// Public Routes
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/berita/{id}', [PublicController::class, 'show'])->name('berita.show');

// Admin Auth Routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Protected Routes
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Kategori Routes
    Route::resource('admin/kategori', KategoriController::class)->except(['create', 'show', 'edit']);
    
    // Berita Routes
    Route::resource('admin/berita', BeritaController::class)->except(['show']);
});
