<?php
// 输出Excel文件头
$product_id=18;
header('Content-Type: application/vnd.ms-excel;charset=gbk');
header('Content-Disposition: attachment;filename="'.date('Ymd').$product_id.'.csv"');
header('Cache-Control: max-age=0');
// 从数据库中获取数据
$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');

//$sql='select sob.organization_brand_name,s.alias,c.category_name,pb.product_brand_name,p.product_name,concat(pde.capacity,(case when pde.capacity_unit=2 then "升" else "毫升" end)) as rj,(case when sp.order_method=2 then "单瓶" else "整件" end) as order_method,p.default_price,sp.settlement_price,sp.product_id,sp.shop_id,sp.shop_product_id from shop_product sp join shop s on sp.shop_id=s.shop_id join shop_organization_brand sob on s.shop_organization_brand_id=sob.shop_organization_brand_id join product p on sp.product_id=p.product_id join category c on c.category_id=p.category_id join product_brand pb on p.product_brand_id=pb.product_brand_id join product_description pde on p.product_id=pde.product_id where sp.shop_product_id>1 and sob.shop_organization_brand_id in (2,3,4,5,6,7,8,9,10,11,12,13) order by sob.shop_organization_brand_id asc';
$sql='select sob.organization_brand_name,s.alias,c.category_name,pb.product_brand_name,p.product_name,concat(p.capacity,(case when p.capacity_unit=2 then "升" else "毫升" end)) as rj,(case when sp.order_method=2 then "单瓶" else "整件" end) as order_method,sp.order_price,sp.settlement_price,sp.product_id,sp.shop_id,sp.shop_product_id from shop_product sp join shop s on sp.shop_id=s.shop_id join shop_organization_brand sob on s.shop_organization_brand_id=sob.shop_organization_brand_id join product p on sp.product_id=p.product_id join category c on c.category_id=p.category_id join product_brand pb on p.product_brand_id=pb.product_brand_id  where sp.shop_product_id>1 and sp.product_id='.$product_id.' order by sob.shop_organization_brand_id asc,sp.shop_id asc';
$stmt=mysqli_query($conn,$sql);
// PHP文件句柄，php://output 表示直接输出到浏览器
$fp = fopen('php://output', 'a');
// 输出Excel列头信息
$head = array('商铺品牌', '店铺名称', '商品类型', '商品品牌', '商品名称', '商品规格', '订购方式', '订购单价', '结算单价','商品ID','商铺ID','商铺商品ID');
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
// 导出商铺 商品详情
//http://www.old.com/sql/shopProduct.php