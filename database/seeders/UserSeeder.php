<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
        
        for( $i=0;   $i <= 10; $i++){
            \App\Models\User::create([
                "name" => $faker->firstName,
                "residence" => $faker->firstName,
                "prenom" => $faker->firstName,
                "telephone" => $faker->unique()->e164PhoneNumber,
                "cities_id" => rand(1,4),
                "email" => $faker->unique()->safeEmail,
                "password" => "123"
            ]);
        }
    }
}
