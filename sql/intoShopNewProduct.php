<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/10/19
 * Time: 9:54
 */
//新商品 导入到 各大商铺
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
//$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$new_product_id=[167,168];
foreach ($new_product_id as $id){
    $sql_product='select * from `product` where product_id='.$id;
    $row=mysqli_fetch_assoc(mysqli_query($conn,$sql_product));
    for($i=3;$i<=290;$i++) {
        //去重添加
        $sql_exist='select count(*) as counts from shop_product where product_id='.$id.' and shop_id='.$i;
        $res=mysqli_query($conn,$sql_exist);
        while($rows = mysqli_fetch_assoc($res)) {
            if ($rows['counts'] == 0) {
                $price = $row['default_price'];
                $order_method = $row['order_method'];
                $product_id = $id;
                $shop_id = $i;
                $in_sql = "insert into `shop_product` (order_price,settlement_price,order_method,product_id,shop_id) values
({$price},{$price},{$order_method},{$product_id},{$shop_id})";
                mysqli_query($conn, $in_sql);
            }
        }
    }
}
echo '新商品ok';exit;
//http://www.old.com/sql/intoShopNewProduct.php