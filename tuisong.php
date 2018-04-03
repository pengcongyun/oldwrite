<?php
$urls = array();
for ($i=1;$i<610;$i++){
    $urls[]="https://www.doggod.cn/new/$i.html";
}
$api = 'http://data.zz.baidu.com/urls?appid=1585279869239330&token=vWdnL5rNzlfD7zAk&type=batch';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
echo $result;
