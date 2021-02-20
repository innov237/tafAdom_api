<?php

namespace Database\Factories;

use App\Models\delivery_address;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = delivery_address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "quater" => $faker->city,
            "user_id" => rand(1,30),
            "city_id" => rand(1,7),
            "phone_number" => $faker->unique()->e164PhoneNumber, 
        ];
    }
}
