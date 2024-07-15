<?php

namespace Database\Factories;

use App\Models\Avaliador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Avaliador>
 */
class AvaliadorFactory extends Factory
{
    protected $model = Avaliador::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'descricao' => $this->faker->sentence,
            'status' => $this->faker->boolean,
        ];
    }
}
