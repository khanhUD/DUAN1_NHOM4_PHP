<?php
define('_DIR_ROOT', __DIR__);
//  Xử lý http root
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') 
{
    $web_root = 'https://' . $_SERVER['HTTP_HOST'] . '/';
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'] . '/';
}
$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(_DIR_ROOT));
$web_root .= $folder;
define('_WEB_ROOT', $web_root);

require './configs/routes.php';
require './core/Route.php';
require './app/App.php'; //load app
require './core/Controller.php'; //load base controller
