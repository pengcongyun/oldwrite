<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31 0031
 * Time: 10:46
 */
//将PHPredis拓展解压放入ext下，配置PHP.ini 即可使用PHPredis，记住要开启redis客户端
$redis=new Redis();
$redis->connect('localhost',6379);
//$result = $redis->set('test',2);//设置
//var_dump($result);    //结果：bool(true)
//$redis->expire('test',30);//给键设置过期时间
var_dump($redis->get('test'));//获取
//var_dump($redis->decr('test'));//自减
//var_dump($redis->incr('test'));//自增

//var_dump($redis->delete('test'));//删除