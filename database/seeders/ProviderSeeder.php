<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
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
        for( $i;  i <= 10; $i++){
            \App\Models\provider::create([
                "name" => $faker->firstName,
                "phone_number" => $faker->unique()->e164PhoneNumber,
                "email" => $faker->unique()->safeEmail,
            ]);
        }
    }
}
