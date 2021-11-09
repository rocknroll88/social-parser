<?php

namespace ASP;
require_once 'vendor/autoload.php';
use GuzzleHttp\Client;

class Parser
{
    private $count;
    private $client;
    private $query;
    private $result;
    private $baseUrl= 'https://allsocial.ru/entity';

    public function __construct($category, $minSubscriber, $maxSubscriber, $count, $period, $type, $verified, $status)
    {
        $this->count=$count;
        $this->client= new Client(['verify' => false]);
        $this->query= [
            'category_id'=>$category,
            'direction'=>1,
            'is_closed'=>$status,
            'is_verified'=>$verified,
            'list_type'=>3,
            'order_by'=>'diff_abs',
            'period'=>$period,
            'platform'=>1,
            'range'=>$minSubscriber.':'.$maxSubscriber,
            'type_id'=>$type,

        ];

    }
    private function getMaxCount()
    {
        $response=(string)$this->client->get($this->baseUrl, [
            'query' =>$this->query,
        ])->getBody();
        $response=json_decode($response, true);

        return $response['response']['total_count'];

    }

    public function  getListGroup ($offset)
    {
        $this->query['offset']=$offset;
        $response=(string)$this->client->get($this->baseUrl,['query'=>$this->query])->getBody();
        return $response;
    }



    public function parse()
    {
        $iterations=null;
        $maxCount=$this->getMaxCount();
        if ($maxCount<$this->count)
        {
            $iterations =ceil($maxCount/25);
        }
        else {
            $iterations = ceil($this->count/25);
        }

        for ($i=1;$i<=$iterations;$i++)
        {
            $response = json_decode($this->getListGroup($i*25), true);

            foreach ($response['response']['entity'] as $v)
            {
                $this->result[]=$v;
            }
        }
        return $this->result;
    }
}

