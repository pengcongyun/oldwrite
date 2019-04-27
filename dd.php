<?php
/**
 * Created by PhpStorm.
 * User: CleverCloud
 * Date: 2019/1/18
 * Time: 10:36
 */
//echo date('Y-m-d H:i:s','1550371320');
function generate_password( $length = 12 ) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz_0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz_0123456789';
    $password = '';
    for ( $i = 0; $i < $length; $i++ )
    {
        $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    }
    return $password;
}
echo generate_password(32);