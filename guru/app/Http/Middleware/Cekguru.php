<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cekguru
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // jika belum login maka lari ke url login
        // jika tidak ada session di user
        if(!$request->session()->get('id_guru'))
        {
            return redirect('/');
        }
        // selain itu (sudah login) bisa melanjutkan
        else
        {
        return $next($request);
        }
    }
}
