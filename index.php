<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/1 0001
 * Time: 15:15
 */
require_once './sphinxapi.php';
$obj=new SphinxClient;
$obj->SetServer('127.0.0.1',9312);
$obj->SetArrayResult(true);
$rzt=$obj->Query('tes');
var_dump($rzt);exit;