<?php

use App\Http\Controllers\KlantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoedselPakketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\CategorieController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'Medewerker')->group(function () {
    Route::get('/voedselpakket', [VoedselPakketController::class, 'index'])->name('voedselpakket.index');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categories', CategorieController::class);
    
    // Route voor het weergeven van het overzicht van voedselpakketten
    Route::get('/voedselpakketten', [VoedselPakketController::class, 'index'])->name('voedselpakket.index');
    
    // Route voor het weergeven van het formulier om een nieuw voedselpakket aan te maken
    Route::get('/voedselpakketten/create', [VoedselPakketController::class, 'create'])->name('voedselpakket.create');
    Route::post('/voedselpakket/create', [VoedselPakketController::class, 'create'])->name('voedselpakket.create.post');
    
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
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'directie'])->group(function () {
    Route::get('/leveranciers', [LeverancierController::class, 'index'])->name('leverancier.index');
    Route::get('/leveranciers/{id}', [LeverancierController::class, 'show'])->name('leverancier.show');
    Route::get('/leveranciers/{id}/edit', [LeverancierController::class, 'edit'])->name('leverancier.edit');
    Route::put('/leveranciers/{id}', [LeverancierController::class, 'update'])->name('leverancier.update');
    Route::delete('/leveranciers/{id}', [LeverancierController::class, 'destroy'])->name('leverancier.destroy');
    Route::get('/leverancier/create', [LeverancierController::class, 'create'])->name('leverancier.create');
    Route::post('/leveranciers', [LeverancierController::class, 'store'])->name('leverancier.store');
});

Route::middleware('auth', 'directie')->group(function () {
    Route::get('/klantoverzicht', [KlantController::class, 'index'])->name('klantoverzicht');
    Route::get('/klanttoevoegen', [KlantController::class, 'create'])->name('klanttoevoegen');
    Route::post('/klant/store', [KlantController::class, 'store'])->name('klant.store');
    Route::get('/klant/{id}/edit', [KlantController::class, 'edit'])->name('klant.edit');
    Route::patch('/klant/{id}', [KlantController::class, 'update'])->name('klant.update');
    Route::delete('/klant/{id}', [KlantController::class, 'destroy'])->name('klant.delete');
});

require __DIR__.'/auth.php';
