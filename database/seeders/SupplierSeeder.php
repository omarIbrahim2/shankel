<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Supplier;
use App\Models\Event;
use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::factory()->count(10)->has(
            Service::factory()->count(5)
        )->create()->each(function($supplier){
    
            $events  = Event::all()->random(rand(1 , 4))->pluck('id');
            $supplier->eventSubscribers()->attach($events);
    
          });
    }
}
