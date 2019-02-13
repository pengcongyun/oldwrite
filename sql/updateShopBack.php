<?php
/**
 * Created by PhpStorm.
 * User: CleverCloud
 * Date: 2019/2/11
 * Time: 15:35
 * 更新商铺返空  组件
 */
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','yii2_niuniu')or die('error');
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
//1:瓶盖, 2:瓶身, 3:箱子
//$back_empty_name=3;
//$price=6;
$back_empty_name=2;
$price=0.25;
$product_id=50;
//update shop_product_back_empty set back_empty_price=0.25 where product_id=50 and back_empty_name=2;
//update shop_product_back_empty set back_empty_price=6 where product_id=50 and back_empty_name=3;

$sql='select shop_product_id from shop_product where product_id='.$product_id;
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
$arr=[];
foreach ($stmt as $row){
    $arr[]=$row['shop_product_id'];
}
$arr_str=implode(',',$arr);
$update_sql="update shop_product_component set component_price=".$price." where shop_product_id in (".$arr_str.") and component_name=".$back_empty_name;
mysqli_query($conn,$update_sql);
echo 'ok';
//www.old.com/sql/updateShopBack.php