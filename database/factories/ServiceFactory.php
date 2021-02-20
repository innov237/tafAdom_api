<?php

namespace Database\Factories;

use App\Models\service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "name" => $faker->unique()->firstName,
            "icon" => "default.jpeg",
            "image" => "default.jpeg",
            "minimal_price" => rand(1000, 150000),
            "categorie_id" => rand(1,30),
        ];
    }
}
