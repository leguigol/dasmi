<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('medicos')->insert([
            'medico_matricula' => '050505',
            'medico_apellido' => 'FUENTES MALDONADO',
            'medico_nombres' => 'MIGUEL',
            'medico_especialidad' => 'MEDICO DE FAMILIA',
            'medico_estado' => 'A'
        ]);  
        
    }
}
