<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TypeMaster Pro - Тренажер печати</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <style>
        :root {
            /* Цвета светлой темы */
            --primary-light: #6366f1;
            --secondary-light: #8b5cf6;
            --success-light: #10b981;
            --warning-light: #f59e0b;
            --error-light: #ef4444;
            --text-light: #374151;
            --bg-light: #f9fafb;
            --card-light: #ffffff;
            --border-light: #e5e7eb;
            --highlight-light: #e0e7ff;
            
            /* Цвета темной темы */
            --primary-dark: #818cf8;
            --secondary-dark: #a78bfa;
            --success-dark: #34d399;
            --warning-dark: #fbbf24;
            --error-dark: #f87171;
            --text-dark: #f3f4f6;
            --bg-dark: #111827;
            --card-dark: #1f2937;
            --border-dark: #374151;
            --highlight-dark: #3730a3;
            
            /* Цвета серой темы */
            --primary-gray: #6b7280;
            --secondary-gray: #9ca3af;
            --success-gray: #6ee7b7;
            --warning-gray: #fcd34d;
            --error-gray: #fca5a5;
            --text-gray: #1f2937;
            --bg-gray: #e5e7eb;
            --card-gray: #f3f4f6;
            --border-gray: #d1d5db;
            --highlight-gray: #d1d5db;
            
            /* Текущие переменные (будут изменяться) */
            --primary: var(--primary-light);
            --secondary: var(--secondary-light);
            --success: var(--success-light);
            --warning: var(--warning-light);
            --error: var(--error-light);
            --text: var(--text-light);
            --bg: var(--bg-light);
            --card: var(--card-light);
            --border: var(--border-light);
            --highlight: var(--highlight-light);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        body {
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
            min-height: 100vh;
            transition: all 0.3s ease;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }
        
        header {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }
        
        h1 {
            color: var(--primary);
            font-size: 2.75rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
            letter-spacing: -0.025em;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .subtitle {
            color: var(--text);
            opacity: 0.8;
            font-size: 1.15rem;
            font-weight: 400;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            background: var(--card);
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            margin-bottom: 2.5rem;
            border: 1px solid var(--border);
        }
        
        .stat-item {
            text-align: center;
            padding: 0.75rem;
            border-radius: 12px;
            transition: all 0.2s ease;
        }
        
        .stat-item:hover {
            background: var(--highlight);
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.25rem;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: var(--text);
            opacity: 0.7;
            font-weight: 500;
        }
        
        .text-display {
            background: var(--card);
            padding: 2.25rem;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            margin-bottom: 2rem;
            font-size: 1.25rem;
            line-height: 1.8;
            min-height: 220px;
            position: relative;
            transition: all 0.3s ease;
            border: 1px solid var(--border);
        }
        
        .text-display .current {
            background-color: var(--primary);
            color: white;
            padding: 0 4px;
            border-radius: 4px;
            position: relative;
        }
        
        .text-display .current::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--primary);
            animation: blink 1s infinite;
        }
        
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
        
        .text-display .correct {
            color: var(--success);
        }
        
        .text-display .incorrect {
            color: var(--error);
            text-decoration: underline;
            text-decoration-color: var(--error);
        }
        
        .input-area {
            display: flex;
            margin-bottom: 2rem;
            position: relative;
        }
        
        #text-input {
            flex: 1;
            padding: 1.25rem;
            font-size: 1.15rem;
            border: 2px solid var(--border);
            border-radius: 12px 0 0 12px;
            outline: none;
            transition: all 0.3s;
            background: var(--card);
            color: var(--text);
            caret-color: var(--primary);
        }
        
        #text-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }
        
        #start-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0 2.5rem;
            font-size: 1.15rem;
            font-weight: 500;
            border-radius: 0 12px 12px 0;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        #start-btn:hover {
            background: var(--secondary);
        }
        
        #start-btn i {
            margin-right: 8px;
        }
        
        .controls {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
            gap: 1rem;
        }
        
        .btn {
            padding: 1rem 1.75rem;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .btn-secondary {
            background: var(--card);
            color: var(--text);
            border: 1px solid var(--border);
        }
        
        .btn-secondary:hover {
            background: var(--highlight);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .btn-warning {
            background: var(--warning);
            color: var(--text);
        }
        
        .btn-warning:hover {
            background: #f59e0b;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .text-selector {
            margin-bottom: 2rem;
            position: relative;
        }
        
        #text-options {
            width: 100%;
            padding: 1rem;
            border: 2px solid var(--border);
            border-radius: 12px;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s;
            background: var(--card);
            color: var(--text);
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
        }
        
        #text-options:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }
        
        .timer {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary);
            text-align: center;
            margin-bottom: 1.5rem;
            font-feature-settings: "tnum";
            font-variant-numeric: tabular-nums;
        }
        
        .progress-container {
            width: 100%;
            height: 10px;
            background: var(--border);
            border-radius: 5px;
            margin-bottom: 2.5rem;
            overflow: hidden;
        }
        
        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            width: 0%;
            transition: width 0.3s;
            border-radius: 5px;
        }
        
        /* Стили для режимов */
        .modes {
            display: flex;
            justify-content: center;
            margin-bottom: 2.5rem;
            position: relative;
            background: var(--card);
            padding: 0.75rem;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--border);
        }
        
        .mode {
            padding: 0.75rem 1.5rem;
            margin: 0 0.25rem;
            cursor: pointer;
            position: relative;
            transition: all 0.3s;
            font-weight: 500;
            color: var(--text);
            opacity: 0.7;
            border-radius: 12px;
            white-space: nowrap;
        }
        
        .mode.active {
            opacity: 1;
            color: var(--primary);
            background: var(--highlight);
        }
        
        .mode:hover {
            opacity: 1;
            color: var(--primary);
        }
        
        .mode::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 80%;
            height: 3px;
            background: var(--primary);
            border-radius: 3px 3px 0 0;
            transition: transform 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
        
        .mode.active::after {
            transform: translateX(-50%) scaleX(1);
        }
        
        .mode-tooltip {
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: var(--card);
            color: var(--text);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
            width: 200px;
            text-align: center;
            margin-bottom: 10px;
            pointer-events: none;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--border);
            z-index: 10;
        }
        
        .mode:hover .mode-tooltip {
            opacity: 1;
            visibility: visible;
        }
        
        .mode-selector {
            position: relative;
        }
        
        /* Таймер настройки */
        .timer-settings {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            opacity: 0;
            height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            background: var(--card);
            padding: 0 1.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--border);
        }
        
        .timer-settings.active {
            opacity: 1;
            height: auto;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .timer-settings label {
            font-weight: 500;
            color: var(--text);
            opacity: 0.8;
        }
        
        .timer-settings input {
            width: 70px;
            padding: 0.75rem;
            border: 2px solid var(--border);
            border-radius: 8px;
            text-align: center;
            font-weight: 500;
            background: var(--card);
            color: var(--text);
        }
        
        .timer-settings input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
            outline: none;
        }
        
        .combine-texts {
            opacity: 0;
            height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .combine-texts.active {
            opacity: 1;
            height: auto;
        }
        
        /* Темы */
        .theme-switcher {
            position: absolute;
            top: 0;
            right: 0;
            display: flex;
            background: var(--card);
            border-radius: 12px;
            padding: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--border);
            z-index: 5;
        }
        
        .theme-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            margin: 0 0.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            background: var(--bg);
            color: var(--text);
        }
        
        .theme-btn.active {
            box-shadow: 0 0 0 2px var(--primary);
        }
        
        .theme-btn.light {
            background: #f9fafb;
            color: #374151;
        }
        
        .theme-btn.dark {
            background: #111827;
            color: #f3f4f6;
        }
        
        .theme-btn.gray {
            background: #e5e7eb;
            color: #1f2937;
        }
        
        /* Анимации */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }
        
        /* Иконки */
        .icon {
            width: 20px;
            height: 20px;
        }
        
        /* Нотификации */
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--card);
            color: var(--text);
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--border);
            transform: translateX(200%);
            transition: transform 0.3s ease;
            z-index: 100;
            display: flex;
            align-items: center;
        }
        
        .notification.show {
            transform: translateX(0);
        }
        
        .notification i {
            margin-right: 0.75rem;
            font-size: 1.25rem;
        }
        
        .notification.success {
            border-left: 4px solid var(--success);
        }
        
        .notification.error {
            border-left: 4px solid var(--error);
        }
        
        /* Адаптивность */
        @media (max-width: 768px) {
            .container {
                padding: 1.5rem 1rem;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .controls {
                flex-direction: column;
            }
            
            .modes {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .mode {
                margin: 0.25rem;
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
            
            .text-display {
                padding: 1.5rem;
                font-size: 1.1rem;
            }
            
            #text-input {
                padding: 1rem;
            }
            
            #start-btn {
                padding: 0 1.5rem;
            }
            
            .theme-switcher {
                position: relative;
                top: auto;
                right: auto;
                justify-content: center;
                margin-bottom: 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .stats {
                grid-template-columns: 1fr;
            }
            
            .timer-settings {
                flex-direction: column;
                align-items: stretch;
            }
            
            .timer-settings input {
                width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body oncontextmenu="return false;">
    <div class="container">
        <header>
            <div class="theme-switcher">
                <button class="theme-btn light active" data-theme="light" title="Светлая тема">
                    <i class="fas fa-sun"></i>
                </button>
                <button class="theme-btn dark" data-theme="dark" title="Темная тема">
                    <i class="fas fa-moon"></i>
                </button>
                <button class="theme-btn gray" data-theme="gray" title="Серая тема">
                    <i class="fas fa-cloud"></i>
                </button>
            </div>
            
            <h1>TypeMaster Pro</h1>
            <p class="subtitle">Современный тренажер слепой печати с персонализацией и аналитикой</p>
            <a href="https://sergaytrain.github.io/ModernTextEditor/developer.html"><p class="subtitle">О разработчике</p></a>
        </header>
        
        <div class="stats">
            <div class="stat-item">
                <div class="stat-value" id="wpm">0</div>
                <div class="stat-label">зн./мин</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="accuracy">0</div>
                <div class="stat-label">точность</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="time">0:00</div>
                <div class="stat-label">время</div>
            </div>
            <div class="stat-item">
                <div class="stat-value" id="chars">0</div>
                <div class="stat-label">символов</div>
            </div>
        </div>
        
        <div class="timer" id="timer-display">00:00</div>
        
        <div class="progress-container">
            <div class="progress-bar" id="progress-bar"></div>
        </div>
        
        <!-- Режимы работы -->
        <div class="mode-selector">
            <div class="modes">
                <div class="mode active" data-mode="small">
                    <i class="fas fa-align-left icon"></i> Короткий
                    <div class="mode-tooltip">Короткие тексты (до 1 минуты набора)</div>
                </div>
                <div class="mode" data-mode="large">
                    <i class="fas fa-align-center icon"></i> Длинный
                    <div class="mode-tooltip">Длинные тексты без ограничения времени</div>
                </div>
                <div class="mode" data-mode="timed">
                    <i class="fas fa-stopwatch icon"></i> На время
                    <div class="mode-tooltip">Наберите как можно больше текста за указанное время</div>
                </div>
            </div>
        </div>
        
        <!-- Настройки таймера -->
        <div class="timer-settings" id="timer-settings">
            <label for="timer-minutes"><i class="far fa-clock"></i> Минут:</label>
            <input type="number" id="timer-minutes" min="1" max="60" value="2">
            <label for="timer-seconds"><i class="far fa-hourglass"></i> Секунд:</label>
            <input type="number" id="timer-seconds" min="0" max="59" value="0">
        </div>
        
        <!-- Кнопка объединения текстов -->
        <div class="combine-texts" id="combine-texts">
            <button class="btn btn-warning" id="combine-btn">
                <i class="fas fa-random"></i> Совместить тексты
            </button>
        </div>
        
        <div class="text-selector">
            <select id="text-options">
                <option value="">Выберите текст для тренировки</option>
                <!-- Здесь будут варианты текстов -->
            </select>
        </div>
        
        <div class="text-display" id="text-display"></div>
        
        <div class="input-area">
            <input type="text" id="text-input" placeholder="Начните печатать..." autocomplete="off">
            <button id="start-btn">
                <i class="fas fa-play"></i> Старт
            </button>
        </div>
        
        <div class="controls">
            <button class="btn btn-secondary" id="reset-btn">
                <i class="fas fa-redo"></i> Сброс
            </button>
            <button class="btn btn-primary" id="new-text-btn">
                <i class="fas fa-random"></i> Новый текст
            </button>
        </div>
        
        <div class="notification" id="notification">
            <i class="fas fa-check-circle"></i>
            <span id="notification-message">Тест завершен!</span>
        </div>
    </div>
    
    <script>
// Вешаем обработчик после полной загрузки страницы
window.onload = function() {
  // Блокировка контекстного меню
  document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
  });
  
  // Дополнительно блокируем правую кнопку мыши
  document.addEventListener('mousedown', function(e) {
    if (e.button === 2) { // Правая кнопка мыши
      e.preventDefault();
      return false;
    }
  });
};
        // Можно попробовать более агрессивный подход
document.oncontextmenu = function() {
  return false;
};

document.onmousedown = function(e) {
  if (e.button === 2) {
    return false;
  }
};
        document.addEventListener('DOMContentLoaded', function() {
    // Блокировка правой кнопки мыши
    document.addEventListener('contextmenu', (e) => e.preventDefault());
    document.addEventListener('mousedown', (e) => {
        if (e.button === 2) e.preventDefault();
    });

    // Блокировка F12, Ctrl+Shift+I, Ctrl+Shift+J, Ctrl+U
    document.addEventListener('keydown', (e) => {
        // F12
        if (e.key === 'F12' || 
            // Ctrl+Shift+I (Chrome, Firefox, Edge)
            (e.ctrlKey && e.shiftKey && e.key === 'I') || 
            // Ctrl+Shift+J (Chrome)
            (e.ctrlKey && e.shiftKey && e.key === 'J') || 
            // Ctrl+U (просмотр исходного кода)
            (e.ctrlKey && e.key === 'u') ||
            // DevTools через меню (Chrome: Ctrl+Shift+C)
            (e.ctrlKey && e.shiftKey && e.key === 'C')) {
            e.preventDefault();
            e.stopPropagation();
            console.log('DevTools заблокированы');
            return false;
        }
    });
});
        // Массив с текстами для тренировки
        const texts = [
            "Съешь ещё этих мягких французских булок, да выпей же чаю.",
            "В чащах юга жил бы цитрус? Да, но фальшивый экземпляр!",
            "Любя, съешь щипцы, — вздохнёт мэр, — кайф жгуч.",
            "Шеф взъярён тчк щипцы с эхом гудбай жюль.",
            "Эй, жлоб! Где туз? Прячь юных съёмщиц в шкаф.",
            "Экс-граф? Плюш изъят. Бьём чуждый цен хвощ!",
            "Наш банк выдаст якорь в обмен на цветной халат.",
            "Чушь: гид вёз кэб цапф, юный жмот съел хрящ.",
            "Весной прилетят гуси и утки, за ними последуют журавли.",
            "Старый дуб стоит у дороги, его ветви тянутся к небу.",
            "Зимой снег покрывает землю белым пушистым одеялом.",
            "Летом солнце светит ярко, нагревая песок на пляже.",
            "Осенью листья желтеют и опадают, покрывая землю ковром.",
            "Река течёт быстро, её воды блестят на солнце.",
            "Горы возвышаются вдали, их вершины покрыты снегом.",
            "Луна светит ночью, освещая путь путникам.",
            "Звёзды мерцают на небе, создавая красивые узоры.",
            "Ветер шевелит листья деревьев, создавая успокаивающий шум.",
            "Дождь стучит по крыше, создавая ритмичную мелодию.",
            "Молния сверкает в небе, сопровождаемая громом.",
            "Радуга появляется после дождя, радуя всех своими цветами.",
            "Птицы поют утром, приветствуя новый день.",
            "Цветы распускаются весной, наполняя воздух ароматом.",
            "Пчёлы собирают нектар, перелетая с цветка на цветок.",
            "Бабочки порхают в саду, демонстрируя свои яркие крылья.",
            "Муравьи трудятся весь день, строя свои муравейники.",
            "Рыбы плавают в реке, их чешуя блестит на солнце.",
            "Лягушки квакают вечером, создавая хор звуков.",
            "Сова сидит на дереве, наблюдая за происходящим ночью.",
            "Волк воет на луну, его голос разносится по лесу.",
            "Медведь спит в берлоге, ожидая прихода весны.",
            "Лиса охотится ночью, её рыжая шубка мелькает в темноте.",
            "Заяц прыгает по полю, его ушки навострены.",
            "Белка собирает орехи, пряча их на зиму.",
            "Ёж фыркает, сворачиваясь в клубок при опасности.",
            "Кот мурлычет, когда его гладят по спине.",
            "Собака виляет хвостом, встречая хозяина у двери.",
            "Лошадь бежит по полю, её грива развевается на ветру.",
            "Корова жуёт траву, её большие глаза смотрят спокойно.",
            "Овцы блеют, собираясь в стадо перед закатом.",
            "Петух кукарекает на рассвете, пробуждая всех вокруг.",
            "Куры клюют зёрна, разбрасывая их вокруг себя.",
            "Утка плавает в пруду, её птенцы следуют за ней.",
            "Гусь шипит, защищая своих детёнышей от опасности.",
            "Лебедь скользит по воде, его белое оперение сверкает.",
            "Аист строит гнездо на крыше дома, принося удачу.",
            "Сокол парит в небе, высматривая добычу внизу.",
            "Орёл строит гнездо на высоких скалах, царя в небе.",
            "Воробьи чирикают, прыгая по веткам деревьев.",
            "Синица поёт свою песню, радуя слух прохожих.",
            "Дятел стучит по дереву, добывая насекомых из-под коры.",
            "Снегирь сидит на ветке, его красная грудка ярко выделяется.",
            "Скворец возвращается весной, заполняя сад своими трелями.",
            "Жаворонок поёт высоко в небе, его голос разносится далеко.",
            "Голубь воркует на крыше, ухаживая за своей подругой.",
            "Ворона каркает, сидя на заборе и наблюдая за округой.",
            "Сорока стрекочет, перелетая с места на место.",
            "Грач ходит по полю, выискивая червей в земле.",
            "Филин сидит на дереве, его большие глаза светятся в темноте.",
            "Кукушка кукует в лесу, предсказывая сколько лет жить.",
            "Дрозд поёт свою красивую песню, сидя на верхушке дерева.",
            "Зяблик щебечет, перелетая с куста на куст.",
            "Чайка кричит над морем, её голос смешивается с шумом волн.",
            "Пингвин идёт по льду, его чёрно-белое оперение выделяется.",
            "Тюлень лежит на камне, греясь на солнце.",
            "Дельфин прыгает из воды, его тело блестит на солнце.",
            "Кит выпускает фонтан воды, показывая своё могущество.",
            "Акула плывёт в глубине, её плавник рассекает воду.",
            "Медуза плавает в море, её тело переливается разными цветами.",
            "Осьминог прячется среди камней, меняя свой цвет.",
            "Краб ползёт по песку, его клешни готовы к защите.",
            "Морская звезда лежит на дне, её лучи расправлены.",
            "Коралл растёт в тёплой воде, создавая рифы для рыб.",
            "Водоросли колышутся в воде, создавая укрытие для мелких обитателей.",
            "Ракушка лежит на берегу, её внутренности переливаются перламутром.",
            "Черепаха медленно плывёт, её панцирь защищает от хищников.",
            "Морской конёк цепляется хвостом за водоросли, качаясь на волнах.",
            "Рак-отшельник ищет новую раковину, чтобы поселиться в ней.",
            "Кальмар выпускает чернила, скрываясь от преследователя.",
            "Улитка ползёт по листу, оставляя за собой блестящий след.",
            "Червь роет ходы в земле, улучшая её структуру.",
            "Паук плетёт паутину, создавая ловушку для насекомых.",
            "Муха жужжит, летая по комнате и садясь на разные поверхности.",
            "Комар пискляво летает, ища жертву для укуса.",
            "Стрекоза порхает над водой, её крылья переливаются на солнце.",
            "Кузнечик прыгает в траве, издавая стрекочущие звуки.",
            "Сверчок поёт ночью, создавая романтическую атмосферу.",
            "Божья коровка ползёт по листу, её красные крылья с чёрными точками.",
            "Жук летит, гудя своими крыльями и садясь на ствол дерева.",
            "Бабочка-капустница порхает над огородом, откладывая яйца.",
            "Оса строит гнездо, собирая древесину и перерабатывая её.",
            "Пчела собирает пыльцу, перелетая с цветка на цветок.",
            "Шмель гудит, зависая над цветком и высасывая нектар.",
            "Муравейник возвышается в лесу, его жители трудятся без устали.",
            "Термитник стоит в саванне, его стены сделаны из переработанной глины.",
            "Клещ сидит на травинке, ожидая проходящего мимо животного.",
            "Блоха прыгает на собаку, чтобы пить её кровь.",
            "Вошь живёт в волосах, вызывая зуд у своего хозяина.",
            "Клоп прячется в щелях, выходя ночью для кормления.",
            "Таракан бежит по кухне, скрываясь при включении света.",
            "Моль летает в шкафу, откладывая яйца на шерстяные вещи.",
            "Жук-олень сражается с соперником, используя свои рога.",
            "Светлячок мерцает в темноте, создавая волшебную атмосферу.",
            "Кузнечик зелёного цвета сливается с травой, прячась от птиц.",
            "Богомол сидит неподвижно, ожидая приближения добычи.",
            "Кузнечик-саранча летит огромной стаей, уничтожая посевы.",
            "Цикада поёт в жару, её звук разносится по всему лесу.",
            "Комариные личинки живут в воде, превращаясь во взрослых особей.",
            "Водомерка скользит по поверхности воды, не проваливаясь.",
            "Плавт плавает под водой, дыша через специальную трубочку.",
            "Жук-плавунец охотится на мелких обитателей водоёма."
        ];
        
        // Дополнительные большие тексты
        const largeTexts = [
            "Современные технологии достигли такого уровня, что дальнейшее развитие различных форм деятельности требует от нас анализа соответствующих условий активизации. С другой стороны, сложившаяся структура организации позволяет выполнить важнейшие задания по разработке направлений прогрессивного развития. Таким образом, консультация с широким активом играет важную роль в формировании системы обучения кадров, соответствующей насущным потребностям. Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности способствует подготовке и реализации соответствующих условий активизации. Не следует, однако, забывать о том, что сложившаяся структура организации позволяет оценить значение соответствующих условий активизации.",
            "Повседневная практика показывает, что укрепление и развитие структуры способствует подготовке и реализации дальнейших направлений развития. Равным образом рамки и место обучения кадров требуют от нас анализа системы обучения кадров, соответствующей насущным потребностям. Разнообразный и богатый опыт реализация намеченных плановых заданий требуют от нас анализа соответствующих условий активизации. С другой стороны, укрепление и развитие структуры позволяет оценить значение соответствующих условий активизации. Таким образом, сложившаяся структура организации требуют определения и уточнения дальнейших направлений развития.",
            "Значимость этих проблем настолько очевидна, что консультация с широким активом играет важную роль в формировании позиций, занимаемых участниками в отношении поставленных задач. Разнообразный и богатый опыт постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение системы обучения кадров, соответствующей насущным потребностям. Равным образом сложившаяся структура организации требуют от нас анализа направлений прогрессивного развития. Идейные соображения высшего порядка, а также дальнейшее развитие различных форм деятельности позволяет выполнить важнейшие задания по разработке модели развития. Не следует, однако, забывать о том, что постоянный количественный рост и сфера нашей активности способствует подготовке и реализации соответствующих условий активизации.",
            "Задача организации, в особенности же постоянный количественный рост и сфера нашей активности позволяет оценить значение дальнейших направлений развития. Повседневная практика показывает, что сложившаяся структура организации требуют от нас анализа системы обучения кадров, соответствующей насущным потребностям. Разнообразный и богатый опыт постоянное информационно-пропагандистское обеспечение нашей деятельности играет важную роль в формировании соответствующих условий активизации. Таким образом, укрепление и развитие структуры способствует подготовке и реализации дальнейших направлений развития. С другой стороны, рамки и место обучения кадров позволяет выполнить важнейшие задания по разработке модели развития.",
            "Идейные соображения высшего порядка, а также сложившаяся структура организации позволяет оценить значение соответствующих условий активизации. Равным образом дальнейшее развитие различных форм деятельности требуют от нас анализа системы обучения кадров, соответствующей насущным потребностям. Разнообразный и богатый опыт реализация намеченных плановых заданий способствует подготовке и реализации форм развития. Таким образом, консультация с широким активом играет важную роль в формировании направлений прогрессивного развития. С другой стороны, укрепление и развитие структуры требуют определения и уточнения соответствующих условий активизации.",
            "Не следует, однако, забывать о том, что рамки и место обучения кадров способствует подготовке и реализации соответствующих условий активизации. Повседневная практика показывает, что сложившаяся структура организации требуют от нас анализа системы обучения кадров, соответствующей насущным потребностям. Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности позволяет оценить значение дальнейших направлений развития. Таким образом, консультация с широким активом играет важную роль в формировании позиций, занимаемых участниками в отношении поставленных задач. С другой стороны, дальнейшее развитие различных форм деятельности требуют определения и уточнения форм развития.",
            "Значимость этих проблем настолько очевидна, что укрепление и развитие структуры позволяет выполнить важнейшие задания по разработке направлений прогрессивного развития. Равным образом реализация намеченных плановых заданий требуют от нас анализа соответствующих условий активизации. Разнообразный и богатый опыт постоянное информационно-пропагандистское обеспечение нашей деятельности способствует подготовке и реализации форм развития. Таким образом, сложившаяся структура организации играет важную роль в формировании системы обучения кадров, соответствующей насущным потребностям. С другой стороны, консультация с широким активом требуют определения и уточнения дальнейших направлений развития.",
            "Задача организации, в особенности же дальнейшее развитие различных форм деятельности способствует подготовке и реализации соответствующих условий активизации. Повседневная практика показывает, что сложившаяся структура организации требуют от нас анализа системы обучения кадров, соответствующей насущным потребностям. Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности позволяет оценить значение форм развития. Таким образом, укрепление и развитие структуры играет важную роль в формировании направлений прогрессивного развития. С другой стороны, рамки и место обучения кадров требуют определения и уточнения соответствующих условий активизации.",
            "Идейные соображения высшего порядка, а также реализация намеченных плановых заданий позволяет оценить значение дальнейших направлений развития. Равным образом консультация с широким активом требуют от нас анализа соответствующих условий активизации. Разнообразный и богатый опыт постоянное информационно-пропагандистское обеспечение нашей деятельности способствует подготовке и реализации форм развития. Таким образом, сложившаяся структура организации играет важную роль в формировании системы обучения кадров, соответствующей насущным потребностям. С другой стороны, укрепление и развитие структуры требуют определения и уточнения дальнейших направлений развития.",
            "Не следует, однако, забывать о том, что рамки и место обучения кадров способствует подготовке и реализации соответствующих условий активизации. Повседневная практика показывает, что дальнейшее развитие различных форм деятельности требуют от нас анализа системы обучения кадров, соответствующей насущным потребностям. Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности позволяет оценить значение форм развития. Таким образом, консультация с широким активом играет важную роль в формировании позиций, занимаемых участниками в отношении поставленных задач. С другой стороны, сложившаяся структура организации требуют определения и уточнения соответствующих условий активизации."
        ];
        
        // DOM элементы
        const textDisplay = document.getElementById('text-display');
        const textInput = document.getElementById('text-input');
        const startBtn = document.getElementById('start-btn');
        const resetBtn = document.getElementById('reset-btn');
        const newTextBtn = document.getElementById('new-text-btn');
        const textOptions = document.getElementById('text-options');
        const timerDisplay = document.getElementById('timer-display');
        const wpmDisplay = document.getElementById('wpm');
        const accuracyDisplay = document.getElementById('accuracy');
        const timeDisplay = document.getElementById('time');
        const charsDisplay = document.getElementById('chars');
        const progressBar = document.getElementById('progress-bar');
        const modeElements = document.querySelectorAll('.mode');
        const timerSettings = document.getElementById('timer-settings');
        const timerMinutes = document.getElementById('timer-minutes');
        const timerSeconds = document.getElementById('timer-seconds');
        const combineTextsSection = document.getElementById('combine-texts');
        const combineBtn = document.getElementById('combine-btn');
        const themeButtons = document.querySelectorAll('.theme-btn');
        const notification = document.getElementById('notification');
        const notificationMessage = document.getElementById('notification-message');
        
        // Переменные состояния
        let currentText = '';
        let timer = null;
        let countdownTimer = null;
        let startTime = null;
        let endTime = null;
        let correctChars = 0;
        let totalChars = 0;
        let isTyping = false;
        let currentMode = 'small';
        let targetTime = 120; // 2 минуты по умолчанию для режима по таймеру
        let remainingTime = targetTime;
        let lastInputLength = 0;
        
        // Инициализация приложения
        function init() {
            // Заполняем выпадающий список текстами
            populateTextOptions();
            
            // Выбираем случайный текст
            selectRandomText();
            
            // Назначаем обработчики событий
            startBtn.addEventListener('click', startTyping);
            resetBtn.addEventListener('click', resetTest);
            newTextBtn.addEventListener('click', selectRandomText);
            textInput.addEventListener('input', checkTyping);
            textOptions.addEventListener('change', selectTextFromDropdown);
            
            // Обработчики для режимов
            modeElements.forEach(mode => {
                mode.addEventListener('click', switchMode);
            });
            
            // Обработчик для кнопки объединения текстов
            combineBtn.addEventListener('click', combineTexts);
            
            // Обработчики для настроек таймера
            timerMinutes.addEventListener('change', updateTargetTime);
            timerSeconds.addEventListener('change', updateTargetTime);
            
            // Обработчики для переключения тем
            themeButtons.forEach(btn => {
                btn.addEventListener('click', switchTheme);
            });
            
            // Предотвращаем удаление текста
            textInput.addEventListener('keydown', preventBackspace);
            textInput.addEventListener('keydown', preventDelete);
            
            // Инициализация темы из localStorage
            const savedTheme = localStorage.getItem('theme') || 'light';
            setTheme(savedTheme);
        }
        
        // Заполнение выпадающего списка текстами
        function populateTextOptions() {
            // Очищаем список
            textOptions.innerHTML = '<option value="">Выберите текст для тренировки</option>';
            
            // Добавляем маленькие тексты
            const smallGroup = document.createElement('optgroup');
            smallGroup.label = 'Короткие тексты';
            texts.forEach((text, index) => {
                const option = document.createElement('option');
                option.value = index;
                option.dataset.type = 'small';
                option.textContent = text.length > 50 ? text.substring(0, 50) + '...' : text;
                smallGroup.appendChild(option);
            });
            textOptions.appendChild(smallGroup);
            
            // Добавляем большие тексты
            const largeGroup = document.createElement('optgroup');
            largeGroup.label = 'Длинные тексты';
            largeTexts.forEach((text, index) => {
                const option = document.createElement('option');
                option.value = index;
                option.dataset.type = 'large';
                option.textContent = text.length > 50 ? text.substring(0, 50) + '...' : text;
                largeGroup.appendChild(option);
            });
            textOptions.appendChild(largeGroup);
        }
        
        // Выбор случайного текста в зависимости от режима
        function selectRandomText() {
            if (currentMode === 'small') {
                const randomIndex = Math.floor(Math.random() * texts.length);
                currentText = texts[randomIndex];
            } else if (currentMode === 'large') {
                const randomIndex = Math.floor(Math.random() * largeTexts.length);
                currentText = largeTexts[randomIndex];
            } else if (currentMode === 'timed') {
                // В режиме по таймеру можно использовать любой текст
                const randomIndex = Math.floor(Math.random() * (texts.length + largeTexts.length));
                currentText = randomIndex < texts.length ? texts[randomIndex] : largeTexts[randomIndex - texts.length];
            }
            
            displayText();
            resetTest();
        }
        
        // Выбор текста из выпадающего списка
        function selectTextFromDropdown() {
            const selectedIndex = textOptions.value;
            const selectedOption = textOptions.options[textOptions.selectedIndex];
            
            if (selectedIndex !== '') {
                if (selectedOption.dataset.type === 'small') {
                    currentText = texts[selectedIndex];
                } else if (selectedOption.dataset.type === 'large') {
                    currentText = largeTexts[selectedIndex];
                }
                
                displayText();
                resetTest();
            }
        }
        
        // Отображение текста для набора
        function displayText() {
            textDisplay.innerHTML = '';
            currentText.split('').forEach(char => {
                const span = document.createElement('span');
                span.textContent = char;
                textDisplay.appendChild(span);
            });
            
            // Подсвечиваем первый символ
            if (textDisplay.firstChild) {
                textDisplay.firstChild.classList.add('current');
            }
        }
        
        // Переключение режимов
        function switchMode(e) {
            const newMode = e.currentTarget.dataset.mode;
            
            if (newMode !== currentMode) {
                // Обновляем активный режим
                modeElements.forEach(mode => {
                    mode.classList.remove('active');
                });
                e.currentTarget.classList.add('active');
                currentMode = newMode;
                
                // Показываем/скрываем настройки таймера
                if (newMode === 'timed') {
                    timerSettings.classList.add('active');
                    combineTextsSection.classList.add('active');
                } else {
                    timerSettings.classList.remove('active');
                    combineTextsSection.classList.remove('active');
                }
                
                // Выбираем новый текст
                selectRandomText();
            }
        }
        
        // Обновление целевого времени для режима по таймеру
        function updateTargetTime() {
            const minutes = parseInt(timerMinutes.value) || 0;
            const seconds = parseInt(timerSeconds.value) || 0;
            targetTime = minutes * 60 + seconds;
            remainingTime = targetTime;
            updateTimerDisplay();
        }
        
        // Начало набора текста
        function startTyping() {
            if (!isTyping) {
                isTyping = true;
                startTime = new Date();
                lastInputLength = 0;
                
                if (currentMode === 'timed') {
                    // В режиме по таймеру запускаем обратный отсчет
                    countdownTimer = setInterval(updateCountdown, 1000);
                    updateCountdown();
                } else {
                    // В других режимах просто запускаем таймер
                    timer = setInterval(updateTimer, 1000);
                }
                
                textInput.focus();
                startBtn.innerHTML = '<i class="fas fa-keyboard"></i> Печатайте...';
                startBtn.style.backgroundColor = 'var(--success)';
                
                // Показываем уведомление
                showNotification('Начинайте печатать!', 'success');
            }
        }
        
        // Обновление таймера для обычных режимов
        function updateTimer() {
            const currentTime = new Date();
            const elapsedTime = Math.floor((currentTime - startTime) / 1000);
            const minutes = Math.floor(elapsedTime / 60);
            const seconds = elapsedTime % 60;
            timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            timeDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            
            // Обновляем WPM (знаков в минуту)
            if (elapsedTime > 0) {
                const wpm = Math.floor((correctChars / elapsedTime) * 60);
                wpmDisplay.textContent = wpm;
            }
        }
        
        // Обновление обратного отсчета для режима по таймеру
        function updateCountdown() {
            remainingTime--;
            
            if (remainingTime <= 0) {
                finishTest();
                return;
            }
            
            const minutes = Math.floor(remainingTime / 60);
            const seconds = remainingTime % 60;
            timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            timeDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            
            // Обновляем WPM (знаков в минуту)
            const elapsedTime = targetTime - remainingTime;
            if (elapsedTime > 0) {
                const wpm = Math.floor((correctChars / elapsedTime) * 60);
                wpmDisplay.textContent = wpm;
            }
        }
        
        // Обновление отображения таймера
        function updateTimerDisplay() {
            const minutes = Math.floor(remainingTime / 60);
            const seconds = remainingTime % 60;
            timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }
        
        // Проверка вводимого текста
        function checkTyping(e) {
            if (!isTyping) {
                startTyping();
            }
            
            const inputText = textInput.value;
            const currentCharIndex = inputText.length - 1;
            
            // Проверяем, не пытается ли пользователь стереть текст
            if (inputText.length < lastInputLength) {
                textInput.value = inputText.substring(0, lastInputLength);
                return;
            }
            
            lastInputLength = inputText.length;
            
            // Сбрасываем подсветку текущего символа
            const allChars = textDisplay.querySelectorAll('span');
            allChars.forEach(char => char.classList.remove('current'));
            
            // Подсвечиваем следующий символ
            if (currentCharIndex + 1 < allChars.length) {
                allChars[currentCharIndex + 1].classList.add('current');
            }
            
            // Проверяем правильность ввода
            if (currentCharIndex >= 0) {
                const currentChar = allChars[currentCharIndex];
                const typedChar = inputText[currentCharIndex];
                
                if (typedChar === currentChar.textContent) {
                    currentChar.classList.add('correct');
                    currentChar.classList.remove('incorrect');
                    correctChars++;
                } else {
                    currentChar.classList.add('incorrect');
                    currentChar.classList.remove('correct');
                }
                
                totalChars++;
                
                // Обновляем статистику
                updateStats();
                
                // Обновляем прогресс
                const progress = Math.floor((currentCharIndex + 1) / currentText.length * 100);
                progressBar.style.width = `${progress}%`;
                
                // В режиме по таймеру добавляем новый текст при достижении конца текущего
                if (currentMode === 'timed' && currentCharIndex + 1 === currentText.length) {
                    addMoreTextForTimedMode();
                }
                
                // В других режимах завершаем тест при достижении конца текста
                if (currentMode !== 'timed' && currentCharIndex + 1 === currentText.length) {
                    finishTest();
                }
            }
        }
        
        // Добавление дополнительного текста в режиме по таймеру
        function addMoreTextForTimedMode() {
            // Сохраняем текущий прогресс
            const inputText = textInput.value;
            
            // Выбираем случайный текст (маленький или большой)
            const useLargeText = Math.random() > 0.7; // 30% chance для большого текста
            const newText = useLargeText ? 
                largeTexts[Math.floor(Math.random() * largeTexts.length)] : 
                texts[Math.floor(Math.random() * texts.length)];
            
            // Добавляем новый текст к текущему
            currentText += ' ' + newText;
            displayText();
            
            // Восстанавливаем введенный текст
            textInput.value = inputText;
            
            // Подсвечиваем следующий символ
            const allChars = textDisplay.querySelectorAll('span');
            if (inputText.length < allChars.length) {
                allChars[inputText.length].classList.add('current');
            }
        }
        
        // Обновление статистики
        function updateStats() {
            charsDisplay.textContent = correctChars;
            
            if (totalChars > 0) {
                const accuracy = Math.floor((correctChars / totalChars) * 100);
                accuracyDisplay.textContent = `${accuracy}%`;
            }
        }
        
        // Завершение теста
        function finishTest() {
            clearInterval(timer);
            clearInterval(countdownTimer);
            endTime = new Date();
            isTyping = false;
            textInput.disabled = true;
            startBtn.innerHTML = '<i class="fas fa-check"></i> Завершено';
            startBtn.style.backgroundColor = 'var(--success)';
            
            // Показываем итоговую статистику
            const totalTime = currentMode === 'timed' ? 
                targetTime : 
                Math.floor((endTime - startTime) / 1000);
            const minutes = Math.floor(totalTime / 60);
            const seconds = totalTime % 60;
            
            let statsMessage = `Тест завершён!\nВремя: ${minutes} мин ${seconds} сек\nСкорость: ${wpmDisplay.textContent} зн./мин\nТочность: ${accuracyDisplay.textContent}\nПравильных символов: ${correctChars}`;
            
            if (currentMode === 'timed') {
                statsMessage += `\n\nРежим: На время (${targetTime} сек)`;
            } else {
                statsMessage += `\n\nРежим: ${currentMode === 'small' ? 'Короткий текст' : 'Длинный текст'}`;
            }
            
            showNotification(statsMessage, 'success');
        }
        
        // Сброс теста
        function resetTest() {
            clearInterval(timer);
            clearInterval(countdownTimer);
            timer = null;
            countdownTimer = null;
            startTime = null;
            endTime = null;
            correctChars = 0;
            totalChars = 0;
            isTyping = false;
            remainingTime = targetTime;
            lastInputLength = 0;
            
            textInput.value = '';
            textInput.disabled = false;
            
            timerDisplay.textContent = currentMode === 'timed' ? 
                `${Math.floor(targetTime / 60)}:${targetTime % 60 < 10 ? '0' : ''}${targetTime % 60}` : 
                '00:00';
            wpmDisplay.textContent = '0';
            accuracyDisplay.textContent = '0';
            timeDisplay.textContent = '0:00';
            charsDisplay.textContent = '0';
            progressBar.style.width = '0%';
            
            startBtn.innerHTML = '<i class="fas fa-play"></i> Старт';
            startBtn.style.backgroundColor = 'var(--primary)';
            
            displayText();
        }
        
        // Объединение текстов для режима по таймеру
        function combineTexts() {
            if (currentMode === 'timed') {
                // Выбираем случайное количество текстов (2-5)
                const numTexts = Math.floor(Math.random() * 4) + 2;
                let combinedText = '';
                
                for (let i = 0; i < numTexts; i++) {
                    // Выбираем случайный текст (маленький или большой)
                    const useLargeText = Math.random() > 0.7; // 30% chance для большого текста
                    const text = useLargeText ? 
                        largeTexts[Math.floor(Math.random() * largeTexts.length)] : 
                        texts[Math.floor(Math.random() * texts.length)];
                    
                    combinedText += (i > 0 ? ' ' : '') + text;
                }
                
                currentText = combinedText;
                displayText();
                resetTest();
                
                showNotification(`Объединено ${numTexts} текстов`, 'success');
            }
        }
        
        // Переключение темы
        function switchTheme(e) {
            const theme = e.currentTarget.dataset.theme;
            setTheme(theme);
            
            // Сохраняем выбор темы
            localStorage.setItem('theme', theme);
            
            // Обновляем активную кнопку темы
            themeButtons.forEach(btn => {
                btn.classList.remove('active');
            });
            e.currentTarget.classList.add('active');
        }
        
        // Установка темы
        function setTheme(theme) {
            if (theme === 'dark') {
                document.documentElement.style.setProperty('--primary', 'var(--primary-dark)');
                document.documentElement.style.setProperty('--secondary', 'var(--secondary-dark)');
                document.documentElement.style.setProperty('--success', 'var(--success-dark)');
                document.documentElement.style.setProperty('--warning', 'var(--warning-dark)');
                document.documentElement.style.setProperty('--error', 'var(--error-dark)');
                document.documentElement.style.setProperty('--text', 'var(--text-dark)');
                document.documentElement.style.setProperty('--bg', 'var(--bg-dark)');
                document.documentElement.style.setProperty('--card', 'var(--card-dark)');
                document.documentElement.style.setProperty('--border', 'var(--border-dark)');
                document.documentElement.style.setProperty('--highlight', 'var(--highlight-dark)');
            } else if (theme === 'gray') {
                document.documentElement.style.setProperty('--primary', 'var(--primary-gray)');
                document.documentElement.style.setProperty('--secondary', 'var(--secondary-gray)');
                document.documentElement.style.setProperty('--success', 'var(--success-gray)');
                document.documentElement.style.setProperty('--warning', 'var(--warning-gray)');
                document.documentElement.style.setProperty('--error', 'var(--error-gray)');
                document.documentElement.style.setProperty('--text', 'var(--text-gray)');
                document.documentElement.style.setProperty('--bg', 'var(--bg-gray)');
                document.documentElement.style.setProperty('--card', 'var(--card-gray)');
                document.documentElement.style.setProperty('--border', 'var(--border-gray)');
                document.documentElement.style.setProperty('--highlight', 'var(--highlight-gray)');
            } else {
                // Светлая тема по умолчанию
                document.documentElement.style.setProperty('--primary', 'var(--primary-light)');
                document.documentElement.style.setProperty('--secondary', 'var(--secondary-light)');
                document.documentElement.style.setProperty('--success', 'var(--success-light)');
                document.documentElement.style.setProperty('--warning', 'var(--warning-light)');
                document.documentElement.style.setProperty('--error', 'var(--error-light)');
                document.documentElement.style.setProperty('--text', 'var(--text-light)');
                document.documentElement.style.setProperty('--bg', 'var(--bg-light)');
                document.documentElement.style.setProperty('--card', 'var(--card-light)');
                document.documentElement.style.setProperty('--border', 'var(--border-light)');
                document.documentElement.style.setProperty('--highlight', 'var(--highlight-light)');
            }
        }
        
        // Показ уведомления
        function showNotification(message, type) {
            notificationMessage.textContent = message;
            notification.className = `notification ${type}`;
            notification.classList.add('show');
            
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }
        
        // Предотвращение удаления текста
        function preventBackspace(e) {
            if (e.key === 'Backspace' && isTyping) {
                e.preventDefault();
                showNotification('Нельзя удалять текст во время теста!', 'error');
            }
        }
        
        function preventDelete(e) {
            if (e.key === 'Delete' && isTyping) {
                e.preventDefault();
                showNotification('Нельзя удалять текст во время теста!', 'error');
            }
        }

        
        // Запуск приложения
        init();
    </script>
</body>
</html>
