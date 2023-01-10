<?php

namespace Database\Seeders;

use App\Models\EduSystem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EduSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EduSystem::factory()->count(5)->create();
    }
}
