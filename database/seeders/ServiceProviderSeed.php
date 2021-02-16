<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceProviderSeed extends Seeder
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
            \App\Models\service_provider::create([
                "id_service" => rand(1,15),
                "id_provider" => rand(1,15),
                
            ]);
        }
    }
}
