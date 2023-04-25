<?php 

// решение первого задания
// Входные данные:
// $line - строка содержимого всего файла
// Выходные данные:
// строка в виде следующего шаблона:
// "кол-во_показов идентификатор дата_время_последнего_показа"
function task1($line){
    $results = array();
    $data = explode("\n", $line);
    $first_time = true;
    foreach($data as $d){
        $dat = explode("\t", $d);
        $first_time = true;
        foreach($results as &$result){
            if($result['id'] === $dat[0]){
                $result['count']++;
                if(strtotime($result['last_datetime']) < strtotime($dat[1])){
                    $result['last_datetime'] = $dat[1];
                }
                $first_time = false;
            }
        }
        if($first_time){
            $results[] = [
                'id' => $dat[0],
                'last_datetime' => $dat[1],
                'count' => 1
            ];
            $first_time = false;
        }
    }
    $line = "";
    foreach($results as &$result){
        $line .= $result['count'] . " " . $result['id'] . " " . $result['last_datetime'] . "\n";
    }
    $line = substr($line,0,-1);
    return $line;
}