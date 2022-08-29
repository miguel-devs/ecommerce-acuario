<?php

namespace App\Http\Controllers\api;

use App\Models\Order;
use App\Mail\OrderShipped;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class StripeController extends Controller
{
    
    public function realizarPago(Request $request){


        try{

            $user = Auth::user();
            return dd($user);

    
            $paymentMethod = $request->payment_method_id;
            $total = $request->total * 100;  
             
             $payment = $user->charge($total, $paymentMethod, [
                 'currency' => 'mxn',
                 'customer' => $user->stripe_id,
                 'amount' => $total,
                 'description' => "Nuevo pago recibido",
              ]);
    
    
            $order = Order::create([
               "user_id" => $user->id,
               "nombre" =>$request->nombre,
               "correo" => $request->correo,
               "telefono" => $request->telefono,
               "calle" =>$request->calle,
               "noExterior" => $request->noExterior,
               "noInterior" => $request->noInterior,
               "colonia" => $request->colonia,
               "municipioDelegacion" => $request->municipioDelegacion,
               "estado" => $request->estado,
               "nombrePersonaRecibir" => $request->nombrePersonaRecibir,
               "total" => $request->total,
            ]);   
            
             $carritoProductos = $request->carrito;
    
             foreach($carritoProductos as $carritoProducto){
               
                $tipoProducto = (isset($carritoProducto->tipoProductoId))?$carritoProducto->tipoProductoId:"";
                $caracteristicas = (isset($carritoProducto->descripcionTipoProducto))?$carritoProducto->descripcionTipoProducto:"";
                $descripcionproducto = $carritoProducto->nombre;
                if($caracteristicas){
                   $descripcionproducto = $descripcionproducto." / ".$caracteristicas;
                }
        
                $total = number_format($carritoProducto->precio * $carritoProducto->cantidad ,2, '.', '');
      
    
                $orderdetail = OrderDetail::create([
                     'order_id'=>$order->id,
                     'product_id'=>$carritoProducto->id,
                     'descripcion' => $descripcionproducto,
                     'precio'=>$total,
                     'cantidad'=>$carritoProducto->cantidad
                  ]);
             }    
    
             Mail::to($request->user())->send(new OrderShipped($order));
             return redirect()->route('compra.completada', ['order' => $order->id]); 
    
          }catch(\Exception $exception){
    
            return response()->json(['message' => $exception->getMessage()]);

              //return redirect()->route('datosCarrito')->withErrors(['message' => $exception->getError()->message]);
    
    
          }
                   
    }
}
