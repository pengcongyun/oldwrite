<?php
//商铺返空商品 导入到 新商铺
header("Content-Type: text/html; charset=utf-8");
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
//$conn=mysqli_connect("127.0.0.1",'root','root','yii2_test')or die('error');
mysqli_query($conn,'set names utf8');
$bz_shop_id=48;
//$i=300;
$newShopId=[410];
$sql="select * from `shop_product_back_empty` where shop_id=".$bz_shop_id;
$stmt=mysqli_query($conn,$sql);//执行sql查询语句

foreach ($newShopId as $i){
    foreach ($stmt as $row){
        $same_sql="select * from `shop_product_back_empty` where shop_id='.$i.' and product_id=".$row['product_id']." and number_per_box=".$row['number_per_box']." and back_empty_name=".$row['back_empty_name'];
        $count=mysqli_num_rows(mysqli_query($conn,$same_sql));
        if($count==0){
            $back_empty_name=$row['back_empty_name'];
            $number_per_box=$row['number_per_box'];
            $back_empty_price=$row['back_empty_price'];
            $product_id=$row['product_id'];
            $shop_id=$i;
            $in_sql="insert into `shop_product_back_empty` (back_empty_name,number_per_box,back_empty_price,product_id,shop_id) values
({$back_empty_name},{$number_per_box},{$back_empty_price},{$product_id},{$shop_id})";
            mysqli_query($conn,$in_sql);
        }
    }
}
echo 'ok';exit;

// http://www.old.com/sql/intoShopBack.php
// http://www.pa.com/sql/intoShopBack.php