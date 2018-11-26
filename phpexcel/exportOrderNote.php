<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/6/25
 * Time: 18:22
 *  www.old.com/phpexcel/exportOrderNote.php
 */
//连接数据库
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql='select o.order_code,o.shop_organization_brand_name,o.shop_alias,od.order_note,o.created from order_description od join `order` o on od.order_id=o.order_id where od.order_note!="" and o.created>"2018-10-12 00:00:00" and o.created<"2018-10-19 00:00:00"';
$stmt=mysqli_query($conn,$sql);//获取所有
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', '订单编号')
    ->setCellValue('B1', '商铺品牌')
    ->setCellValue('C1', '商铺别名')
    ->setCellValue('D1', '备注')
    ->setCellValue('E1', '时间');
foreach ($stmt as $k=>$row){
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.($k+2), $row['order_code'])
        ->setCellValue('B'.($k+2), $row['shop_organization_brand_name'])
        ->setCellValue('C'.($k+2), $row['shop_alias'])
        ->setCellValue('D'.($k+2), $row['order_note'])
        ->setCellValue('E'.($k+2), $row['created']);
}

//保存为xlsx格式
$callStartTime = microtime(true);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$callEndTime = microtime(true);
$callTime = $callEndTime - $callStartTime;
echo '写入到 xlsx 花费 ' . sprintf('%.5f',$callTime) , " 秒 " ; //取几位小数(四舍五入)

//保存为 xls格式
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save(str_replace('.php', '.xls', __FILE__));