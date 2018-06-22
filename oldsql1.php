<?php
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("118.24.84.222",'root','pengyun120','mysql') or die('error');
mysqli_query($conn,'set names utf8');
$sql="select * from `user` limit 1";
//$sql="select * from md";//读取所有要崩
$stmt=mysqli_query($conn,$sql);//获取所有
var_dump($stmt);exit;
mysqli_close($conn);