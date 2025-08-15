<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class UserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        app('session')->start();
        $excludedRoutes = [
            // 'test',
            
            'monarchy/login',
            'monarchy/login/submit',  // in case of any sub-routes
            'monarchy/login/forgot-password',
            'monarchy/login/*',
            'logout',
            'monarchy/registration',
            'monarchy/registration/submit',
        ];
        if ($request->is($excludedRoutes)) 
        {
            return $next($request);
        }
        if(session()->has('login-time'))
        {
            if(session('login-time')->diffInMinutes(now())>=5)
            {
                session()->forget(['login','login-time']);
            }
        }
        if(!session()->has('login'))
        {
            auth()->logout();
            return redirect()->route('login');
                
        }
        
        return $next($request);
    }
}
