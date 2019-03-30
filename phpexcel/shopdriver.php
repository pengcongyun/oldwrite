<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/11/6
 * Time: 17:01
 *  导出商铺商品
 */

    $conn = mysqli_connect("39.104.156.225", 'root', 'WpFwf4LP', 'yii_niuniu') or die('error');
    mysqli_query($conn, 'set names utf8');
//    $sql = 'select sob.organization_brand_name,s.alias,s.shop_id,s.transport_line,u.display_name from shop s join shop_organization_brand sob on s.shop_organization_brand_id=sob.shop_organization_brand_id join `user` u on s.transport_line=u.user_id order by sob.shop_organization_brand_id desc';
    $sql = 'select sob.organization_brand_name,s.alias,s.shop_id,s.transport_line,u.display_name from shop s join shop_organization_brand sob on s.shop_organization_brand_id=sob.shop_organization_brand_id left join `user` u on s.transport_line=u.user_id where s.shop_id>2 and s.transport_line in (14,21) order by sob.shop_organization_brand_id desc';
    $stmt = mysqli_query($conn, $sql);
    require_once dirname(__FILE__) . '/Classes/PHPExcel.php';
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', '商铺品牌')
        ->setCellValue('B1', '店铺名称')
        ->setCellValue('C1', '店铺ID')
        ->setCellValue('D1', '司机ID')
        ->setCellValue('E1', '司机名字');

    foreach ($stmt as $k => $row) {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A' . ($k + 2), $row['organization_brand_name'])
            ->setCellValue('B' . ($k + 2), $row['alias'])
            ->setCellValue('C' . ($k + 2), $row['shop_id'])
            ->setCellValue('D' . ($k + 2), $row['transport_line'])
            ->setCellValue('E' . ($k + 2), $row['display_name']);
    }
    //保存为 xls格式
    header('Content-Type : application/vnd.ms-excel');
    header('Content-Disposition:attachment;filename="' . 'driver' . '.xls"');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');

//导出商铺商品详细信息
//www.old.com/phpexcel/shopdriver.php
