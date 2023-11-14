<?php

use App\Http\Controllers\AnniversaryController;
use App\Http\Controllers\LoginController;
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
    Route::get('profile', [UserController::class, 'index'])->name('profile');
    Route::patch('profile', [UserController::class, 'update'])->name('profile.update');
    Route::get('invite/{username}', [UserController::class, 'acceptInvitation'])->name('invite');

    Route::name('wishlist.')->prefix('wish-list')->controller(WishListController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
    });
    Route::name('anniversary.')->prefix('anniversary')->controller(AnniversaryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::post('update/{anniversary}', 'update')->name('update');
        Route::post('delete/{anniversary}', 'destroy')->name('delete');

    });
});
Route::controller(LoginController::class)->group(function () {
    Route::get('login/{provider}', 'redirectToProvider')->name('login.redirect');
    Route::get('login/{provider}/callback', 'handleProviderCallback');
    Route::get('logout', 'logout')->name('logout');
});

Route::view('/', 'pages/index')->name('index');
Route::get('login', [LoginController::class, 'login'])->name('login');

Route::name('policies.')->prefix('policies')->group(function () {
    Route::view('/privacy', 'policies/privacy')->name('privacy');
    Route::view('/term', 'policies/term')->name('term');
    Route::view('/cookie', 'policies/cookie')->name('cookie');

});
Route::view('fr', 'pages/find-freind')->name('find');
Route::view('contact', 'pages/contact')->name('contact');

Route::post('wish-list/og-info', [WishListController::class, 'ogInfo']);
