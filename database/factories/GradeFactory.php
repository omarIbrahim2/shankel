<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $grades = ['primary' , 'secondery' , 'Kg' , 'high'];

        return [
            'name' => json_encode([
                'en' => $grades[rand(0 , count($grades)-1)],
                'ar' =>  $this->faker->word(),
            ])
            
        ];
    }
}
