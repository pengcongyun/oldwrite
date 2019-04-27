<?php
//商铺商品 导入到 新商铺
header("Content-Type: text/html; charset=utf-8");
//$conn=mysqli_connect("127.0.0.1",'root','root','yii2_test')or die('error');
//$conn=mysqli_connect("127.0.0.1",'root','root','pp')or die('error');
$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$bz_shop_id=433;
$in_shop_ids=[439];
$sql="select * from `shop_product` where shop_id=".$bz_shop_id;
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
//$ids=[168,169,170,171,172];
//$ids=[173,174,175,176,177];
//$ids=[178,179,180];
//$ids=[185,214];
//$ids=[215,240];
//     257
//var_dump($stmt);exit;345
//for ($i=351;$i<=353;$i++){
foreach ($in_shop_ids as $i){
    foreach ($stmt as $row){
//            if(in_array($row['product_price_id'],[22,24])){
//
//            }else{
                $order_method = $row['order_method'];
                $number_per_box = $row['number_per_box'];
                $order_price = $row['order_price'];
                $price = $row['settlement_price'];
                $product_id = $row['product_id'];
                $product_price_id = $row['product_price_id'];
                $shop_id = $i;
                $in_sql = "insert into `shop_product` (order_method,number_per_box,order_price,settlement_price,product_id,product_price_id,shop_id) values
    ({$order_method},{$number_per_box},{$order_price},{$price},{$product_id},{$product_price_id},{$shop_id})";
                mysqli_query($conn, $in_sql);
//            }
    }
}
echo 'ok';exit;
//http://www.old.com/sql/intoShopProduct.php
//http://www.pa.com/sql/intoShopProduct.php