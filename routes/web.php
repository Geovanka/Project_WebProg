<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/content', function(){
    return view('content');
});

Route::get('/system', function(){
    return view('system');
});