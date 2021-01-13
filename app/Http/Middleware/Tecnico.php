<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Tecnico
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        if(($path == "/" || $path == "usuario" || $path == "empresa" || $path == "inventario_vehiculo" || $path == "ficha" || $path == "usuario/create" || $path == "inventario_vehiculo/create") && (Auth::check() && Auth::user()->rol == 'TECNICO'))
        {
            return redirect('/registro');
        }
        return $next($request);
    }
}
