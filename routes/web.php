<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeverancierController;

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
    Route::get('/leveranciers', [LeverancierController::class, 'index'])->name('leverancier.index');
    Route::get('/leveranciers/{id}', [LeverancierController::class, 'show'])->name('leverancier.show');
    Route::get('/leveranciers/{id}/edit', [LeverancierController::class, 'edit'])->name('leverancier.edit');
    Route::put('/leveranciers/{id}', [LeverancierController::class, 'update'])->name('leverancier.update');
    Route::delete('/leveranciers/{id}', [LeverancierController::class, 'destroy'])->name('leverancier.destroy');
    Route::get('/leverancier/create', [LeverancierController::class, 'create'])->name('leverancier.create');
    Route::post('/leveranciers', [LeverancierController::class, 'store'])->name('leverancier.store');
});

require __DIR__.'/auth.php';
