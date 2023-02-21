<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Helpers\CustomUrl;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcas = array(
          'Red Sea','JBJ','Boyu','Lomas','Ice Cap','Reef Octopus','EcoTech Marine',
          'Neptune Systems','Kessil','Aquamax','Maxspect','Orphek','Coral Box',
          'Innovative Marine','Maxi-Jet','Maxspect Gyre','Jebao','Sicce','Eheim',
          'Lifegard','Iwaki','ReeFlo','Bulkheads','Lockline','Tropic Marin','Aquaforest',
          'Instant Ocean','Reef Crystals','Coralife','Red Sea Coral Pro','Red Sea Mix',
          'Jets de regreso','Brightwell','Bulk reef supply','Spectrum','Reef Nutrition',
          'Ocean Nutrition','Hikari','Two Little Fishies','Brightwell Aquatics','Tetra',
          'Seachem','Nyos','Tubería','Válvula','AquaIllumination','Royal Exclusiv','Bubble Magus',
          'Hydor','Eshopps','Tunze','Ultra Reef'
        );
       
       
       
        foreach($marcas as $marca){
              Brand::create([
                "nombre"=>$marca,
                'url_clean'=>CustomUrl::urlClean(CustomUrl::convertAccentedCharacters($marca), '-', true)

              ]);
        }
    }
}
