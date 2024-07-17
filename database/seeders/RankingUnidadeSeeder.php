<?php

namespace Database\Seeders;

use App\Models\RankingUnidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RankingUnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RankingUnidade::factory()->count(100)->create();
    }
}
