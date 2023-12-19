<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $types = ['Private','Public'];
        return [
            'title' => json_encode([
                'en' => $this->faker->catchPhrase(),
                'ar' => $this->faker->word(),
            ]),
            'url' => $this->faker->url(),
            'image' => null,
            'type' => $types[rand(0 , 1)]
        ];
    }
}
