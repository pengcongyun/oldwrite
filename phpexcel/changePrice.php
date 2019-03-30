<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/11/6
 * Time: 17:01
 *  导出商铺商品
 */
//25
$conn = mysqli_connect("39.104.156.225", 'root', 'WpFwf4LP', 'yii_niuniu') or die('error');
mysqli_query($conn, 'set names utf8');

//$sql = "select sob.organization_brand_name,s.alias,p.product_name,case p.product_package when 1 then '玻璃瓶装' when 2 then '塑料瓶装' when 3 then '陶瓷瓶装' when 4 then '易拉罐装' when 5 then '铝瓶装' when 6 then '纸盒装' when 7 then '桶装' when 8 then '礼盒装' end as product_package,CONCAT(p.capacity, case p.capacity_unit when 1 then 'ml' when 2 then 'L' end, ' * ', sp.number_per_box) capacity,sp.shop_product_id,sp.order_price,sp.settlement_price from shop_product sp join shop s on sp.shop_id=s.shop_id join product p on sp.product_id=p.product_id join shop_organization_brand sob on sob.shop_organization_brand_id=s.shop_organization_brand_id where sp.product_price_id in (22,28,24,13,25,11,94,75,90,91,92,81,79,80,78) and s.shop_organization_brand_id in (25) order by s.shop_organization_brand_id desc";
$sql = "select sob.organization_brand_name,s.alias,p.product_name,case p.product_package when 1 then '玻璃瓶装' when 2 then '塑料瓶装' when 3 then '陶瓷瓶装' when 4 then '易拉罐装' when 5 then '铝瓶装' when 6 then '纸盒装' when 7 then '桶装' when 8 then '礼盒装' end as product_package,CONCAT(p.capacity, case p.capacity_unit when 1 then 'ml' when 2 then 'L' end, ' * ', sp.number_per_box) capacity,sp.shop_product_id,sp.order_price,sp.settlement_price from shop_product sp join shop s on sp.shop_id=s.shop_id join product p on sp.product_id=p.product_id join shop_organization_brand sob on sob.shop_organization_brand_id=s.shop_organization_brand_id where sp.product_price_id in (22,28,24,13,25,11,94,75,90,91,92,81,79,80,78) order by s.shop_organization_brand_id desc,s.shop_id desc";
$stmt = mysqli_query($conn, $sql);
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', '商铺品牌')
    ->setCellValue('B1', '店铺名称')
    ->setCellValue('C1', '商品名称')
    ->setCellValue('D1', '包装')
    ->setCellValue('E1', '规格')
    ->setCellValue('F1', '商铺商品ID')
    ->setCellValue('G1', '订购价')
    ->setCellValue('H1', '结算价');

foreach ($stmt as $k => $row) {
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A' . ($k + 2), $row['organization_brand_name'])
        ->setCellValue('B' . ($k + 2), $row['alias'])
        ->setCellValue('C' . ($k + 2), $row['product_name'])
        ->setCellValue('D' . ($k + 2), $row['product_package'])
        ->setCellValue('E' . ($k + 2), $row['capacity'])
        ->setCellValue('F' . ($k + 2), $row['shop_product_id'])
        ->setCellValue('G' . ($k + 2), $row['order_price'])
        ->setCellValue('H' . ($k + 2), $row['settlement_price']);
}
//保存为 xls格式
header('Content-Type : application/vnd.ms-excel');
header('Content-Disposition:attachment;filename="shopChangePrice.xls"');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

?>

<!--导出商铺商品详细信息-->
<!--www.old.com/phpexcel/changePrice.php-->
