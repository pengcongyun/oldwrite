<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/6 0006
 * Time: 15:16
 */
header("Content-Type: text/html; charset=utf-8");
//连接mongodb的两种方式
$conn=new Mongo();
//$conn=new MongoClient();
//查看mongdb的数据库
//$conn->listDBs();
// 选择comedy数据库，如果以前没该数据库会自动创建，也可以用$m->selectDB("comedy");
$db = $conn->test;
// 制定结果集（表名：user）
$collection = $db->user;
//$user = $collection->findOne(array('name' => "张三"));      // 查找一条name为张三的所有信息
$user = $collection->find(array('name' => "张三"));      // 查找所有name为张三的所有信息
foreach ($user as $k){
    echo $k['name']."<br>";
}
//删除所有数据
//$collection->remove();
//断开MongoDB连接
$conn->close();

