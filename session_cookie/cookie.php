<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 09:15
 */
header('Content-type:text/html;charset=utf8');
//设置cookie
//setcookie('user',111,time()+120);
if(isset($_COOKIE['user'])) {
    echo '您的浏览器是：' . $_COOKIE['user'];
}