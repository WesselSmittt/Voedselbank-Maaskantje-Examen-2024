<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\VoorraadbeheerController;

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
});

Route::middleware('auth')->group(function () {
    Route::get('/voorraad', [VoorraadbeheerController::class, 'index'])->name('voorraadbeheer.index');
    Route::get('/voorraad/create', [VoorraadbeheerController::class, 'create'])->name('voorraadbeheer.create');
    Route::post('/voorraad', [VoorraadbeheerController::class, 'store'])->name('voorraadbeheer.store');
    Route::get('/voorraad/{voorraad}/edit', [VoorraadbeheerController::class, 'edit'])->name('voorraadbeheer.edit');
    Route::put('/voorraad/{voorraad}', [VoorraadbeheerController::class, 'update'])->name('voorraadbeheer.update');
    Route::delete('/voorraad/{voorraad}', [VoorraadbeheerController::class, 'destroy'])->name('voorraadbeheer.destroy');
});





require __DIR__ . '/auth.php';
