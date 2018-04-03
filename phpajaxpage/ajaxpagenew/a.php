<?php
$conn=new Mysqli("localhost","root","root","test");
if(!$conn){
    echo "数据库连接错误!";exit;
}
$conn->query("set names 'utf8'");
$page=$_POST['page']; //获取前台传过来的页码
$pageSize=10;  //设置每页显示的条数
$start=($page-1)*10; //从第几条开始取记录
$result=$conn->query("select id,group_name,message_to,message_from,message_content from groupmessageinfo limit {$start},{$pageSize}");

$list=''; //该字符串用来以json格式存储聊天记录
while($row=$result->fetch_assoc()){
    $list.=json_encode($row).',';  //对记录进行json编码
}
$count=$conn->query("select id from groupmessageinfo")->num_rows;  //获取总记录条数
$totalPage=ceil($count/$pageSize);  //页数
$countArray=array(   //该数组存储总页数，以方便在前台输出分页链接
    'total'=>$totalPage
);
$list.=json_encode($countArray).',';  //json编码
echo '['.substr($list,0,strlen($list)-1).']';  //输出标准的json