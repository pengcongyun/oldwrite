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
$sql = 'select product_category,product_brand_name,product_name,concat(product_capacity,(case when product_capacity_unit=2 then "升" else "毫升" end)) as rj,return_goods_number,settlement_price from return_goods_product where return_goods_id=3';
$stmt = mysqli_query($conn, $sql);
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', '商品类型')
    ->setCellValue('B1', '商品品牌')
    ->setCellValue('C1', '商品名称')
    ->setCellValue('D1', '商品规格')
    ->setCellValue('E1', '退货数量')
    ->setCellValue('F1', '退货金额');

foreach ($stmt as $k => $row) {
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A' . ($k + 2), $row['product_category'])
        ->setCellValue('B' . ($k + 2), $row['product_brand_name'])
        ->setCellValue('C' . ($k + 2), $row['product_name'])
        ->setCellValue('D' . ($k + 2), $row['rj'])
        ->setCellValue('E' . ($k + 2), $row['return_goods_number'])
        ->setCellValue('F' . ($k + 2), $row['settlement_price']);
}
//保存到目录文件夹
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//给中文文件名转码，否则乱码
$objWriter->save("./".iconv("utf-8", "GBK", 'return').".xls");

echo '倒完';exit;
//保存为 xls格式 输出到页面，这个对多个不行
//    header('Content-Type : application/vnd.ms-excel');
//    header('Content-Disposition:attachment;filename="' . $name . $_GET['shop_id'] . '.xls"');
//    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//    $objWriter->save('php://output');

//www.old.com/phpexcel/exportReturn.php

