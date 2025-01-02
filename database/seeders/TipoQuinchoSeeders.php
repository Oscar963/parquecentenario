<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TipoQuinchoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $tipoQuinchos = [
            [
                'nombre' => "Unifamiliar", 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'nombre' => "Multifamiliar", 
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ];

        DB::table('tipo_quincho')->insert($tipoQuinchos);
    }
}
