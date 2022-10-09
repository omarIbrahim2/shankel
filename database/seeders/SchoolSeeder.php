<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        School::factory()->count(20)->create()->each(function($school){
            

           $grades = Grade::all()->random(rand(1 , 4))->pluck('id');

           $school->grades()->attach($grades);

        });
      }
}
