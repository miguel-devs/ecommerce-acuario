<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Helpers\CustomUrl;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = array("Ofertas","Novedades","Marcas","Calculadora","Tarjetas de regalo");
        foreach($links as $link){

            Link::create([
                'nombre' => $link,
                'url_clean'=>CustomUrl::urlClean(CustomUrl::convertAccentedCharacters($link), '_', true)
            ]);

        }
    }
}
