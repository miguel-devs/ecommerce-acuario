<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $roles = array("admin","user");

        foreach($roles as $rol){
           Role::create([
              "descripcion" =>$rol
           ]);
     
        }


    }
}
