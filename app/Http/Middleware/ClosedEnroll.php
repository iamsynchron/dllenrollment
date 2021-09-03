<?php

namespace App\Http\Middleware;

use App\Models\other\EnrollStatus;
use Closure;
use Illuminate\Http\Request;

class ClosedEnroll
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
        if(EnrollStatus::first()->status_type == 'closed'){
            return redirect()->route('closedenroll');
        }
        return $next($request);
    }
}
