<?php
$conn=mysqli_connect("127.0.0.1",'root','root','yii_quanshen_test')or die('error');
mysqli_query($conn,'set names utf8');
$ty=$_POST['type'];
$type=($ty-1)*100;
$sql="select * from article limit $type,100";
$data=mysqli_query($conn,$sql);
foreach ($data as $i=>$da){
    $tt[$i][]=$da['article_id'];
}

echo json_encode($tt);exit;
