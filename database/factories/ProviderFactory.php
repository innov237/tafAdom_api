<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\provider::class;

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
            "phone_number" => $faker->unique()->e164PhoneNumber,
            "email" => $faker->unique()->safeEmail,
        ];
    }
}
