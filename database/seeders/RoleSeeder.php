<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\HasRoles;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name' => 'Admin']);
        $role2=Role::create(['name' => 'Usuario']);
        $role3=Role::create(['name' => 'Medico']);
        $role4=Role::create(['name' => 'Internacion']);
        $role5=Role::create(['name' => 'Auditor']);

        Permission::create(['name'=> 'admin.home'])->syncRoles([$role1]);

        Permission::create(['name'=> 'admin.usuarios.index'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.usuarios.create'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.usuarios.edit'])->syncRoles([$role1]);
        Permission::create(['name'=> 'admin.usuarios.destroy'])->syncRoles([$role1]);

        Permission::create(['name'=> 'turnos.ver'])->syncRoles([$role2,$role1]);
        Permission::create(['name'=> 'turnos.index'])->syncRoles([$role2]);
        Permission::create(['name'=> 'turnos.create'])->syncRoles([$role2]);
        Permission::create(['name'=> 'turnos.edit'])->syncRoles([$role2]);
        Permission::create(['name'=> 'turnos.destroy'])->syncRoles([$role2]);

        Permission::create(['name'=> 'padron.ver'])->syncRoles([$role2,$role1]);
        Permission::create(['name'=> 'padron.index'])->syncRoles([$role2]);
        Permission::create(['name'=> 'padron.create'])->syncRoles([$role2]);
        Permission::create(['name'=> 'padron.edit'])->syncRoles([$role2]);
        Permission::create(['name'=> 'padron.destroy'])->syncRoles([$role2]);

        Permission::create(['name'=> 'hc.ver'])->syncRoles([$role3,$role1]);
        Permission::create(['name'=> 'hc.index'])->syncRoles([$role3]);
        Permission::create(['name'=> 'hc.create'])->syncRoles([$role3]);
        Permission::create(['name'=> 'hc.edit'])->syncRoles([$role3]);
        Permission::create(['name'=> 'hc.destroy'])->syncRoles([$role3]);

        Permission::create(['name'=> 'auto.ver'])->syncRoles([$role2,$role1]);
        Permission::create(['name'=>'admin'])->syncRoles($role1);

        Permission::create(['name'=> 'internaciones.ver'])->syncRoles([$role4]);
        Permission::create(['name'=> 'internaciones.admin'])->syncRoles([$role1,$role5]);

    }
}
