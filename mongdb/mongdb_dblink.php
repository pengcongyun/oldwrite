<?php
header("Content-Type: text/html; charset=utf-8");
$mongo=new Mongo();
$md=$mongo->test->md;//md集合
$row=$md->find();
foreach ($row as $k){
    $exist=$k['id'];
}
if(empty($exist)){
    $md->remove();
    $conn=mysqli_connect("127.0.0.1",'root','root','test')or die('error');
    mysqli_query($conn,'set names utf8');
    $sql="select * from md limit 2";
    $stmt=mysqli_query($conn,$sql);
    $conn->close();//关闭数据库连接
    foreach ($stmt as $k){
        $data=['id'=>$k['id'],'name'=>$k['Iname'],'age'=>$k['Age']];
        $md->insert($data);
    }
    $row=$md->find();
}
foreach ($row as $v){
    echo $v['id'].$v['name'].$v['age'].'<br>';
}
$md->remove();
//断开MongoDB连接
$mongo->close();