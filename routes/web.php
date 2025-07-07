<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('loans', 'loans')
    ->middleware(['auth', 'verified'])
    ->name('loans');

Route::view('transfer', 'transfer')
    ->middleware(['auth', 'verified'])
    ->name('transfer');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
