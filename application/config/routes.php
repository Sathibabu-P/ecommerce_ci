<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admin/dashboard/index';

// items
$route['admins/items'] = 'admin/items/index';
$route['admins/items/create'] = 'admin/items/create';
$route['admins/items/edit'] = 'admin/items/edit';
$route['admins/items/edit/(:any)'] = 'admin/items/edit';
$route['admins/items/delete/(:any)'] = 'admin/items/delete';
$route['admins/items/delimage/(:any)'] = 'admin/items/delimage';
$route['admins/items/baseimage'] = 'admin/items/baseimage';


$route['cart/add'] = 'cart/add';
$route['cart/remove/(:any)'] = 'cart/remove';
$route['cart/update'] = 'cart/update';
$route['cart/clear'] = 'cart/clear';

$route['checkout/order'] = 'checkout/order';


$route['shop'] = 'home/shop';
$route['cart'] = 'home/cart';
$route['checkout'] = 'home/checkout';
$route['view/(:any)'] = 'home/view';


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
