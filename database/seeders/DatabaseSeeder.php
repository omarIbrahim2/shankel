<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

             RoleSeeder::class,
             UserSeeder::class,
             CitySeeder::class,
             GradeSeeder::class,
             EduSystemSeeder::class,
             SchoolSeeder::class,
             SupplierSeeder::class,
            ParenttSeeder::class,
            TeacherSeeder::class,
          //  CardServiceSeeder::class,

        ]);
    }
}
