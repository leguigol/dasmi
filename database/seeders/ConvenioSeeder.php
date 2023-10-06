<?php

namespace Database\Seeders;

use App\Models\Convenio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConvenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('convenios')->insert([
            'convenio_nombre' => 'CONVENIO DE PRUEBA',
        ]);  
    }      
}
