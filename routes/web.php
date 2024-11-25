<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/eventform', [ProfileController::class, 'addevent']);

Route::get('/profile', function(){
    return view('profile');
});

Route::get('/login', function(){
    return view('login');
});
