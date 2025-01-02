<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuarioSeeders extends Seeder
{
    
    public function run()
    {
        $tipoUsuarios = [
            [
                'nombre' => "Reserva", 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'nombre' => "Cajero", 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'nombre' => "Gratuidad", 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'nombre' => "Admin", 
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ];

        DB::table('tipo_usuarios')->insert($tipoUsuarios);
    }
}
