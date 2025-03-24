<div>
    @if($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70">
            <div class="w-96 bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg border border-gray-200  border-gray-700">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Nova Tarefa</h2>

                    <input type="text" wire:model="tarefa" placeholder="Título"
                        class="w-full p-3 border border-gray-300 rounded-lg bg-white text-dark placeholder-dark mb-4">

                    <textarea wire:model="descricao" placeholder="Descrição"
                        class="w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-500 mb-4"></textarea>

                    <input type="number" wire:model="ciclos" placeholder="Ciclos"
                        class="w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-500 mb-4">

                    <input type="number" wire:model="dificuldade" placeholder="Dificuldade (1-5)"
                        class="w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-900 placeholder-gray-500 mb-4">

                    <select wire:model="prioridade"
                        class="w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-900 mb-4">
                        <option value="baixa">Baixa</option>
                        <option value="media">Média</option>
                        <option value="alta">Alta</option>
                    </select>

                    <input type="date" wire:model="prazo"
                        class="w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-900 mb-4">

                    <select wire:model="status"
                        class="w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-900 mb-4">
                        <option value="A Fazer">A Fazer</option>
                        <option value="Em Progresso">Em Progresso</option>
                        <option value="Terminada">Terminada</option>
                    </select>

                <label class="flex items-center text-gray-900 mb-4">
                    <input type="checkbox" wire:model="revisao" class="mr-2"> Revisão necessária
                </label>

                <div class="flex justify-end mt-6">
                    <button wire:click="$set('showModal', false)"
                        class="px-5 py-2 bg-gray-500 text-white rounded-lg hover:bg-opacity-80 mr-2">
                        Cancelar
                    </button>
                    <button wire:click="save"
                        class="px-5 py-2 bg-gray-500 text-white rounded-lg hover:bg-opacity-80 mr-2">
                        Salvar
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
