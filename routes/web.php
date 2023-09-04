<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\PresensiController;
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

Route::get('/', [HomeController::class, 'index']);
Route::post('/presensi/pegawai', [HomeController::class, 'presensi'])->name('presensi');
Route::controller(LoginWithGoogleController::class)->group(function () {
    Route::get('authorized/google', 'redirectToGoogle')->name('auth.google');
    Route::get('authorized/google/callback', 'handleGoogleCallback');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('users')->name('users.')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('create/akun/{pegawai}', 'index')->name('create.akun');
            Route::get('create/akun/bulk/{data}', 'bulkCreate')->name('create.bulk.akun');
        });
    });
});
