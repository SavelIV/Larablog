<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse|string
     */
    public function handle(Request $request, Closure $next): Response|string|RedirectResponse
    {
        $role = auth()->user()->role;
        if ($role != User::ROLE_ADMIN) {
            return redirect()->route(RouteServiceProvider::ADMINPANEL);
        }
        return $next($request);
    }
}
