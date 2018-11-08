<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/6/25
 * Time: 18:22
 */
//连接数据库
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select * from `zone` limit 10";
$stmt=mysqli_query($conn,$sql);//获取所有
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', '省份id')
    ->setCellValue('B1', '代号')
    ->setCellValue('C1', '属性')
    ->setCellValue('D1', '所属');
foreach ($stmt as $k=>$row){
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A'.($k+2), $row['zone_id'])
        ->setCellValue('B'.($k+2), $row['code'])
        ->setCellValue('C'.($k+2), $row['type'])
        ->setCellValue('D'.($k+2), $row['belong']);
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