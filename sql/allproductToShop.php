<?php
/**
 * Created by PhpStorm.
 * User: CleverCloud
 * Date: 2018/11/19
 * Time: 14:28
 * 补全商铺商品
 */
header("Content-Type: text/html; charset=utf-8");
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$product_ids=[108,109,110,111,157,116,105,106];
foreach ($product_ids as $product_id){
    //查询商品的价格
    $sql="select order_method,default_price from `product` where product_id=".$product_id;
    $res=mysqli_query($conn,$sql);
    foreach ($res as $row){
        $price=$row['default_price'];
        $order_method=$row['order_method'];
    }
    for ($j=3;$j<=259;$j++){
        $sql_exist='select count(*) as counts from shop_product where product_id='.$product_id.' and shop_id='.$j;
        $res=mysqli_query($conn,$sql_exist);
        while($row = mysqli_fetch_assoc($res)) {
            if($row['counts']==0){
                $in_sql="insert into `shop_product` (order_price,settlement_price,order_method,product_id,shop_id) values
({$price},{$price},{$order_method},{$product_id},{$j})";
                mysqli_query($conn,$in_sql);
            }
        }
    }
}
echo 'ok';exit;
//http://www.old.com/sql/allproductToshop.php
