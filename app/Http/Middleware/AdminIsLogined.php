<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminIsLogined
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $username = $request->session()->get('username');
        if(!empty($username)){
            // da tung dang nhap
            // mac dinh vao trang dashboard
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
