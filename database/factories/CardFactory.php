<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $usertype = ["App\models\parentt" , "App\models\teacher" , "App\models\school" ];
        return [
          //  "user_type" => $usertype[rand(0 , 2)],
        ];
    }
}
