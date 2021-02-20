<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class categorieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\categorie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 
            "name" => $this->faker->unique()->name,
            "icon" => "default.jpeg",
            "image" => "default.jpeg"
        ];
    }
}
