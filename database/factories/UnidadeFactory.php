<?php

namespace Database\Factories;

use App\Models\Unidade;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unidade>
 */
class UnidadeFactory extends Factory
{
    protected $model = Unidade::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_clube' => $this->faker->numberBetween(1, 25),
            'nome' => $this->faker->company,
            'status' => $this->faker->boolean,
        ];
    }
}
