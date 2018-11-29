<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/11/6
 * Time: 17:01
 *  导出所有商铺 单个商品商品
 */
if($_GET) {
    $conn = mysqli_connect("39.104.156.225", 'root', 'WpFwf4LP', 'yii_niuniu') or die('error');
    mysqli_query($conn, 'set names utf8');
    $sql = 'select sob.organization_brand_name,s.alias,c.category_name,pb.product_brand_name,p.product_name,concat(pde.capacity,(case when pde.capacity_unit=2 then "升" else "毫升" end)) as rj,(case when sp.order_method=2 then "单瓶" else "整件" end) as order_method,sp.order_price,sp.settlement_price,sp.product_id,sp.shop_id,sp.shop_product_id from shop_product sp join shop s on sp.shop_id=s.shop_id join shop_organization_brand sob on s.shop_organization_brand_id=sob.shop_organization_brand_id join product p on sp.product_id=p.product_id join category c on c.category_id=p.category_id join product_brand pb on p.product_brand_id=pb.product_brand_id join product_description pde on p.product_id=pde.product_id where sp.shop_product_id>1 and sp.product_id='.$_GET['product_id'].' order by sob.shop_organization_brand_id asc,sp.shop_id asc';
    $stmt = mysqli_query($conn, $sql);
    require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', '商铺品牌')
        ->setCellValue('B1', '店铺名称')
        ->setCellValue('C1', '商品类型')
        ->setCellValue('D1', '商品品牌')
        ->setCellValue('E1', '商品名称')
        ->setCellValue('F1', '商品规格')
        ->setCellValue('G1', '订购方式(1整件2单瓶)')
        ->setCellValue('H1', '订购单价')
        ->setCellValue('I1', '结算单价')
        ->setCellValue('J1', '商品ID')
        ->setCellValue('K1', '商铺ID')
        ->setCellValue('L1', '商铺商品ID')
        ->setCellValue('M1', '备注');
    foreach ($stmt as $k => $row) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . ($k + 2), $row['organization_brand_name'])
            ->setCellValue('B' . ($k + 2), $row['alias'])
            ->setCellValue('C' . ($k + 2), $row['category_name'])
            ->setCellValue('D' . ($k + 2), $row['product_brand_name'])
            ->setCellValue('E' . ($k + 2), $row['product_name'])
            ->setCellValue('F' . ($k + 2), $row['rj'])
            ->setCellValue('G' . ($k + 2), $row['order_method'])
            ->setCellValue('H' . ($k + 2), $row['order_price'])
            ->setCellValue('I' . ($k + 2), $row['settlement_price'])
            ->setCellValue('J' . ($k + 2), $row['product_id'])
            ->setCellValue('K' . ($k + 2), $row['shop_id'])
            ->setCellValue('L' . ($k + 2), $row['shop_product_id'])
            ->setCellValue('M' . ($k + 2), "");
    }
    //保存为 xls格式
    header('Content-Type : application/vnd.ms-excel');
    header('Content-Disposition:attachment;filename="' . $_GET['product_id'] . '.xls"');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="" method="get">
    <input type="text" value="" name="product_id">
    <input type="submit">
</form>
</body>
</html>
<!--导出商铺商品详细信息-->
<!--www.old.com/phpexcel/shopOneProduct.php-->
