<?php

use App\Http\Controllers\BackEnd\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BackEnd\Auth\ConfirmablePasswordController;
use App\Http\Controllers\BackEnd\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\BackEnd\Auth\EmailVerificationPromptController;
use App\Http\Controllers\BackEnd\Auth\NewPasswordController;
use App\Http\Controllers\BackEnd\Auth\PasswordResetLinkController;
use App\Http\Controllers\BackEnd\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AuthenticatedSessionController::class, 'create'])
    ->middleware('admin_guest')
    ->name('admin.login');

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('admin_guest')
    ->name('admin.login');

Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('admin_guest');

Route::get('/admin/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('admin_guest')
    ->name('admin.password.request');

Route::post('/admin/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('admin_guest')
    ->name('admin.password.email');

Route::get('/admin/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('admin_guest')
    ->name('admin.password.reset');

Route::post('/admin/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('admin_guest')
    ->name('admin.password.update');

Route::get('/admin/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('admin_auth')
    ->name('admin.verification.notice');

Route::get('/admin/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['admin_auth', 'signed', 'throttle:6,1'])
    ->name('admin.verification.verify');

Route::post('/admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['admin_auth', 'throttle:6,1'])
    ->name('admin.verification.send');

Route::get('/admin/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('admin_auth')
    ->name('admin.password.confirm');

Route::post('/admin/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('admin_auth');

Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('admin_auth')
    ->name('admin.logout');
