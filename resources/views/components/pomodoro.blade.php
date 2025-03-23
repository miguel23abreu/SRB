<div class="w-auto ml-100 mr-100 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select tab</label>
        <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Pomodoro</option>
            <option>Pausa Curta</option>
            <option>Pausa Longa</option>
        </select>
    </div>
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
    <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab">
            <div class="flex flex-col items-center justify-center">
                <h2 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white">Tempo de Foco</h2>
                <div class="text-4xl font-bold text-gray-900 dark:text-white" id="focus-timer">00:00:00</div>
                <button class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none" onclick="startFocusTimer()">Iniciar</button>
            </div>
        </div>
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
            <div class="flex flex-col items-center justify-center">
                <h2 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white">Pausa Curta</h2>
                <div class="text-4xl font-bold text-gray-900 dark:text-white" id="short-break-timer">00:05:00</div>
                <button class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none" onclick="startShortBreakTimer()">Iniciar</button>
            </div>
        </div>
        <div class="hidden p-4 bg-white rounded-lg dark:bg-gray-800" id="faq" role="tabpanel" aria-labelledby="faq-tab">
            <div class="flex flex-col items-center justify-center">
                <h2 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white">Pausa Longa</h2>
                <div class="text-4xl font-bold text-gray-900 dark:text-white" id="long-break-timer">00:15:00</div>
                <button class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none" onclick="startLongBreakTimer()">Iniciar</button>
            </div>
        </div>
    </div>
</div>

<script>
    let focusTimerInterval;
    let shortBreakTimerInterval;
    let longBreakTimerInterval;

    function startFocusTimer() {
        clearInterval(focusTimerInterval);
        let time = 0;
        focusTimerInterval = setInterval(() => {
            time++;
            const hours = Math.floor(time / 3600).toString().padStart(2, '0');
            const minutes = Math.floor((time % 3600) / 60).toString().padStart(2, '0');
            const seconds = (time % 60).toString().padStart(2, '0');
            document.getElementById('focus-timer').textContent = `${hours}:${minutes}:${seconds}`;
        }, 1000);
    }

    function startShortBreakTimer() {
        clearInterval(shortBreakTimerInterval);
        let time = 300; // 5 minutes
        shortBreakTimerInterval = setInterval(() => {
            time--;
            if (time < 0) {
                clearInterval(shortBreakTimerInterval);
                return;
            }
            const minutes = Math.floor(time / 60).toString().padStart(2, '0');
            const seconds = (time % 60).toString().padStart(2, '0');
            document.getElementById('short-break-timer').textContent = `00:${minutes}:${seconds}`;
        }, 1000);
    }

    function startLongBreakTimer() {
        clearInterval(longBreakTimerInterval);
        let time = 900; // 15 minutes
        longBreakTimerInterval = setInterval(() => {
            time--;
            if (time < 0) {
                clearInterval(longBreakTimerInterval);
                return;
            }
            const minutes = Math.floor(time / 60).toString().padStart(2, '0');
            const seconds = (time % 60).toString().padStart(2, '0');
            document.getElementById('long-break-timer').textContent = `00:${minutes}:${seconds}`;
        }, 1000);
    }
</script>