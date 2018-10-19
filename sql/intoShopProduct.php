<?php
//计算查询时间长短
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select * from `shop_product` where shop_id=50";
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
//$ids=[168,169,170,171,172];
//$ids=[173,174,175,176,177];
$ids=[178,179,180];
for ($i=0;$i<count($ids);$i++){
    foreach ($stmt as $row){
        $rebate_rate=$row['rebate_rate'];
        $price=$row['single_settlement_price'];
        $product_id=$row['product_id'];
        $shop_id=$ids[$i];
        $in_sql="insert into `shop_product` (rebate_rate, single_settlement_price,product_id,shop_id) values
({$rebate_rate},{$price},{$product_id},{$shop_id})";
        mysqli_query($conn,$in_sql);
    }
}
//$ids=[103,104,105,106,107,108,109];
//$data=ShopProduct::model()->findAll('shop_id=50');
//for ($i=0;$i<count($ids);$i++){
//    foreach ($data as $row){
//        $shopproduct=new ShopProduct();
//        $shopproduct->rebate_rate=$row['rebate_rate'];
//        $shopproduct->single_settlement_price=$row['single_settlement_price'];
//        $shopproduct->product_id=$row['product_id'];
//        $shopproduct->shop_id=$ids[$i];
//        $shopproduct->user_id=1;
//        $shopproduct->insert(false);
//    }
//}
echo 'ok';exit;