<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $paramArray);


curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_TIMEOUT,10);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
if (false !== strpos($url, "https")) {
    // 证书
    // curl_setopt($ch,CURLOPT_CAINFO,"ca.crt");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,  false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,  false);
}
$resultStr = curl_exec($ch);
$result = json_decode($resultStr, true);
