<?php

namespace Database\Factories;
use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'password' => $this->faker->password(),
            'field' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'area_id' => $areas[rand(0 , count($areas) - 1)],
        ];
    }
}
