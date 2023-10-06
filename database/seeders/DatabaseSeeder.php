<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Centro;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('centros')->insert([
            'centro_nombre' => 'DASMI',
            'centro_domicilio' => 'Av. Constitucion',
            'centro_nro' => '2288',
            'centro_localidad' => 'Lujan',
            'centro_telefono' => '',
            'centro_responsable' => '',            
        ]);    

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ConvenioSeeder::class);
        $this->call(MedicoSeeder::class);
        $this->call(PlanSeeder::class);


    }
}
