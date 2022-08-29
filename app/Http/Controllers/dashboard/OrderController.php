<?php

namespace App\Http\Controllers\dashboard;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Order;


class OrderController extends Controller
{
   
    public function index()
    {
       $ordenes = Order::paginate(12); 
       return Inertia::render('Dashboard/Ordenes/Index',compact("ordenes"));
    }

   
    public function show($orden)
    {
        $orden = Order::where("id",$orden)->with("ordersDetail")->first();
        return Inertia::render('Dashboard/Ordenes/Show',compact("orden"));

    }

   
    public function edit($id)
    {
        //
    }

 
    public function update(Order $orden,$status)
    {
        $orden->update([
          "status"=>$status
        ]);
         return Redirect::route('dashboard.ordenes.show',$orden->id)->with("success","Se ha actualizado el estatus de la orden");
    
    }

  
}
