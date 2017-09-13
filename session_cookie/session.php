<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 09:10
 */
header("Content-Type: text/html; charset=utf-8");
session_start();
$_SESSION['admin']=120;//设置一个session值
var_dump($_SESSION['admin']);
//unset($_SESSION['admin']);//删除单个session
//var_dump(isset($_SESSION['admin']));

$_SESSION['arr']=['user'=>'云哥','pwd'=>'abcd','exp'=>200];//设置多个session
var_dump($_SESSION['arr']['exp']);
var_dump($_SESSION['arr']);

//删除session必须使用unset()
session_destroy(); //并清空会话中的所有资源。。该函数不会unset(释放)和当前session相关的全局变量(globalvariables),也不会删除客户端的session cookie.
echo '<br>';
var_dump($_SESSION['admin']);

