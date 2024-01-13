<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado as EstadoModel;

class Estado extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            ['estado' => 'en espera'],
            ['estado' => 'aprovado por el administrador' ]
        ];

        foreach($estados as $estado)
        {
            EstadoModel::create([
                'estados' => $estado['estado']
            ]);
        }
     
    }
}
