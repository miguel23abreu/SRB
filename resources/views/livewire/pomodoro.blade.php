<style>
    /* Remove os spinners dos campos de entrada do tipo number */
    input[type="number"].no-spinner::-webkit-inner-spin-button,
    input[type="number"].no-spinner::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"].no-spinner {
        -moz-appearance: textfield;
    }
</style>

<div class="w-auto ml-100 mr-100 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <!-- Tabs para dispositivos móveis -->
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select tab</label>
        <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Pomodoro</option>
            <option>Pausa Curta</option>
            <option>Pausa Longa</option>
        </select>
    </div>

    <!-- Tabs para desktop -->
    <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400 rtl:divide-x-reverse" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
        <li class="w-full">
            <button id="stats-tab" data-tabs-target="#stats" type="button" role="tab" aria-controls="stats" aria-selected="true" class="inline-block w-full p-4 rounded-ss-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Foco</button>
        </li>
        <li class="w-full">
            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Pausa Curta</button>
        </li>
        <li class="w-full">
            <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="false" class="inline-block w-full p-4 rounded-se-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Pausa Longa</button>
        </li>
    </ul>

    <!-- Conteúdo dos Tabs -->
    <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab">
            <div class="flex flex-col items-center justify-center">
                <h2 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white">Tempo de Foco</h2>
                <div id="focus-inputs" class="flex space-x-2">
                    <input type="number" id="focus-hours" class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg" min="00" max="23" value="{{ $tempos['focus']['hours'] == 0 ? '00' : $tempos['focus']['hours'] }}">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">:</span>
                    <input type="number" id="focus-minutes" class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg" min="00" max="59" value="{{ $tempos['focus']['minutes'] == 0 ? '00' : $tempos['focus']['minutes'] }}">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">:</span>
                    <input type="number" id="focus-seconds" class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg" min="00" max="59" value="{{ $tempos['focus']['seconds'] == 0 ? '00' : $tempos['focus']['seconds'] }}">
                </div>
                <div class="hidden text-4xl font-bold text-gray-900 dark:text-white" id="focus-timer"> {!! $tempos['focus']['hours'] !!}:{!! $tempos['focus']['minutes'] !!}:{!! $tempos['focus']['seconds'] !!}</div>
                <button class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none" onclick="startTimer('focus')">Iniciar</button>
            </div>
        </div>
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
            <div class="flex flex-col items-center justify-center">
                <h2 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white">Pausa Curta</h2>
                <div id="short-break-inputs" class="flex space-x-2">
                    <input type="number" id="short-break-hours" class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg" min="00" max="59" value="{{ $tempos['short_break']['hours'] == 0 ? '00' : $tempos['short_break']['hours'] }}">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">:</span>
                    <input type="number" id="short-break-minutes" class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg" min="00" max="59" value="{{ $tempos['short_break']['minutes'] == 0 ? '00' : $tempos['short_break']['minutes']}}">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">:</span>
                    <input type="number" id="short-break-seconds" class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg" min="00" max="59" value="{{ $tempos['short_break']['seconds'] == 0 ? '00' : $tempos['short_break']['seconds'] }}">
                </div>
                <div class="hidden text-4xl font-bold text-gray-900 dark:text-white" id="short-break-timer">{!! $tempos['short_break']['hours'] !!}:{!! $tempos['short_break']['minutes'] !!}:{!! $tempos['short_break']['seconds'] !!}</div>
                <button class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none" onclick="startTimer('short-break')">Iniciar</button>
            </div>
        </div>
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="faq" role="tabpanel" aria-labelledby="faq-tab">
            <div class="flex flex-col items-center justify-center">
                <h2 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white">Pausa Longa</h2>
                <div id="long-break-inputs" class="flex space-x-2">
                    <input type="number" id="long-break-hours" class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg" min="00" max="23" value="{{ $tempos['long_break']['hours'] == 0 ? '00' : $tempos['long_break']['hours'] }}">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">:</span>
                    <input wire:model="tempos.long_break.minutes" type="number" id="long-break-minutes" class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg" min="00" max="59" value="{{ $tempos['long_break']['minutes'] == 0 ? '00' : $tempos['long_break']['minutes'] }}">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">:</span>
                    <input type="number" id="long-break-seconds" class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg" min="00" max="59" value="{{ $tempos['long_break']['seconds'] == 0 ? '00' : $tempos['long_break']['seconds'] }}">
                </div>
                <div class="hidden text-4xl font-bold text-gray-900 dark:text-white" id="long-break-timer">{!! $tempos['long_break']['hours'] !!}:{!! $tempos['long_break']['minutes'] !!}:{!! $tempos['long_break']['seconds'] !!}</div>
                <button class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none" onclick="startTimer('long-break')">Iniciar</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let focusTimerInterval;
    let shortBreakTimerInterval;
    let longBreakTimerInterval;

    function toggleVisibility(inputsId, timerId, showInputs) {
        if (showInputs) {
            // Exibe os campos de entrada
            document.getElementById(inputsId).classList.remove('hidden');
            // Oculta o timer
            document.getElementById(timerId).classList.add('hidden');
        } else {
            // Oculta os campos de entrada
            document.getElementById(inputsId).classList.add('hidden');
            // Exibe o timer
            document.getElementById(timerId).classList.remove('hidden');
        }
    }

    function startTimer(timerType) {
        const inputsId = `${timerType}-inputs`;
        const timerId = `${timerType}-timer`;
        const hoursInput = document.getElementById(`${timerType}-hours`);
        const minutesInput = document.getElementById(`${timerType}-minutes`);
        const secondsInput = document.getElementById(`${timerType}-seconds`);

        toggleVisibility(inputsId, timerId,false);

        clearInterval(window[`${timerType}TimerInterval`]);

        const hours = parseInt(hoursInput.value) || 0;
        const minutes = parseInt(minutesInput.value) || 0;
        const seconds = parseInt(secondsInput.value) || 0;
        let time = hours * 3600 + minutes * 60 + seconds;

        window[`${timerType}TimerInterval`] = setInterval(() => {
            time--;
            if (time < 0) {
                clearInterval(window[`${timerType}TimerInterval`]);
                toggleVisibility(inputsId, timerId, true);
                return;
            }
            const hours = Math.floor(time / 3600).toString().padStart(2, '0');
            const minutes = Math.floor((time % 3600) / 60).toString().padStart(2, '0');
            const seconds = (time % 60).toString().padStart(2, '0');
            document.getElementById(timerId).textContent = `${hours}:${minutes}:${seconds}`;
        }, 1000);
    }

    // Inicializa os listeners dos botões
    document.addEventListener('livewire:load', function () {
        Livewire.on('startFocus', () => startTimer('focus'));
        Livewire.on('startShortBreakTimer', () => startTimer('short-break'));
        Livewire.on('startLongBreakTimer', () => startTimer('long-break'));
    });
</script>
@endpush