<?php

namespace Database\Seeders;

use App\Models\Desbravador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesbravadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Desbravador::factory(700)->create();
    }
}
