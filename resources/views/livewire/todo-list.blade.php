<div class="flex justify-center w-full h-full flex-col gap-20">
    <!-- Componente Pomodoro -->
    <livewire:pomodoro />

    <!-- Botão para abrir o modal -->
    <button wire:click="$dispatch('showModal')" class="px-4 py-2 bg-blue-500 text-white rounded">
        Nova Tarefa
    </button>

    <!-- Chama o componente do modal -->
    <livewire:modal-tarefa />

    <!-- Seção "A Fazer" -->
    <div class="w-auto bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="flex bg-blue-200 h-10 rounded-t-lg items-center">
            <svg class="ml-4 mr-2 shrink-0 w-4 h-4 text-red-400 dark:text-red-500" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <circle cx="10" cy="10" r="10"/>
            </svg>
            <h2 class="text-red-500 font-bold">A Fazer</h2>
        </div>
        <div class="p-4 bg-white rounded-b-lg md:p-8 dark:bg-gray-700">
            <!-- Conteúdo da seção "A Fazer" -->
            <div>
                <!-- Adicione aqui os itens da lista "A Fazer" -->
            </div>
        </div>
    </div>

    <!-- Seção "Em Andamento" -->
    <div class="w-auto bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="flex bg-blue-200 h-10 rounded-t-lg items-center">
            <svg class="ml-4 mr-2 shrink-0 w-4 h-4 text-yellow-400 dark:text-yellow-500" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <circle cx="10" cy="10" r="10"/>
            </svg>
            <h2 class="text-yellow-500 font-bold">Em Andamento</h2>
        </div>
        <div class="p-4 bg-white rounded-b-lg md:p-8 dark:bg-gray-700">
            <!-- Conteúdo da seção "Em Andamento" -->
            <div>
                <!-- Adicione aqui os itens da lista "Em Andamento" -->
            </div>
        </div>
    </div>

    <!-- Seção "Terminado" -->
    <div class="w-auto bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="flex bg-blue-200 h-10 rounded-t-lg items-center">
            <svg class="ml-4 mr-2 shrink-0 w-4 h-4 text-green-400 dark:text-green-500" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <circle cx="10" cy="10" r="10"/>
            </svg>
            <h2 class="text-green-500 font-bold">Terminado</h2>
        </div>
        <div class="p-4 bg-white rounded-b-lg md:p-8 dark:bg-gray-700">
            <!-- Conteúdo da seção "Terminado" -->
            <div>
                <!-- Adicione aqui os itens da lista "Terminado" -->
            </div>
        </div>
    </div>
</div>