<?php

namespace Database\Factories;

use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {  $areas = Area::all()->pluck('id')->toArray();
        return [
            'name' => $this->faker->catchPhrase(),
            'email' => $this->faker->safeEmail(),
            'password' => $this->faker->password(),
            'image' => 'school/img.jpg',
            'phone' => $this->faker->phoneNumber(),
            'area_id' => $areas[rand(0 , count($areas) - 1)],

            'edu_system' => $this->faker->word(),
            'free_seats' => $this->faker->randomDigit(),
        ];
    }
}
