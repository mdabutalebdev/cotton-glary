<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromiseController;
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OurPromiseController;
use App\Http\Controllers\ProductServiceController;
use Illuminate\Support\Facades\Route;

// Home / landing page.
Route::get('/', [HomeController::class, 'index'])->name('home');

// Public "Product & Service" showcase.
Route::get('/products', [ProductServiceController::class, 'index'])->name('products');

// Public "About Us" page.
Route::get('/about-us', [AboutPageController::class, 'index'])->name('about');

// Public "Our Promise" page.
Route::get('/our-promise', [OurPromiseController::class, 'index'])->name('promise');

// Public "Contact Us" page + form submission.
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit')->middleware('throttle:6,1');

// Authentication.
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Password reset ("forgot password" — emails a reset link).
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email')->middleware('throttle:6,1');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');

// Authenticated area.
Route::middleware('auth')->group(function () {
    // Admin only.
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');

        // Change own password (email is fixed — not editable here).
        Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
        Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

        // Hero banner management.
        Route::resource('banners', BannerController::class)->except(['show']);
        Route::patch('/banners/{banner}/activate', [BannerController::class, 'activate'])->name('banners.activate');

        // Product & Service management.
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('products', ProductController::class)->except(['show']);

        // About company section (single row).
        Route::get('/about', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('/about', [AboutController::class, 'update'])->name('about.update');

        // Owner / founder profile (single row).
        Route::get('/owner', [OwnerController::class, 'edit'])->name('owner.edit');
        Route::put('/owner', [OwnerController::class, 'update'])->name('owner.update');

        // Certifications (About Us page).
        Route::resource('certifications', CertificationController::class)->except(['show']);

        // Our Promise page (single row).
        Route::get('/promise', [PromiseController::class, 'edit'])->name('promise.edit');
        Route::put('/promise', [PromiseController::class, 'update'])->name('promise.update');

        // Contact info (single row) + contact form messages inbox.
        Route::get('/contact', [AdminContactController::class, 'edit'])->name('contact.edit');
        Route::put('/contact', [AdminContactController::class, 'update'])->name('contact.update');
        Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    });

    // Regular user.
    Route::get('/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
});
