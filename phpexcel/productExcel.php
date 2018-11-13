<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/11/9
 * Time: 9:50
 *  导出所有商品Excel表
 */
$conn = mysqli_connect("39.104.156.225", 'root', 'WpFwf4LP', 'yii_niuniu') or die('error');
mysqli_query($conn, 'set names utf8');
$sql_id='select product_id from product where product_id>1 order by product_id asc';
$ids=mysqli_query($conn,$sql_id);
$all_id=[];
foreach ($ids as $id){
    $all_id[]=$id['product_id'];
}
$id=implode(',',$all_id);
$sql = 'select c.category_name,pb.product_brand_name,p.product_name,concat(pd.capacity,(case when pd.capacity_unit=2 then "升" else "毫升" end)) as rj,p.order_method,p.default_price,p.product_id from product p join category c on p.category_id=c.category_id join product_brand pb on pb.product_brand_id=p.product_brand_id join product_description pd on p.product_id=pd.product_id where p.product_id in ('.$id.') order by p.product_brand_id';
$stmt = mysqli_query($conn, $sql);
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', '商品类型')
    ->setCellValue('B1', '商品品牌')
    ->setCellValue('C1', '商品名称')
    ->setCellValue('D1', '商品规格')
    ->setCellValue('E1', '订购方式(1整件2单瓶)')
    ->setCellValue('F1', '标准单价')
    ->setCellValue('G1', '商品ID');

foreach ($stmt as $k => $row) {
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A' . ($k + 2), $row['category_name'])
        ->setCellValue('B' . ($k + 2), $row['product_brand_name'])
        ->setCellValue('C' . ($k + 2), $row['product_name'])
        ->setCellValue('D' . ($k + 2), $row['rj'])
        ->setCellValue('E' . ($k + 2), $row['order_method'])
        ->setCellValue('F' . ($k + 2), $row['default_price'])
        ->setCellValue('G' . ($k + 2), $row['product_id']);
}
//保存到目录文件夹
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//给中文文件名转码，否则乱码
$objWriter->save("./".iconv("utf-8", "GBK", 'product').".xls");

echo '倒完';exit;
//保存为 xls格式 输出到页面，这个对多个不行
//    header('Content-Type : application/vnd.ms-excel');
//    header('Content-Disposition:attachment;filename="' . $name . $_GET['shop_id'] . '.xls"');
//    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//    $objWriter->save('php://output');

//www.old.com/phpexcel/productExcel.php

