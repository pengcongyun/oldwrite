<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/10/19
 * Time: 9:54
 */
//新商品 导入到 各大商铺
header("Content-Type: text/html; charset=utf-8");
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
//$shops=[3,4,5,6,7,10,12,78,79,80,90,111,125,127,134,139,142,144,148,156,165,180,181,241,257,49,55,56,57,58,59,60,117,118,119,175,65,66,67,68,69,70,115,116,214,247,37,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234];
//$shop_id=[];
//for($i=3;$i<260;$i++){
//    $shop_id[]=$i;
//}
//$shops=array_diff($shop_id,$shops);
$shops=[16,25,26,27,28,29,30,31,45,93,36,85,174,99,160,154,176];
//$new_product_id=[50];
//foreach ($new_product_id as $id){
//    $sql_product='select * from `product` where product_id='.$id;
//    $sql_product='select * from `product` where product_id=104';
//    $row=mysqli_fetch_assoc(mysqli_query($conn,$sql_product));
//    foreach ($new_shop_id as $shop){
    //12-20 22 23 25-32 35-48     50    61-64  71-114  120-214  215-234
//    for ($i=3;$i<181;$i++){
//    for ($i=7;$i<=253;$i++){

    foreach ($shops as $j){
        $sql_exist='select count(*) as counts from shop_product where product_id=104 and shop_id='.$j;
        $res=mysqli_query($conn,$sql_exist);
        while($row = mysqli_fetch_assoc($res)) {
            if($row['counts']==0){
                $price=51;
                $order_method=1;
                $product_id=104;
                $shop_id=$j;
                $in_sql="insert into `shop_product` (order_price,settlement_price,order_method,product_id,shop_id) values
({$price},{$price},{$order_method},{$product_id},{$shop_id})";
                mysqli_query($conn,$in_sql);
            }
        }
    }
//}
echo '新商品ok';exit;
//http://www.old.com/sql/intoShopNewProduct.php
//25+10+11+1+20=67
// 3,4,5,6,7,10,12,78,79,80,90,111,125,127,134,139,142,144,148,156,165,180,181,241,257,
// 49,55,56,57,58,59,60,117,118,119,175,65,66,67,68,69,70,115,116,214,247,37,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234
