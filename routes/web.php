<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('session.auth')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('admin.dashboard');
    Route::resource('customers', CustomerController::class);
    Route::resource('invoices', InvoiceController::class);
});
