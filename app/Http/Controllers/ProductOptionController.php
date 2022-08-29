<?php

namespace App\Http\Controllers;

use App\Models\ProductOption;
use App\Http\Requests\StoreProductOptionRequest;
use App\Http\Requests\UpdateProductOptionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductOptionController extends Controller
{
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
     * @param  \App\Http\Requests\StoreProductOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $producto)
    {
       $validator = Validator::make($request->all(), StoreProductOptionRequest::myRules(),StoreProductOptionRequest::myMessages());
                if ($validator->fails()) {

        
        return Redirect::route('dashboard.productos.edit',$producto)
              ->withErrors($validator)
              ->withInput();
        }


          $requestData= [
            "product_id"=> $producto,
            "caracteristicas" => $request->caracteristicas
        ];
        ProductOption::create($requestData);
        return Redirect::route('dashboard.productos.edit',$producto)->with("success","Su opcion se ha guardado con éxito");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductOption  $productOption
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOption $productOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductOption  $productOption
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOption $productOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductOptionRequest  $request
     * @param  \App\Models\ProductOption  $productOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ProductOption $productOption)
    {
        
        $productOption->update($request->all());
        return Redirect::route('dashboard.productos.edit',$productOption->product_id)->with("success","La opcion se ha actualizado");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductOption  $productOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOption $productOption)
    {
        $productOption->delete();
        return Redirect::route('dashboard.productos.edit',$productOption->product_id)->with("success","La opcion se ha eliminado");
    }
}
