<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', function(){
    return view('login');
})->name('landing');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/eventform', [ProfileController::class, 'addevent']);

Route::get('/showeventform', function(){
    return view('eventform');
});

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/company', function(){
    return view('company');
});

Route::get('/inbox', function(){
    return view('inbox');
});
Route::get('/admin', function(){
    return view('admin');
})->name('admin.dashboard');
