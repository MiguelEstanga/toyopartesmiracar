<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarui = User::create([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "ciudad" => "virtual",
            "telefono" => "1234567890",
            "cedula" => "26101877",
            "password" => bcrypt("123456789")
       ]);

       $usuarui->assignRole("SuperAdministrador");
    }
}
