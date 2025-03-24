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

    /* Estilo para botões de controle */
    .timer-controls {
        display: flex;
        gap: 8px;
        margin-top: 16px;
    }

    .timer-btn {
        padding: 8px 16px;
        border-radius: 4px;
        font-weight: 500;
        cursor: pointer;
    }

    .start-btn {
        background-color: #2563eb;
        color: white;
    }

    .pause-btn {
        background-color: #d97706;
        color: white;
    }

    .stop-btn {
        background-color: #dc2626;
        color: white;
    }
</style>

<div
    class="w-auto ml-100 mr-100 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <!-- Tabs para dispositivos móveis -->
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select tab</label>
        <select id="tabs"
            class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Pomodoro</option>
            <option>Pausa Curta</option>
            <option>Pausa Longa</option>
        </select>
    </div>

    <!-- Tabs para desktop -->
    <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400 rtl:divide-x-reverse"
        id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
        <li class="w-full">
            <button id="stats-tab" data-tabs-target="#stats" type="button" role="tab" aria-controls="stats"
                aria-selected="true"
                class="inline-block w-full p-4 rounded-ss-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Foco</button>
        </li>
        <li class="w-full">
            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                aria-selected="false"
                class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Pausa
                Curta</button>
        </li>
        <li class="w-full">
            <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq"
                aria-selected="false"
                class="inline-block w-full p-4 rounded-se-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Pausa
                Longa</button>
        </li>
    </ul>

    <!-- Conteúdo dos Tabs -->
    <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel"
            aria-labelledby="stats-tab">
            <div class="flex flex-col items-center justify-center">
                <h2 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white">Tempo de Foco</h2>
                <div id="focus-inputs" class="flex space-x-2">
                    <input type="number" id="focus-hours"
                        class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg"
                        min="00" max="23"
                        value="{{ $tempos['focus']['hours'] == 0 ? '00' : $tempos['focus']['hours'] }}">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">:</span>
                    <input type="number" id="focus-minutes"
                        class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg"
                        min="00" max="59"
                        value="{{ $tempos['focus']['minutes'] == 0 ? '00' : $tempos['focus']['minutes'] }}">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">:</span>
                    <input type="number" id="focus-seconds"
                        class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg"
                        min="00" max="59"
                        value="{{ $tempos['focus']['seconds'] == 0 ? '00' : $tempos['focus']['seconds'] }}">
                </div>
                <div class="hidden text-4xl font-bold text-gray-900 dark:text-white" id="focus-timer">
                    {!! $tempos['focus']['hours'] == 0 ? '00' : $tempos['focus']['hours'] !!}:{!! $tempos['focus']['minutes'] == 0 ? '00' : $tempos['focus']['minutes'] !!}:{!! $tempos['focus']['seconds'] == 0 ? '00' : $tempos['focus']['seconds'] !!}</div>

                    <div class="timer-controls">
                        <button id="focus-start" class="timer-btn start-btn" onclick="startTimer('focus')">
                            Iniciar
                        </button>
                        <button id="focus-pause" class="timer-btn pause-btn hidden" onclick="pauseTimer('focus')">
                            Pausar
                        </button>
                        <button id="focus-stop" class="timer-btn stop-btn hidden" onclick="stopTimer('focus')">
                            Parar
                        </button>
                    </div>
            </div>
        </div>
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel"
            aria-labelledby="about-tab">
            <div class="flex flex-col items-center justify-center">
                <h2 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white">Pausa Curta</h2>
                <div id="short-break-inputs" class="flex space-x-2">
                    <input type="number" id="short-break-hours"
                        class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg"
                        min="00" max="59"
                        value="{{ $tempos['short_break']['hours'] == 0 ? '00' : $tempos['short_break']['hours'] }}">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">:</span>
                    <input type="number" id="short-break-minutes"
                        class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg"
                        min="00" max="59"
                        value="{{ $tempos['short_break']['minutes'] == 0 ? '00' : $tempos['short_break']['minutes'] }}">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">:</span>
                    <input type="number" id="short-break-seconds"
                        class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg"
                        min="00" max="59"
                        value="{{ $tempos['short_break']['seconds'] == 0 ? '00' : $tempos['short_break']['seconds'] }}">
                </div>
                <div class="hidden text-4xl font-bold text-gray-900 dark:text-white" id="short-break-timer">
                    {!! $tempos['short_break']['hours'] == 0 ? '00' : $tempos['short_break']['hours'] !!}:{!! $tempos['short_break']['minutes'] == 0 ? '00' : $tempos['short_break']['minutes'] !!}:{!! $tempos['short_break']['seconds'] == 0 ? '00' : $tempos['short_break']['seconds'] !!}</div>

                <div class="timer-controls">
                    <button id="short-break-start" class="timer-btn start-btn"
                        onclick="startTimer('short-break')">Iniciar</button>
                    <button id="short-break-pause" class="timer-btn pause-btn hidden"
                        onclick="pauseTimer('short-break')">Pausar</button>
                    <button id="short-break-stop" class="timer-btn stop-btn hidden"
                        onclick="stopTimer('short-break')">Parar</button>
                </div>
            </div>
        </div>
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="faq" role="tabpanel"
            aria-labelledby="faq-tab">
            <div class="flex flex-col items-center justify-center">
                <h2 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white">Pausa Longa</h2>
                <div id="long-break-inputs" class="flex space-x-2">
                    <input type="number" id="long-break-hours"
                        class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg"
                        min="00" max="23"
                        value="{{ $tempos['long_break']['hours'] == 0 ? '00' : $tempos['long_break']['hours'] }}">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">:</span>
                    <input wire:model="tempos.long_break.minutes" type="number" id="long-break-minutes"
                        class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg"
                        min="00" max="59"
                        value="{{ $tempos['long_break']['minutes'] == 0 ? '00' : $tempos['long_break']['minutes'] }}">
                    <span class="text-4xl font-bold text-gray-900 dark:text-white">:</span>
                    <input type="number" id="long-break-seconds"
                        class="no-spinner w-16 p-2 text-center text-2xl font-bold text-gray-900 dark:text-white border border-gray-300 rounded-lg"
                        min="00" max="59"
                        value="{{ $tempos['long_break']['seconds'] == 0 ? '00' : $tempos['long_break']['seconds'] }}">
                </div>
                <div class="hidden text-4xl font-bold text-gray-900 dark:text-white" id="long-break-timer">
                    {!! $tempos['long_break']['hours'] == 0 ? '00' : $tempos['long_break']['hours'] !!}:{!! $tempos['long_break']['minutes'] == 0 ? '00' : $tempos['long_break']['minutes'] !!}:{!! $tempos['long_break']['seconds'] == 0 ? '00' : $tempos['long_break']['seconds'] !!}</div>

                <div class="timer-controls">
                    <button id="long-break-start" class="timer-btn start-btn"
                        onclick="startTimer('long-break')">Iniciar</button>
                    <button id="long-break-pause" class="timer-btn pause-btn hidden"
                        onclick="pauseTimer('long-break')">Pausar</button>
                    <button id="long-break-stop" class="timer-btn stop-btn hidden"
                        onclick="stopTimer('long-break')">Parar</button>
                </div>
            </div>
        </div>
    </div>
    <div
        class="flex-col items-center justify-center h-14 text-center p-4 border-1 border-gray-200 shadow-sm rounded-b-lg">
        @if (!empty($currentTask) && is_object($currentTask))
            <p class="font-medium">
                {{ isset($currentTask->tarefa) ? $currentTask->tarefa : 'Tarefa sem nome' }}
            </p>
            <p class="text-sm">
                Ciclos completos:
                {{ isset($completedCycles) ? $completedCycles : 0 }}/{{ isset($totalCycles) ? $totalCycles : 0 }}
            </p>
        @else
            <p class="font-medium text-center text-gray-500">Nenhuma tarefa ativa</p>
        @endif
    </div>
