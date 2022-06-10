<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::view('login','loginPage')->name('login');
    Route::view('register','registerPage')->name('register');
    Route::get('register/user/', [RegisteredUserController::class, 'createUser'])
                ->name('register.user');
    Route::get('register/company', [RegisteredUserController::class, 'createCompany'])
                ->name('register.company');

    Route::post('register/user/', [RegisteredUserController::class, 'storeUser']);
    Route::post('register/company', [RegisteredUserController::class, 'storeCompany']);

    Route::get('login/user/', [AuthenticatedSessionController::class, 'createUser'])
                ->name('login.user');
    Route::get('login/company', [AuthenticatedSessionController::class, 'createCompany'])
                ->name('login.company');

    Route::post('login/company', [AuthenticatedSessionController::class, 'storeCompany']);
    Route::post('login/user/', [AuthenticatedSessionController::class, 'storeUser']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
