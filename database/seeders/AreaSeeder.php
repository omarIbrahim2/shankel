<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //   $areas = [
      //       23=> [
      //       "الصويفية",
      //       "السهل",
      //       "الرونق",
      //       "وداي السير",
      //       "الكرسي",
      //      "الجندويل",
      //      "الروابي",
      //     "الصناعة",
      //      "أم أذينة الغربي",
      //       "حي الصنوبر",
      //       "ضاحية الأمير راشد",
      //      " عراق الأمير",
      //      "النخيل",
      //     "أم السوس",
      //     "البيادر",
      //       "أم السماق الشمالي",
      //       "أم السماق الجنوبي",
            
      //   ],
      //     7 =>[
      //      "التقوى",
      //      " الايمان",
      //       "الاحسان",
      //      " الوفاء",
      //       "جاوا الجنوبي",
      //       "الطيبة وخريبة السوق",
      //       "قباء",
      //      " الصفاء",
      //       "الربيع",
      //      " الأبرار",
      //       "اليادودة",
      //      "الأندلس",
      //       "غمدان",
      //       "الهداية",
      //       "الفرقان",
      //      "أم الكندم",
      //       "المجد",
      //      "الأمل",
            
      //   ],


      //  ];

      //  foreach($areas as $area => $vals){

      //     for ($i=0; $i < count($vals) ; $i++) { 
      //        Area::updateOrCreate([
      //           "city_id" => $area,
      //           "name" => $vals[$i],
      //         ]);
      //     }
      //  }
    }
}
