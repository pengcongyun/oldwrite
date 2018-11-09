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
$conn=mysqli_connect("192.168.2.21",'root','JJ5lyzDw','yii_niuniu')or die('error');
//$conn = mysqli_connect("39.104.156.225", 'root', 'WpFwf4LP', 'yii_niuniu') or die('error');
mysqli_query($conn,'set names utf8');
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

$objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format
$fileNames = [];
for($i=3;$i<=257;$i++){
    $fileNames[]='./resource/'.$i.'.xls';
}

$count=0;
foreach ($fileNames as $v){
    $objPHPExcel = $objReader->load($v); //$filename可以是上传的表格，或者是指定的表格
//    $objPHPExcel = $objReader->load('./resource/28.xls'); //$filename可以是上传的表格，或者是指定的表格
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow(); // 取得总行数
    // $highestColumn = $sheet->getHighestColumn(); // 取得总列数
    //循环读取excel表格,读取一条,插入一条
    //j表示从哪一行开始读取  从第二行开始读取，因为第一行是标题不保存
    //$a表示列号
    for($j=2;$j<=$highestRow;$j++){
        $a = $objPHPExcel->getActiveSheet()->getCell("I".$j)->getValue();//获取订购价格
        $b = $objPHPExcel->getActiveSheet()->getCell("J".$j)->getValue();//获取结算价格
        $c = $objPHPExcel->getActiveSheet()->getCell("M".$j)->getValue();//获取商铺商品ID
        $d = $objPHPExcel->getActiveSheet()->getCell("N".$j)->getValue();//是否售卖  1销售，2不销售
        $sql = "update `shop_product` set order_price='".$a."',settlement_price='".$b."',is_sell='".$d."' where shop_product_id=".$c;
        $res = mysqli_query($conn,$sql);
        $count++;
        if ($res) {
            echo $c."更新成功！";

        }else{
            echo "更新失败！";
            exit();
        }
    }
    echo $count;exit;
}
// http://www.excel.com/import.php