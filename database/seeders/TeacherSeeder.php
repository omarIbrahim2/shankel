<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Event;
use App\Models\Lesson;
use App\Models\Notification;
use App\Models\Teacher;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::factory()->has(
            Lesson::factory()->count(10)
        )->has(
            Notification::factory()->count(2)

        // )->has(

        //     Card::factory() , "card"

        )->count(20)->create()->each(function($teachers){
    
            $events= Event::all()->random(rand(1 , 4))->pluck('id');   
            $teachers->eventSubscribers()->attach($events);
    
          });
    }
}
