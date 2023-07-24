<?php

namespace Database\Seeders;

use App\Models\shanklPrice;
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
       shanklPrice::create([
        'seat_price' => 200,
       ]); 
    }
}
