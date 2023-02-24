<?php

namespace App\Http\Controllers\dashboard;

use Inertia\Inertia;
use App\Models\Brand;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductOption;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $marcas = Brand::get();
        $categorias = Category::get();

        $filtroBuscador = "";
        $filtroMarca =  "";
        $filtroCategoria = "";
        $filtroActivo = "";

        $productos = Product::
        select(["id","category_id","brand_id","nombre","descripcion","precio","detalles","imagen","activo"])
        ->with(["brand","category","offer"]);


        if (!empty(request('buscador'))) {
            $filtroBuscador = request('buscador');
            $productos = $productos->where('nombre', 'like', '%' . request('buscador') . '%');
        }
        if (!empty(request('marca'))) {
            $filtroMarca =  request('marca');

            $productos = $productos->where('brand_id',  request('marca'));
        }

        if (!empty(request('categoria'))) {
            $filtroCategoria = request('categoria');

            $productos = $productos->where('category_id',  request('categoria'));
        }
        if (!empty(request('activo'))) {
            $filtroActivo = request('activo');

            $productos = $productos->where('activo',  request('activo'));
        }
        if (!empty(request('activo'))) {
            $filtroActivo = request('activo');
            $productos = $productos->where('activo',  request('activo'));
        }

        $productos = $productos->orderBy('id', 'desc')->paginate(10)->appends(request()->query());
        return Inertia::render('Dashboard/Productos/Index',
        compact("productos","marcas","categorias","filtroBuscador","filtroMarca","filtroCategoria","filtroActivo"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $marcas = Brand::orderBy('nombre', 'asc')->get();
        $categorias = Category::orderBy('nombre', 'asc')->get();
        return Inertia::render('Dashboard/Productos/Crear',compact("categorias","marcas"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
         $validator = Validator::make($request->all(), StoreProductRequest::myRules(),StoreProductRequest::myMessages());
         if ($validator->fails()) {

        
        return Redirect::route('dashboard.productos.create')
              ->withErrors($validator)
              ->withInput();
        }

       
         $filename = time() . "." . $request->imagen->extension();

        $requestData = [
            "nombre" => $request->nombre,
            "descripcion" => $request->descripcion,
            "precio" => $request->precio,
            "brand_id" => $request->brand_id,
            "category_id" => $request->category_id,
            "detalles" => $request->detalles,
            "activo" => $request->activo,
            "imagen" => $filename
        ];

         $request->imagen->move(public_path('imagenes/productos'), $filename);
         $producto = Product::create($requestData);
         return Redirect::route('dashboard.productos.edit',$producto->id);

        
    }






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $producto)
    {
        return dd($producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        $marcas = Brand::get();
        $categorias = Category::get();
        $producto = Product::where("id",$producto)->with(["productOptions","imageProducts","productOffers"])->get(); 
        return Inertia::render('Dashboard/Productos/Editar',compact("producto","categorias","marcas"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $producto)
    {
        $validator=Validator::make($request->all(),UpdateProductRequest::myRules($request->image),UpdateProductRequest::myMessages());

         if ($validator->fails()) {
              return Redirect::route('dashboard.productos.edit',$producto)
              ->withErrors($validator)
              ->withInput();
        }

        //$producto->update($request->all());


        $requestData = [
            "nombre" => $request->nombre,
            "descripcion" => $request->descripcion,
            "precio" => $request->precio,
            "brand_id" => $request->brand_id,
            "category_id" => $request->category_id,
            "detalles" => $request->detalles,
            "activo" => $request->activo,
        ];

         if($request->imagen){
            $filename = time() . "." . $request->imagen->extension();
            $requestData['imagen'] = $filename;
            $request->imagen->move(public_path('imagenes/productos'), $filename);
            $path = "imagenes/productos/".$producto->imagen;
            if(File::exists($path)){
               File::delete($path);
            }
         }
        
         $producto->update($requestData);

        return Redirect::route('dashboard.productos.edit',$producto)->with("success","Se ha actualizado este producto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
