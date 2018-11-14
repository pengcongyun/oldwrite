<?php
$time='2018-10-5';
$d=strtotime($time);
$timer=date('Y-m-d',$d);
echo $d;
echo '<hr>';
echo $timer;
echo '<hr>';
echo date('Y-m-d H:i:s');