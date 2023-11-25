<?php
define('_DIR_ROOT', __DIR__);
//  Xử lý http root
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'] . '/';
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'] . '/';
}
$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(_DIR_ROOT));
$web_root .= $folder;
define('_WEB_ROOT', $web_root);

// autoload config vào boostrap

$configs_dir = scandir('configs');
if (!empty($configs_dir)) {
    foreach ($configs_dir as $item) {
        if ($item != '.' && $item != '..' && file_exists('configs/' . $item)) {
            require_once 'configs/' . $item;
        }
    }
}
// require './configs/routes.php';
require './core/Route.php';  // load Route class
require './app/App.php'; //load app
// kiểm tra config và load database 
if (!empty($config['database'])) {
    $db_config = array_filter($config['database']);;

    if (!empty($db_config)) {
        require_once 'core/Connection.php';
        require_once 'core/Database.php';
        $db = new Database() ;
   
        
    }
}
require './core/Controller.php'; //load base controller
