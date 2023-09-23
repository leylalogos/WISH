<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocialNetworkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('profile/index', [UserController::class, 'index'])->name('profile');
    Route::post('profile/update', [UserController::class, 'update'])->name('update.profile');
    Route::post('social_network/update', [SocialNetworkController::class, 'update'])->name('update.social_network');
    Route::get('wish-list/index', [WishListController::class, 'index'])->name('my_wish_list');
    Route::post('wish-list/create', [WishListController::class, 'create'])->name('create.wishList');

});
Route::controller(LoginController::class)->group(function () {
    Route::get('/login/google', 'redirectToGoogle')->name('login.google');
    Route::get('/login/google/callback', 'handleGoogleCallback');
    Route::get('logout', 'logout')->name('logout');

});

Route::view('about', 'pages/about')->name('about');
Route::view('/', 'pages/index')->name('index');
Route::view('contact', 'pages/contact')->name('contact');
Route::view('login', 'pages/login')->name('login');
