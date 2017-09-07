<?php
header("Content-Type: text/html; charset=utf-8");
$redis=new Redis();
$redis->connect('localhost',6379);
//$redis->delete('test');//删除redis ---test
$result=$redis->get('test');
if(empty($result)||$result===false){
    $conn=mysqli_connect("127.0.0.1",'root','root','test')or die('error');
    mysqli_query($conn,'set names utf8');
    $sql="select * from md limit 2";
    $result=mysqli_query($conn,$sql);//获取所有
    foreach ($result as $k){
        $res[]=$k;
    }
    $redis->set('test',json_encode($res));echo '数据库读取'."<br>";
}
$res=$redis->get('test');
$restults=json_decode($res);
foreach ($restults as $row){
    echo $row->Iname.$row->Age.$row->AreaName.'<br>';
}
