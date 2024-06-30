<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsDirectie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_id == 1) {
            return $next($request);
        }

        // Redirect gebruikers die geen 'leverancier' rol hebben, pas dit aan naar je voorkeur
        return redirect('/dashboard')->with('error', 'Je hebt geen toegang tot deze pagina.');
    }
}