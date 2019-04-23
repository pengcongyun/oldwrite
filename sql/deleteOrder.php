<?php
/**
 * Created by PhpStorm.
 * User: CleverCloud
 * Date: 2019/4/17
 * Time: 14:23
 * 删除订单
 */
$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$order_id=23658;
$sql="select order_product_id from order_product where order_id=".$order_id;
$stmt=mysqli_query($conn,$sql);//执行sql查询语句
$ids=[];
foreach ($stmt as $k){
    $ids[]=$k['order_product_id'];
}
//$now=[];
//for ($i=3;$i<=432;$i++){
//    if(!in_array($i,$ids)){
//        $now[]=$i;
//    }
//}

mysqli_query($conn,"delete from order_product_update_history where order_product_id in (".implode(',',$ids).")");
mysqli_query($conn,"delete from order_product_barcode where order_product_id in (".implode(',',$ids).")");
mysqli_query($conn,"delete from order_product where order_product_id in (".implode(',',$ids).")");
mysqli_query($conn,"delete from order_update_history where order_id=".$order_id);
mysqli_query($conn,"delete from order_porter where order_id=".$order_id);
mysqli_query($conn,"delete from order_description where order_id=".$order_id);
mysqli_query($conn,"delete from `order` where order_id=".$order_id);
echo 'ok';
// http://www.old.com/sql/deleteOrder.php