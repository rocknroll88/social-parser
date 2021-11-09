<?php

require_once 'vendor/autoload.php';
use ASP\Parser;

$category=$_REQUEST['cat'];
$minSubscriber=$_REQUEST['min'];
$maxSubscriber=$_REQUEST['max'];
$count=$_REQUEST['count'];
$period=$_REQUEST['period'];
$type=$_REQUEST['type'];
$verified=$_REQUEST['verified'];
$status= $_REQUEST['status'];

$parser = new Parser($category, $minSubscriber, $maxSubscriber, $count, $period, $type, $verified, $status);

$groups=$parser->parse();

$i=1;
foreach ($groups as $v)
{
    echo $i.'. '.$v['caption'].'<br>';
    echo 'ID группы: '.$v['vk_id'];
    echo '<br>';
    $i++;
}