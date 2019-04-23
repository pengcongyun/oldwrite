<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/11/8
 * Time: 12:32
 *  导入处理多个Excel
 */
//连接数据库
//$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
//$conn=mysqli_connect("192.168.2.21",'root','JJ5lyzDw','yii_niuniu')or die('error');
$conn = mysqli_connect("39.104.156.225", 'root', 'WpFwf4LP', 'yii_niuniu') or die('error');
mysqli_query($conn,'set names utf8');
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
$objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format
$objPHPExcel = $objReader->load('./resource/xx.xls'); //$filename可以是上传的表格，或者是指定的表格
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow(); // 取得总行数
$count=0;
for($j=1;$j<=$highestRow;$j++){
    $a = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();//获取订购价格
    $b = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();//获取订购价格
    $sql = "update `shop` set transport_line=".$b." where shop_id=".$a;
    $res = mysqli_query($conn,$sql);
    $count++;
}

echo $count;exit;
// http://www.old.com/phpexcel/testEx.php