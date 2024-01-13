<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Role1 =  Role::create(["name" => "Administrador"]);
        $Role2 =  Role::create(["name" => "Usuario"]);
        
        Permission::create(['name' => 'admin'])->syncRoles([$Role1]);
        Permission::create(['name' => 'public'])->syncRoles([$Role1]);

    }
}
