<?php
/** Error reporting */
//error_reporting(0);
header("Content-type: text/html; charset=utf-8");
?>

<?php
/**************************************************************
 *
 *  使用特定function对数组中所有元素做处理
 *  @param  string  &$array     要处理的字符串
 *  @param  string  $function   要执行的函数
 *  @return boolean $apply_to_keys_also     是否也应用到key上
 *  @access public
 *
 *************************************************************/
function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
{
    static $recursive_counter = 0;
    if (++$recursive_counter > 1000) {
        die('possible deep recursion attack');
    }
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            arrayRecursive($array[$key], $function, $apply_to_keys_also);
        } else {
            $array[$key] = $function($value);
        }

        if ($apply_to_keys_also && is_string($key)) {
            $new_key = $function($key);
            if ($new_key != $key) {
                $array[$new_key] = $array[$key];
                unset($array[$key]);
            }
        }
    }
    $recursive_counter--;
}

/**************************************************************
 *
 *  将数组转换为JSON字符串（兼容中文）
 *  @param  array   $array      要转换的数组
 *  @return string      转换得到的json字符串
 *  @access public
 *
 *************************************************************/
function JSON($array) {
    arrayRecursive($array, 'urlencode', true);
    $json = json_encode($array);
    return urldecode($json);
}

require_once 'Classes\PHPExcel.php';
require_once 'Classes\PHPExcel\IOFactory.php';
require_once 'Classes\PHPExcel\Reader\Excel5.php';
$uploadfile='D:/test/templet/22.xls';

$objReader = PHPExcel_IOFactory::createReader('Excel5');/*Excel5 for 2003 excel2007 for 2007*/
$objPHPExcel = PHPExcel_IOFactory::load($uploadfile);
$sheet = $objPHPExcel->getSheet(0);
$highestRow = $sheet->getHighestRow(); // 取得总行数
$highestColumn = $sheet->getHighestColumn(); // 取得总列数

/*方法【推荐】*/
$objWorksheet = $objPHPExcel->getActiveSheet();
$highestRow = $objWorksheet->getHighestRow();   // 取得总行数
$highestColumn = $objWorksheet->getHighestColumn();
$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);//总列数
$list = array();
for ($row = 1;$row <= $highestRow;$row++)         {
    $strs=array();
    //注意highestColumnIndex的列数索引从0开始
    for ($col = 0;$col < $highestColumnIndex;$col++)            {
        $strs[$col] =$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
    }
    array_push($list, $strs);
}
//读取完毕 $list
//处理数据，生成新的结构
$n = 0;
$ser = array();
for($i = 0 ; $i < count($list); $i++ ){
    $ser[$n][0] = $list[$i][0];
    if(!is_array(@$ser[$n][1])){
        $ser[$n][1] = array();
    }
    array_push($ser[$n][1], $list[$i][1]);
    if($i != count($list) -1){
        if($list[$i][0] != $list[$i+1][0]){
            $n++;
        }
    }
}
/*输出文件*/
$sname = array();
$f = 'files/';//存放目录
if (! file_exists ( $f )) {
    mkdir ( $f );
}
for($j = 0;$j < count($ser); $j++){
    $file = $f.$j.'.js';
    echo $file."<br />";
    $fp=fopen("$file", "w+"); //打开文件指针，创建文件
    if ( !is_writable($file) ){
        die("文件:" .$file. "不可写，请检查！");
    }
    if (is_writable($file) == false) {
        die('我是鸡毛,我不能');
    }
    $data = $ser[$j][1];
    array_push($sname, $ser[$j][0]);
    file_put_contents ($file, JSON($data));
    fclose($fp);  //关闭指针
}
$file = $f.'server_name_list.js';
echo $file."<br />";;
$fp=fopen("$file", "w+"); //打开文件指针，创建文件
if ( !is_writable($file) ){
    die("文件:" .$file. "不可写，请检查！");
}
if (is_writable($file) == false) {
    die('我是鸡毛,我不能');
}
file_put_contents ($file, JSON($sname));
echo "生成完毕！";
echo '<a href="zip.php">打包生成文件</a>'
?>
