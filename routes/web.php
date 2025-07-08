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

Route::view('createAccount', 'createAccount')
    ->middleware(['auth'])
    ->name('createAccount');


// Admins

Route::get('/admin', function() {
    return view('admin');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('approval', 'approval')
    ->middleware(['auth', 'verified'])
    ->name('approval');

Route::view('audit', 'audit')
    ->middleware(['auth', 'verified'])
    ->name('audit');

require __DIR__.'/auth.php';
