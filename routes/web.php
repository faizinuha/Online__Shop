<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeControllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/posts', PostController::class);

// Define Custom User Registration & Login Routes


Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::middleware('guest')->group(function () {
    // Route::get('/BacaComic/{name}', [PostController::class, 'comic'])->name('post.baca_cerita');
    Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
    Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
    Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeControllers::class, 'index'])->name('home');  // Menggunakan 'index' di sini
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
});

// Define Custom Verification Routes
Route::prefix('email')->group(function () {
    Route::get('/verify', [VerificationController::class, 'notice'])->name('verification.notice');
    Route::get('/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});
