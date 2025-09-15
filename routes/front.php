<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\StripeWebhookController;
use App\Http\Controllers\Frontend\TestController;
use App\Http\Controllers\Frontend\TestPaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::name('frontend.')->group(function () {
    // static
    Route::view('/', 'frontend.pages.home')->name('home');
    Route::view('/faq', 'frontend.pages.faq')->name('faq');
    Route::view('/privacy-policy', 'frontend.pages.privacy-policy')->name('privacy-policy');

    // tests
    Route::name('tests.')->prefix('test')->middleware('auth')->group(function () {
        Route::get('/completed', [TestController::class, 'completed'])->name('completed');
        Route::get('/info/{id?}', [TestController::class, 'info'])->name('info');
        Route::get('/{id?}', [TestController::class, 'take'])->name('take');
        Route::post('/submit', [TestController::class, 'store'])->name('submit');
    });

    // blog
    Route::name('blog.')->prefix('blog')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/post/{post}', [BlogController::class, 'post'])->name('post');
    });

    // blog
    Route::name('contact.')->prefix('contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::post('/', [ContactController::class, 'store'])->name('store');
    });
});


Route::middleware('auth')->group(function () {
    // user dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('verified')->name('dashboard');

    // user profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// payment
Route::middleware('auth')->group(function () {
    Route::get('/tests/{test}/checkout', [TestPaymentController::class, 'checkout'])
        ->name('tests.checkout');

    Route::get('/tests/purchase/success', [TestPaymentController::class, 'success'])
        ->name('tests.success'); // redirect after Stripe checkout
});
 // webhook (no CSRF)
Route::post('/stripe/webhook', [StripeWebhookController::class, 'handle'])
    ->name('stripe.webhook');
