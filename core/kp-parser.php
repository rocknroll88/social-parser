<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require '../vendor/autoload.php';
use DiDom\Document;
$client = new GuzzleHttp\Client(['verify' => false]);
$link = 'https://www.kinopoisk.ru/lists/navigator/?tab=all';
$response = $client->request('GET', $link);
if ($response->getStatusCode()==200) {
    $resBody = (string)$response->getBody();
    $document = new Document($resBody);
    echo $document;
    $links = $document->find('selection-film-item-meta a.selection-film-item-meta__link');
    foreach ($links as $link) {
        echo 'Ссылка: ' . $link->attr('href');
        echo '<br>';
    }
}
