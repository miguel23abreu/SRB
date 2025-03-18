<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tarefas')->insert([
            [
                'nome_tarefa' => 'Estudo de Algoritmos',
                'descricao' => 'Revisar conceitos de algoritmos e estruturas de dados',
                'ciclos' => 10,
                'dificuldade' => 3,
                'prioridade' => 'Alta',
                'prazo' => '2025-03-30',
                'quadro' => 'To Do',
                'revisao' => true,
            ],
            [
                'nome_tarefa' => 'Desenvolvimento de Site',
                'descricao' => 'Criar a homepage do site de um cliente',
                'ciclos' => 8,
                'dificuldade' => 2,
                'prioridade' => 'Média',
                'prazo' => '2025-03-25',
                'quadro' => 'To Do',
                'revisao' => false,
            ],
            [
                'nome_tarefa' => 'Reunião de Equipe',
                'descricao' => 'Reunião para alinhamento de tarefas da semana',
                'ciclos' => 2,
                'dificuldade' => 1,
                'prioridade' => 'Baixa',
                'prazo' => '2025-03-20',
                'quadro' => 'Done',
                'revisao' => false,
            ],
            [
                'nome_tarefa' => 'Implementação de API',
                'descricao' => 'Desenvolver a API para integração de sistemas',
                'ciclos' => 15,
                'dificuldade' => 4,
                'prioridade' => 'Alta',
                'prazo' => '2025-04-10',
                'quadro' => 'To Do',
                'revisao' => true,
            ],
            [
                'nome_tarefa' => 'Refatoração de Código',
                'descricao' => 'Refatorar código antigo para melhorar performance',
                'ciclos' => 12,
                'dificuldade' => 3,
                'prioridade' => 'Média',
                'prazo' => '2025-03-28',
                'quadro' => 'Done',
                'revisao' => true,
            ]
        ]);
    }
}