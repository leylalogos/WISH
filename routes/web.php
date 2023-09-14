<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::view('about', 'pages/about')->name('about');
Route::view('/', 'pages/index')->name('index');
Route::view('contact', 'pages/contact')->name('contact');
Route::get('profile', [UserController::class, 'index'])->name('profile')->middleware('auth');
Route::post('update/profile', [UserController::class, 'update'])->name('update.profile')->middleware('auth');
Route::view('login', 'pages/login')->name('login');

Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');
