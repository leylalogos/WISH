<?php

use App\Http\Controllers\AnniversaryController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\ContactsController;
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

    Route::controller(ContactsController::class)->name('contacts.')->prefix('contacts')->group(function () {
        Route::post('/fetch', 'fetch')->name('fetch');
        Route::get('/', 'index')->name('index');
        Route::post('/create', 'create')->name('create');
        Route::post('/{user_id}/follow', 'follow')->name('follow');
        Route::post('/{contact_id}/invite', 'invite')->name('invite');

    });
    Route::controller(ConnectionController::class)->name('connection.')->prefix('connection')->group(function () {
        Route::get('/myfollowers', 'myFollowersIndex')->name('myFollowersIndex');
        Route::get('/myfollowings', 'myFollowingsIndex')->name('myFollowingsIndex');
        Route::get('/myfriends', 'myFrindsIndex')->name('myFrindsIndex');
        Route::get('/myfriendrequests', 'myFriendRequestsIndex')->name('myFriendRequestsIndex');

        Route::post('/{user_id}/approve', 'approve')->name('approve');
        Route::post('/{user_id}/reject', 'reject')->name('reject');
        Route::post('/{user_id}/follow', 'follow')->name('follow');

    });
}); //end of auth middleware
Route::controller(LoginController::class)->group(function () {
    Route::get('login/{provider}', 'redirectToProvider')->name('login.redirect');
    Route::get('login/{provider}/callback', 'handleProviderCallback');
    Route::get('logout', 'logout')->name('logout');

    Route::post('gsm/auth', 'loginWithPhoneNumber')->name('login.gsm');
    Route::get('gsm/verify', 'verificationPage')->name('verification.page');
    Route::post('gsm/verify', 'handleGsmCallback')->name('verification.code');

});

Route::view('/', 'pages/index')->name('index');
Route::get('login', [LoginController::class, 'login'])->name('login');

Route::name('policies.')->prefix('policies')->group(function () {
    Route::view('/privacy', 'policies/privacy')->name('privacy');
    Route::view('/term', 'policies/term')->name('term');
    Route::view('/cookie', 'policies/cookie')->name('cookie');

});

Route::view('fr', 'pages/find-freind')->name('find');

Route::post('wish-list/og-info', [WishListController::class, 'ogInfo']);
