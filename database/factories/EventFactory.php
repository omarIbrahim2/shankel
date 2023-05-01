<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Area;

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
        $areas = Area::all()->pluck('id')->toArray();
        return [
            'title' => $this->faker->sentence(),
            'desc' =>$this->faker->text(),
            'area_id' => $areas[rand(0 , count($areas) - 1)],
            "start_at" => $this->faker->dateTimeBetween('now' , '+ 5 years'),
            "end_at" => $this->faker->dateTimeBetween('+ 5 years' , '+ 10 years'),
        ];
    }
}
