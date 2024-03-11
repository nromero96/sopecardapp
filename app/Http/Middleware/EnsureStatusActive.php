<?php

namespace App\Http\Middleware;

use Closure;

class EnsureStatusActive
{
    public function handle($request, Closure $next)
    {
        // Aquí puedes agregar la lógica para verificar si el usuario está activo
        // Si el usuario no está activo, puedes redirigirlo a otra página o lanzar una excepción

        return $next($request);
    }
}
