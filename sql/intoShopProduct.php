<?php
//商铺商品 导入到 新商铺
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select * from `shop_product` where shop_id=50";
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
//$ids=[168,169,170,171,172];
//$ids=[173,174,175,176,177];
//$ids=[178,179,180];
//$ids=[185,214];
//$ids=[215,240];
for ($i=252;$i<=253;$i++){
    foreach ($stmt as $row){
        $order_method=$row['order_method'];
        $price=$row['settlement_price'];
        $product_id=$row['product_id'];
        $shop_id=$i;
        $in_sql="insert into `shop_product` (order_method, settlement_price,product_id,shop_id) values
({$order_method},{$price},{$product_id},{$shop_id})";
        mysqli_query($conn,$in_sql);
    }
}
echo 'ok';exit;
//http://www.old.com/sql/intoShopProduct.php