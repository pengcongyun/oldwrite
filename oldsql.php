<?php
header("Content-Type: text/html; charset=utf-8");
$conn=mysqli_connect("47.92.90.93",'root','quanshen120','yii_quanshen_new')or die('error');
mysqli_query($conn,'set names utf8');
$sql="select * from `order` limit 20";
//$sql="select * from md";//读取所有要崩
$stmt=mysqli_query($conn,$sql);//获取所有
echo "数据库内容";
echo "<table border='1'>";
echo "<tr><td>ID</td><td>名字</td><td>性别</td><td>地域</td><tr>";
foreach ($stmt as $row){
    echo "<tr>";
    echo "<td align='center'>".$row['order_id']."</td>";
//    echo "<td>".$row['Iname']."</td>";
//    echo "<td>".$row['Age']."</td>";
//    echo "<td>".$row['AreaName']."</td>";
    echo "</tr>";
}
echo '</table>';
mysqli_close($conn);