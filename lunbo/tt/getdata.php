<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/6/28
 * Time: 11:19
 */
$conn=mysqli_connect("127.0.0.1",'root','root','yii_template')or die('error');
mysqli_query($conn,'set names utf8');
//获取数量
$allsql="select count(*) from `city`";
$allrows=mysqli_query($conn,$allsql);
$sums=mysqli_fetch_row($allrows);
$limit=10;
$sum=ceil($sums[0]/$limit);
//循环分页打印
for($i=1;$i<=$sum;$i++){
    $offset=($i-1)*$limit;
    $sql="select * from `city` order by city_id asc limit $offset,$limit ";
    $stmt=mysqli_query($conn,$sql);//获取所有
    foreach ($stmt as $k=>$row){
        $data[$k]=$row;
    }
    $data1[$i]=$data;
}

echo json_encode($data1);exit;