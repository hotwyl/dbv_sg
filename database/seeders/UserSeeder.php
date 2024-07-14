<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@administrador.com',
        ]);

        User::factory()->create([
            'name' => 'Usuario Teste',
            'email' => 'usuario_test@teste.com',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test_user@example.com',
        ]);

        User::factory()->create([
            'name' => 'Teste Sistema',
            'email' => 'teste_sis@teste.com',
        ]);

        User::factory()->count(5)->create();
    }
}
