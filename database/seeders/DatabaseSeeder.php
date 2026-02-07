<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
// OPCIÓN SEGURA PARA PRODUCCIÓN:
        // Usamos create() directo en lugar de factory() para no depender de Faker.
        // Además, usamos firstOrCreate para evitar errores si lo ejecutas dos veces.
        
        User::firstOrCreate(
            ['email' => 'hugobaperez@gmail.com'], // Buscamos por correo
            [
                'name' => 'Administrador',
                'password' => Hash::make('password5678'), // ¡Asegúrate de cambiar esto si quieres otra clave!
                'email_verified_at' => now(),
            ]
        );
    }
}
