<?php
/**
 * Created by PhpStorm.
 * User: CleverCloud
 * Date: 2019/1/18
 * Time: 10:36
 */
$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select shop_id from shop_product where shop_product_id>1";
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
$ids=[];
foreach ($stmt as $k){
    $ids[]=$k['shop_product_id'];
}