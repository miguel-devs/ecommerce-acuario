<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Helpers\ProductDescript;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $detallesProducto = ProductDescript::descripcionProducto();

        $productos = array(array(
            "nombreProducto" => "Max E-170 LED Complete Reef System (45 Gal) - Red Sea",
            "descripcionProducto" => "Max E-170 LED Complete Reef System - Black - RedSea",
            "categorioProducto" => "1",
            "marcaProducto" => "1",
            "precioProducto" => "1849.00",
            "detalleProducto" => $detallesProducto,
            "mostrarProducto" => "si",
            "imagen" => "max-e-170-title.jpg",
        ), array(
            "nombreProducto" => "Max E-260 LED Complete Reef System (69 Gal) - Red Sea",
            "descripcionProducto" => "Max E-260 LED Complete Reef System - Black - RedSea",
            "categorioProducto" => "1",
            "marcaProducto" => "1",
            "precioProducto" => "2824.00",
            "detalleProducto" => $detallesProducto,
            "mostrarProducto" => "si",
            "imagen" => "max-e-260-title.jpg",

        ), array(
            "nombreProducto" => "RF-25-Rimless-Flat-Panel Aquarium&Stand(25 Gal)-JBJ",
            "descripcionProducto" => "RF-25-Rimless-Flat-Panel Aquarium&Stand(25 Gal)-JBJ",
            "categorioProducto" => "1",
            "marcaProducto" => "2",
            "precioProducto" => "832.50",
            "detalleProducto" => $detallesProducto,
            "mostrarProducto" => "si",
            "imagen" => "RF-25-Rimless-Flat-Panel-Aquarium-Stand.jpg",

        ));

        $categorias = Category::get();

        foreach ($categorias as $categoria) {
            for ($i = 0; $i <= 2; $i++) {

                foreach ($productos as $producto) {
                    Product::create([
                        'nombre' => $producto["nombreProducto"],
                        'descripcion' => $producto["descripcionProducto"],
                        'category_id' => $categoria->id,
                        'brand_id' => $producto["marcaProducto"],
                        'precio' => $producto["precioProducto"],
                        'detalles' => $producto["detalleProducto"],
                        'imagen' => $producto["imagen"],
                        'activo' => $producto["mostrarProducto"],
                    ]);
                }
            }
        }

    }
}
