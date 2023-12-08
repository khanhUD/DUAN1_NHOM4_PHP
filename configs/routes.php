<?php
$routes['default_controller'] = 'ClientHome';
// Admin
$routes['Admin'] = 'home/index';
$routes['Dang-Nhap'] = 'admin/login';
$routes['check'] = 'users/checkLogin';
$routes['Dang-Ky'] = 'admin/register';
$routes['Quen-Mat-Khau'] = 'admin/forgot_password';
$routes['Doi-Mat-Khau'] = 'admin/change_password';
$routes['Dang-xuat'] = 'admin/logOut';
$routes['Ho-So'] = 'profile/index';






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


// client 
$routes['Trang-Chu'] = 'ClientHome';

$routes['Gioi-Thieu'] = 'ClientAboutUs';

$routes['Thuc-Don'] = 'ClientProducts/index';

$routes['Bai-Viet'] = 'ClientPosts';
// $routes['Bai-Viet/'] = 'ClientPosts';

$routes['Lien-He'] = 'ClientContacts';

$routes['Gio-Hang'] = 'ClientCarts';

$routes['Hoa-Don'] = 'ClientOrders';

$routes['Thanh-Toan'] = 'ClientPays';

$routes['Tai-Khoan'] = 'ClientProfile';
$routes['dat-ban'] = 'ClientBooking';
$routes['quan-ly-hoa-don'] = 'ClientOrders/orderManagement';









