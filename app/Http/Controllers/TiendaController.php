<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Inertia\Inertia;
use App\Models\Order;

use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inicio(){
        return Inertia::render('Tienda/Inicio');
    }
   
    public function novedades(){
        return Inertia::render('Tienda/Novedades');
    }
    public function marcas(){
        return Inertia::render('Tienda/Marcas');
    }
    public function calculadora(){
        return Inertia::render('Tienda/Calculadora');
    }
    public function targetasDeRegalo(){
        return Inertia::render('Tienda/TarjetasDeRegalo');
    }
    public function miCarrito(){
        return Inertia::render('Tienda/Carrito');
    }
    public function datosCarrito(Request $request){
       //  $user = Auth::user();
        // $intent = $user->createSetupIntent();
          /*
          $payment = $request->user()->pay(
                 1400*100
           );
             $intent = [
                 'clientSecret' => $payment->client_secret,
             ];
           */
         return Inertia::render('Tienda/DatosEnvio');
    }
    public function ordenCompletada(){
        return Inertia::render('Tienda/ordenCompletada');
    }
    public function tienda(){
        $productos = Product::
        select("products.id as id",
        "products.nombre","brands.nombre as nombre_marca",
        "categories.nombre as nombre_categoria",
        "precio","descripcion","imagen")
        ->where('activo','si') 
        ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
        ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
        ->with("offer")
        ->paginate(12);
        return Inertia::render('Tienda/Tienda',compact("productos"));
    }


    public function misCompras(){

        $user = Auth::user();
        $ordenes = Order::where('user_id',$user->id)->paginate(5);
        return Inertia::render('Tienda/MisCompras',compact("ordenes"));

    }

    public function compra($order){

      $userId = Auth::id();
      $orderProp = Order::where([["id",$order],["user_id",$userId]])->select('id','nombre','correo','telefono','created_at','total' )->get();
      $orderDetailsProp= OrderDetail::where("order_id",$order)->select("descripcion","precio","cantidad")->get();
      return Inertia::render('Tienda/Compra',compact("orderProp","orderDetailsProp"));


    }
    
}
