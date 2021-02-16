<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DelivryRequestReviewSeed extends Seeder
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
        
        for( $i=0;   $i <= 20; $i++){
            \App\Models\delivery_request_review::create([
                "mark" => rand(1,16),
                "delivery_request_id" => rand(1,16),
            ]);
        }
    }
}
