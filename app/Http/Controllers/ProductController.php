<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
   
  

    
    public function show($product)
    { 
        $productProp = Product::where("id",$product)
        ->select(["id","category_id","brand_id","nombre","descripcion","precio","detalles","imagen","activo"])
        ->where("activo", "si") 
        ->with(["productOptions","brand","category","imageProducts","offer"])->get(); 
       return Inertia::render('Tienda/VerProducto',compact("productProp"));
    }

    public function filterProductsCategoryBrand($categoria, $marca){
        
      
        $whereCategory = ["categories.url_clean",$categoria];
        $whereBrand = ["brands.url_clean",$marca];
        $where = [$whereCategory,$whereBrand,["activo", "si"]];

        $category = Category::select("nombre","url_clean")->where([$whereCategory])->get();
        $brand = Brand::select("nombre","url_clean")->where([$whereBrand])->get();

        $productos = Product::
          select("products.id as id","products.nombre","brands.nombre as nombre_marca",
          "categories.nombre as nombre_categoria","categories.url_clean as url_categoria","precio",
          "descripcion","imagen") 
        ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
        ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
        ->with("offer")

        ->where($where)->paginate(12);
        return Inertia::render('Tienda/VerProductos',compact("productos","category","brand"));

    }

    public function filterProductsCategory($categoria){
        
     
        $where = [["categories.url_clean",$categoria],["activo", "si"]];
        $category = Category::select("nombre","url_clean")->where("categories.url_clean",$categoria)->get();

        $productos = Product::
          select("products.id as id","products.nombre","brands.nombre as nombre_marca",
          "categories.nombre as nombre_categoria","categories.url_clean as url_categoria","precio","descripcion",
          "imagen") 
        ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
        ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
        ->with("offer")

        ->where($where)->paginate(12);
        return Inertia::render('Tienda/VerProductos',compact("productos","category"));

    }

    public function filterProductsBrand($marca){
        
        $where = [["brands.url_clean",$marca],["activo", "si"]];
        $brand = Brand::select("nombre","url_clean")->where("brands.url_clean",$marca)->get();
        $productos = Product::
          select("products.id as id","products.nombre","brands.nombre as nombre_marca",
          "categories.nombre as nombre_categoria","precio","categories.url_clean as url_categoria","descripcion",
          "imagen") 
        ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
        ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
        ->with("offer")
        ->where($where)->paginate(12);

        return Inertia::render('Tienda/VerProductos',compact("productos","brand"));

    }

    public function filterOffersProducts(){
    
        $productos = Product::
        select("products.id as id",
        "products.nombre","brands.nombre as nombre_marca",
        "categories.nombre as nombre_categoria","categories.url_clean as url_categoria",
        "precio","descripcion","imagen","descuento")
        ->where('activo','si') 
        ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
        ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
        ->Join('offers', 'offers.product_id', '=', 'products.id')
        ->whereDate('desde', '<=', date("Y-m-d"))
        ->whereDate('hasta', '>=', date("Y-m-d"))
        ->paginate(20);
 

        return Inertia::render('Tienda/Ofertas',compact("productos"));
    }

    public function filterNovedadesProducts(){
    
        $productos = Product::
        select("products.id as id",
        "products.nombre","brands.nombre as nombre_marca",
        "categories.nombre as nombre_categoria","categories.url_clean as url_categoria",
        "precio","descripcion","imagen")
        ->where("activo", "si") 
        ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
        ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
        ->with("offer")
        ->latest("products.created_at")
        ->take(20)
        ->get();
        return Inertia::render('Tienda/Novedades',compact("productos"));
    }

}
