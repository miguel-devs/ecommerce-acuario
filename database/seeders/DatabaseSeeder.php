<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
/*
        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            ProductOptionSeeder::class,
            ImageSeeder::class,
            RoleSeeder::class,
            OfferSeeder::class
        ]);
*/
        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
