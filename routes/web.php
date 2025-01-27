<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SitesController;
use App\Http\Controllers\ThemesController;
use App\Http\Controllers\SettingsController;

Route::get('/', function () { return view('pages.landing'); })->name('landing');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login-form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function() { return view('pages.home'); })->name('home');
    
    Route::resource('sites', SitesController::class);
    Route::get('/sites/{id}/build', [SitesController::class, 'build'])->name('sites.build');

    Route::resource('themes', ThemesController::class);
    
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');

    Route::resource('users', UserController::class);
    
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('livewire/update', $handle);
    });

});
