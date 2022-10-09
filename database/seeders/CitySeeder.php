<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::factory()->has(
            Area::factory()->has(
                Province::factory()->count(5)
            )->count(3)
        )->count(5)->create();
    }
}
