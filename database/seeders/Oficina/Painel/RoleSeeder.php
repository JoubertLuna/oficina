<?php

namespace Database\Seeders\Oficina\Painel;

use App\Models\Oficina\Painel\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'nome' => 'Super Administrador',
            'role' => 'Role_Super_Administrador',
        ]);
        Role::create([
            'nome' => 'Mecânico',
            'role' => 'Role_Mecanico',
        ]);
        Role::create([
            'nome' => 'Recepcionista',
            'role' => 'Role_Recepcionista',
        ]);
    }
}
