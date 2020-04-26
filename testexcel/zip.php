<?php 
/** Error reporting */
error_reporting(0);
header("Content-type: text/html; charset=utf-8"); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>标题</title>
</head>

<body>
<?php
function addFileToZip($path,$zip){
    $handler=opendir($path); //打开当前文件夹由$path指定。
    while(($filename=readdir($handler))!==false){
        if($filename != "." && $filename != ".."){//文件夹文件名字为'.'和‘..’，不要对他们进行操作
            if(is_dir($path."/".$filename)){// 如果读取的某个对象是文件夹，则递归
                addFileToZip($path."/".$filename, $zip);
            }else{ //将文件加入zip对象
                $zip->addFile($path."/".$filename);
            }
        }
    }
    @closedir($path);
}

$zipname='D:\phpstudy\WWW\oldwrite\testexcel\files.zip';

$zip=new ZipArchive();

$res = $zip->open($zipname, \ZipArchive::CREATE);

if ($res === TRUE) {
    addFileToZip('files', $zip); //调用方法，对要打包的根目录进行操作，并将ZipArchive的对象传递给方法
    $zip->close(); //关闭处理的zip文件
}

//if($zip->open($zipname, ZipArchive::OVERWRITE)=== TRUE){
//    addFileToZip('files', $zip); //调用方法，对要打包的根目录进行操作，并将ZipArchive的对象传递给方法
//    $zip->close(); //关闭处理的zip文件
//}
echo '打包完毕！'."<br />";
echo "<a href='files.zip'>下载files.zip</a>"
?>
</body>
</html> 