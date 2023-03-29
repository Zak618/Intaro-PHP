<?php

// читаем исходный файл
$html = file_get_contents('D/001.html');

// удаляем комментарии, кроме тех, что начинаются со слова skip-delete
$html = preg_replace('/<!--(?!skip-delete).*?-->/s', '', $html);

// заменяем больше одного пробела подряд на один пробел
$html = preg_replace('/\s+/', ' ', $html);

// удаляем пробелы, переносы строк и табуляцию вне тегов
$html = preg_replace('/(?<=>)\s+|\s+(?=<)/m', '', $html);

// находим все скрипты, кроме тех, что имеют атрибут data-skip-moving со значением true
preg_match_all('/<script\s+(?!.*data-skip-moving="true").*?<\/script>/s', $html, $scripts);

// удаляем найденные скрипты из исходного текста
$html = preg_replace('/<script\s+(?!.*data-skip-moving="true").*?<\/script>/s', '', $html);

// добавляем найденные скрипты в конец html-страницы
$html = preg_replace('/<\/body>/', implode('', $scripts[0]) . '</body>', $html);

// записываем оптимизированный текст в выходной файл
file_put_contents('outputD1.html', $html);

