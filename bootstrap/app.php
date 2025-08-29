<?php

use App\Http\Middleware\IsExpert;
use App\Http\Middleware\IsUser;
use App\Http\Middleware\RedirectIfAuthenticatedUser;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(web: __DIR__ . '/../routes/web.php', commands: __DIR__ . '/../routes/console.php', health: '/up')
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias(['redirect.authenticated' => RedirectIfAuthenticatedUser::class, 'is_admin' => \App\Http\Middleware\IsAdmin::class, 'is_user' => IsUser::class, 'is_expert' => IsExpert::class]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
