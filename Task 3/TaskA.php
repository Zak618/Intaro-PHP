<?php

$n = intval(fgets(STDIN)); // считываем количество рейсов

for ($i = 0; $i < $n; $i++) {
    $line = explode(" ", trim(fgets(STDIN))); // считываем описание рейса и разбиваем его на составляющие
    $departure_time = DateTime::createFromFormat('d.m.Y_H:i:s', $line[0]); // преобразуем дату и время вылета в объект DateTime
    $departure_timezone = intval($line[1]); // считываем часовой пояс вылета
    $arrival_time = DateTime::createFromFormat('d.m.Y_H:i:s', $line[2]); // преобразуем дату и время прилета в объект DateTime
    $arrival_timezone = intval($line[3]); // считываем часовой пояс прилета



    // Преобразуем даты и время в UTC и вычисляем разницу в секундах
    $departure_utc = clone $departure_time;
    $departure_utc->sub(new DateInterval('PT'.abs($departure_timezone).'H'));


    $arrival_utc = clone $arrival_time;
    $arrival_utc->sub(new DateInterval('PT'.abs($arrival_timezone).'H'));

    $flight_duration = intval($arrival_utc->getTimestamp() - $departure_utc->getTimestamp());

    echo $flight_duration . "\n"; // выводим результат
}

