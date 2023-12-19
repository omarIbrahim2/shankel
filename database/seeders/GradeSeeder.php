<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Grade;
use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::factory()->count(4)->create();

    }
}
