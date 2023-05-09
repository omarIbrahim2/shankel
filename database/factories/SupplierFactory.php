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
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'password' => $this->faker->password(),
            'image' => null,
            'type' => $this->faker->name(),
            'orgName' => $this->faker->company(),
            'area_id' => $areas[rand(0 , count($areas) - 1)],
        ];
    }
}
