<?php
/**
 * Created by PhpStorm.
 * User: CleverCloud
 * Date: 2018/12/21
 * Time: 16:10
 * delete from product_barcode where product_price_id=1 and product_barcode_id>1;
 */
header("Content-Type: text/html; charset=utf-8");
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
$conn=mysqli_connect("127.0.0.1",'root','root','yii2_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
//$in_sql = "update `shop_product` set order_price=146,settlement_price=146 where shop_id>1 and product_id=64";
$in_sql = "select product_barcode_id from product_barcode group by barcode,product_price_id having(count(product_barcode_id))>1 order by product_barcode_id asc";
$stmp=mysqli_query($conn, $in_sql);
$arr=[];
foreach ($stmp as $row){
    $arr[]=$row['product_barcode_id'];
}
$str=implode(',',$arr);
//var_dump(implode(',',$arr));
$sql="delete from product_barcode where product_barcode_id in (".$str.")";
mysqli_query($conn,$sql);
echo 11;
//www.old.com/sql/xx.php