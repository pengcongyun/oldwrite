<?php
// 输出Excel文件头
header('Content-Type: application/vnd.ms-excel;charset=gbk');
header('Content-Disposition: attachment;filename="'.date('Ymd').'.csv"');
header('Cache-Control: max-age=0');
// 从数据库中获取数据
$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql='select sob.organization_brand_name,c.alias,op.created,(case o.order_status when 1 then "下单成功" when 2 then "仓库确认" when 3 then "分拣完成" when 4 then "开始配送" else "配送完成" end),op.product_name,concat(opd.product_capacity,(case when opd.product_capacity_unit=2 then "升" else "毫升" end)) as rj,op.number_per_box,op.default_price,op.settlement_price,op.product_number,op.default_price*op.product_number as dd_total,op.settlement_price*op.product_number as js_total,o.order_default_price,o.order_receivable_price from order_product op join order_product_description opd on op.order_product_id=opd.order_product_id join `order` o on op.order_id=o.order_id join shop c on o.shop_id=c.shop_id join shop_organization_brand sob on sob.shop_organization_brand_id=c.shop_organization_brand_id where op.created>="'.$_GET['start'].'" and op.created<"'.$_GET['end'].'" and op.order_product_id>1 and o.order_status!=6 order by o.shop_id desc,op.created desc,o.order_status asc';
$stmt=mysqli_query($conn,$sql);
// PHP文件句柄，php://output 表示直接输出到浏览器
$fp = fopen('php://output', 'a');
// 输出Excel列头信息
$head = array('商铺品牌', '店铺名称', '订购日期', '订单状态', '商品名称', '商品规格', '计量/件', '商品单价', '结算单价', '订购数量', '订购金额', '结算金额', '订单标准总金额','订单结算总金额');
foreach ($head as $i => $v) {
    // CSV的Excel支持GBK编码，一定要转换，否则乱码
    $head[$i] = iconv('utf-8', 'gbk', $v);
}
// 写入列头
fputcsv($fp, $head);
// 计数器
$cnt = 0;
// 每隔$limit行，刷新一下输出buffer，节约资源
$limit = 100;
// 逐行取出数据，节约内存
while ($row = mysqli_fetch_row($stmt)) {
    $cnt ++;
    if ($limit == $cnt) { //刷新一下输出buffer，防止由于数据过多造成问题
        ob_flush();
        flush();
        $cnt = 0;
    }
    foreach ($row as $i => $v) {
        $row[$i] = iconv('utf-8', 'gbk', $v);
    }
    fputcsv($fp, $row);
}

//http://www.old.com/sql/csvExcel.php?start=2018-11-05 14:00:00&end=2018-11-06 14:00:00