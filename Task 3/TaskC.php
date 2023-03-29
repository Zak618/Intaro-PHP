<?php

// Считываем количество целей
$n = intval(trim(fgets(STDIN)));

// Считываем идентификаторы целей и сохраняем их в массив
$goals = [];
for ($i = 0; $i < $n; $i++) {
    $goal = trim(fgets(STDIN));
    $goals[$goal] = $i + 1;
}

// Считываем количество событий
$m = intval(trim(fgets(STDIN)));

// Создаем массив для хранения количества выполненных целей
$completed_goals = array_fill(0, $n, 0);

// Обрабатываем каждое событие
foreach (range(1, $m) as $i) {
    // Считываем идентификатор пользователя и идентификатор выполненной цели
    list($user_id, $goal_id) = explode(' ', trim(fgets(STDIN)));

    // Если цель существует, увеличиваем количество выполненных целей
    if (isset($goals[$goal_id])) {
        $completed_goals[$goals[$goal_id] - 1]++;
    }
}

// Вычисляем процент выполнения каждой цели
$percentages = array_map(function ($count) use ($m) {
    return round($count / $m * 100);
}, $completed_goals);

// Создаем изображение размером 600x600 пикселей
$image = imagecreatetruecolor(600, 600);

// Определяем цвета для каждого сегмента воронки
$colors = [
    imagecolorallocate($image, 255, 0, 0), // Красный
    imagecolorallocate($image, 255, 165, 0), // Оранжевый
    imagecolorallocate($image, 255, 255, 0), // Желтый
    imagecolorallocate($image, 0, 128, 0), // Зеленый
    imagecolorallocate($image, 0, 0, 255), // Синий
    imagecolorallocate($image, 75, 0, 130), // Индиго
    imagecolorallocate($image, 238, 130, 238), // Фиолетовый
];

// Определяем размеры сегментов воронки
$segment_height = floor(600 / $n);
$last_segment_height = $segment_height + (600 % $n);

// Рисуем каждый сегмент воронки
$y = 0;
foreach ($percentages as $i => $percentage) {
    $height = ($i == $n - 1) ? $last_segment_height : $segment_height;
    imagefilledrectangle($image, 0, $y, $percentage * 6, $y + $height, $colors[$i]);
    $y += $height;
}

// Сохраняем изображение в файл output.png
imagepng($image, 'output.png');
imagedestroy($image);

?>
//В этом примере мы считываем количество целей и их идентификаторы в массив $goals. Затем мы считываем количество событий и обрабатываем каждое событие, увеличивая количество выполненных целей при необходимости. Далее мы вычисляем процент выполнения каждой цели и создаем изображение размером 600x600 пикселей с помощью функции imagecreatetruecolor(). Затем мы определяем цвета для каждого сегмента воронки и размеры каждого сегмента. Наконец, мы рисуем каждый сегмент воронки с помощью функции imagefilledrectangle() и сохраняем изображение в файл output.png с помощью функции imagepng().