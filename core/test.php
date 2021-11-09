<?php

use DiDom\Document;
$domain='https://yandex.ru';
require 'vendor/autoload.php';
$client = new \GuzzleHttp\Client(['verify' => false]);
$response = $client->request('GET', $domain);


if ($response->getStatusCode()==200){
    $resBody=(string)$response->getBody();
    $document = new Document($resBody);
    $links=$document->find('div.news__header div.news__panels div.news__panel ol.list li.list__item a.home-link');
    foreach ($links as $link) {
        echo 'Ссылка: '.$link->attr('href');
        echo '<br>';
        echo 'Заголовок: '.$link->attr('aria-label');
        echo '<br>';
        echo '<br>';
    }
}else{
    echo 'Некорректный ответ. Код статуса: '.$response->getStatusCode();
}




