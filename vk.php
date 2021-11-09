<?php

require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client(['verify' => false]);

    $query = [
        'grant_type' => 'password',
        'client_id' => '3140623',
        'client_secret' => 'VeWdmVclDCtn6ihuP1nt',
        'username' => '79688298000',
        'password' => 'blxxbAi2IVax1AhIePBE',
        'scope' => 'notify, friends, photos, audio, video, stories, pages, status, notes, messages, wall, ads, offline, docs, groups, notifications, stats, email, market, stories, photos, app_widget,
        messages, docs, manage',
        'test_redirect_uri'=>0,
        'v'=> 5.126,
        '2fa_supported'=>0,
    ];

    $response = $client->get('https://oauth.vk.com/token', [
        'query'=>$query,
        'http_errors'=>false,
    ]);

    $token = null;

    if($response->getStatusCode()===200)
    {
        $body = (string)$response->getBody();
        $response = json_decode($body, true);
        $token = $response['access_token'];
    }



    $query2 = [
        'type' => 'post',
        'owner_id' => '-48512305',
        'item_id' => '4720071',
        'count' => 100,
        'access_token' => $token,
        'v' => 5.92,

    ];


    $response1 = $client->get('https://api.vk.com/method/likes.getList', [
        'query'=>$query2,
        'http_errors'=>true,
    ]);

    if ($response1->getStatusCode()===200){
        $body = (string)$response1->getBody();
        $response1=json_decode($body, true);

        foreach ($response1['response']['items'] as $v)
        {
            echo "https://vk.com/id{$v}<br>";
        }
    }

   var_dump($response1);
//    var_dump($token);

