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
        
        for( $i=0;   $i <= 15; $i++){
            \App\Models\User::create([
                "name" => $faker->firstName,
                "residence" => $faker->firstName,
                "prenom" => $faker->firstName,
                "telephone" => $faker->unique()->e164PhoneNumber,
                "cities_id" => rand(1,7),
                "email" => $faker->unique()->safeEmail,
                "password" => bcrypt("password")
            ]);
        }
    }
}
