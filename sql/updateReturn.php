<?php
/**
 * Created by PhpStorm.
 * User: CleverCloud
 * Date: 2018/12/3
 * Time: 11:00
 * 更新退货的退货数量
 */
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
//$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$return_goods='select rp.return_goods_product_id,rp.settlement_price,rp.single_unit,p.number_per_box,rp.return_goods_number,rp.return_goods_receive_number,rp.return_goods_verify_number from return_goods_product rp join product p on rp.product_id=p.product_id where rp.return_goods_product_id>1';
$stmp=mysqli_query($conn,$return_goods);
foreach($stmp as $row){
    if($row['single_unit']==8){
        $in_sql="update `return_goods_product` set single_unit=1,settlement_price=".$row['settlement_price']/$row['number_per_box'].",return_goods_number=".$row['return_goods_number']*$row['number_per_box'].",return_goods_receive_number=".$row['return_goods_receive_number']*$row['number_per_box'].",return_goods_verify_number=".$row['return_goods_verify_number']*$row['number_per_box']." where return_goods_product_id=".$row['return_goods_product_id'];
//        $in_sql="update `return_goods_product` set return_goods_number=".$row['return_goods_number']/$row['number_per_box'].",return_goods_receive_number=".$row['return_goods_receive_number']/$row['number_per_box'].",return_goods_verify_number=".$row['return_goods_verify_number']/$row['number_per_box']." where return_goods_product_id=".$row['return_goods_product_id'];

        mysqli_query($conn,$in_sql);
    }

}
echo 'ok';exit;
//http://www.old.com/sql/updateReturn.php