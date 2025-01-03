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
            ]
        ];

        DB::table('users')->insert($users);
    }
}
