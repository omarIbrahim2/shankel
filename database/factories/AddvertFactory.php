<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Addvert>
 */
class AddvertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => json_encode([
                'en' => $this->faker->bs(),
                'ar' => $this->faker->word(),
            ]),
            'desc' => json_encode([
                'en' => $this->faker->paragraph(2),
                'ar' => $this->faker->text(),
            ]),
            'image' => "addvertisment/img.png"
        ];
    }
}
