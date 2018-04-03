<?php
//计算查询时间长短
$stime=microtime(true);
header("Content-Type: text/html; charset=utf-8");
$mongo=new Mongo();
$md=$mongo->test->md;//md集合
$row=$md->find();
//md集合中的数据不能直接读取，遍历获取是否存在数据id
foreach ($row as $k){
    $exist=$k['id'];
}
if(empty($exist)){
    $md->remove();
    $conn=mysqli_connect("127.0.0.1",'root','root','test')or die('error');
    mysqli_query($conn,'set names utf8');
    $sql="select * from md";
    $stmt=mysqli_query($conn,$sql);
    $conn->close();//关闭数据库连接
    foreach ($stmt as $k){
        $data=['id'=>$k['id'],'name'=>$k['Iname'],'age'=>$k['Age']];
        $md->insert($data);
    }
    $row=$md->find();
}
$data=$md->findOne(array('name'=>"辛长海"));
var_dump($data);
//foreach ($row as $v){
//    echo $v['id'].$v['name'].$v['age'].'<br>';
//}
$md->remove();
//断开MongoDB连接
$mongo->close();
$etime=microtime(true);//获取程序执行结束的时间
$total=$etime-$stime;   //计算差值
echo "<br />[页面执行时间：{$total} ]秒";

//命令里建立索引和唯一索引；db不变 ，md 集合 里面填写字段
//db.md.ensureIndex({"name":1,"age":1});
//db.md.ensureIndex({"name":1},{"unique":true});
//查看索引
//db.md.getIndexes()
//删除
//db.md.dropIndex("name_1");