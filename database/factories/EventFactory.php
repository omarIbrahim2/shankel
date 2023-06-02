<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Area;
use Carbon\Carbon;

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
            'image' => "event.jpg",
            'start_date' => $this->faker->date('Y-m-d'),
            'end_date' => $this->faker->date('Y-m-d'),
            'area_id' => $areas[rand(0 , count($areas) - 1)],
            "start_time" => $this->faker->time('H:i:s' , 'now'),
            "end_time" =>$this->faker->time('H:i:s' , 'now'),
        ];
    }
}
