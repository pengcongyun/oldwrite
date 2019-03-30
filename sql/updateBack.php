<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/1
 * Time: 17:33
 */
//$conn=mysqli_connect("127.0.0.1",'root','root','yii2_test')or die('error');
$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select shop_id from shop_product where product_price_id=75 and order_price=72;";
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
$arr=[];
foreach ($stmt as $row){
    $arr[]=$row['shop_id'];
}
$arr_str=implode(',',$arr);
var_dump($arr);exit;
$back_sql="update shop_product_back_empty set back_empty_price=16 where shop_id in (".$arr_str.") and product_id=75 and back_empty_name=3";
//$back_sql="update shop_product_back_empty set back_empty_price=0.8 where shop_id in (".$arr_str.") and product_id=75 and back_empty_name=2";
$res=mysqli_query($conn,$back_sql);
var_dump($res);


