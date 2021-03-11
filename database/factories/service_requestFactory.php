<?php

namespace Database\Factories;

use App\Models\service_request;
use Illuminate\Database\Eloquent\Factories\Factory;

class service_requestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = service_request::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "data_solicitation" => $this->faker->date(),
            "user_id" => rand(1,30),
            "delivery_address_id" => rand(1,30),
            "service_id" => rand(1,30),
            "time_solicitation" => $this->faker->Time(),
            "solicitation_hour" => $this->faker->Time(),
            "days_remaining" => rand(1,30),
        ]; 
    }
}
