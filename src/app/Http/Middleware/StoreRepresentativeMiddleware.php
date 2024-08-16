<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class StoreRepresentativeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $shop_id = $request->route("shop");

        if(auth()->check() && auth()->user()->is_store_representative &&
        auth()->user()->shop_id == strval($shop_id)){
            return $next($request);
        }
        return redirect(route("shop-list"));
    }
}
