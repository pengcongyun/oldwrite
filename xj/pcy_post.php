<?php
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','test_niuniu')or die('error');
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','test_niuniu')or die('error');
$ss=mysqli_query($conn,'set names utf8');
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];
$f=$_POST['f'];
$g=$_POST['g'];
$h=$_POST['h'];
$i=$_POST['i'];
$created=date('Y-m-d H:i:s');
//$sql="insert into `xj` (questiona,questionb,questionc,questiond,questione,questionf,questiong,questionh,questioni,created) values ('{$a}','{$b}','{$c}','{$d}','{$e}','{$f}','{$g}','{$h}','{$i}',{$created})";
$sql="insert into `xj` (questiona,questionb,questionc,questiond,questione,questionf,questiong,questionh,questioni,created) values ('{$a}','{$b}','{$c}','{$d}','{$e}','{$f}','{$g}','{$h}','{$i}','{$created}')";

$aa=mysqli_query($conn,$sql);//执行sql查询语句
header("Location: http://www.pa.com/xj/pcy.php");
//header("Location: http://api.niuniufuture.com/xj/pcy.php");
exit;
