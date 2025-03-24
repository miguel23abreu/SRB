<div class="w-full h-full mt-0">
    <!-- Botão para abrir o modal -->
    <div
        class="flex-col items center justify-center w-auto ml-100 mr-100 mt-5 mb-10 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <button wire:click="$dispatch('showModal')" class="w-full h-20 bg-blue-500 text-white rounded">
            Nova Tarefa
        </button>
    </div>
    @if ($showModal)
        <!-- Fundo da modal com transparência -->

        <div class="fixed inset-0 flex items-center justify-center bg-black/70 dark:bg-gray-900/70">
            <!-- Conteúdo da modal -->
            <div
                class="w-96 bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Nova Tarefa</h2>

                <!-- Campo de Título -->
                <input type="text" wire:model="tarefa" placeholder="Título"
                    class="w-full p-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 mb-4">

                <!-- Campo de Descrição -->
                <textarea wire:model="descricao" placeholder="Descrição"
                    class="w-full p-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 mb-4"></textarea>

                <!-- Campo de Ciclos -->
                <input type="number" wire:model="ciclos" placeholder="Ciclos"
                    class="w-full p-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 mb-4">

                <!-- Campo de Dificuldade -->
                <input type="number" wire:model="dificuldade" placeholder="Dificuldade (1-5)"
                    class="w-full p-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 mb-4">

                <!-- Campo de Prioridade -->
                <select wire:model="prioridade"
                    class="w-full p-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white mb-4">
                    <option value="baixa">Baixa</option>
                    <option value="media">Média</option>
                    <option value="alta">Alta</option>
                </select>

                <!-- Campo de Prazo -->
                <input type="date" wire:model="prazo"
                    class="w-full p-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white mb-4">

                <!-- Campo de Status -->
                <select wire:model="status"
                    class="w-full p-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white mb-4">
                    <option value="A Fazer">A Fazer</option>
                    <option value="Em Progresso">Em Progresso</option>
                    <option value="Terminada">Terminada</option>
                </select>

                <!-- Checkbox de Revisão -->
                <label class="flex items-center text-gray-900 dark:text-white mb-4">
                    <input type="checkbox" wire:model="revisao" class="mr-2"> Revisão necessária
                </label>

                <!-- Botões de Ação -->
                <div class="flex justify-end mt-6">
                    <button wire:click="hide"
                        class="px-5 py-2 bg-gray-500 text-white rounded-lg hover:bg-opacity-80 mr-2">
                        Cancelar
                    </button>
                    <button wire:click="save" class="px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-opacity-80">
                        Salvar
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
