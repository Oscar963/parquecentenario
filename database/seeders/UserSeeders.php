<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 

class UserSeeders extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => "Oscar",
                'email' => "oscar.apata@municipalidadarica.cl",
                'password' => Hash::make("eATmaGeneAMi"), 
                'id_tipo_usuarios' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Oscar Apata T",
                'email' => "oscar.apata01@gmail.com",
                'password' => Hash::make("oRaDENTEdgeS"), 
                'id_tipo_usuarios' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Israel",
                'email' => "israel@gmail.com",
                'password' => Hash::make("colocolo123"), 
                'id_tipo_usuarios' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Marcelo",
                'email' => "marcelo@gmail.com",
                'password' => Hash::make("colocolo123"), 
                'id_tipo_usuarios' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('users')->insert($users);
    }
}
