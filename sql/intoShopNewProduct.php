<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/10/19
 * Time: 9:54
 */
//新商品 导入到 各大商铺
header("Content-Type: text/html; charset=utf-8");
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
//$conn=mysqli_connect("127.0.0.1",'root','root','yii2_niuniu')or die('error');
//$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$new_product_price_id=[395];
//update shop_product set order_price=240,settlement_price=240 where product_price_id=395;
$sql_shop='select shop_id from `shop` where shop_organization_brand_id not in (26,25,197,136,230) and shop_id>2';
$res=mysqli_query($conn,$sql_shop);
$shop_ids=[];
foreach ($res as $r){
    $shop_ids[]=$r['shop_id'];
}
var_dump($shop_ids);exit;
foreach ($new_product_price_id as $id){
    $sql_product='select * from `product_price` where product_price_id='.$id;
    $row=mysqli_fetch_assoc(mysqli_query($conn,$sql_product));
//    for($i=3;$i<=461;$i++) {
        //去重添加
    foreach ($shop_ids as $k=>$i){
        $sql_exist='select * from shop_product where product_price_id='.$id.' and shop_id='.$i;
        $count=mysqli_num_rows(mysqli_query($conn,$sql_exist));
        if($count==0){
            $order_price=144;
            $settle_price=144;
            $number_per_box = $row['number_per_box'];
            $order_method = $row['order_method'];
            $product_price_id = $row['product_price_id'];
            $product_id = $row['product_id'];
            $shop_id = $i;
            $in_sql = "insert into `shop_product` (order_price,settlement_price,order_method,number_per_box,product_id,product_price_id,shop_id) values
({$order_price},{$settle_price},{$order_method},{$number_per_box},{$product_id},{$product_price_id},{$shop_id})";
            mysqli_query($conn, $in_sql);
        }
    }
}
echo '新商品ok';exit;
//http://www.old.com/sql/intoShopNewProduct.php
//http://www.pa.com/sql/intoShopNewProduct.php