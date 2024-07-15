<?php

namespace Database\Seeders;

use App\Models\Atividade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtividadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Atividade::factory()->count(10)->create();
    }
}
