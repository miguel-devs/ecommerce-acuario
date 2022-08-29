<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products= Product::
        inRandomOrder()
        ->limit(10)
        ->get();

        foreach($products as $product){ 
             Offer::create([
                 "product_id" =>$product->id,
                 "descuento" => 40      
             ]);
        }     
         
    }
}
