<?php
$conn=mysqli_connect("127.0.0.1",'root','root','yii_quanshen_test')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select * from article limit 1,5";
$data=mysqli_query($conn,$sql);
foreach ($data as $i=>$da){
//    $tt[$i][]=json_encode($da);
    $tt[$i][]=$da;
}

echo json_encode($tt);exit;