<?php
$routes['default_controller'] = 'home';
// Admin
$routes['admin'] = 'home';
$routes['login'] = 'admin/login';
$routes['users/register'] = 'admin/register';

$routes['banner'] = 'banner/add';
$routes['banner/edit'] = 'banner/edit';

$routes['productCategories'] = 'productCategories/add';
$routes['productCategories/edit'] = 'productCategories/edit';

$routes['productComments'] = 'productComments/listComments';
$routes['productComments/commentDetails'] = 'productComments/commentDetails';
$routes['productComments/list'] = 'productComments/listComments';

$routes['postComments'] = 'postComments/listComments';
$routes['postComments/commentDetails'] = 'postComments/commentDetails';
$routes['postComments/list'] = 'postComments/listComments';

// $routes['orderTables'] = 'orderTables';




