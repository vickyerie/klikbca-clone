<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/login');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/saldo', [DashboardController::class, 'saldo']);
    Route::get('/transfer', [DashboardController::class, 'transfer']);
    Route::post('/transfer', [DashboardController::class, 'processTransfer']);
    Route::get('/pembayaran', [DashboardController::class, 'pembayaran'])->middleware('auth');
    Route::post('/pembayaran', [DashboardController::class, 'processPembayaran'])->middleware('auth');
    Route::get('/mutasi', [DashboardController::class, 'mutasi']);

});

