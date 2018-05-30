<?php
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','test')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select * from `news` order by id DESC ";
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
foreach ($stmt as $row){
    echo '<html lang="en"><head><meta charset="UTF-8"></head><body><div style="text-indent: 2em;">'.$row['description'].'</div></body></html>';
}