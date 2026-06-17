<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id'          => 1,
                'nombre'      => 'admin',
                'descripcion' => 'Administrador del sistema con acceso total',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'id'          => 2,
                'nombre'      => 'vendedor',
                'descripcion' => 'Vendedor con acceso a compras, ventas e inventario',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'id'          => 3,
                'nombre'      => 'cliente',
                'descripcion' => 'Cliente registrado en el sistema',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}
