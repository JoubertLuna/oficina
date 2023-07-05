<?php

namespace Database\Seeders\Oficina\Painel;

use App\Models\Oficina\Painel\{
    Role,
    User,
};

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $RoleSuperAdministrador = Role::first()->id;
        $RoleMecanico = Role::find('2')->id;
        $RoleRecepcionista = Role::find('3')->id;

        User::create([
            'name' => 'Super Administrador - e-oficina',
            'email' => 'super@oficina.com',
            'password' => Hash::make('@super123'),
            'role_id' => $RoleSuperAdministrador,
        ]);

        User::create([
            'name' => 'Mecânico - e-oficina',
            'email' => 'mecanico@oficina.com',
            'password' => Hash::make('@mecanico123'),
            'role_id' => $RoleMecanico,
        ]);

        User::create([
            'name' => 'Recepcionista - e-oficina',
            'email' => 'recepcionista@oficina.com',
            'password' => Hash::make('@recepcionista123'),
            'role_id' => $RoleRecepcionista,
        ]);
    }
}
