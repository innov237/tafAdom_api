<?php

namespace Database\Factories;

use App\Models\delivery_request_review;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryRequestReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = delivery_request_review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "mark" => rand(1,16),
            "delivery_request_id" => rand(1,16),
        ];
    }
}
