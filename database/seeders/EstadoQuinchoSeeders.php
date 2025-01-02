<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoQuinchoSeeders extends Seeder
{
    
    public function run()
    {
        $estadoQuincho = [
            [
                'Estado' => "Disponible", 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'Estado' => "Reservado", 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'Estado' => "Ocupado", 
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ];

        DB::table('estado_quinchos')->insert($estadoQuincho);
    }
}
