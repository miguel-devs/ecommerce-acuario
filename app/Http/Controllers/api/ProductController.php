<?php

namespace App\Http\Controllers\api;

use App\Models\OrderDetail;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function searchProduct($nombre){
        $productos = Product::
            select("products.id as id", "products.nombre", "brands.nombre as nombre_marca",
             "categories.nombre as nombre_categoria", "precio", "descripcion", 
             "imagen")
            ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->with("offer")
            ->where([["products.nombre", "like", "{$nombre}%"], ["activo", "si"]])
            ->orWhere("brands.nombre", "like", "{$nombre}%")
            ->orWhere("categories.nombre", "like", "{$nombre}%")
            ->limit(5)
            ->get();
        
            return $productos;
    }

    public function randomProducts($cantidad){
        $result = Product::
        select("products.id as id", "products.nombre", "brands.nombre as nombre_marca","brands.url_clean as url_marca", "categories.nombre as nombre_categoria","categories.url_clean as url_categoria", "precio", "descripcion", "imagen")
        ->leftJoin('brands', 'brands.id', '=', 'products.brand_id')
        ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
        ->with("offer")

        ->where('activo','si')
        ->inRandomOrder()

        ->limit($cantidad)
        ->get();
        return $result;
    }

    public function moreSaleProducts($limit){
        $result = OrderDetail::
        selectRaw('count(id) as number_of_orders, product_id')
        ->groupBy('product_id')->with("productOrder")->limit($limit)->get();
        return $result;
    }

    public function categoryRandomProducts(){
       
        $where = [1,40,55,56,8,41,2];

        $result = Product::whereIn("category_id",$where)
        ->selectRaw("id,category_id,brand_id,nombre,imagen,activo,count(category_id) as total")
        ->where("activo", "si") 
        ->groupBy('category_id')
        ->inRandomOrder()
        ->with(["brand","category"])
        ->get();

        return $result;
    }
}
