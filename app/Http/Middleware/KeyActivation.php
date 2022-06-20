<?php

namespace App\Http\Middleware;

use App\Models\KeyActivation as ModelsKeyActivation;
use Closure;
use Illuminate\Http\Request;

class KeyActivation
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
        $modelKey = ModelsKeyActivation::find(1);

        if (date('Y-m-d') >= substr(base64_decode($modelKey->key), 4, 10)) {
            return redirect('/key-activation');
        }

        return $next($request);
    }
}
