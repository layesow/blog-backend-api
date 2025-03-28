<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Ajouter Sanctum pour la gestion des requêtes frontend
        $middleware->append(EnsureFrontendRequestsAreStateful::class);
        $middleware->append(HandleCors::class); // Ajoute le middleware CORS

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
