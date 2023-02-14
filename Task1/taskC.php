<?php
function getC(string $fileName): string
{
    // Открытие файла с входными данными для чтения
    $input = fopen($fileName, 'r');
    // Строка ответа
    $validation = '';
    while ($str = fgets($input)) {
        // Находим все параметры ввода строку и необходимый тип и параметры валидации
        $line = '';
        $tmp = '';
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] == '<') {
                $i++;
                while ($str[$i] != '>') {
                    $line .= $str[$i];
                    $i++;
                }
                $i++;
                continue;
            }
            $tmp .= $str[$i];
        }
        $array = explode(' ', $tmp);
        $array[0] = trim($array[0]);
        // Сравниваю длину строк с параметрами по условию
        if ($array[0] == 'S') {
            if (strlen($line) >= $array[1] && strlen($line) <= $array[2]) {
                $validation .= "OK\n";
            } else {
                $validation .= "FAIL\n";
            }
        }
        // Проверяю, что либо положительное, либо отрицательное, либо ноль и сравнениваю с условиями -- иначе fail
        if ($array[0] == 'N') {
            if (preg_match('/^-[0-9]*[1-9][0-9]*$/', $line) || preg_match('/^[0-9]*[1-9][0-9]*$/', $line) || $line == '0') {
                if (intval($array[1]) <= intval($line) && intval($array[2]) >= intval($line)) {
                    $validation .= "OK\n";
                } else {
                    $validation .= "FAIL\n";
                }
            } else {
                $validation .= "FAIL\n";
            }
        }

        if ($array[0] == 'P') {
            if (strlen($line) == 18 && preg_match("/\+7 \([0-9]{3}\) ([0-9]{3})-([0-9]{2})-([0-9]{2})/", $line)) {
                $validation .= "OK\n";
            } else {
                $validation .= "FAIL\n";
            }
        }

        if ($array[0] == 'D') {
            $dateAndTime = explode(" ", $line);
            $date = $dateAndTime[0];

            // Значение d-m-y в отдельные переменные
            $day = explode(".", $date)[0];
            $month = explode(".", $date)[1];
            $year = explode(".", $date)[2];
            // Проверяем существование даты
            $isDateValid = checkdate($month, $day, $year);
            // Год должен быть 4-х символьным
            if (strlen($year) != 4) {
                $isDateValid = false;
            }

            $time = $dateAndTime[1];
            $hours = explode(":", $time)[0];
            $minutes = explode(":", $time)[1];


            if ($hours < 24) {
                $isHoursValid = true;
            } else {
                $isHoursValid = false;
            }

            if ($minutes < 60) {
                $isMinutesValid = true;
            } else {
                $isMinutesValid = false;
            }
            // Если все условия соблюдаются
            if ($isDateValid && $isHoursValid && $isMinutesValid) {
                $validation .= "OK\n";
            } else {
                $validation .= "FAIL\n";
            }
        }
        if ($array[0] == 'E') {
            if ($line[0] != '_') {
                if (preg_match('/([0]{0})([A-Za-z0-9]{1})([A-Za-z0-9_]{3,29})@([A-Za-z]{2,30})[.]([a-z]{2,10})/', $line)) {
                    $validation .= "OK\n";
                } else {
                    $validation .= "FAIL\n";
                }
            } else {
                $validation .= "FAIL\n";
            }
        }
    }
    return $validation;
}


$input_file = glob('C/*.dat');
$output_file = glob('C/*.ans');
$n_tests = 14;
$c = 1;
for($k = 0; $k < $n_tests; $k++){
    echo "Результат теста $c: ";
    $c++;
    if (getC($input_file[$k]) == file_get_contents($output_file[$k], 'r')){
        echo "Все супер!\n";
    }
    else{
        echo "ERROR!!!\n";
    }
}