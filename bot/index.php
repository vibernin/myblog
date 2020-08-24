<?php

const token = '1029599298:AAEtTE-jiEpT6mOUbGnEw8iy5qLhjxHAYoI';

$url = 'https://api.telegram.org/bot' . token . '/sendMessage';

$params = [
    'chat_id' => '345504641',
    'text' => 'Че, кавоо'
];
$url = $url . '?' . http_build_query($params);
$info = json_decode(file_get_contents($url), JSON_OBJECT_AS_ARRAY);
$info = (array) $info;
print_r($info);