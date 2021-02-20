<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        return [
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            "name" => $this->faker->firstName,
            "residence" => $this->faker->firstName,
            "prenom" => $this->faker->firstName,
            "telephone" => $this->faker->unique()->e164PhoneNumber,
            "cities_id" => rand(1,7),
            "password" => bcrypt("password")
        ];
    }
}
