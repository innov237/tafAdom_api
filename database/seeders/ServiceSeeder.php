<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for( $i;  i <= 10; $i++){
            \App\Models\provider::create([
                "name" => $faker->firstName,
                "minimal_price" => rand(1000, 50000),
                "categorie_id" => rand(1,3),
                
            ]);
        }
    }
}
