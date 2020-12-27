<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
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
        $loginData = $request->session()->get('loginData');
        if ($loginData['logged'] ==  1) {
            return $next($request);
        } else {
            session(['msg' => 'Bạn cần đăng nhập để thực hiện chức năng này', 'code' => 2]);
            return redirect(route('user.login'));
        }
    }
}
