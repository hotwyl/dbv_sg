<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ClubeSeeder::class,
            UnidadeSeeder::class,
            CargoSeeder::class,
            DesbravadorSeeder::class,
            AvaliadorSeeder::class,
            AvaliacaoSeeder::class,
            RankingClubeSeeder::class,
            RankingUnidadeSeeder::class,
            EventoClubeSeeder::class,
            EventosUnidadeSeeder::class,
        ]);
    }
}
