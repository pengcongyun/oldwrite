<?php
header('Content-Type:text/html;Charset=utf-8');
define('ROOT_PATH', dirname(__FILE__)); // 网站根目录
define('UPDIR', '/upload/'); // 上传文件路径
define('DB_DSN', 'mysql:host=localhost;dbname=test');
define('DB_USER', 'root');
define('DB_PWD', 'root');
error_reporting(E_ALL & ~E_NOTICE);
// 自动加载文件类
function __autoload($className) {
    require_once ROOT_PATH . '/includes/' . ucfirst($className) . '.class.php';
}

?>