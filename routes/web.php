<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ShortUrlController;
use App\Http\Controllers\AuthController;    


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



// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register/{token}', [AuthController::class, 'showRegistrationForm'])->name('register.with.token');
Route::post('/register/{token}', [AuthController::class, 'registerWithInvitation']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    
    Route::get('/short-urls', [ShortUrlController::class, 'index'])->name('short-urls.index');
    Route::post('/short-urls', [ShortUrlController::class, 'store'])->name('short-urls.store');
    Route::delete('/short-urls/{shortUrl}', [ShortUrlController::class, 'destroy'])->name('short-urls.destroy');
});

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::post('/companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
    
    Route::post('/invitations', [InvitationController::class, 'store'])->name('invitations.store');
    Route::get('/invitations', [InvitationController::class, 'index'])->name('invitations.index');
    Route::delete('/invitations/{invitation}', [InvitationController::class, 'destroy'])->name('invitations.destroy');

    Route::post('/invitations/resend', [InvitationController::class, 'resend'])->name('invitations.resend');
});

// Admin Routes (Company specific)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/company/invitations', [InvitationController::class, 'storeCompany'])->name('invitations.company.store');
});



// Public Short URL Redirect
// Route::get('/{shortCode}', [ShortUrlController::class, 'redirect'])->name('short-url.redirect');











require __DIR__.'/auth.php';
