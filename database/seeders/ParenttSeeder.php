<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Child;
use App\Models\Parentt;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParenttSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parentt::factory()->has(
            Child::factory()->count(2)
        )->count(30)->create();
    }
}
