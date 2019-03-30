<?php
set_time_limit(0) ;
//商铺商品部件 导入到 新商铺
header("Content-Type: text/html; charset=utf-8");
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
//$conn=mysqli_connect("127.0.0.1",'root','root','yii2_test')or die('error');
mysqli_query($conn,'set names utf8');
$bz_shop_id=50;
$newShopId=[424];
$sql="select * from `shop_product` where shop_id=".$bz_shop_id;
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
//for ($i=308;$i<=309;$i++){
foreach ($newShopId as $i){
    foreach ($stmt as $row){
        $sql3="select * from shop_product where shop_id=".$i." and product_price_id=".$row['product_price_id'];
        $new_shop_product_id=mysqli_fetch_assoc(mysqli_query($conn,$sql3))['shop_product_id'];
//        var_dump($new_shop_product_id);exit;
        $component_sql="select * from shop_product_component where shop_product_id=".$row['shop_product_id'];
        $stmt3=mysqli_query($conn,$component_sql);
        foreach ($stmt3 as $rows){
            $component_name=$rows['component_name'];
            $component_price=$rows['component_price'];
            $component_number=$rows['component_number'];
            $in_sql="insert into shop_product_component (component_name,component_price,component_number,shop_product_id) values ({$component_name},{$component_price},{$component_number},{$new_shop_product_id})";
            mysqli_query($conn,$in_sql);
        }
    }
}
echo 'ok';exit;

// http://www.old.com/sql/intoShopComponent.php
// http://www.pa.com/sql/intoShopComponent.php