<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $faker = \Faker\Factory::create();

        for( $i=0;   $i <= 15; $i++){
            \App\Models\categorie::create([
                "name" => $faker->unique()->firstName,
                "icon" => "default.jpeg",
                "image" => "default.jpeg"
                
            ]);
        }

    }
}
