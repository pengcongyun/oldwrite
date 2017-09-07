<?php
header("Content-Type: text/html; charset=utf-8");
$mongo=new Mongo();
$md=$mongo->test->md;//md集合
$row=$md->find();
foreach ($row as $k){
    $exist=$k['id'];
}
if(empty($exist)||!isset($exist)){
    $conn=mysqli_connect("127.0.0.1",'root','root','test')or die('error');
    mysqli_query($conn,'set names utf8');
    $sql="select * from md limit 2";
    $stmt=mysqli_query($conn,$sql);
    foreach ($stmt as $v){
        $data[]=$v;
    }
    $conn->close();//关闭数据库连接
    $md->insert(['id'=>json_encode($data)]);
    $row=$md->find();
    echo '数据库读取'.'<br>';
    foreach ($row as $v){
        $exist=$v['id'];
    }
}
$row=json_decode($exist);
foreach ($row as $v){
    echo $v->id.$v->Iname.$v->Age.'<br>';
}
//$md->remove();
//断开MongoDB连接
$mongo->close();