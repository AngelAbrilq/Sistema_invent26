<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,  // Primero roles (users depende de roles)
            AdminSeeder::class, // Luego el super admin
        ]);
    }
}
