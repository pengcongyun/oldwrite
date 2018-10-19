<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/10/19
 * Time: 9:54
 */
//新商品 导入到 各大商铺
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select * from `shop_product` where shop_id=50";
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
$new_product_id=[101];
foreach ($new_product_id as $id){
    $sql_product='select * from `product` where product_id='.$id;
    $row=mysqli_fetch_assoc(mysqli_query($conn,$sql_product));
    for ($i=3;$i<168;$i++){
        $price=$row['default_price'];
        $product_id=$row['product_id'];
        $shop_id=$i;
        $in_sql="insert into `shop_product` (single_settlement_price,product_id,shop_id) values
({$price},{$product_id},{$shop_id})";
        mysqli_query($conn,$in_sql);
    }
}
echo 'ok';exit;
