<?php
function getB($fileName)
{
    $IPv6 = '';
    $file_input = fopen($fileName, 'r');


    for ($j = 0; $j < count(file($fileName)); $j++) {
        // Разделяем по двоеточиям
        $arr = explode(":", fgets($file_input));
        // Берем по каждому элементу по отдельности
        for ($i = 0; $i < count($arr); $i++) {
            // Убираем пробелы
            $arr[$i] = trim($arr[$i]);
            // Если встречается ::, заполняем нулями до макс. кол-ва блоков
            if ($arr[$i] == '') {
                while (count($arr) < 8) {
                    $key = $i;
                    array_splice($arr, $key, 0, '0000');
                }
            }
        }
        // Если блоков < 8 дополняем нулями справа
        while (count($arr) < 8) {
            $arr[] = '0000';
        }
        // Если длина блока < 4, то дополняем слева нулями
        for ($i = 0; $i < 8; $i++) {
            if (strlen($arr[$i]) < 4) {
                $arr[$i] = str_pad($arr[$i], 4, '0', STR_PAD_LEFT);
            }
        }
        // Записываем все результаты
        $IPv6 .= implode(':', $arr) . "\n";
    }
    return $IPv6;
}

$input_file = glob('B/*.dat');
$output_file = glob('B/*.ans');
$n_tests = 8;
$a = 1;
for($k = 0; $k < $n_tests; $k++){
    echo "Результат теста $a: ";
    $a++;
    if (getB($input_file[$k]) == file_get_contents($output_file[$k], 'r')){
        echo "Все супер!\n";
    }
    else{
        echo "ERROR!!!\n";
    }
}
?>

<?php
//                if(strlen($arr[$i][$j]) == 4){
//                    array_push($IPv6, $arr[$i][$j]);
//                }
//                elseif(strlen($arr[$i][$j]) == 3){
//                    $tmp = '0';
//                    $tmpIP = $tmp . $arr[$i][$j];
//                    array_push($IPv6, $tmpIP);
//                }
//                elseif(strlen($arr[$i][$j]) == 2){
//                    $tmp = '00';
//                    $tmpIP = $tmp . $arr[$i][$j];
//                    array_push($IPv6, $tmpIP);
//                }
//                elseif(strlen($arr[$i][$j]) == 1){
//                    $tmp = '000';
//                    $tmpIP = $tmp . $arr[$i][$j];
//                    array_push($IPv6, $tmpIP);
//                }
//                elseif(strlen($arr[$i][$j]) == 0){
//                    $tmp = '0000';
//                    $tmpIP = $tmp . $arr[$i][$j];
//                    array_push($IPv6, $tmpIP);
//                }
//
