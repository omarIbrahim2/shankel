<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\EduSystem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
    {  
        $areas = Area::all()->pluck('id')->toArray();
        $system = EduSystem::all()->pluck('id')->toArray();
        return [
            'name' => $this->faker->catchPhrase(),
            'email' => $this->faker->safeEmail(),
            'password' => Hash::make('123456'),
            'image' => null,
            'phone' => $this->faker->phoneNumber(),
            'area_id' => $areas[rand(0 , count($areas) - 1)],
            'establish_date' => $this->faker->date(),
            'edu_systems_id' => $system[rand(0 , count($system) - 1)],
            'free_seats' => $this->faker->randomDigit(),
            'mission' => $this->faker->paragraph(3),
            'vision' => $this->faker->paragraph(4),
        ];
    }
}
