<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cargo::factory()->create([
            'nome' => 'Desbravador(a)',
            'status' => true,
        ]);

        Cargo::factory()->create([
            'nome' => 'Capitão(a)',
            'status' => true,
        ]);

        Cargo::factory()->create([
            'nome' => 'Secretário(a)',
            'status' => true,
        ]);

        Cargo::factory()->create([
            'nome' => 'Tesoureiro(a)',
            'status' => true,
        ]);

        Cargo::factory()->create([
            'nome' => 'Conselheiro(a)',
            'status' => true,
        ]);

        Cargo::factory()->create([
            'nome' => 'Capelão(a)',
            'status' => true,
        ]);

        Cargo::factory()->create([
            'nome' => 'Padiolheiro(a)',
            'status' => true,
        ]);

        Cargo::factory()->create([
            'nome' => 'Almoxerife',
            'status' => true,
        ]);

        Cargo::factory()->create([
            'nome' => 'Instrutor(a)',
            'status' => true,
        ]);

        Cargo::factory()->create([
            'nome' => 'Diretor(a)',
            'status' => false,
        ]);

        Cargo::factory()->create([
            'nome' => 'Associado(a)',
            'status' => false,
        ]);

        Cargo::factory()->create([
            'nome' => 'Coordenador(a)',
            'status' => false,
        ]);

        Cargo::factory()->create([
            'nome' => 'Pastor(a)',
            'status' => false,
        ]);

        Cargo::factory()->create([
            'nome' => 'Líder',
            'status' => false,
        ]);

        Cargo::factory()->create([
            'nome' => 'Apoio',
            'status' => false,
        ]);

        Cargo::factory()->create([
            'nome' => 'Segurança',
            'status' => false,
        ]);

        Cargo::factory()->create([
            'nome' => 'Cozinheiro(a)',
            'status' => false,
        ]);
    }
}
