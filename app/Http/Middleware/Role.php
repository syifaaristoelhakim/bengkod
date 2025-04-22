<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Cek apakah user memiliki role yang sesuai
        if (Auth::user()->role !== $role) {
            abort(403, 'Kamu tidak memiliki akses ke halaman ini.');
        }

        // Lanjutkan ke request berikutnya jika lolos
        return $next($request);
    }
}
