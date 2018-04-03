<?php
error_reporting(E_ALL ^ E_NOTICE);
require './cos-sdk-v5/cos-autoloader.php';
require './QcloudApi/QcloudApi.php';
require './src/Vod/VodApi.php';
require './src/Vod/Conf.php';

use Vod\VodApi;

VodApi::initConf("AKIDyG1uZo8bPzuZV8RJwQPopBNikTj38e1A", "oShHZQfBLnR5T6dSlZUSsxp3aZNUz43n");

$result = VodApi::upload(
    array (
        'videoPath' => './zx.mp4',
    ),
    array (
        'videoName' => 'ccc',
//        'procedure' => 'myProcedure',
//        'sourceContext' => 'test',
    )
);
echo "upload to vod result: " . json_encode($result) . "\n";