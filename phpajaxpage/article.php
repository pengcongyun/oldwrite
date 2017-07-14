<?php
/**
* $Id: article.php
* author Lee.
* Last modify $Date: 2012-01-21 16:53:05 $
*/

require_once './config.inc.php';

$m = new Model();
$page = new ajaxPage($m->total('article'),20); // $m->total('article') 获取 article 表的记录数；10为每页显示十条
$result = $m->fetchAll('article', '*', '', '', $page->limit); // 取出数据，^_^，很方便吧

echo '<table align="center" border="1" width="1100" style="border-collapse:collapse;font-size:14px;" bordercolor="#666">';
echo '<caption><h1>素材火列表</h1></caption>';
echo '<tr height="25"><th>ID</th><th>Title</th><th>Author</th><th>Source</th><th>Date</th></tr>';
foreach ($result as $v) {
	echo "<tr height='21'><td align='center'>{$v['id']}</td><td>{$v['title']}</td><td align='center'>{$v['author']}</td><td align='center'>{$v['source']}</td><td align='center'>{$v['date']}</td></tr>";
}
echo '<tr><td align="right" colspan="5">'.$page->fpage().'</td></tr>';
echo '</table>';
?>