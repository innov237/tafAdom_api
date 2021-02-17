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
        $faker = \Faker\Factory::create();

        for( $i=0;   $i <= 15; $i++){
            \App\Models\service::create([
                "name" => $faker->unique()->firstName,
                "icon" => "default.jpeg",
                "image" => "default.jpeg",
                "minimal_price" => rand(1000, 150000),
                "categorie_id" => rand(1,15),
                
            ]);
        }
    }
}
