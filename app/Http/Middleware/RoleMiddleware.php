<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        // role
        // 0 = root  // akun untuk mengakses semuanya di aplikasi
        // 1 = admin
        // 2 = produksi
        // 3 = owner
        $user = Auth::user();
        if (!in_array($user->role, $roles)) {
            abort(403, 'MOHON MAAF ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI.');
        }
        return $next($request);
    }
}
