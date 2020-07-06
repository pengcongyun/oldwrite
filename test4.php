<?php
//$a=[1,2,5,6];
//$b=[1,3,7];
//$c=array_diff($a,$b);
//$d=array_diff($b,$a);
//var_dump($c);
//var_dump($d);

//copy('D:/phpstudy/WWW/yii2_niuniu/images/product/20181203171419005.png','D:/phpstudy/WWW/yii2_niuniu/images/20181203171419005.png');

$image_url=trim(strrchr('http://images.niuniustore.com/tmp/20190919143229698.png', '/'),'/');
echo $image_url.'<br>';

$str=trim(strrchr("xxx|sad|",'|'),'|');
echo $str;