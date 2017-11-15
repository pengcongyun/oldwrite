<?php
$bases=$_POST['data'];
//$base_img = str_replace('data:image/jpeg;base64,', '', $bases);
$base_img = explode('base64,',$bases)[1];
$path = "./";
$prefix='nx_';
$output_file = $prefix.time().rand(100,999).'.jpg';
$path = $path.$output_file;
//  创建将数据流文件写入我们创建的文件内容中
$ifp = fopen( $path, "wb" );
fwrite( $ifp, base64_decode( $base_img) );
fclose( $ifp );
//file_put_contents('D:\phpStudy\WWW\oldwrite\qf\xx.jpg', base64_decode($base_img));
//// 输出文件
//echo json_encode($bases);