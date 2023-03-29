<?php

// Считываем файлы и преобразуем XML в объекты SimpleXMLElement
$sections = simplexml_load_file('B/002_sections.xml');
$products = simplexml_load_file('B/002_products.xml');

// Создаем объект для объединенного XML-документа
$output = new SimpleXMLElement('<ЭлементыКаталога></ЭлементыКаталога>');



// Добавляем разделы в объединенный документ
$razdely = $output->addChild('Разделы');
foreach ($sections->Раздел as $razdel) {
    $new_razdel = $razdely->addChild('Раздел');
    $new_razdel->addChild('Ид', (string)$razdel->Ид);
    $new_razdel->addChild('Наименование', (string)$razdel->Наименование);
    $new_tovary = $new_razdel->addChild('Товары');
    // Добавляем товары в раздел

    foreach ($products->Товар as $tovar) {
        if (in_array((string)$razdel->Ид, json_decode(json_encode($tovar->Разделы->ИдРаздела), true))) {
            // ...
        //}
        //if (in_array((string)$razdel->Ид, $tovar->Разделы->ИдРаздела)) {
            $new_tovar = $new_tovary->addChild('Товар');
            $new_tovar->addChild('Ид', (string)$tovar->Ид);
            $new_tovar->addChild('Наименование', (string)$tovar->Наименование);
            $new_tovar->addChild('Артикул', (string)$tovar->Артикул);
        }
    }
}

// Сохраняем объединенный документ в файл output.xml
$output->asXML('output2.xml');

?>

