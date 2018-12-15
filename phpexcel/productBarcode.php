<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/11/9
 * Time: 9:50
 *  导出所有商品Excel表
 */
$conn = mysqli_connect("39.104.156.225", 'root', 'WpFwf4LP', 'yii2_niuniu') or die('error');
mysqli_query($conn, 'set names utf8');
$sql = 'select p.product_id,p.product_name,(case when pb.type=1 then "整件" else "单瓶" end) as types,pb.number_per_box,pb.barcode,(case when pb.use_type=1 then "出库" else "进货" end) as use_type,pb.product_barcode_id from product_barcode pb join product p on pb.product_id=p.product_id where pb.product_barcode_id>1 order by pb.product_id asc';
$stmt = mysqli_query($conn, $sql);
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', '商品ID')
    ->setCellValue('B1', '商品名称')
    ->setCellValue('C1', '条码类型')
    ->setCellValue('D1', '每件计量')
    ->setCellValue('E1', '条形码')
    ->setCellValue('F1', '使用类型')
    ->setCellValue('G1', '条码ID');


foreach ($stmt as $k => $row) {
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A' . ($k + 2), $row['product_id'])
        ->setCellValue('B' . ($k + 2), $row['product_name'])
        ->setCellValue('C' . ($k + 2), $row['types'])
        ->setCellValue('D' . ($k + 2), $row['number_per_box'])
        ->setCellValue('E' . ($k + 2), $row['barcode'])
        ->setCellValue('F' . ($k + 2), $row['use_type'])
        ->setCellValue('G' . ($k + 2), $row['product_barcode_id']);
}
//保存到目录文件夹
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//给中文文件名转码，否则乱码
$objWriter->save("./".iconv("utf-8", "GBK", 'productBarcode').".xls");

echo '倒完';exit;

//www.old.com/phpexcel/productBarcode.php

