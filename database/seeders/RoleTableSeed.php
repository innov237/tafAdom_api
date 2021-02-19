<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['label' => 'Root', 'rank' => 1000],
            ['label' => 'Admin', 'rank' => 100],
            ['label' => 'User', 'rank' => 10]
        ];

        Role::insert($data);
    }
}
