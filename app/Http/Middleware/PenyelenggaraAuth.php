<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class PenyelenggaraAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah penyelenggara sudah login
        if (!Session::has('penyelenggara_id')) {
            return redirect()->route('penyelenggara.login')
                           ->with('error', 'Silakan login terlebih dahulu');
        }

        return $next($request);
    }
}