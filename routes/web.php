<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'authenticate')->name('login');
    Route::post('/logout', 'logout');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->middleware('auth');
    Route::get('/dashboard/profile', 'profile')->middleware('auth');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->middleware('is_admin')->middleware('auth')->name('users');
    Route::post('/users', 'store')->middleware('is_admin')->middleware('auth');

    Route::get('/users/{id}', 'getUser')->middleware('is_admin')->middleware('auth');
    Route::post('/users/update', 'update')->middleware('is_admin')->middleware('auth')->name('users.update');

    Route::delete('/users/delete/{id}', 'delete')->middleware('is_admin')->middleware('auth');
});

Route::controller(TagController::class)->group(function () {
    Route::get('/tags', 'index')->middleware('auth')->name('tags');
    Route::post('/tags', 'store')->middleware('auth');

    Route::get('/tags/{id}', 'getTag')->middleware('auth');
    Route::post('/tags/update', 'update')->middleware('auth')->name('tags.update');

    Route::delete('/tags/delete/{id}', 'delete')->middleware('is_admin')->middleware('auth');
});