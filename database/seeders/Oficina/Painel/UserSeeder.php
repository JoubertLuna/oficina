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
        $RoleRecepcionista = Role::find('2')->id;
        $RoleMecanico = Role::find('3')->id;
        $RoleCliente = Role::find('4')->id;

        User::create([
            'name' => 'Super Administrador - e-oficina',
            'email' => 'super@oficina.com',
            'password' => Hash::make('@super123'),
            'role_id' => $RoleSuperAdministrador,
        ]);

        User::create([
            'name' => 'Recepcionista - e-oficina',
            'email' => 'recepcionista@oficina.com',
            'password' => Hash::make('@recepcionista123'),
            'role_id' => $RoleRecepcionista,
        ]);

        User::create([
            'name' => 'Mecânico - e-oficina',
            'email' => 'mecanico@oficina.com',
            'password' => Hash::make('@mecanico123'),
            'role_id' => $RoleMecanico,
        ]);

        User::create([
            'name' => 'Cliente - e-oficina',
            'email' => 'cliente@oficina.com',
            'password' => Hash::make('@cliente123'),
            'role_id' => $RoleCliente,
        ]);
    }
}
