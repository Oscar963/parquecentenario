<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuinchoSeeders extends Seeder
{
    public function run()
    {
        $quinchos = [
            [
                'numero_quincho' => 1, 
                'descripcion' => "Descripción para quincho 1", 
                'accesibilidad' => "Sí", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 2, 
                'descripcion' => "Descripción para quincho 2", 
                'accesibilidad' => "Sí", 'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 3, 
                'descripcion' => "Descripción para quincho 3", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 4, 
                'descripcion' => "Descripción para quincho 4", 
                'accesibilidad' => "Sí", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 5, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 6, 
                'descripcion' => "Descripción para quincho 6", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 7, 
                'descripcion' => "Descripción para quincho 7", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 8, 
                'descripcion' => "Descripción para quincho 8", 
                'accesibilidad' => "Sí", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 9, 
                'descripcion' => "Descripción para quincho 6", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 10, 
                'descripcion' => "Descripción para quincho 7", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 11, 
                'descripcion' => "Descripción para quincho 8", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 12, 
                'descripcion' => "Descripción para quincho 9", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 13, 
                'descripcion' => "Descripción para quincho 10", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 14, 
                'descripcion' => "Descripción para quincho 11", 
                'accesibilidad' => "Sí", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 15, 
                'descripcion' => "Descripción para quincho 12", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 16, 
                'descripcion' => "Descripción para quincho 13", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 17, 
                'descripcion' => "Descripción para quincho 14", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 18, 
                'descripcion' => "Descripción para quincho 15", 
                'accesibilidad' => "Sí", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 19, 
                'descripcion' => "Descripción para quincho 16", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 20, 
                'descripcion' => "Descripción para quincho 17", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 21, 
                'descripcion' => "Descripción para quincho 18", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 22, 
                'descripcion' => "Descripción para quincho 19", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 23, 
                'descripcion' => "Descripción para quincho 20", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 24, 
                'descripcion' => "Descripción para quincho 21", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 25, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 26, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 27, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 28, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 29, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 30, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "Sí", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'numero_quincho' => 31, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 32, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 33, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 34, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 35, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "Sí", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 36, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 37, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 38, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 39, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 40, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "Sí", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 41, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 42, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 43, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 44, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 45, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 46, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "Sí", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 47, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 48, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 49, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "Sí", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 50, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 51, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 52, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 53, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 1, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 54, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 2, 
                'created_at' => now(), 
                'updated_at' => now()],
            [
                'numero_quincho' => 55, 
                'descripcion' => "Descripción para quincho 5", 
                'accesibilidad' => "No", 
                'id_tipo_quincho' => 2, 
                'created_at' => now(), 
                'updated_at' => now()],
        ];

        DB::table('quinchos')->insert($quinchos);
    }
}
