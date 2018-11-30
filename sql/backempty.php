<?php
/**
 * Created by PhpStorm.
 * User: CleverCloud
 * Date: 2018/11/30
 * Time: 16:02
 * 更新返空商品訂單
 */
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$backSql='select bp.shop_product_back_empty_id,p.product_id,p.number_per_box from shop_product_back_empty bp join product p on bp.product_id=p.product_id where bp.shop_product_back_empty_id>1 and bp.back_empty_name=2';
$stmt=mysqli_query($conn,$backSql);//执行sql查询语句
foreach ($stmt as $row){
    $number_per_box=$row['number_per_box'];
    $in_sql="update `shop_product_back_empty` set number_per_box=".$number_per_box.' where shop_product_back_empty_id='.$row['shop_product_back_empty_id'];
    mysqli_query($conn,$in_sql);
}
echo 'ok';
//http://www.old.com/sql/backempty.php
//delete from shop_product_back_empty where shop_product_back_empty_id>1 and shop_id!=50;
// update shop_product_back_empty set back_empty_method=2 where back_empty_name!=2;
//update shop_product_back_empty set back_empty_method=2 where back_empty_name!=2 and shop_product_back_empty_id>1;
// 7,264,19,21,22,50,94,110,123,126,129,130,132,138,139,141,142,143,144,146,147,148,150,151,177,185,186,187,238,254,262,36,261,81,82,92,105,168,134,165,162,167,173,178,196,208
