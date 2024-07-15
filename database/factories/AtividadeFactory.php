<?php

namespace Database\Factories;

use App\Models\Atividade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atividade>
 */
class AtividadeFactory extends Factory
{
    protected $model = Atividade::class;

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
            'valor' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->boolean,
        ];
    }
}
