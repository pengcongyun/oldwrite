<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/10/19
 * Time: 9:54
 */
//新返空 导入到 各大商铺
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
//$conn=mysqli_connect("127.0.0.1",'root','root','yii2_niuniu')or die('error');
//$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$new_product_id=[
    ['product_id'=>260,'back_name'=>1,'back_price'=>3,'number_per_box'=>20]
];
$sql_shop='select shop_id from `shop` where shop_organization_brand_id not in (26,25,197,136,230) and shop_id>2';
$res=mysqli_query($conn,$sql_shop);
$shop_ids=[];
foreach ($res as $r){
    $shop_ids[]=$r['shop_id'];
}
//var_dump($shop_ids);exit;
foreach ($new_product_id as $j=>$id){
//    for($i=3;$i<=437;$i++) {
    foreach ($shop_ids as $k=>$i){
//        去重添加
        $sql_exist='select * from shop_product_back_empty where back_empty_name='.$id['back_name'].' and product_id='.$id['product_id'].' and shop_id='.$i;
        $count=mysqli_num_rows(mysqli_query($conn,$sql_exist));
        if($count==0){
            $back_empty_name = $id['back_name'];
            $number_per_box = $id['number_per_box'];
            $back_empty_price = $id['back_price'];
            $product_id = $id['product_id'];
            $shop_id = $i;
            $last_updated=date('Y-m-d H:i:s');
//            var_dump($back_empty_name);
//            var_dump($number_per_box);
//            var_dump($back_empty_price);
//            var_dump($product_id);
//            var_dump($shop_id);
//            var_dump($last_updated);exit;
            $in_sql = "insert into `shop_product_back_empty` (back_empty_name,number_per_box,back_empty_price,product_id,shop_id,last_updated) values
({$back_empty_name},{$number_per_box},{$back_empty_price},{$product_id},{$shop_id},'{$last_updated}')";
            $res=mysqli_query($conn, $in_sql);
        }
    }
}
echo '新商品ok';exit;
//http://www.old.com/sql/intoShopNewBack.php
//http://www.pa.com/sql/intoShopNewBack.php