<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/create-order', [HomeController::class, 'createOrder']);
Route::post('/payment-success', [HomeController::class, 'paymentSuccess']);

Route::view('/contact-us', 'pages.contactus')->name('contact-us');
Route::view('/download', 'pages.download')->name('download');
Route::view('/privacy-policy', 'pages.privacypolicy')->name('privacy-policy');
Route::view('/refund-policy', 'pages.refundpolicy')->name('refund-policy');
Route::view('/terms-and-conditions', 'pages.terms')->name('terms');
Route::get('/download', [HomeController::class, 'download'])->name('download');
Route::get('/ebook-download', function () {
    return response()->download(
        public_path('assets/How to Attract Women.pdf')
    );
})->name('ebook.download');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/orders',[OrderController::class, 'index'])->name('admin.orders.index');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
