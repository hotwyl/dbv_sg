<?php

namespace Database\Seeders;

use App\Models\Avaliador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvaliadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Avaliador::factory()->count(10)->create();
    }
}
