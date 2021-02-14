<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
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
            "name" => "Santé"
        ]);

        \App\Models\cities::create([
            "name" => "Electronique"
        ]);

        \App\Models\cities::create([
            "name" => "Lessive"
        ]);

    }
}
