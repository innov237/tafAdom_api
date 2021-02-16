<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

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
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        $this->call([
            /*CitySeeder::class,
            UserSeeder::class,
            ProviderSeeder::class,
            CategorieSeeder::class,
            ServiceSeeder::class,
            

            DelivryAddreSeed::class,
            ServiceRequestSeed::class,
            DeliveryServiceRequestSeed::class,
            ServiceProviderSeed::class,
            DiscountServiceSeed::class */
            DelivryRequestReviewSeed::class

        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
 