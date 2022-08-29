<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = array("Black","White");
        $productos = Product::get();

        foreach($productos as $producto){
              
            foreach($tipos as $tipo){
              ProductOption::create([
                'product_id' => $producto->id,
                'caracteristicas'=>$tipo,
              ]);
            }
        }
    }
}
