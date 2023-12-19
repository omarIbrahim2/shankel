<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image'=> "assets/images/logo/Shanklbig.png",
            'title' => $this->faker->sentence(),
            'aboutUs' => $this->faker->paragraph(15),
            'mission' => $this->faker->paragraph(5),
            'vision' => $this->faker->paragraph(3),
        ];
    }
}
