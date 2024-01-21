<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesSeeder extends Seeder
{

    public function run(): void
    {
        $role1 = Role::create(['name' => "SuperAdministrador"]);
        $role2 = Role::create(['name' => "Usuario"]);

        Permission::create(['name' => "superadmin"])->assignRole($role1);
        Permission::create(['name' => "usuario"])->assignRole($role2);


    }
}
