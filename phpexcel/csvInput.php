<?php
/**
 * Created by PhpStorm.
 * User: CleverCloud
 * Date: 2020/11/27
 * Time: 15:32
 */

function input_csv($handle) {
    $out = array ();
    $n = 0;
    while ($data = fgetcsv($handle, 10000)) {
        $num = count($data);
        for ($i = 0; $i < $num; $i++) {
            $out[$n][$i] = $data[$i];
        }
        $n++;
    }
    return $out;
}

$filename = $_FILES['file']['tmp_name'];
if (empty ($filename)) {
    echo '请选择要导入的CSV文件！';
    exit;
}
$handle = fopen($filename, 'r');
$result = input_csv($handle); //解析csv
$len_result = count($result);
if($len_result==0){
    echo '没有任何数据！';
    exit;
}
for ($i = 1; $i < $len_result; $i++) { //循环获取各字段值
    $name = iconv('gb2312', 'utf-8', $result[$i][0]); //中文转码
    $sex = iconv('gb2312', 'utf-8', $result[$i][1]);
    $age = $result[$i][2];
    $data_values .= "('$name','$sex','$age'),";
}
$data_values = substr($data_values,0,-1); //去掉最后一个逗号
fclose($handle); //关闭指针
$query = mysql_query("insert into student (name,sex,age) values $data_values");//批量插入数据表中
if($query){
    echo '导入成功！';
}else{
    echo '导入失败！';
}