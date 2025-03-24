<div class="flex justify-center w-full h-full flex-col gap-10">
    <!-- Seção "A Fazer" -->
    <div class="w-auto bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="flex bg-blue-200 h-10 rounded-t-lg items-center">
            <svg class="ml-4 mr-2 shrink-0 w-4 h-4 text-red-400 dark:text-red-500" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <circle cx="10" cy="10" r="10" />
            </svg>
            <h2 class="text-red-500 font-bold">A Fazer</h2>
        </div>
        <div class="flex p-4 bg-white rounded-b-lg md:p-8 dark:bg-gray-700 gap-5">
            <!-- Conteúdo da seção "A Fazer" -->

            @foreach ($todos as $card)
                @if ($card->status === 'A Fazer')
                    <div
                        class="flex-col items-center justify-center h-full w-full max-w-md p-6 bg-red-800 border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-red-500 dark:border-gray-600">
                        <!-- Título da Tarefa -->
                        <div class="text-center text-xl font-semibold text-white dark:text-white mb-2">
                            {{ $card->tarefa }}
                        </div>

                        <!-- Descrição -->
                        <div class="text-center text-white dark:text-gray-300 mb-4">
                            {{ $card->descricao }}
                        </div>

                        <!-- Prazo -->
                        <div class="text-center text-sm font-medium text-white dark:text-gray-200 mb-2">
                            <span class="font-semibold">Prazo:</span> {{ $card->prazo->format('d/m/Y') }}
                        </div>

                        <!-- Ciclos -->
                        <div class="text-center text-sm font-medium text-white dark:text-gray-200">
                            <span class="font-semibold">Ciclos:</span> {{$card->ciclos_completos}}/{{ $card->ciclos }}
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>

    <!-- Seção "Em Andamento" -->
    <div class="w-auto bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="flex bg-blue-200 h-10 rounded-t-lg items-center">
            <svg class="ml-4 mr-2 shrink-0 w-4 h-4 text-yellow-400 dark:text-yellow-500" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <circle cx="10" cy="10" r="10" />
            </svg>
            <h2 class="text-yellow-500 font-bold">Em Andamento</h2>
        </div>
        <div class="p-4 bg-white rounded-b-lg md:p-8 dark:bg-gray-700 gap-5">
            <!-- Conteúdo da seção "Em Andamento" -->
            @foreach ($todos as $card)
                @if ($card->status === 'Em Andamento')
                    <div
                        class="flex-col items-center justify-center h-full w-full max-w-md p-6 bg-yellow-700 border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-yellow-500 dark:border-gray-600">
                        <!-- Título da Tarefa -->
                        <div class="text-center text-xl font-semibold text-gray-900 dark:text-white mb-2">
                            {{ $card->tarefa }}
                        </div>

                        <!-- Descrição -->
                        <div class="text-center text-gray-600 dark:text-gray-300 mb-4">
                            {{ $card->descricao }}
                        </div>

                        <!-- Prazo -->
                        <div class="text-center text-sm font-medium text-gray-800 dark:text-gray-200 mb-2">
                            <span class="font-semibold">Prazo:</span> {{ $card->prazo->format('d/m/Y') }}
                        </div>

                        <!-- Ciclos -->
                        <div class="text-center text-sm font-medium text-gray-800 dark:text-gray-200">
                            <span class="font-semibold">Ciclos:</span> {{$card->ciclos_completos}}/{{ $card->ciclos }}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Seção "Terminado" -->
    <div class="w-auto bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="flex bg-blue-200 h-10 rounded-t-lg items-center">
            <svg class="ml-4 mr-2 shrink-0 w-4 h-4 text-green-400 dark:text-green-500" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <circle cx="10" cy="10" r="10" />
            </svg>
            <h2 class="text-green-500 font-bold">Terminado</h2>
        </div>
        <div class="p-4 bg-white rounded-b-lg md:p-8 dark:bg-gray-700 gap-5">
            <!-- Conteúdo da seção "Terminado" -->
            @foreach ($todos as $card)
                @if ($card->status === 'Terminado')
                    <div
                        class="flex-col items-center justify-center h-full w-full max-w-md p-6 bg-green-700 border border-gray-200 rounded-lg shadow-sm sm:p-6 md:p-8 dark:bg-green-500 dark:border-gray-600">
                        <!-- Título da Tarefa -->
                        <div class="text-center text-xl font-semibold text-gray-900 dark:text-white mb-2">
                            {{ $card->tarefa }}
                        </div>

                        <!-- Descrição -->
                        <div class="text-center text-gray-600 dark:text-gray-300 mb-4">
                            {{ $card->descricao }}
                        </div>

                        <!-- Prazo -->
                        <div class="text-center text-sm font-medium text-gray-800 dark:text-gray-200 mb-2">
                            <span class="font-semibold">Prazo:</span> {{ $card->prazo->format('d/m/Y') }}
                        </div>

                        <!-- Ciclos -->
                        <div class="text-center text-sm font-medium text-gray-800 dark:text-gray-200">
                            <span class="font-semibold">Ciclos:</span> {{$card->ciclos_completos}}/{{ $card->ciclos }}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
