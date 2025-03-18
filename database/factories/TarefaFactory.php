<?php

namespace Database\Factories;

use App\Models\Tarefa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarefa>
 */
class TarefaFactory extends Factory
{
    protected $model = Tarefa::class;

    public function definition()
    {
        return [
            'tarefa' => $this->faker->sentence,
            'descricao' => $this->faker->paragraph,
            'ciclos' => $this->faker->numberBetween(1, 10),
            'dificuldade' => $this->faker->numberBetween(1, 5),
            'prioridade' => $this->faker->randomElement(['baixa', 'media', 'alta']),
            'prazo' => $this->faker->date(),
            'status' => 'A Fazer',
            'revisao' => $this->faker->boolean
        ];
    }
}
