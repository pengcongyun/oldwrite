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
$conn=mysqli_connect("127.0.0.1",'root','root','yii2_test')or die('error');
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
////$sql="select shop_id from `shop` where shop_organization_brand_id=154";
//$sql="select shop_product_id from `shop_product` where shop_id=369";
$sql="select back_empty_id from back_empty where shop_id not in (174,85,102,93,45,31,30,29,28,27,26,25,126,87,88,77,133,210) and back_empty_id>1";
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
$arr=[];
foreach ($stmt as $row){
    $arr[]=$row['back_empty_id'];
}
$arr_str=implode(',',$arr);
//var_dump($arr);
//var_dump($arr_str);exit;
//$del_sql="delete from back_empty_description where back_empty_id in (".$arr_str.")";
//$del_sql="delete from back_empty_product where back_empty_id in (".$arr_str.")";
$del_sql="delete from back_empty where back_empty_id in (".$arr_str.")";
$res=mysqli_query($conn,$del_sql);
var_dump($res);
//var_dump($arr_str);
