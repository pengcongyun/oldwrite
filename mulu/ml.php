<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13 0013
 * Time: 15:05
 */
echo getcwd() . "<br/>";//获取当前目录  绝对路径
echo dirname(__FILE__).'<br>';//获取当前目录  绝对路径

echo dirname(dirname(__FILE__)).'<br>';//得到的是文件上一层目录名
//获取目录下所有文件包括 .  ..
$dir=getcwd();
$file=scandir($dir);
print_r($file);


//获取目录下的真实文件
$handler = opendir($dir);
while (($filename = readdir($handler)) !== false) {//务必使用!==，防止目录下出现类似文件名“0”等情况
    if ($filename != "." && $filename != "..") {
        $files[] = $filename ;
    }
}
closedir($handler);
//打印所有文件名
foreach ($files as $value) {
    echo $value."<br />";
}

//获取目录下所有文件，包括子目录下的文件名
function get_allfiles($path,&$files) {
    if(is_dir($path)){
        $dp = dir($path);
        while ($file = $dp ->read()){
            if($file !="." && $file !=".."){
                get_allfiles($path."/".$file, $files);
            }
        }
        $dp ->close();
    }
    if(is_file($path)){
        $files[] =  $path;
    }
}
function get_filenamesbydir($dir){
    $files =  array();
    get_allfiles($dir,$files);
    return $files;
}
$filenames = get_filenamesbydir("D:/phpStudy/WWW/oldwrite/phpajaxpage");
//打印所有文件名，包括路径
foreach ($filenames as $value) {
    echo $value."<br />";
}
