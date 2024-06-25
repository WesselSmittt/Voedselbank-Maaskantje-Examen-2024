<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoedselPakketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/voedselpakket', [VoedselPakketController::class, 'index'])->name('voedselpakket.index');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('categories', CategorieController::class);

// Route voor het weergeven van het overzicht van voedselpakketten
Route::get('/voedselpakketten', [VoedselPakketController::class, 'index'])->name('voedselpakket.index');

// Route voor het weergeven van het formulier om een nieuw voedselpakket aan te maken
Route::get('/voedselpakketten/create', [VoedselPakketController::class, 'create'])->name('voedselpakket.create');

// Route voor het opslaan van een nieuw voedselpakket
Route::post('/voedselpakketten', [VoedselPakketController::class, 'store'])->name('voedselpakket.store');

// Route voor het zoeken op klantnaam in voedselpakketten
Route::get('/voedselpakketten/search', [VoedselPakketController::class, 'search'])->name('voedselpakket.search');

// Route voor het weergeven van details van een voedselpakket
Route::get('/voedselpakketten/{id}', [VoedselPakketController::class, 'show'])->name('voedselpakket.show');

// Route voor het verwijderen van een voedselpakket
Route::delete('/voedselpakket/{id}', [VoedselPakketController::class, 'destroy'])->name('voedselpakket.destroy');

// Route voor het aanpassen van een voedselpakket
Route::get('/voedselpakket/{id}/edit', [VoedselPakketController::class, 'edit'])->name('voedselpakket.edit');

// Route voor het updaten van een voedselpakket
Route::put('/voedselpakket/{id}', [VoedselPakketController::class, 'update'])->name('voedselpakket.update');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
