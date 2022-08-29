<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Order;
use App\Mail\OrderShipped;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

use App\Helpers\TipeErrorStripe;


class OrderController extends Controller
{
    
    public function show($order){
       
      $userId = Auth::id();
      $orderProp = Order::where([["id",$order],["user_id",$userId]])->select('id','nombre','correo','telefono','created_at','total' )->get();
      $orderDetailsProp= OrderDetail::where("order_id",$order)->select("descripcion","precio","cantidad")->get();
      return Inertia::render('Tienda/OrdenCompletada',compact("orderProp","orderDetailsProp"));

    }
   
    public function store(Request $request)
    {

       try{

        $user = Auth::user();
        $datosOrden = $request->datos;
        $paymentMethod = $datosOrden["payment_method_id"];
        $total = $datosOrden["total"] * 100;  
         
         $payment = $user->charge($total, $paymentMethod, [
             'currency' => 'mxn',
             'customer' => $user->stripe_id,
             'amount' => $total,
             'description' => "Nuevo pago recibido",
          ]);
          $payment = $payment->asStripePaymentIntent();

        $order = Order::create([
           "user_id" => $user->id,
           'transaction_id' => $payment->charges->data[0]->id,
           "nombre" =>$datosOrden["nombre"],
           "correo" => $datosOrden["correo"],
           "telefono" => $datosOrden["telefono"],
           "calle" => $datosOrden["calle"],
           "noExterior" => $datosOrden["noExterior"],
           "noInterior" => $datosOrden["noInterior"],
           "cp" => $datosOrden["cp"],
           "colonia" => $datosOrden["colonia"],
           "municipioDelegacion" => $datosOrden["municipioDelegacion"],
           "estado" => $datosOrden["estado"],
           "nombrePersonaRecibir" => $datosOrden["nombrePersonaRecibir"],
           "total" => $datosOrden["total"],
        ]);   
        
         $carritoProductos = $datosOrden["carrito"];

         foreach($carritoProductos as $carritoProducto){
            $tipoProducto = (isset($carritoProducto["tipoProductoId"]))?$carritoProducto["tipoProductoId"]:"";
            $caracteristicas = (isset($carritoProducto["descripcionTipoProducto"]))?$carritoProducto["descripcionTipoProducto"]:"";
            $descripcionproducto = $carritoProducto["nombre"];
            if($caracteristicas){
               $descripcionproducto = $descripcionproducto." / ".$caracteristicas;
            }
    
            $total = number_format($carritoProducto["precio"] * $carritoProducto["cantidad"],2, '.', '');
  

            $orderdetail = OrderDetail::create([
                 'order_id'=>$order->id,
                 'product_id'=>$carritoProducto["id"],
                 'product_option_id'=>$tipoProducto,
                 'descripcion' => $descripcionproducto,
                 'precio'=>$total,
                 'cantidad'=>$carritoProducto["cantidad"]
              ]);
         }    

         Mail::to($request->user())->send(new OrderShipped($order));
         return redirect()->route('compra.completada', ['order' => $order->id]); 
     

      }catch (\Exception $e) { 
            $error = ($e->getDeclineCode())? $e->getDeclineCode() : $e->getStripeCode() ;
            $descripcionError = TipeErrorStripe::messageError($error);
            return redirect()->back()->withErrors(['stripe'=>$descripcionError]);
            // $error = $e->getDeclineCode();
            //return dd($descripcionError);
            //return redirect()->back()->with('errorStripe', $e->getMessage())->withErrors(['stripe'=>$e->getMessage()]);
            //return redirect()->back()->withErrors(['stripe'=>$e->getMessage()]);
      }

               


      
       
    

      }

  
  
}
