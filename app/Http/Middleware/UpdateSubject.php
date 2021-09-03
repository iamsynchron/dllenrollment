<?php

namespace App\Http\Middleware;

use App\Models\StudentCourse;
use Closure;
use Illuminate\Http\Request;

class UpdateSubject
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
        if(is_null(StudentCourse::where('user_id', auth()->user()->id)->first())){
            return redirect()->route('studentsubjects');
        }
        return $next($request);
    }
}
