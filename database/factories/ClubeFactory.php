<?php

namespace Database\Factories;

use App\Models\Clube;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clube>
 */
class ClubeFactory extends Factory
{
    protected $model = Clube::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'regiao' => $this->faker->numberBetween(1, 5),
            'distrito' => $this->faker->word,
            'igreja' => $this->faker->word,
            'nome' => $this->faker->company,
        ];
    }
}
