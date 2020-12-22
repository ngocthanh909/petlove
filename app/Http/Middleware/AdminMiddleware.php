<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('logged') == 1) {
            var_dump($request->session()->get('logged'));
            return $next($request);
        } else {
            return redirect(route('admin.login'));
        }
    }
}
