<?php

namespace Database\Factories;

use App\Models\discounted_service;
use Illuminate\Database\Eloquent\Factories\Factory;

class discounted_serviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = discounted_service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "started_date" => $this->faker->date(),
            "end_date" => $this->faker->date(),
            "reduction" => rand(1,99),
            "service_id" => rand(1,30),
        ];
    }
}
