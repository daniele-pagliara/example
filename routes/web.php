<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ResetPasswordController;

// --- ROTTE PUBBLICHE (Accessibili a tutti) ---
Route::get('/', [AuthController::class, 'showGuestHome'])->name('guest.home');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/registrati', [AuthController::class, 'showRegistrati'])->name('registrati');
Route::post('/registrati', [AuthController::class, 'registrati'])->name('registrati.post');
Route::get('/chi-siamo', function () { return view('pagine.chi-siamo'); });

// Rotte Reset Password (Devono essere pubbliche perché l'utente è fuori dal sistema)
Route::get('/forgot-password', [ResetPasswordController::class, 'showRequestForm'])->name('password.request');
Route::post('/forgot-password', [ResetPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'storeNewPassword'])->name('password.update');


// --- ROTTE PROTETTE (Solo per utenti loggati) ---
Route::middleware(['auth'])->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', function () { return view('auth.pages.home-user'); })->name('pagine.home');

    // Gestione Dati Account
    Route::get('/inserisci-dati', [AccountController::class, 'create'])->name('pagine.invia-dati');
    Route::post('/test-invio', [AccountController::class, 'store'])->name('test.post');
    Route::get('/cerca-dati', [AccountController::class, 'index'])->name('pagine.cerca-dati');
    Route::get('/modifica-dati/{id}', [AccountController::class, 'edit'])->name('pagine.modifica-dati');
    Route::put('/aggiorna-dati/{id}', [AccountController::class, 'update'])->name('pagine.aggiorna-dati');
    Route::delete('/accounts/{id}', [AccountController::class, 'destroy'])->name('accounts.destroy');
    
});