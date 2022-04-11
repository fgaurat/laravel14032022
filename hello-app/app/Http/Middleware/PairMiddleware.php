<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PairMiddleware
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
        $value = $request->input("value");
        if ($request->has('value')) {
            Log::debug($request);
            if ($request->input('value') % 2 == 0) {
                return redirect('/result_pair');
            } else {
                return redirect('/result_impair');
            }
        }

        return $next($request);
    }
}
