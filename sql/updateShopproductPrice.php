<?php
/**
 * Created by PhpStorm.
 * User: CleverCloud
 * Date: 2018/11/19
 * Time: 11:28
 * 修改订购价结算价 为标准价
 */
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
//$product_ids=[23,47,35];//
$product_ids=[23,47,35,2,113,8,9,63,68,7];

foreach($product_ids as $product_id){
    $sql="select default_price from `product` where product_id=".$product_id;
    $stmt=mysqli_query($conn,$sql);//执行sql查询语句
    foreach ($stmt as $row){
        $in_sql="update `shop_product` set order_price=".$row['default_price'].",settlement_price=".$row['default_price']." where product_id=".$product_id;
        mysqli_query($conn,$in_sql);
    }
}
echo 'ok';exit;
//http://www.old.com/sql/updateShopproductPrice.php