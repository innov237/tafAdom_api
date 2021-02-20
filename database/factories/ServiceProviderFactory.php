<?php

namespace Database\Factories;

use App\Models\service_provider;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = service_provider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "id_service" => rand(1,30),
            "id_provider" => rand(1,30),
        ];
    }
}
