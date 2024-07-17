<?php

namespace Database\Factories;

use App\Models\Avaliacao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ranking>
 */
class AvaliacaoFactory extends Factory
{
    protected $model = Avaliacao::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word,
            'descricao' => $this->faker->sentence,
            'tipo' => $this->faker->randomElement(['ranking', 'evento', 'desafio']),
            'categoria' => $this->faker->randomElement(['clube', 'unidade', 'individual']),
            'status' => $this->faker->boolean,
        ];
    }
}
