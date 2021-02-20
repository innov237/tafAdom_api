<?php

namespace Database\Factories;

use App\Models\delivery_services_request;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = delivery_services_request::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 
            "amout" => rand(1,100000),
            "status" => rand(1,2),
            "service_request_id" => rand(1,30),
            "delivery_address_id" => rand(1,30),
            "provider_id" => rand(1,30),
        ];
    }
}
