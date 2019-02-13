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
//$conn=mysqli_connect("127.0.0.1",'root','root','pp')or die('error');
//$conn = mysqli_connect("39.104.156.225", 'root', 'WpFwf4LP', 'yii_niuniu') or die('error');
mysqli_query($conn,'set names utf8');
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
$objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format
$count=0;
$objPHPExcel = $objReader->load('./resource/beiyong.xls'); //$filename可以是上传的表格，或者是指定的表格
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow(); // 取得总行数
//循环读取excel表格,读取一条,插入一条
//j表示从哪一行开始读取  从第二行开始读取，因为第一行是标题不保存
for($i=2;$i<=$highestRow;$i++){
    $a = $objPHPExcel->getActiveSheet()->getCell("A".$i)->getValue();//获取发货单号
    $b = $objPHPExcel->getActiveSheet()->getCell("B".$i)->getValue();//获取商铺品牌
    $c = $objPHPExcel->getActiveSheet()->getCell("C".$i)->getValue();//商铺别名
    $d = $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();//订购日期
    $e = $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();//订购金额
    $f = $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();//配送司机
    $g = $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();//商品名称
    $h = $objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue();//商品规格
    $i = $objPHPExcel->getActiveSheet()->getCell("I".$i)->getValue();//商品规格单位
    $j = $objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue();//订购方式
    $k = $objPHPExcel->getActiveSheet()->getCell("K".$i)->getValue();//计量单位
    $l = $objPHPExcel->getActiveSheet()->getCell("L".$i)->getValue();//订购数量
    $m = $objPHPExcel->getActiveSheet()->getCell("M".$i)->getValue();//活动

    $exist_shop_sql="select * from `order` where order_code=".$a;




    $in_sql = "insert into `shop_product` (order_price,settlement_price,order_method,number_per_box,product_id,product_price_id,shop_id) values
({$a},{$b},{$g},{$e},{$d},{$c},{$f})";
    $res=mysqli_query($conn, $in_sql);
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
// http://www.old.com/phpexcel/importBeiyong.php
// http://www.pa.com/phpexcel/importBeiyong.php