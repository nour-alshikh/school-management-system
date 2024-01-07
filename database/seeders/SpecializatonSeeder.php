<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializatonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specializations')->delete();

        $specializations = [
            [
                'en' => 'Arabic',
                'ar' => 'لغة عربية'
            ],
            [
                'en' => 'Science',
                'ar' => 'علوم'
            ],
            [
                'en' => 'English',
                'ar' => 'لغة انجليزية'
            ],
            [
                'en' => 'Maths',
                'ar' => 'رياضيات'
            ],
        ];

        foreach ($specializations as $specialization) {
            Specialization::create(['name' => $specialization]);
        }
    }
}
