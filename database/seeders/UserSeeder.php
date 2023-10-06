<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user=User::factory()->create([
            'name' => 'Sergio Leguizamon',
            'email' => 'leguigol@hotmail.com',
            'password' => bcrypt('lancelot'),
            'centro_id' => 1
        ]);
        $user->assignRole('Admin');
        
        $user=User::factory()->create([
            'name' => 'Miguel F. Maldonado',
            'email' => 'miguel@siaconsultorios.com.ar',
            'password' => bcrypt('lancelot'),
            'centro_id' => 1
        ]);
        $user->assignRole('Admin');

    }
}
