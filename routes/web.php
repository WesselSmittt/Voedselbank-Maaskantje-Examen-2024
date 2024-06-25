<?php

use App\Http\Controllers\KlantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/klantoverzicht', [KlantController::class, 'index'])->name('klantoverzicht');
    Route::get('/klanttoevoegen', [KlantController::class, 'create'])->name('klanttoevoegen');
    Route::post('/klant/store', [KlantController::class, 'store'])->name('klant.store');
    Route::get('/klant/{id}/edit', [KlantController::class, 'edit'])->name('klant.edit');
    Route::patch('/klant/{id}', [KlantController::class, 'update'])->name('klant.update');
    Route::put('/klanten/blokkeren/{id}', [App\Http\Controllers\KlantController::class, 'blokkeren'])->name('klanten.blokkeren');
    Route::post('/klanten/herstellen', [App\Http\Controllers\KlantController::class, 'herstellen'])->name('klanten.herstellen');
});

require __DIR__.'/auth.php';