</div>

@push('scripts')
<script>
    let focusTimerInterval;
    let shortBreakTimerInterval;
    let longBreakTimerInterval;
    let currentTimer = null;
    let isPaused = false;
    let remainingTime = 0;
    let pomodoroCount = 0;

    // Funções auxiliares
    function toggleVisibility(inputsId, timerId, showInputs) {
        const inputs = document.getElementById(inputsId);
        const timer = document.getElementById(timerId);
        
        if (showInputs) {
            inputs.classList.remove('hidden');
            timer.classList.add('hidden');
        } else {
            inputs.classList.add('hidden');
            timer.classList.remove('hidden');
        }
    }

    function toggleButtons(timerType, showStart) {
        const startBtn = document.getElementById(`${timerType}-start`);
        const pauseBtn = document.getElementById(`${timerType}-pause`);
        const stopBtn = document.getElementById(`${timerType}-stop`);
        
        if (showStart) {
            startBtn.classList.remove('hidden');
            pauseBtn.classList.add('hidden');
            stopBtn.classList.add('hidden');
        } else {
            startBtn.classList.add('hidden');
            pauseBtn.classList.remove('hidden');
            stopBtn.classList.remove('hidden');
        }
    }

    function resetTimerDisplay(timerType) {
        const initial = {
            'focus': {
                hours: "{{ $tempos['focus']['hours'] == 0 ? '00' : sprintf('%02d', $tempos['focus']['hours']) }}",
                minutes: "{{ $tempos['focus']['minutes'] == 0 ? '00' : sprintf('%02d', $tempos['focus']['minutes']) }}",
                seconds: "{{ $tempos['focus']['seconds'] == 0 ? '00' : sprintf('%02d', $tempos['focus']['seconds']) }}"
            },
            'short-break': {
                hours: "{{ $tempos['short_break']['hours'] == 0 ? '00' : sprintf('%02d', $tempos['short_break']['hours']) }}",
                minutes: "{{ $tempos['short_break']['minutes'] == 0 ? '00' : sprintf('%02d', $tempos['short_break']['minutes']) }}",
                seconds: "{{ $tempos['short_break']['seconds'] == 0 ? '00' : sprintf('%02d', $tempos['short_break']['seconds']) }}"
            },
            'long-break': {
                hours: "{{ $tempos['long_break']['hours'] == 0 ? '00' : sprintf('%02d', $tempos['long_break']['hours']) }}",
                minutes: "{{ $tempos['long_break']['minutes'] == 0 ? '00' : sprintf('%02d', $tempos['long_break']['minutes']) }}",
                seconds: "{{ $tempos['long_break']['seconds'] == 0 ? '00' : sprintf('%02d', $tempos['long_break']['seconds']) }}"
            }
        }[timerType];

        const timerId = `${timerType}-timer`;
        document.getElementById(timerId).textContent = 
            `${initial.hours}:${initial.minutes}:${initial.seconds}`;
            
        document.getElementById(`${timerType}-hours`).value = initial.hours;
        document.getElementById(`${timerType}-minutes`).value = initial.minutes;
        document.getElementById(`${timerType}-seconds`).value = initial.seconds;
    }

    // Função principal do timer
    function startTimer(timerType) {
        if (currentTimer && currentTimer !== timerType) {
            stopTimer(currentTimer);
        }
        
        currentTimer = timerType;
        isPaused = false;
        
        const inputsId = `${timerType}-inputs`;
        const timerId = `${timerType}-timer`;
        const hoursInput = document.getElementById(`${timerType}-hours`);
        const minutesInput = document.getElementById(`${timerType}-minutes`);
        const secondsInput = document.getElementById(`${timerType}-seconds`);

        toggleVisibility(inputsId, timerId, false);
        toggleButtons(timerType, false);

        clearInterval(window[`${timerType}TimerInterval`]);

        let time;
        if (remainingTime > 0 && isPaused) {
            time = remainingTime;
        } else {
            const hours = parseInt(hoursInput.value) || 0;
            const minutes = parseInt(minutesInput.value) || 0;
            const seconds = parseInt(secondsInput.value) || 0;
            time = hours * 3600 + minutes * 60 + seconds;
        }

        window[`${timerType}TimerInterval`] = setInterval(() => {
            if (!isPaused) {
                time--;
                remainingTime = time;
                
                const hours = Math.floor(time / 3600).toString().padStart(2, '0');
                const minutes = Math.floor((time % 3600) / 60).toString().padStart(2, '0');
                const seconds = (time % 60).toString().padStart(2, '0');
                document.getElementById(timerId).textContent = `${hours}:${minutes}:${seconds}`;
                
                if (time <= 0) {
                    clearInterval(window[`${timerType}TimerInterval`]);
                    playCompletionSound();
                    
                    // Lógica específica para timer de foco
                    if (timerType === 'focus') {
                        pomodoroCount++;
                        
                        // Se houver uma tarefa ativa, incrementa o ciclo
                        if (@this.currentTask) {
                            @this.incrementCycle();
                        }
                        
                        // A cada 4 pomodoros, vai para pausa longa
                        if (pomodoroCount % 4 === 0) {
                            setTimeout(() => {
                                document.getElementById('faq-tab').click();
                                startTimer('long-break');
                            }, 1000);
                        } else {
                            setTimeout(() => {
                                document.getElementById('about-tab').click();
                                startTimer('short-break');
                            }, 1000);
                        }
                    } else if (timerType === 'short-break' || timerType === 'long-break') {
                        // Depois de qualquer pausa, volta para o foco
                        setTimeout(() => {
                            document.getElementById('stats-tab').click();
                            startTimer('focus');
                        }, 1000);
                    }
                    
                    resetTimerDisplay(timerType);
                    toggleVisibility(inputsId, timerId, true);
                    toggleButtons(timerType, true);
                }
            }
        }, 1000);
    }

    function pauseTimer(timerType) {
        isPaused = !isPaused;
        const pauseBtn = document.getElementById(`${timerType}-pause`);
        pauseBtn.textContent = isPaused ? 'Continuar' : 'Pausar';
    }

    function stopTimer(timerType) {
        clearInterval(window[`${timerType}TimerInterval`]);
        const inputsId = `${timerType}-inputs`;
        const timerId = `${timerType}-timer`;
        toggleVisibility(inputsId, timerId, true);
        toggleButtons(timerType, true);
        resetTimerDisplay(timerType);
        currentTimer = null;
        isPaused = false;
        remainingTime = 0;
    }

    function playCompletionSound() {
        const audio = new Audio('https://assets.mixkit.co/sfx/preview/mixkit-alarm-digital-clock-beep-989.mp3');
        audio.play().catch(e => console.log("Audio play failed:", e));
    }

    // Event listeners
    document.addEventListener('livewire:load', function() {
        Livewire.on('start-focus-timer', () => {
            if (!window.timerRunning) {
                document.getElementById('stats-tab').click();
                startTimer('focus');
                window.timerRunning = true;
            }
        });
    });

    // Inicialização
    document.addEventListener('DOMContentLoaded', function() {
        resetTimerDisplay('focus');
        resetTimerDisplay('short-break');
        resetTimerDisplay('long-break');
    });
</script>
@endpush