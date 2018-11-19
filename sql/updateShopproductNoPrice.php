<?php
/**
 * Created by PhpStorm.
 * User: CleverCloud
 * Date: 2018/11/19
 * Time: 11:28
 * 修改商铺不一样的订购价结算价
 */
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$product_ids=[23=>98,47=>1970,35=>420,2=>188,113=>218,8=>350,9=>500,63=>855,68=>920,7=>815];
$shop_ids=[56,55,49,5,18,83,64,63,62,61,14,99,160,9,36,76,239];
foreach($product_ids as $k=>$v){
    $in_sql="update `shop_product` set order_price=".$v.",settlement_price=".$v." where product_id=".$k." and shop_id in(56,55,49,5,18,83,64,63,62,61,14,99,160,9,36,76,239)";
    mysqli_query($conn,$in_sql);
}
echo 'ok';exit;
//http://www.old.com/sql/updateShopproductNoPrice.php
//select shop_id,order_price from shop_product where product_id=23 and order_price=98;