<?php

namespace Database\Seeders;

use App\Models\EventoClube;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoClubeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventoClube::factory()->count(100)->create();
    }
}
