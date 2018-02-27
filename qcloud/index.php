<?php
//error_reporting(E_ALL ^ E_NOTICE);
$fileId='7447398154856943533';
$nonce=rand(100000000,999999999);
$timestamp=time();
$secretKey = 'oShHZQfBLnR5T6dSlZUSsxp3aZNUz43n';
$secretId='AKIDyG1uZo8bPzuZV8RJwQPopBNikTj38e1A';
$srcStr = 'POSTvod.api.qcloud.com/v2/index.php?Action=DeleteVodFile&Nonce='.$nonce.'&Region=gz&SecretId='.$secretId.'&Timestamp='.$timestamp.'&fileId='.$fileId.'&priority=0';
$signStr = base64_encode(hash_hmac('sha1', $srcStr, $secretKey, true));
//echo $signStr;exit;
$paramArray=array (
    'Nonce' => $nonce,
    'Region' => 'gz',
    'Timestamp' => $timestamp,
    'Action' => 'DeleteVodFile',
    'SecretId' => $secretId,
    'fileId' => $fileId,
    'priority' => '0',
    'Signature' => $signStr,
);
$url="https://vod.api.qcloud.com/v2/index.php";
function sendRequest($url, $paramArray, $method = 'POST')
{
    $ch = curl_init();
    if ($method == 'POST')
    {
        $paramArray = is_array( $paramArray ) ? http_build_query( $paramArray ) : $paramArray;
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $paramArray);
    }
    else
    {
        $url .= '?' . http_build_query($paramArray);
    }

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
    if (!$result)
    {
        return $resultStr;
    }
    return $result;
}
var_dump(sendRequest($url, $paramArray, 'POST'));