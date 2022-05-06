<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class CustomSanctumGuard
{
    public function handle($request, Closure $next)
    {
        if (Str::startsWith($request->getRequestUri(), '/api/admin/')) {
            config(['sanctum.guard' => 'admin']);
        } elseif (Str::startsWith($request->getRequestUri(), '/api/voter/')) {
            config(['sanctum.guard' => 'voter']);
        }

        return $next($request);
    }
}
