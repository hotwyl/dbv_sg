<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RankingClube>
 */
class RankingClubeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_avaliacao' => $this->faker->numberBetween(1, 100),
            'id_avaliador' => $this->faker->numberBetween(1, 10),
            'id_clube' => $this->faker->numberBetween(1, 25),
            'pontuacao' => $this->faker->numberBetween(1, 100),
            'data_hora' => $this->faker->dateTime,
        ];
    }
}
