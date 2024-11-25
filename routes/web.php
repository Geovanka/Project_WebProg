<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', function(){
    return view('login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/eventform', [ProfileController::class, 'addevent']);

Route::get('/showeventform', function(){
    return view('eventform');
});

Route::get('/profile', function(){
    return view('profile');
});

Route::get('/login', function(){
    return view('login');
});


Route::get('/company', function(){
    return view('company');
});