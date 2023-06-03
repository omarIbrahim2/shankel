<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->bs(),
            'price' => $this->faker->randomFloat(2,50,5000),
            'quantity'=> $this->faker->randomNumber(3),
            'desc' => $this->faker->text(),
        ];
    }
}
