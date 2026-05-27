<?php

use App\Http\Controllers\AccountDeletionController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ContentPageController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ServicePageController;
use Illuminate\Support\Facades\Route;

// ── Public landing page ──────────────────────────────────
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::post('/track/click', [AnalyticsController::class, 'trackClick'])->name('track.click');

// ── Static content pages (fetched from API) ──────────────
Route::get('/{page}', [ContentPageController::class, 'show'])
    ->where('page', 'terms-conditions|privacy-policy|about|contact-support')
    ->name('content.page');

// ── Individual service pages (SEO) ───────────────────────
Route::get('/services/{key}', [ServicePageController::class, 'show'])->name('service.page');

// ── Account deletion ─────────────────────────────────────
Route::get('/account-deletion', [AccountDeletionController::class, 'show'])->name('account-deletion.show');
Route::post('/account-deletion/request', [AccountDeletionController::class, 'submit'])
    ->name('account-deletion.submit')
    ->middleware('throttle:5,60');

// ── Admin panel ──────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {

    // Guest-only (redirects to dashboard when already logged in)
    Route::get('login',  [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('login.submit');

    // Protected
    Route::middleware('admin.auth')->group(function () {
        Route::redirect('/', '/admin/dashboard');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('logout',   [AdminAuthController::class, 'logout'])->name('logout');
    });
});
