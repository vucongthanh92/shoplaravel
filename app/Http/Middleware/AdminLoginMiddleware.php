<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AdminLoginMiddleware
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
        if(Auth::check())
        {
            if(Auth::user()->quyen == 1)
            {
                return $next($request);
            }
            else
                return redirect('admin/dangnhap');
        }
        else
            return redirect('admin/dangnhap');
        
    }
}
