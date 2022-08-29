<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = Product::get();
        $imagenes = array(
            "max-e-170-title.jpg",
            "max-e-170-black.jpg",
            "max-e-170-white.jpg",
            "max_sump_new_2.jpg",
            "max-e-chiller_2.jpg"
        );

        foreach($productos as $producto){
            foreach($imagenes as $imagen){
            Image::create([
                'product_id' => $producto->id,
                'nombre'=>$imagen,
              ]);
            }  
        }

    }
}
