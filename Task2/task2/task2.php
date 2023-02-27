<?php

function getTask2(string $str): string
{
    # неверный формат ссылки старого образца
    if (!preg_match('/http:\/\/asozd\.duma\.gov\.ru\/main\.nsf\/\(Spravka\)\?OpenAgent&RN=[0-9-]+&[0-9]+/', $str)) {
        $str = 'Ошибка! Строка не подходит под указанный формат!';
    } else {
        preg_match_all("/[0-9-]+/", $str, $numbers);
        # номер законопроекта
        $law_number = $numbers[0][0];
        $str = 'http://sozd.parlament.gov.ru/bill/' . $law_number;
    }
    return $str;
}

echo 'Ссылка старого формата: ' . $_GET['str'] . '<br>';

echo 'Ссылка нового формата: ' . getTask2($_GET['str']);
