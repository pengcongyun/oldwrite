<?php
//计算查询时间长短
$stime=microtime(true);
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','test')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select * from `md` where Iname='辛长海' limit 1";
//$sql="select * from md";//读取所有要崩
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
//var_dump($stmt);
foreach ($stmt as $row){
    var_dump($row);
}
$etime=microtime(true);//获取程序执行结束的时间
$total=$etime-$stime;   //计算差值
echo "<br />[页面执行时间：{$total} ]秒";