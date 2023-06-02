<?php

namespace Database\Seeders;

use App\Models\Addvert;
use App\Models\Card;
use App\Models\Event;
use App\Models\Grade;
use App\Models\Notification;
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

      School::factory()->count(20)->has(
        Notification::factory()->count(2)
      )->has(
        Event::factory()->count(3)
      )->has(

          Card::factory() , 'card'
      )->create()->each(function($school){


        $grades = Grade::all()->random(rand(1 , 4))->pluck('id');

        $school->grades()->attach($grades);

      });




    }
}
