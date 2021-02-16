<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DelivryAddreSeed extends Seeder
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
            \App\Models\delivery_address::create([
                "quater" => $faker->firstName,
                "user_id" => rand(1,16),
                "city_id" => rand(1,4),
                "phone_number" => $faker->unique()->e164PhoneNumber,
            ]);
        }
    }
}
