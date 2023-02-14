
<?php
function getA($filename){ // Создаем функцию для подсчета баланса

    // Создаем переменную для баланса, а также два массива: 1) Для ставок сделанных игроком; 2) Для игр которые прошли
    $balance = 0;
    $bets = [];
    $games = [];


    $fileinput = fopen($filename, 'r'); // Открываем файл для чтения и записываем в переменную
    $n = fgets($fileinput); // Кол-во ставок

    // Следующая строка будет состоять из 3-ех элементов: 0 - ID игры; 1 - Сумма ставки; 2 - Результат игры
    for($i = 0; $i < $n; $i++){
        $input_file_temp = fgets($fileinput);
        $input_file_bets = explode(" ", $input_file_temp);
        array_push($bets, $input_file_bets);
    }


    // Кол-во игр
    $m = fgets($fileinput);

    // Следующая строка будет состоять из 5-ти элементов:
    // 0 - ID игры
    // 1 - коэффициент на победу левой команды
    // 2 - коэффициент на победу правой команды
    // 3 - коэффициент на ничью
    // 4 - результат игры
    for($j = 0; $j < $m; $j++){
        $input_file_temp = fgets($fileinput);
        $input_file_games = explode(" ", $input_file_temp);
        array_push($games, $input_file_games);
    }



    // Сранвиваем элемменты массива bets и games
    // Если все условия пройдены, то записывем результат к балансу
    // Иначе вычитаем сумму из нашего баланса
    for($i = 0; $i < $n; $i++){
        for($j = 0; $j < $m; $j++){
            if($bets[$i][0] == $games[$j][0]){
                if($bets[$i][2] == $games[$j][4]){
                        if($bets[$i][2] == "L\n"){
                            $balance += $bets[$i][1] * $games[$j][1] - $bets[$i][1];
                        }
                        elseif ($bets[$i][2] == "R\n"){
                            $balance += $bets[$i][1] * $games[$j][2] - $bets[$i][1];
                        }
                        elseif ($bets[$i][2] == "D\n"){
                            $balance += $bets[$i][1] * $games[$j][3] - $bets[$i][1];
                        }
                    }
                else {
                    $balance -= $bets[$i][1];
                }
                }


            }
        }

    // Возвращаем значение
    return $balance;
}


function answer($output_filename){
    $output_filename_temp = fopen($output_filename, 'r');
    $out_ret = fgets($output_filename_temp);
    return $out_ret;
}


$input_file = glob('A/*.dat');
$output_file = glob('A/*.ans');
$n_tests = 8;
$a = 1;
for($k = 0; $k < $n_tests; $k++){
    echo "Результат теста $a: ";
    $a++;
    if (answer($output_file[$k]) == getA($input_file[$k])){
        echo "Все супер!\n";
    }
    else{
        echo "ERROR!!!\n";
    }
}

?>
