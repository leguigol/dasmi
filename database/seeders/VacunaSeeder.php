<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vacunas')->insert([
            'edad' => 'RN',
            'vacuna' => 'BCG'
        ]);  
        DB::table('vacunas')->insert([
            'edad' => 'RN',
            'vacuna' => 'HEPATITIS B'
        ]);  

    }
}
