<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserIndexController;
use App\Http\Controllers\User\UserCreateController;
use App\Http\Controllers\User\UserStoreController;
use App\Http\Controllers\User\UserEditController;
use App\Http\Controllers\User\UserUpdateController;
use App\Http\Controllers\User\UserDeleteController;


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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/users', UserIndexController::class)->middleware(['auth'])->name('users.index');

    Route::get('/users/create', UserCreateController::class)->middleware(['auth'])->name('users.create');

    Route::post('/users', UserStoreController::class)->middleware(['auth'])->name('users.store');

    Route::get('/users/{user}/edit', UserEditController::class)->middleware(['auth'])->name('users.edit');

    Route::put('/users/{user}', UserUpdateController::class)->middleware(['auth'])->name('users.update');

    Route::delete('/users/{user}', UserDeleteController::class)->middleware(['auth'])->name('users.destroy');
});
