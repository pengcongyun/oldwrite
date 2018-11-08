<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/6/25
 * Time: 18:22
 */
//连接数据库
$conn=mysqli_connect("127.0.0.1",'root','root','yii_template')or die('error');
mysqli_query($conn,'set names utf8');
//获取数量
//$allsql="select count(*) as total from `zone`";
$allsql="select count(*) from `zone`";
$allrows=mysqli_query($conn,$allsql);
$sums=mysqli_fetch_row($allrows);
//$row=mysqli_fetch_assoc($allrows);
$limit=10;
$sum=ceil($sums[0]/$limit);
//循环分页打印
for($i=1;$i<=$sum;$i++){
    $offset=($i-1)*$limit;
    $sql="select * from `zone` limit $offset,$limit";
    $stmt=mysqli_query($conn,$sql);//获取所有
    printxls($i,$stmt);
}
//传入页码，数据
function printxls($i=1,$stmt){
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
    $objWriter->save(str_replace('.php', $i.'.xlsx', __FILE__));
    $callEndTime = microtime(true);
    $callTime = $callEndTime - $callStartTime;
    echo '写入到 xlsx 花费 ' . sprintf('%.5f',$callTime) , " 秒 ".'<br />'; //取几位小数(四舍五入)

    //保存为 xls格式
//    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//    $objWriter->save(str_replace('.php', '.xls', __FILE__));
}

