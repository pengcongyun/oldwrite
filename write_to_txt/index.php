<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 15:46
 */
header("Content-Type: text/html; charset=utf-8");
//写入
$filename = dirname(__DIR__)."/write_to_txt/xx.txt";
$contents = "我是张斌 \r\n";  //换行写入
if(is_writable($filename)){
    if(($handle = fopen($filename,"a") )== false){
        echo "写入文件 $filename 失败";
        exit();
    }
    if(fwrite($handle,$contents) == false){
        echo "写入文件 $filename 失败";
        exit();
    }
    echo "写入文件 $filename 成功";

    fclose($handle);
}else{
    echo "文件 $filename 不可写入";
}