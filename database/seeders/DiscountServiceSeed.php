<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DiscountServiceSeed extends Seeder
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
            \App\Models\discounted_service::create([
                "started_date" => $faker->date(),
                "end_date" => $faker->date(),
                "reduction" => rand(1,99),
                "service_id" => rand(1,15),
                
            ]);
        }
    }
}
 