<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', function(){
    return view('login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', function(){
    return view('profile');
});

Route::get('/login', function(){
    return view('login');
});
