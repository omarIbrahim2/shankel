<?php

namespace Database\Factories;
use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
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
            'name' => json_encode([
                'en' => $this->faker->name(),
                'ar' => $this->faker->word(),
            ]),
            'email' => $this->faker->safeEmail(),
            'password' => Hash::make("123456"),
            'field' => json_encode([
                'en' => $this->faker->catchPhrase(),
                'ar' => $this->faker->word(),
            ]),
            'phone' => $this->faker->phoneNumber(),
            'area_id' => $areas[rand(0 , count($areas) - 1)],
            'status' => true,
        ];
    }
}
