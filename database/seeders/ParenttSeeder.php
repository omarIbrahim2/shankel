<?php

namespace Database\Seeders;
use App\Models\Event;
use App\Models\Notification;
use App\Models\Child;
use App\Models\Parentt;
use App\Models\School;
use App\Models\Service;
use App\Models\Supplier;
use App\Models\Transaction;
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
        $school = School::factory()->create();
        Parentt::factory()->has(
            Child::factory()->count(rand(1,3))
        )->has(
            Notification::factory()->count(2)
        )->count(30)->create();
    }
}
