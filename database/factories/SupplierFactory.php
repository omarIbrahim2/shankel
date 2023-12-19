<?php

namespace Database\Factories;
use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
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
            'password' => $this->faker->password(),
            'image' => null,
            'type' => json_encode([
                'en' => $this->faker->catchPhrase(),
                'ar' => $this->faker->word(),
            ]),
            'orgName' => json_encode([
                'en' => $this->faker->company(),
                'ar' => $this->faker->word(),
            ]),
            'area_id' => $areas[rand(0 , count($areas) - 1)],
            'status' => true,

        ];
    }
}
