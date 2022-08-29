<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    public function __construct()
    {
       
        $this->middleware('verificar.descuento')->only('store');
        $this->middleware('update.verificar.descuento')->only('update');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOfferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $producto)
    {
        $validator = Validator::make($request->all(), StoreOfferRequest::myRules(),StoreOfferRequest::myMessages());
         if ($validator->fails()) {

        
        return Redirect::route('dashboard.productos.edit',$producto)
              ->withErrors($validator)
              ->withInput();
        }

        //StoreOfferRequest
         $requestData= [
             "product_id"=> $producto,
             "desde" => $request->desde,
             "hasta" => $request->hasta,
             "descuento" => $request->descuento
         ];
         Offer::create($requestData);
         
         return Redirect::route('dashboard.productos.edit',$producto)->with("success","Su descuento se ha aplicado a este producto");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        return dd($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfferRequest  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$producto, Offer $offer)
    {
        $offer->update($request->all());
        return Redirect::route('dashboard.productos.edit',$producto)->with("success","El descuento se ha actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
        $offer->delete();
        return Redirect::route('dashboard.productos.edit',$offer->product_id)->with("success","El descuento se ha eliminado");

    }
}
