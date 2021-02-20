<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class providerFactory extends Factory
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
            "name" => $this->faker->unique()->firstName,
            "phone_number" => $this->faker->unique()->e164PhoneNumber,
            "email" => $this->faker->unique()->safeEmail,
        ];
    }
}
