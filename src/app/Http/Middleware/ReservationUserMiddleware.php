<?php

namespace App\Http\Middleware;

use App\Models\Reservation;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReservationUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $reservation_id = $request->route("reservation");
        $reservation = Reservation::find($reservation_id)->where("user_id","=",auth()->user()->id)->get()->all();

        if(auth()->check() && !empty($reservation)){
            return $next($request);
        }
        return redirect(route("shop-list"));
    }
}
