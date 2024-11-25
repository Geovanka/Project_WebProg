<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/inbox', function(){
    return view('inbox');
});

// ADMIN DASHBOARD
Route::get('/admin', function(){
    return view('admin');
})->name('admin.dashboard');
