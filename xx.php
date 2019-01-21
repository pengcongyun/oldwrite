<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/19
 * Time: 16:44  154
 * www.pa.com/xx.php
 * 318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,356
 * delete from shop_product where shop_id in (318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,356) and product_price_id=31;
 */
//$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select shop_id from `shop` where shop_organization_brand_id=154";
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
$arr=[];
foreach ($stmt as $row){
    $arr[]=$row['shop_id'];
}
var_dump(implode(',',$arr));