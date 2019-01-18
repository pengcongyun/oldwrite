<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/11/8
 * Time: 12:32
 *  导入补充商铺商品Excel
 */
//连接数据库
//$conn=mysqli_connect("127.0.0.1",'root','root','yii2_niuniu')or die('error');
//$conn = mysqli_connect("39.104.156.225", 'root', 'WpFwf4LP', 'yii_niuniu') or die('error');
mysqli_query($conn,'set names utf8');
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
$objReader = PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format
//$objReader = PHPExcel_IOFactory::createReader('Excel2007');//use excel2007 for 2007 format
$count=0;
$objPHPExcel = $objReader->load('./resource/307.xls'); //$filename可以是上传的表格，或者是指定的表格
//$objPHPExcel = $objReader->load('./resource/300.xlsx'); //$filename可以是上传的表格，或者是指定的表格
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow(); // 取得总行数
    // $highestColumn = $sheet->getHighestColumn(); // 取得总列数
    //循环读取excel表格,读取一条,插入一条
    //j表示从哪一行开始读取  从第二行开始读取，因为第一行是标题不保存
    //$a表示列号 216-234
//for($shop_id=216;$shop_id<=234;$shop_id++){
    for($i=2;$i<=$highestRow;$i++){
        $a = $objPHPExcel->getActiveSheet()->getCell("J".$i)->getValue();//获取订购价格
        $b = $objPHPExcel->getActiveSheet()->getCell("K".$i)->getValue();//获取结算价格
        $c = $objPHPExcel->getActiveSheet()->getCell("H".$i)->getValue();//product_price_id
        $d = $objPHPExcel->getActiveSheet()->getCell("G".$i)->getValue();//product_id
        $e = $objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue();//每件数据
        $f = 307;//商铺ID
        $g = $objPHPExcel->getActiveSheet()->getCell("E".$i)->getValue();//订购方式

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