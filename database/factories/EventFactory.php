<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'desc' =>$this->faker->text(),
            "start_at" => $this->faker->dateTimeBetween('now' , '+ 5 years'),
            "end_at" => $this->faker->dateTimeBetween('+ 5 years' , '+ 10 years'),
        ];
    }
}
