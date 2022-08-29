<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class VerificarDescuento
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
        $desde = $request->desde;
        $hasta = $request->hasta;
        $id = $request->route()->producto;
  
        $oferta = Offer::where("product_id",$id)
                  ->where( function($query) use ($desde,$hasta)  {
                    $query->whereBetween("desde",[$desde,$hasta]) ->orWhereBetween("hasta",[$desde,$hasta]);
                  }); 

         

        if(!$oferta->exists())return $next($request);
        $desde = Carbon::parse($desde);
        $hasta = Carbon::parse($hasta);
        return Redirect::route('dashboard.productos.edit',$id)->with("warning","Ya hay un descuento aplicado para este producto entre la fecha del ".$desde->format('d/m/Y')." al ".$hasta->format('d/m/Y'));

    }
}
