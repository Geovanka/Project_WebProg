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
use Illuminate\Support\Facades\Auth;

// LANDING PAGE (LOGIN) & LOGOUT =================================================================================================================================================================================================================================
Route::get('/', function(){
    return view('login');
})->name('landing');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// REGISTER PAGE =================================================================================================================================================================================================================================
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// HOME PAGE =================================================================================================================================================================================================================================
Route::get('/home', [HomeController::class, 'index'])->name('home');

// HOME SEARCH =================================================================================================================================================================================================================================
Route::get('/search', [HomeController::class, 'search'])->name('search');

// PROFILE PAGE =================================================================================================================================================================================================================================
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::get('/sponsorprofile/{id}', [SponsorPageController::class, 'sponsorprofile'])->name('sponsorprofile');

// EVENT FORM =================================================================================================================================================================================================================================
Route::post('/eventform', [ProfileController::class, 'addevent']);
Route::get('/showeventform', function(){
    return view('eventform');
});

// SPONSOR DASHBOARD =================================================================================================================================================================================================================================
Route::get('/sponsor', function(){
    return view('sponsor');
})->name('sponsor.dashboard');

// INBOX =================================================================================================================================================================================================================================
Route::get('/inbox', [InboxController::class, 'inbox'])->name('inbox');
Route::get('/inboxuser', [InboxController::class, 'inboxuser'])->name('inboxuser');

// ADMIN DASHBOARD =================================================================================================================================================================================================================================
Route::get('/admin', [AdminController::class, 'admin'])->name('admin.dashboard');
Route::get('/admin/{id}/edit', [AdminController::class, 'editSponsor'])->name('admin.edit');
Route::put('/admin/{id}', [AdminController::class, 'updateSponsor'])->name('admin.update');
Route::delete('/admin/{id}', [AdminController::class, 'deleteSponsor'])->name('admin.delete');
Route::post('/sponsorform', [AdminController::class, 'addSponsor']);
Route::get('/showsponsorform', function(){
    return view('sponsorform');
});;

// INDIVIDUAL SPONSOR + SUBMISSIOON =================================================================================================================================================================================================================================
// Route::get('/company/{id}', [SponsorPageController::class, 'show'])->name('sponsor.show');
// Route::get('/submission', function(){
//     return view('submission');
// });
// Route::get('/submission/{sponsor_id}', [TransactionController::class, 'store'])->name('transaction.store');

// Route::get('/submission/{id}', [SponsorPageController::class, 'userData'])->name('submission.show');
Route::get('/sponsor/{id}', [SponsorPageController::class, 'show'])->name('show.sponsor');
Route::get('/submission/{sponsor}', [SponsorPageController::class, 'userData'])->name('submission.show');
Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');


Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::post('/transactions/{id}/accept', [TransactionController::class, 'accept'])->name('transactions.accept');
Route::post('/transactions/{id}/reject', [TransactionController::class, 'reject'])->name('transactions.reject');
Route::post('/transactions/{id}/negotiate', [TransactionController::class, 'negotiate'])->name('transactions.negotiate');

Route::get('/organization/transactions', [TransactionController::class, 'organizationProposals'])->name('transactions.organization');


// TESTING =================================================================================================================================================================================================================================
Route::get('/test', [LoginController::class, 'createAdmin']);
