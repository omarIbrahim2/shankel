<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $cities = [ "منطقة المدينة"	,"منطقة العبدلي"	,"منطقة زهران",	"منطقة بدر"	,"منطقة راس العين","منطقة المقابلين أم قصير",  "البنيات	منطقة وادي السير"	,"منطقة مرج الحمام"	,"منطقة القويسمة" , "أبو علندا","الجويدة","منطقة طارق","منطقة بسمان"	,"منطقة اليرموك"	,"منطقة تلاع العلي ام السماق خلدا","منطقة شفابدران",	"منطقة الجبيهه","منطقة صويلح","منطقة أبونصير",	"منطقة ماركا","منطقة النصر","منطقة أحد"	,"منطقة خريبة السوق"	,"منطقة بدر الجديدة"];
           
        // for ($i=0; $i < count($cities) ; $i++) { 
        //     City::create([
        //         "name" => $cities[$i],
        //       ]);
        // }
        City::factory()->has(
            Area::factory()->has(
                Province::factory()->count(5)
            )->count(3)
        )->count(5)->create();
    }
}

//         منطقة المدينة	منطقة العبدلي	منطقة زهران	منطقة بدر	منطقة راس العين	منطقة المقابلين أم قصير  البنيات	منطقة وادي السير	منطقة مرج الحمام	منطقة القويسمة  أبو علندا  الجويدة	منطقة طارق	منطقة بسمان	منطقة اليرموك	منطقة تلاع العلي ام السماق خلدا	منطقة شفابدران	منطقة الجبيهه	منطقة صويلح	منطقة أبونصير	منطقة ماركا	منطقة النصر	منطقة أحد	منطقة خريبة السوق	منطقة بدر الجديدة

