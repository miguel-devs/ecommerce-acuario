<?php

use Inertia\Inertia;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Http\Request;

use App\Http\Controllers\ProductOptionController;
use App\Http\Controllers\dashboard\OrderController as DashboardOrderController;
use App\Http\Controllers\dashboard\ProductController as DashboardProductController;
use App\Mail\OrderShipped;

/*
Route::get("/pruebas-stripe",function(){
     $stripe = new \Stripe\StripeClient(
        Config('constants.stripe.STRIPE_SECRET')
      );

   $productoID = "prod_NOo8C7FqpPWkN2";   

   //-------- Buscar precio por producto-------------//

      //  $precio = $stripe->prices->search(['query' => 'product:\'\'prod_NOo8C7FqpPWkN2']);
    


   //---------- Buscar producto por id -----------//

     /*
     $producto = $stripe->products->retrieve(
        $productoID,
        []
      );
      return dd($producto);
      */



    //----- Actualizar producto------//

    /*$stripe->products->update(
        'prod_NOo8C7FqpPWkN2',
        ['name' => 'Pecera Acuamax con 20 galones ref']
      );*/

     //Actualizar precio de producto

     //----------- Actualizar precio por producto ---------------//
   /*
     $precio = $stripe->prices->search(['query' => 'product:\'prod_NOo8C7FqpPWkN2\'']);
     
     $precioID = $precio->data[0]->id;
     $totalprecio = 3200 * 100;

    $stripe->prices->update($precioID, ['active' => false]);

     $price = $stripe->prices->create([
        'unit_amount' => $totalprecio,
        'currency' => 'mxn',
        'product' => 'prod_NOo8C7FqpPWkN2',
        'active' => true
    ]);

    
    $stripe->products->update(
        $productoID,
        ['default_price' => $price->id ]
      );
      */

      //Realizar pago de pedido//

     /*
      $response = $stripe->paymentLinks->create([
        'line_items' => [
          [
            'price' => 'price_1LbKMDDZKIRPs7tlGl2vBc0O',
            'quantity' => 2,
          ],
        ],
      ]);


      return dd($response);

     
     
     

});
*/
Route::middleware(['verificar.email'])->group(function () {

Route::get("/",[TiendaController::class,"inicio"])->name("inicio");
Route::get("/ofertas",[ProductController::class,"filterOffersProducts"])->name("ofertas");
Route::get("/novedades",[ProductController::class,"filterNovedadesProducts"])->name("novedades");
Route::get("/marcas",[TiendaController::class,"marcas"])->name("marcas");
Route::get("/calculadora",[TiendaController::class,"calculadora"])->name("calculadora");
Route::get("/tarjetas_de_regalo",[TiendaController::class,"targetasDeRegalo"])->name("targetasDeRegalo");
Route::get("/mi-carrito",[TiendaController::class,"miCarrito"])->name("verMiCarrito");
Route::get("/datos-envio",[TiendaController::class,"datosCarrito"])->name("datosCarrito")->middleware('auth');
Route::post("/realizar-orden",[OrderController::class,"store"])->middleware('auth','verified.carrito');
Route::get("/perfil",[UserProfileController::class,"show"])->name("perfil.show")->middleware('auth');
Route::get("/mis-compras",[TiendaController::class,"misCompras"])->name('mis.compras')->middleware('auth');
Route::get("/compra/{order}",[TiendaController::class,"compra"])->name('compra')->middleware('auth');

Route::get("/tienda",[TiendaController::class,"tienda"])->name("tienda");
Route::get("/compra-completada/{order}",[OrderController::class,"show"])->name("compra.completada");
Route::get("/producto/{product}",[ProductController::class,"show"])->name("ver-producto");
Route::get("/productos/categoria/{categoria}",[ProductController::class,"filterProductsCategory"])->name("ver-productos-categoria");
Route::get("/productos/marca/{marca}",[ProductController::class,"filterProductsBrand"])->name("ver-productos-marca");
Route::get("/productos/categoria/{categoria}/marca/{marca}",[ProductController::class,"filterProductsCategoryBrand"])->name("ver-productos-categoria-marca");

Route::get("/agregar/metodo-pago",function(){
        $user = Auth::user();

        $intent = $user->createSetupIntent();
        return Inertia::render('Tienda/Perfil/Partials/AgregarMetodoPago',compact("intent"));

})->name("metodo-pago");


});




/*
Route::get('/email/detales-orden',function(){
    $orden = Order::where("id",1)->with("ordersDetail")->first();
   return (new OrderShipped($orden))->render();
       // return markdown('emails.orderShippedMail',compact("orden"));
});
*/
/*----------Rutas Dashboard-------------*/

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {



/*------------Ruta Producto---------------*/
Route::get('/dashboard/productos',[DashboardProductController::class,"index"])->name('dashboard.productos')->middleware('role:1');    
Route::get('/dashboard/producto/crear',[DashboardProductController::class,"create"])->name('dashboard.productos.create')->middleware('role:1');
Route::post('/dashboard/producto/store',[DashboardProductController::class,"store"])->name('dashboard.productos.store')->middleware('role:1');
Route::get('/dashboard/producto/{producto}/editar',[DashboardProductController::class,"edit"])->name('dashboard.productos.edit')->middleware('role:1');
Route::post('/dashboard/producto/{producto}/update',[DashboardProductController::class,"update"])->name('dashboard.productos.update')->middleware('role:1');


/*-----------Ruta opciones de producto------------*/
Route::post('/dashboard/producto/storeOpcionesProducto/{producto}',[ProductOptionController::class,"store"])->name('dashboard.producto.store.opciones')->middleware('role:1');
Route::put('/dashboard/opcion/{productOption}/update',[ProductOptionController::class,"update"])->name('dashboard.producto.update.opciones')->middleware('role:1');
Route::delete('/dashboard/opcion/{productOption}/delete',[ProductOptionController::class,"destroy"])->name('dashboard.opcion.delete')->middleware('role:1');


/*-----------Ruta descuento de producto------------*/  
Route::post('/dashboard/producto/{producto}/store/offer',[OfferController::class,"store"])->name('dashboard.productos.store.descuento')->middleware('role:1');
Route::put('/dashboard/update/producto/{producto}/offer/{offer}',[OfferController::class,"update"])->name('dashboard.update.descuento')->middleware('role:1');
Route::delete('/dashboard/delete/offer/{offer}',[OfferController::class,"destroy"])->name('dashboard.offer.delete')->middleware('role:1');

/*-----------Ruta imagenes de producto------------*/  
Route::post("/dashboard/image/producto/{producto}",[ImageController::class,"store"])->name("store.producto.images")->middleware('role:1');
Route::delete("/dashboard/image/delate",[ImageController::class,"destroy"])->name("delate.producto.image")->middleware('role:1');

/*-----------Rutas ordenes------------*/  

Route::get('/dashboard/ordenes',[DashboardOrderController::class,"index"])->name('dashboard.ordenes')->middleware('role:1');
Route::get('/dashboard/ordenes/{orden}',[DashboardOrderController::class,"show"])->name('dashboard.ordenes.show')->middleware('role:1');
Route::put('/dashboard/orden/{orden}/update/{status}',[DashboardOrderController::class,"update"])->name('dashboard.ordenes.update')->middleware('role:1');

/*----------- dashboard user -------------- */
Route::get('/dashboard/user/profile',[UserProfileController::class,"showDashboard"])->name('dashboard.user.profile')->middleware('role:1');


});
