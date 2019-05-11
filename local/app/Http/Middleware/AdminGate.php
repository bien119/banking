<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminGate
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
        if(Auth::check()) {
            $user = Auth::user();
            if($user->quyen == 1)
                return $next($request);
            return redirect('admin/login');
        }        
        return redirect('admin/login');
    }
}
