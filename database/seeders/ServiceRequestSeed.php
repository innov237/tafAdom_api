<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceRequestSeed extends Seeder
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
            \App\Models\service_request::create([
                "data_solicitation" => $faker->date(),
                "user_id" => rand(1,16),
                "delivery_address_id" => rand(1,15),
                "service_id" => rand(1,15),
                "time_solicitation" => $faker->unixTime(),
            ]);
        }
    }
}
