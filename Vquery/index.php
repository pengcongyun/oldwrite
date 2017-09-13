<?php
require_once ('Vquery.php');
header("Content-Type: text/html; charset=utf-8");
$arr=array(
    "url"=>'http://www.ts110.cn',
    'method'=>'get'or 'post',
    'data'=>array('username'=>'admin','password'=>'admin'),
    'header'=>array('DESC:admin',),
		);

$cc=new Vquery($arr);
$s=$cc->find('img')->html();
var_dump($s);