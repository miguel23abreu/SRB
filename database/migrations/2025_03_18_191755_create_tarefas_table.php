<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_tarefa');
            $table->text('descricao')->nullable();
            $table->integer('ciclos');
            $table->integer('dificuldade')->check('dificuldade >= 1 AND dificuldade <= 5');
            $table->enum('prioridade', ['Baixa', 'Média', 'Alta']);
            $table->date('prazo');
            $table->enum('quadro', ['To Do', 'Done']);
            $table->boolean('revisao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
