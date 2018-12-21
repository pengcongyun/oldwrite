<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/11/8
 * Time: 12:32
 *  导入商品条码
 */
//连接数据库
$conn=mysqli_connect("127.0.0.1",'root','root','yii_niuniu')or die('error');
//$conn = mysqli_connect("39.104.156.225", 'root', 'WpFwf4LP', 'yii_niuniu') or die('error');
mysqli_query($conn,'set names utf8');
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
$objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format
//$objReader = PHPExcel_IOFactory::createReader('Excel2007');//use excel2007 for 2007 format
$count=0;
$objPHPExcel = $objReader->load('./productBarcode.xls'); //$filename可以是上传的表格，或者是指定的表格
//$objPHPExcel = $objReader->load('./resource/barcode_chu.xlsx'); //$filename可以是上传的表格，或者是指定的表格
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow(); // 取得总行数
for($i=2;$i<=$highestRow;$i++){
    $a = $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();//product_id
    $c = $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();//type
    $d = $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();//number_per_box
    $e = $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();//barcode
    $f = $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();//use_type
//    if($a==1){
//        $number_sql="select number_per_box from product where product_id=".$c;
//        $data=mysqli_query($conn,$number_sql);
//        foreach ($data as $row){
//            $number=$row['number_per_box'];
//        }
//        $b=$number;
//    }else{
//        $b=1;
//    }
//    $b = $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();//每件计量
//    $d = $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();//包装箱码
//    $e = $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();//使用类型
    $sql = "insert into `product_barcode` (`type`,number_per_box,barcode,use_type,product_id) values ({$c},{$d},{$e},{$f},{$a})";
    $res = mysqli_query($conn,$sql);
    $count++;
    if ($res) {
        echo $i."添加成功！";
    }else{
        echo "添加失败！";
        exit();
    }
}
//}
echo 'ok';exit;
// http://www.old.com/phpexcel/importBarcode.php