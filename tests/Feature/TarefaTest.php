<?php

namespace Tests\Feature;

use App\Models\Tarefa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TarefaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function pode_listar_tarefas()
    {
        Tarefa::factory()->count(3)->create();
        $response = $this->get('/tarefas');
        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    /** @test */
    public function pode_criar_uma_tarefa()
    {
        $data = [
            'tarefa' => 'Nova Tarefa',
            'descricao' => 'Descrição da nova tarefa',
            'ciclos' => 2,
            'dificuldade' => 3,
            'prioridade' => 'media',
            'prazo' => '2025-03-30',
            'status' => 'A Fazer',
            'revisao' => false
        ];
        $response = $this->post('/tarefas', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('tarefas', $data);
    }

    /** @test */
    public function pode_atualizar_uma_tarefa()
    {
        $tarefa = Tarefa::factory()->create();
        $response = $this->put("/tarefas/{$tarefa->id}", ['status' => 'Em Progresso']);
        $response->assertStatus(200);
        $this->assertDatabaseHas('tarefas', ['id' => $tarefa->id, 'status' => 'Em Progresso']);
    }

    /** @test */
    public function pode_deletar_uma_tarefa()
    {
        $tarefa = Tarefa::factory()->create();
        $response = $this->delete("/tarefas/{$tarefa->id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('tarefas', ['id' => $tarefa->id]);
    }
}