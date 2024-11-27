<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SponsorPageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InboxController;
use Illuminate\Support\Facades\Route;

// LANDING PAGE (LOGIN)
Route::get('/', function(){
    return view('login');
})->name('landing');
Route::post('/login', [LoginController::class, 'login'])->name('login');

// REGISTER PAGE
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// HOME PAGE
Route::get('/home', [HomeController::class, 'index'])->name('home');

// EVENT FORM
Route::post('/eventform', [ProfileController::class, 'addevent']);
Route::get('/showeventform', function(){
    return view('eventform');
});

// PROFILE PAGE
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

// SPONSOR DASHBOARD
Route::get('/sponsorPage', function(){
    return view('sponsorPage');
})->name('sponsor.dashboard');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');

Route::post('register', [RegisterController::class, 'register']);

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/company', function(){
    return view('company');
});
// Route::get('/sponsor', function(){
//     return view('sponsor');
// });

Route::get('/inbox', function(){
    return view('inbox');
});

// ADMIN DASHBOARD
Route::get('/admin', [AdminController::class, 'admin'])->name('admin.dashboard');
Route::get('/admin', function(){
    return view('admin');
})->name('admin.dashboard');

Route::get('/company/{id}', [SponsorPageController::class, 'show'])->name('sponsor.show');

Route::get('/submission', function(){
    return view('submission');
});

Route::get('/submission', [SponsorPageController::class, 'userData']);

Route::post('/transaction', [TransactionController::class, 'store']);
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/sponsorform', [AdminController::class, 'addSponsor']);
Route::get('/showsponsorform', function(){
    return view('sponsorform');
});;

Route::get('/inbox', [InboxController::class, 'inbox']);