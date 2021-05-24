<?php

echo date('Y-m-d H:i:s',1621396480);exit;

//echo base64_encode('123456').'<br>';
//echo base64_decode('MTIzNDU2');
//echo base64_encode('QQ14').'<br>';
//echo base64_encode('UVExNA==').'<br>';
//echo base64_decode('UVExNA==').'<br>';
function is_utf8($str){
    $len = strlen($str);
    for($i = 0; $i < $len; $i++){ $c = ord($str[$i]); if($c > 128){
        if(($c > 247)){
            return false;
        }elseif($c > 239){
            $bytes = 4;
        }elseif($c > 223){
            $bytes = 3;
        }elseif ($c > 191){
            $bytes = 2;
        }else{
            return false;
        }
        if(($i + $bytes) > $len){
            return false;
        }
        while($bytes > 1){
            $i++;
            $b = ord($str[$i]);
            if($b < 128 || $b > 191){
                return false;
            }
            $bytes--;
        }
    }
    }
    return true;
}
function is_base64($str){
//这里多了个纯字母和纯数字的正则判断
    if(@preg_match('/^[0-9]*$/',$str) || @preg_match('/^[a-zA-Z]*$/',$str)){
        return false;
    }elseif(is_utf8(base64_decode($str)) && base64_decode($str) != ''){
        return true;
    }
    return false;
}

//echo is_base64(1);
echo base64_decode('QQ14');
