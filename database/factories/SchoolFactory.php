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
        $types = ['Center' ,'School' ,'KG'];
        return [
            'name' => json_encode([
                'en' => $this->faker->catchPhrase(),
                'ar' => $this->faker->word(),
            ]),
            'email' => $this->faker->safeEmail(),
            'password' => Hash::make('123456'),
            'image' => null,
            'phone' => $this->faker->phoneNumber(),
            'area_id' => $areas[rand(0 , count($areas) - 1)],
            'establish_date' => $this->faker->date(),
            'edu_systems_id' => $system[rand(0 , count($system) - 1)],
            'free_seats' => $this->faker->randomDigit(),
            'mission' => json_encode([
                'en' => $this->faker->paragraph(3),
                'ar' => $this->faker->sentence(3),
            ]),
            'vision' => json_encode([
                'en' => $this->faker->paragraph(3),
                'ar' => $this->faker->sentence(3),
            ]),
            'desc' => json_encode([
                'en' => $this->faker->paragraph(4),
                'ar' => $this->faker->sentence(3),
            ]),

            'type' => $types[rand(0 , count($types) - 1)],
            'status' => true,
        ];
    }
}
