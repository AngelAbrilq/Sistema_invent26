<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'role_id'    => 1,
            'name'       => 'Super',
            'apellido'   => 'Admin',
            'email'      => 'admin@invencontrol.com',
            'password'   => Hash::make('Admin1234*'),
            'telefono'   => '3000000000',
            'direccion'  => 'Oficina principal',
            'estado'     => 'activo',
            'created_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
