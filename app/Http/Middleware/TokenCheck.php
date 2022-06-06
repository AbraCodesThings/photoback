<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenCheck
{
    /**
     * Handle an incoming request. Checks the damn token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

      /*TODO: make this middleware actually useful.
                For fuck's sake, the secret word is in plain text here.
      */
      if($request->input('token') !== 'megatoken666') {
        return redirect('test');
      }

        return $next($request);
    }
}
