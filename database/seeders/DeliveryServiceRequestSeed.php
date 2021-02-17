<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DeliveryServiceRequestSeed extends Seeder
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
            \App\Models\delivery_services_request::create([
                "amout" => rand(1,100000),
                "status" => rand(1,2),
                "service_request_id" => rand(1,15),
                "delivery_address_id" => rand(1,15),
                "provider_id" => rand(1,15),
                
            ]);
        }
    }
}
