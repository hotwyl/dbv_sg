<?php

namespace Database\Factories;

use App\Models\Desbravador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Desbravador>
 */
class DesbravadorFactory extends Factory
{
    protected $model = Desbravador::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_unidade' => $this->faker->numberBetween(1, 58),
            'nome' => $this->faker->name,
            'id_cargo' => $this->faker->numberBetween(1, 8),
            'status' => $this->faker->boolean,
        ];
    }
}
