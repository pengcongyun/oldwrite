<?php
//商铺商品 导入到 新商铺
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select * from `shop_product_back_empty` where shop_id=50";
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
for ($i=51;$i<258;$i++){
    foreach ($stmt as $row){
        $same_sql='select * from `shop_product_back_empty` where shop_id='.$i.' and product_id='.$row['product_id'].' and back_empty_name='.$row['back_empty_name'];
        $count=mysqli_num_rows(mysqli_query($conn,$same_sql));
        if($count==0){
            $back_empty_name=$row['back_empty_name'];
            $back_empty_real_price=$row['back_empty_real_price'];
            $product_id=$row['product_id'];
            $shop_id=$i;
            $in_sql="insert into `shop_product_back_empty` (back_empty_name, back_empty_real_price,product_id,shop_id) values
({$back_empty_name},{$back_empty_real_price},{$product_id},{$shop_id})";
            mysqli_query($conn,$in_sql);
        }
    }
}
echo 'ok';exit;

//http://www.old.com/sql/intoShopBack.php