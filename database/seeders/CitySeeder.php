<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\cities::create([
            "name" => "Yaoundé"
        ]);

        \App\Models\cities::create([
            "name" => "Douala"
        ]);

        \App\Models\cities::create([
            "name" => "Ngaoundéré"
        ]);

        \App\Models\cities::create([
            "name" => "Bamenda"
        ]);
    }
}
