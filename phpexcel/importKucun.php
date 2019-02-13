<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/11/8
 * Time: 12:32
 *  导入补充商铺商品Excel
 */
//连接数据库
$conn=mysqli_connect("127.0.0.1",'root','root','yii2_niuniu')or die('error');
//$conn = mysqli_connect("39.104.156.225", 'root', 'WpFwf4LP', 'yii_niuniu') or die('error');
mysqli_query($conn,'set names utf8');
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
$objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format
$count=0;
$objPHPExcel = $objReader->load('./kucun.xls'); //$filename可以是上传的表格，或者是指定的表格
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow(); // 取得总行数
    // $highestColumn = $sheet->getHighestColumn(); // 取得总列数
    //循环读取excel表格,读取一条,插入一条
    //j表示从哪一行开始读取  从第二行开始读取，因为第一行是标题不保存
    //$a表示列号 216-234

for($i=2;$i<=$highestRow;$i++){
    $c = $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();//product_id
    $e = $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();//每件数量
    $l = $objPHPExcel->getActiveSheet()->getCell("L".$i)->getValue();//库存数量


    $sql = "update `product` set inventory_number=inventory_number+".$e*$l." where product_id=".$c;
    $res = mysqli_query($conn,$sql);
    $count++;
}

echo 'ok'.$count;exit;
// http://www.old.com/phpexcel/importKucun.php