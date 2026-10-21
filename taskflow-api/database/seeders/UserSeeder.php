<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // En lugar de create(), usamos firstOrCreate para evitar duplicados
        User::firstOrCreate(
            ['email' => 'admin@taskflow.test'], // Condición de búsqueda
            [
                'name' => 'Administrador TaskFlow',
                // Si tu factory tiene contraseñas por defecto, se aplicarán aquí de forma automática
            ]
        );

        // Crear los 8 colaboradores aleatorios
        User::factory(8)->create();
    }
}
