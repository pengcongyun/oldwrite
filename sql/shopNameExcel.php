<?php
// 输出Excel文件头
header('Content-Type: application/vnd.ms-excel;charset=gbk');
header('Content-Disposition: attachment;filename="'.date('md').'.csv"');
header('Cache-Control: max-age=0');
// 从数据库中获取数据
$conn=mysqli_connect("39.104.156.225",'root','WpFwf4LP','yii_niuniu')or die('error');
mysqli_query($conn,'set names utf8');
$sql='select c.shop_organization_brand_id,c.shop_id,sob.organization_brand_name,c.alias,c.address from shop c join shop_organization_brand sob on c.shop_organization_brand_id=sob.shop_organization_brand_id where c.shop_id>2 order by c.shop_organization_brand_id asc';
$stmt=mysqli_query($conn,$sql);
// PHP文件句柄，php://output 表示直接输出到浏览器
$fp = fopen('php://output', 'a');
// 输出Excel列头信息
$head = array('品牌ID','商铺ID','商铺品牌', '店铺名称','商铺地址');
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

//http://www.old.com/sql/shopNameExcel.php