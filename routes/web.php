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

Route::view('transactions', 'transactions')
    ->middleware(['auth'])
    ->name('transactions');

// Admins

Route::middleware(['auth', 'verified', 'can:view-admin'])->group(function () {
    Route::get('/admin', function() { return view('admin'); });
    Route::view('admin', 'admin')->name('admin');
    Route::view('adminLoan', 'adminLoan')->name('adminLoan');
    Route::view('approval', 'approval')->name('approval');
    Route::view('audit', 'audit')->name('audit');
});

require __DIR__.'/auth.php';
