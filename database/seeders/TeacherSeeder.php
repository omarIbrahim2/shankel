<?php

namespace Database\Seeders;

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
            Lesson::factory()->count(2)
        )->has(
            Notification::factory()->count(2)
        )->count(20)->create();
    }
}
