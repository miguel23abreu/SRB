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
            $table->string('tarefa');
            $table->text('descricao')->nullable();
            $table->integer('ciclos');
            $table->integer('ciclos_completos')->default(0);
            $table->integer('dificuldade')->check('dificuldade >= 1 AND dificuldade <= 5');
            $table->enum('prioridade', ['baixa', 'media', 'alta']);
            $table->date('prazo');
            $table->enum('status', ['A Fazer', 'Em Progresso', 'Terminada'])->default('A Fazer');
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
