<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/10/19
 * Time: 9:54
 */
//新商品 导入到 各大品牌商铺
header("Content-Type: text/html; charset=utf-8");
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$new_product_id=[118];
$shop_brand_ids=[53,25,101];
$shop_ids=[];
foreach ($shop_brand_ids as $shop_brand_id){
    $sqls='select shop_id from shop where shop_organization_brand_id='.$shop_brand_id.' order by shop_id asc';
    $row=mysqli_query($conn,$sqls);
    foreach ($row as $v){
        $shop_ids[]=$v['shop_id'];
    }
}
foreach ($new_product_id as $id){
    $sql_product='select * from `product` where product_id='.$id;
    $row=mysqli_fetch_assoc(mysqli_query($conn,$sql_product));
    foreach ($shop_ids as $shop){
        $price=$row['default_price'];
        $order_method=$row['order_method'];
        $product_id=$row['product_id'];
        $shop_id=$shop;
        $in_sql="insert into `shop_product` (settlement_price,order_method,product_id,shop_id) values
({$price},{$order_method},{$product_id},{$shop_id})";
        mysqli_query($conn,$in_sql);
    }
}
echo '新商品ok';exit;
