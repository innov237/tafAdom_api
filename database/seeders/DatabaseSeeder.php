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
            CitySeeder::class,
        ]);
        
        \App\Models\User::factory(30)->create();
        \App\Models\provider::factory(30)->create();
        \App\Models\categorie::factory(30)->create();
        \App\Models\service::factory(30)->create();
        \App\Models\delivery_address::factory(30)->create();
        \App\Models\service_request::factory(30)->create();
        \App\Models\delivery_services_request::factory(30)->create();
        \App\Models\service_provider::factory(30)->create();
        \App\Models\discounted_service::factory(30)->create();
        \App\Models\delivery_request_review::factory(30)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
 
