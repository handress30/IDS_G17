<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('domains')->insert([
            [
                'domain' => 'Perfiles',
                'description' => 'Administrador de perfiles de usuario',
                'id_father' => 0,
            ],
            [
                'domain' => 'SuperAdministrador',
                'description' => 'Superadministrador del sistema',
                'id_father' => 1,
            ],
            [
                'domain' => 'AdministradorRecolecciones',
                'description' => 'Perfil administrador de empresas de recolección',
                'id_father' => 1,
            ],
            [
                'domain' => 'User',
                'description' => 'Perfil usuario que solicita recolección',
                'id_father' => 1,
            ],
        ]);
    }
}
