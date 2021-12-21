<?php

use App\Http\Controllers\BackEnd\DashBoardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['admin_auth', 'is_admin', 'admin_password.confirm', 'admin_verified'])->group(function () {
    Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');
});
