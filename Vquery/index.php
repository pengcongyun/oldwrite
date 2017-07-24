<?php
require_once ('Vquery.php');
$arr=array(
    "url"=>'http://www.yuntask.com',
    'method'=>'get'or 'post',
    'data'=>array('username'=>'admin','password'=>'admin'),
    'header'=>array('DESC:admin',),
		);

$cc=new Vquery($arr);
$s=$cc->find('a')->html();
var_dump($s);