<?php

namespace Database\Seeders;

use App\Models\EventoUnidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventosUnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventoUnidade::factory()->count(100)->create();
    }
}
