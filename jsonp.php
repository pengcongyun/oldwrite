<?php
$callback = $_GET["callback"];
$tip=[
	"status"=>2,
	"msg"=>"发顺丰",
];
$tip=json_encode($tip);
echo $callback.'('.$tip.')';exit;
//echo json_encode($tip);exit;