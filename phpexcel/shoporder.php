<?php
/**
 *  导出单个商铺时间段内的订单信息
 */
header("Content-Type: text/html; charset=utf-8");
$conn = mysqli_connect("39.104.156.225", 'root', 'WpFwf4LP', 'yii_niuniu') or die('error');
mysqli_query($conn, 'set names utf8');
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$shop_id=145;
$_GET['start']="2019-01-01 00:00:00";
//$_GET['end']="2018-11-15 14:00:00";
$brand_name='';
$shop_name='';
$sql='select sob.organization_brand_name,c.alias,op.created,(case o.order_status when 1 then "下单成功" when 2 then "仓库确认" when 3 then "分拣完成" when 4 then "开始配送" else "配送完成" end) as order_method,op.product_name,concat(opd.product_capacity,(case when opd.product_capacity_unit=2 then "升" else "毫升" end)) as capacity_str,op.number_per_box,op.order_price,op.settlement_price,op.product_number,op.order_price*op.product_number as dd_total,op.settlement_price*op.product_number as js_total,o.order_order_price,o.order_receivable_price from order_product op join order_product_description opd on op.order_product_id=opd.order_product_id join `order` o on op.order_id=o.order_id join shop c on o.shop_id=c.shop_id join shop_organization_brand sob on sob.shop_organization_brand_id=c.shop_organization_brand_id where op.order_product_id>1 and o.order_status!=6 and c.shop_id='.$shop_id;
if(!empty($_GET['start'])){
    $sql.=' and op.created>="'.$_GET['start'].'"';
}
//if(!empty($_GET['end'])){
//    $sql.=' and op.created<"'.$_GET['end'].'"';
//}
$sql.=' order by o.shop_id desc,op.created desc,o.order_status asc';
$stmt=mysqli_query($conn,$sql);
$group_sql='select count(*) as c from order_product op join order_product_description opd on op.order_product_id=opd.order_product_id join `order` o on op.order_id=o.order_id join shop c on o.shop_id=c.shop_id join shop_organization_brand sob on sob.shop_organization_brand_id=c.shop_organization_brand_id where op.order_product_id>1 and o.order_status!=6 and c.shop_id='.$shop_id.' and op.created>="'.$_GET['start'].'" group by op.created order by o.shop_id desc,op.created desc,o.order_status asc';
$counts=mysqli_query($conn,$group_sql);

$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', '商铺品牌')
    ->setCellValue('B1', '店铺名称')
    ->setCellValue('C1', '订购日期')
    ->setCellValue('D1', '订单状态')
    ->setCellValue('E1', '商品名称')
    ->setCellValue('F1', '商品规格')
    ->setCellValue('G1', '计量/件')
    ->setCellValue('H1', '订购单价')
    ->setCellValue('I1', '结算单价')
    ->setCellValue('J1', '订购数量')
    ->setCellValue('K1', '订购金额')
    ->setCellValue('L1', '结算金额')
    ->setCellValue('M1', '订购总金额')
    ->setCellValue('N1', '结算总金额');

var_dump($stmt);exit;
foreach ($stmt as $k=>$row){
    $brand_name=$row['organization_brand_name'];
    $shop_name=$row['alias'];


    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.($k+2), $row['organization_brand_name'])
        ->setCellValue('B'.($k+2), $row['alias'])
        ->setCellValue('C'.($k+2), $row['created'])
        ->setCellValue('D'.($k+2), $row['order_method'])
        ->setCellValue('E'.($k+2), $row['product_name'])
        ->setCellValue('F'.($k+2), $row['capacity_str'])
        ->setCellValue('G'.($k+2), $row['number_per_box'])
        ->setCellValue('H'.($k+2), $row['order_price'])
        ->setCellValue('I'.($k+2), $row['settlement_price'])
        ->setCellValue('J'.($k+2), $row['product_number'])
        ->setCellValue('K'.($k+2), $row['dd_total'])
        ->setCellValue('L'.($k+2), $row['js_total'])
        ->setCellValue('M'.($k+2), $row['order_order_price'])
        ->setCellValue('N'.($k+2), $row['order_receivable_price']);
}
$first=2;
$kvs=[];
foreach ($counts as $ks=>$vs){
    $objPHPExcel->getActiveSheet()->mergeCells( 'A'.$first.':'.'A'.($first+$vs['c']-1));//纵向合并单元格
    $objPHPExcel->getActiveSheet()->mergeCells( 'B'.$first.':'.'B'.($first+$vs['c']-1));//纵向合并单元格
    $objPHPExcel->getActiveSheet()->mergeCells( 'C'.$first.':'.'C'.($first+$vs['c']-1));//纵向合并单元格
    $objPHPExcel->getActiveSheet()->mergeCells( 'D'.$first.':'.'D'.($first+$vs['c']-1));//纵向合并单元格
    $objPHPExcel->getActiveSheet()->mergeCells( 'M'.$first.':'.'M'.($first+$vs['c']-1));//纵向合并单元格
    $objPHPExcel->getActiveSheet()->mergeCells( 'N'.$first.':'.'N'.($first+$vs['c']-1));//纵向合并单元格
    $first+=$vs['c'];
}
//居中
$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
//设置宽度
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(18);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
//$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
//$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
//$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
//$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
//$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
//$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(13);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(13);

//var_dump($kvs);exit;
//$objPHPExcel->getActiveSheet()->mergeCells( 'A'.$start.':'.'A'.$end);//纵向合并单元格
//$objPHPExcel->getActiveSheet()->mergeCells( $row_num.'1' .':' .$end_row_num .'1');//横向合并单元格
//保存为 xls格式
header('Content-Type : application/vnd.ms-excel');
header('Content-Disposition:attachment;filename="'.$brand_name.'-'.$shop_name.date("Y年m月j日").'.xls"');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

// www.old.com/phpexcel/shoporder.php

