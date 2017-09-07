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
//新增
//$user = array('name' => "张三", 'email' => 'admin@three.com');
//$collection->insert($user);
// 修改更新
//$newdata = array('$set' => array("email" => "test@test.com"));
//$collection->update(array("name" => "张三"), $newdata);
//查找一条
//$user = $collection->findOne(array('name' => '张三'), array('email'))['email'];      // 查找一条name为张三的email
$user = $collection->findOne(array('name' => "张三"));      // 查找一条name为张三的所有信息
//$cursor = $collection->find(array('name' => "张三"));      // 查找所有name为张三的所有信息
//$collection->remove(array('name'=>'张三'), array("justOne" => true));      // 删除
$cursor=$collection->find();
foreach ($cursor as $obj)
{
    echo $obj["name"] . "<br />\n";
}
//统计个数
echo $collection->count();
//删除所有数据
//$collection->remove();
//断开MongoDB连接
$conn->close();

