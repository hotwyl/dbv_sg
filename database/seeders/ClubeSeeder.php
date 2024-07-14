<?php

namespace Database\Seeders;

use App\Models\Clube;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClubeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Clube::factory()->count(25)->create();
    }
}
