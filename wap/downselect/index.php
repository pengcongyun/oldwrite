<?php
$conn=mysqli_connect("localhost",'root','root','yii_quanshen_new')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select * from `article`";
//$sql="select * from md";//读取所有要崩
$stmt=mysqli_query($conn,$sql);//获取所有
foreach($stmt as &$day){
    $day['head_description'] = iconv_substr(str_replace('&nbsp;','',$day['head_description']),0,76,'UTF-8');
}
echo json_encode($stmt);