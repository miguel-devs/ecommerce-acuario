<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ImageController extends Controller
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
     * @param  \App\Http\Requests\StoreImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$producto)
    {
          foreach($request->imagenes as  $key => $imagen ){
                 $filename = time() .$key. "." . $imagen->extension();
                 $imagen->move(public_path('imagenes/productos'), $filename);
                 $requestData = [
                    "product_id" => $producto,
                    "nombre" => $filename
                 ];
                Image::create($requestData);
          }
          
          if(count($request->imagenes) == 1){
              $mns = "La imagen se ha cargado con exito";                
          }else{
              $mns = "Las imagenes se han cargado con exito";   
          } 

       return Redirect::route('dashboard.productos.edit',$producto)->with("success",$mns);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImageRequest  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $image = Image::find($request->image); 

        $path = "imagenes/productos/".$image->nombre;
         if(File::exists($path)){
            File::delete($path);
         }
          $image->delete();

         return Redirect::route('dashboard.productos.edit',$image->product_id)->with("success","La imagen se ha eliminado con éxito");


    }
}
