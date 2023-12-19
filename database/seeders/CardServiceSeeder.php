<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $cards = Card::all();

         $services = Service::all()->pluck('id')->toArray();

         foreach($cards as $card){
            $card->services()->attach(array_rand($services , 5));
         }
    }
}
