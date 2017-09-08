<?php
function create_water_maker()
{
    $_path = dirname(__FILE__);
    $_path = str_ireplace('','/',$_path);
    $_font = $_path.'/jiaotong.TTF';
    //指定图片路径
    $src = $_path.'/xx.jpg';
    //获取图片信息
    $info = getimagesize($src);
    //获取图片扩展名
    $type = image_type_to_extension($info[2],false);
    //动态的把图片导入内存中
    $fun = "imagecreatefrom{$type}";
    $image = $fun($src);
    //指定字体颜色
    $col = imagecolorallocatealpha($image,0,255,255,95);
    //指定字体内容
    $content = 'not too bad';
    //给图片添加文字
    //imagestring($image,5,20,30,$content,$col);
    // $info['0'] width   $info['1'] height
    $font_size = $info['1']/5;
    $font_size_w = $info['0']/7;
    if($font_size_w < $font_size)
    {
        $font_size = $font_size_w;
    }
    // 魏碑体大概的所占宽和高
    $_font_width = $font_size*5;
    $_font_height = $font_size*4;
    // 文字对应的位置 从什么地方开始
    $_left_font = ($info['0']-$_font_width)/2;
    $_bottom_font = $info['1'] - ($info['1']-$_font_height)/2;
    imagettftext($image,$font_size,30,$_left_font,$_bottom_font,$col,$_font,$content);
    $func = "image{$type}";
    ob_start();
    $func($image);
    //销毁图片
    $_data = ob_get_contents();
    imagedestroy($image);
    ob_end_clean();
    file_put_contents($src, $_data);
    echo "ok";
}
create_water_maker();
exit;
/**
 * 图片裁剪处理
 * edit by www.jb51.net
 */
function cut($background, $cut_x, $cut_y, $cut_width, $cut_height, $location){
    $back=imagecreatefromjpeg($background);
    $new=imagecreatetruecolor($cut_width, $cut_height);
    imagecopyresampled($new, $back, 0, 0, $cut_x, $cut_y, $cut_width, $cut_height,$cut_width,$cut_height);
    imagejpeg($new, $location);
    imagedestroy($new);
    imagedestroy($back);
}
cut("./images/hee.jpg", 440, 140, 117, 112, "./images/hee5.jpg");