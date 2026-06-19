<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// On Vercel, only /tmp is writable. Redirect storage there.
if (isset($_SERVER['VERCEL']) || isset($_ENV['VERCEL'])) {
    $tmpStorage = '/tmp/storage';
    foreach ([
        $tmpStorage,
        $tmpStorage . '/app',
        $tmpStorage . '/app/public',
        $tmpStorage . '/framework',
        $tmpStorage . '/framework/cache',
        $tmpStorage . '/framework/cache/data',
        $tmpStorage . '/framework/sessions',
        $tmpStorage . '/framework/views',
        $tmpStorage . '/logs',
    ] as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
    }
}

return Application::configure(basePath: dirname(__DIR__))
    ->useStoragePath(
        (isset($_SERVER['VERCEL']) || isset($_ENV['VERCEL']))
            ? '/tmp/storage'
            : dirname(__DIR__) . '/storage'
    )
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
            'guest' => \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class,
            'role' => \App\Http\Middleware\CheckRole::class,  
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
