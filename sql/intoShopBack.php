<?php
//商铺商品 导入到 新商铺
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select * from `shop_product_back_empty` where shop_id=50";
$stmt=mysqli_query($conn,$sql);//执行sql查询语句

//$ids=[168,169,170,171,172];
//$ids=[173,174,175,176,177];
//$ids=[178,179,180];
//3-50-214
for ($i=51;$i<214;$i++){
    foreach ($stmt as $row){
        $back_empty_name=$row['back_empty_name'];
        $back_empty_real_price=$row['back_empty_real_price'];
        $product_id=$row['product_id'];
        $shop_id=$i;
        $in_sql="insert into `shop_product_back_empty` (back_empty_name, back_empty_real_price,product_id,shop_id) values
({$back_empty_name},{$back_empty_real_price},{$product_id},{$shop_id})";
        mysqli_query($conn,$in_sql);
    }
}
echo 'ok';exit;