<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->middleware('is_admin')->middleware('auth')->name('users');
Route::get('/users/{id}', [UserController::class, 'getUser'])->middleware('is_admin')->middleware('auth');

Route::post('/users/update', [UserController::class, 'update'])->middleware('is_admin')->middleware('auth')->name('users.update');
Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->middleware('is_admin')->middleware('auth');

Route::post('/users', [UserController::class, 'store'])->middleware('is_admin')->middleware('auth');