<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Child>
 */
class ChildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $grades = Grade::all()->pluck('id')->toArray();
        $randomGradeId =  $grades[rand(0, count($grades) - 1)] ;

        $gene = ['male' , 'female'];
        return [
            'name' => $this->faker->name(),
            'age' => $this->faker->randomDigit(),
            'gender' => $gene[rand(0 , 1)],
            'grade_id' => $randomGradeId,
            //'school_id' =>$schools[rand(0, count($schools) - 1)] ,
            'birth_date' => $this->faker->date(),
        ];
    }
}
