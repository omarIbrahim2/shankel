<?php

namespace Database\Seeders;

use App\Models\ShanklPrice;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolSeatPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       ShanklPrice::create([
        'seat_price' => 200,
       ]); 
    }
}
