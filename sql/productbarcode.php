<?php
/**
 * Created by PhpStorm.
 * User: CleverCloud
 * Date: 2018/11/30
 * Time: 18:14
 * 統一條形碼  多余的类型删掉
 */
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select product_id,order_method from `product` where product_id>1";
$stmt=mysqli_query($conn,$sql);//执行sql查询语句

foreach ($stmt as $row){
    $s_sql='select * from `product_barcode` where product_id='.$row['product_id'];
    $barcodes=mysqli_query($conn,$s_sql);
    foreach ($barcodes as $v){
        if($row['order_method']!=$v['type']){
            $delete_sql='delete from product_barcode where product_barcode_id='.$v['product_barcode_id'];
            mysqli_query($conn,$delete_sql);
        }
    }
}

echo 'ok';exit;

// http://www.old.com/sql/productbarcode.php