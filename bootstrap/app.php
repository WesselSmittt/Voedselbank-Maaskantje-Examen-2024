<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        health: '/up'
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            // Voeg hier je andere middleware toe
            'Medewerker' => IsMedewerker::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
