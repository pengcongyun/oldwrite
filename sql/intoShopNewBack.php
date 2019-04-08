<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/10/19
 * Time: 9:54
 */
//新返空 导入到 各大商铺
header("Content-Type: text/html; charset=utf-8");
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
//$conn=mysqli_connect("127.0.0.1",'root','root','yii2_niuniu')or die('error');
//$conn=mysqli_connect("127.0.0.1",'root','root','yii2_test')or die('error');
mysqli_query($conn,'set names utf8');
$new_product_id=[
    ['product_id'=>31,'back_name'=>1,'back_price'=>1]
];

foreach ($new_product_id as $id){
    for($i=3;$i<=425;$i++) {
//        去重添加
        $sql_exist='select * from shop_product_back_empty where back_empty_name='.$id['back_name'].' and product_id='.$id['product_id'].' and shop_id='.$i;
        $count=mysqli_num_rows(mysqli_query($conn,$sql_exist));
        if($count==0){
            $back_empty_name = $id['back_name'];
            $number_per_box = 1;
            $back_empty_price = $id['back_price'];
            $product_id = $id['product_id'];
            $shop_id = $i;
            $in_sql = "insert into `shop_product_back_empty` (back_empty_name,number_per_box,back_empty_price,product_id,shop_id) values
({$back_empty_name},{$number_per_box},{$back_empty_price},{$product_id},{$shop_id})";
            mysqli_query($conn, $in_sql);
        }
    }
}
echo '新商品ok';exit;
//http://www.old.com/sql/intoShopNewBack.php
//http://www.pa.com/sql/intoShopNewBack.php