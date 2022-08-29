<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Helpers\CustomUrl;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*---Acuarios y Sumps---*/
        $categorias = array("Acuarios","Sumps");
        
         /*---Iluminacion---*/
        array_push($categorias, "LED");

         /*---Bombas y Promeria---*/
        array_push($categorias,"Cabezas de Poder","Bombas Sumergibles","Bombas Externas","Plomeria");

         /*----Aditivos---*/
        array_push($categorias,"Calcio, alcalinidad y magnesio","Trace Elements","Nutrición coralina","Biofiltración & Control de nutrientes","Kalkwasser","Oligoelementos");

         /*---Osmosis Inversa---*/
        array_push($categorias,"Sistemas de ósmosis inversa","Sistemas RO/DI de 4 etapas","Sistemas RO/DI de 5 etapas",
        "Sistemas RO/DI de 6 etapas","Sistemas RO/DI de 7 etapas","Membranas de ósmosis inversa","Accesorios de ósmosis inversa",
        "Bombas de refuerzo y accesorios","Monitores, medidores y controladores","Kits de actualización","Accesorios OI"
        );
        

         /*----Kits de Prueba -> Pendiente---*/
        array_push($categorias,"Kits multiparamétricos", "Kits alcalinidad","kits calcio","kits Magnesio",
        "Kits Fosfato","Kits Nitrato y nitrito","Kits Amoníaco","Kits pH","Oligoelementos menores",
        "Controladores y monitores","Kits de prueba", );
       /* 
       Neptune Systems Apex
       CoralVue Hidros
       Milwaukee
       Pinpoint
       Tunze*/



        /*----Hidrómetros y Refractómetros---*/
        array_push($categorias,"Marine Water Hanna Checkers","Accesorios y estándares", "Sondas y accesorios del controlador","Temporizadores");
       
        /*----Sal y Mantenimiento---*/
        array_push($categorias,"Sal","Calcetines filtrantes","Limpiadores de cristal y acrílico","Medicamentos","Redes","Pinzas","Trampas");

        /*---Skimmers, Reactores y Filtración -> Pendiente ---*/

        array_push($categorias,"Skimmers Internos","Skimmers Externos","Filtracion","Reactores");

        /*--- Calentadores y Chillers --*/
        array_push($categorias,"Calentadores", "Chillers", "Ventiladores", "Termómetros y Controladores");

            
        /*--- Alimentos para peces y corales --*/

        array_push($categorias, "Alimentos para peces","Alimentos para Corales");


            
            
            
            


            

           
        
        
        foreach($categorias as $categoria){
            Category::create([
                'nombre'=>$categoria,
                'url_clean'=>CustomUrl::urlClean(CustomUrl::convertAccentedCharacters($categoria), '-', true)
            ]);
        }
    }
}
