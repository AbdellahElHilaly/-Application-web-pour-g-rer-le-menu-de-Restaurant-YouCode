<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUeser
{
    public function handle(Request $request, Closure $next)
    {

        if(!auth()->user()->status == 1){
            return response("the accounte not active ! ");
        }

        return $next($request);






    }
}
