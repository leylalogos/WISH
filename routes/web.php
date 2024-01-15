<?php

use App\Http\Controllers\AnniversaryController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReminderController;
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
    Route::controller(UserController::class)->group(function () {
        Route::get('account', 'index')->name('account.setting');
        Route::patch('account', 'update')->name('account.setting.update');
        Route::get('invite/{username}', 'acceptInvitation')->name('invite');
        Route::post('uploadProfileImage', 'storeProfileImage')->name('uploadProfileImage');
    });
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
    Route::name('event.')->prefix('event')->controller(EventController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::post('update/{event}', 'update')->name('update');
        Route::post('delete/{event}', 'destroy')->name('delete');

    });

    Route::controller(ContactsController::class)->name('contacts.')->prefix('contacts')->group(function () {
        Route::post('/fetch', 'fetch')->name('fetch');
        Route::get('/', 'index')->name('index');
        Route::post('/create', 'create')->name('create');
        Route::post('/{user_id}/follow', 'follow')->name('follow');
        Route::post('/{user_id}/skip', 'skip')->name('skip');
        Route::post('/{contact_id}/invite', 'invite')->name('invite');

    });
    Route::controller(ConnectionController::class)->name('connection.')->prefix('connection')->group(function () {
        Route::get('/myfollowers', 'myFollowersIndex')->name('myFollowersIndex');
        Route::get('/myfollowings', 'myFollowingsIndex')->name('myFollowingsIndex');
        Route::get('/myfriends', 'myFriendsIndex')->name('myFrindsIndex');
        Route::get('/myfriendrequests', 'myFriendRequestsIndex')->name('myFriendRequestsIndex');
        Route::get('/mySentRequestsIndex', 'mySentRequestsIndex')->name('mySentRequestsIndex');

        Route::post('/{user_id}/approve', 'approve')->name('approve');
        Route::post('/{user_id}/reject', 'reject')->name('reject');
        Route::post('/{user_id}/followBack', 'followBack')->name('followBack');
        Route::post('/{user_id}/unfollow', 'unfollow')->name('unfollow');
        Route::post('/{user_id}/remove', 'remove')->name('remove');
        Route::post('/{user_id}/cancel', 'cancel')->name('cancel');

    });
    Route::get('homepage', [HomePageController::class, 'index'])->name('homepage');
    Route::post('reminder', [ReminderController::class, 'store'])->name('reminder');

    Route::get('profile/{user_id}/{section?}', [ProfileController::class, 'index'])->name('profile');

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

Route::get('find-friends', [ConnectionController::class, 'findFriendIndex'])->name('connection.find-friends');

Route::post('wish-list/og-info', [WishListController::class, 'ogInfo']);
