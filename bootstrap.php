<?php 
define('_DIR_ROOT', __DIR__);

//  Xử lý http root
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') 
{
    $web_root = 'https://' . $_SERVER['HTTP_HOST'] . '/';
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'] . '/';
}

// $folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(_DIR_ROOT));
// $web_root .= $folder;

/*
* AutoLoad Config
*
*/

$configs_dir = scandir('configs');
if(!empty($configs_dir)) {
    foreach($configs_dir as $item) {
        if($item != '.' && $item != '..' && file_exists('configs/' . $item)) {
           require_once 'configs/'.$item;
        }
    }
}
define('_WEB_ROOT', $web_root);


// load all service
if (!empty($config['app']['service'])) {
    $allServices = $config['app']['service'];
    if (!empty($allServices)) {
        foreach ($allServices as $serviceName) {
            if (file_exists('app/core/' . $serviceName . ".php")) {
                require_once 'app/core/' . $serviceName . ".php";
            }
        }
    }
}

require_once 'core/Load.php';

// kiem tra config va load vao database;
if (!empty($config['database'])) {
    $db_config = array_filter($config['database']);
    if (!empty($db_config)) {
        require_once 'core/Connection.php';
        require_once 'core/QueryBuilder.php';
        require_once 'core/Database.php';
        require_once 'core/DB.php';
        // $conn = Connection::getInstance($db_config);
    }
}

//  middleware
require_once 'core/Middlewares.php';
require_once 'core/Route.php'; // load route class
require_once 'core/Session.php';

// load service provider  class
require_once 'core/ServiceProvider.php';
// load view class
require_once 'core/View.php';

// load core helpers
require_once 'core/Helper.php';

// load all helpers
$allHelpers = scandir('app/helpers');

if (!empty($allHelpers)) {
    foreach ($allHelpers as $item) {
        if (file_exists('app/helpers/' . $item) && $item != "." && $item != "..") {
            require_once 'app/helpers/' . $item;
        }
    }
}

// load template
require_once 'core/Template.php';

require_once 'vendor/autoload.php';

require_once 'app/App.php'; // load app
require_once 'core/Model.php'; // load base model
require_once 'core/Controller.php'; // load base controller
require_once 'core/Request.php'; // load request
require_once 'core/Response.php'; // load response