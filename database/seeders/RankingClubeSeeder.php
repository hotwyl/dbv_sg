<?php

namespace Database\Seeders;

use App\Models\RankingClube;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RankingClubeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RankingClube::factory()->count(100)->create();
    }
}
