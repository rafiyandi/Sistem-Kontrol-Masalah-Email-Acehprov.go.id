<?php

use App\Http\Controllers\DasboardController;
use App\Http\Controllers\DataEmailController;
use App\Http\Controllers\KontrolController;
use App\Http\Controllers\SkpaController;
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


Route::prefix('/')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', [DasboardController::class, 'index'])->name('/');
        Route::get('/getDinas', [DataEmailController::class, 'getKd_dinas'])->name('kode');
        Route::resource('/spka', SkpaController::class);

        Route::get('list', [DataEmailController::class, 'list']);
        Route::get('data-email/edit/{id}', [DataEmailController::class, 'edit']);
        Route::get('data-email/hapus/{id}', [DataEmailController::class, 'destroy']);
        Route::resource('/data-email', DataEmailController::class);


        Route::resource('/kontrol', KontrolController::class);

        // user
        Route::get('/user', [UserController::class, 'index'])->name('/user');
        Route::get('/user/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

        // ganti password
        Route::get('/user/change/{id}', [UserController::class, 'newPassword'])->name('user.newPassword');
        Route::put('/user/change/{id}', [UserController::class, 'chancgePassword'])->name('user.changePass');
    });

Route::get('/view', [DataEmailController::class, 'generatePDF'])->name('view');
Route::get('/view-kontrol', [KontrolController::class, 'generatePDF'])->name('view.kontrol');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
