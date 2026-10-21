<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Forzamos la inclusión de la contraseña en los datos mapeados
        $adminData = array_merge(
            User::factory()->make([
                'name' => 'Administrador TaskFlow',
                'email' => 'admin@taskflow.test',
            ])->toArray(),
            [
                'password' => bcrypt('password'), // Agregamos explícitamente el campo obligatorio
            ]
        );

        // 2. Buscamos o creamos usando el arreglo completo
        User::firstOrCreate(
            ['email' => 'admin@taskflow.test'], 
            $adminData
        );

        // 3. Crear los 8 colaboradores aleatorios
        User::factory(8)->create();
    }

}
