<?php



use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');

Route::controller(HomeController::class)->group(function(){
    Route::get('/image-upload', 'index')->name('image.form');
    Route::post('/upload-image', 'storeImage')->name('image.store');
});

// Define Custom User Registration & Login Routes
Route::prefix('')->group(function() {
    Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
    Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
    Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
    Route::get('/home', [LoginRegisterController::class, 'home'])->name('home');
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
});


// Define Custom Verification Routes
Route::prefix('email')->group(function() {
    Route::get('/verify', [VerificationController::class, 'notice'])->name('verification.notice');
    Route::get('/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});
