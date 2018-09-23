<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admin/dashboard/index';

// items
$route['admin/items'] = 'admin/items/index';
$route['admin/items/create'] = 'admin/items/create';
$route['admin/items/edit'] = 'admin/items/edit';
$route['admin/items/edit/(:any)'] = 'admin/items/edit';
$route['admin/items/delete/(:any)'] = 'admin/items/delete';
$route['admin/items/delimage/(:any)'] = 'admin/items/delimage';
$route['admin/items/baseimage'] = 'admin/items/baseimage';

$route['admin/orders/view/(:any)'] = 'admin/orders/view';
$route['admin/orders/status/(:any)'] = 'admin/orders/status';
$route['admin/orders/delete/(:any)'] = 'admin/orders/delete';

$route['admin/orders/datatables']  = 'admin/orders/getOrderList';

$route['admin/categories'] = 'admin/categories/index';
$route['admin/categories/create'] = 'admin/categories/create';
$route['admin/categories/edit/(:any)'] = 'admin/categories/edit';
$route['admin/categories/delete/(:any)'] = 'admin/categories/delete';

$route['cart/add'] = 'cart/add';
$route['cart/remove/(:any)'] = 'cart/remove';
$route['cart/update'] = 'cart/update';
$route['cart/clear'] = 'cart/clear';

$route['checkout/order'] = 'checkout/order';
$route['checkout/success'] = 'checkout/success';


$route['shop'] = 'home/shop';
$route['cart'] = 'home/cart';
$route['checkout'] = 'home/checkout';
$route['view/(:any)'] = 'home/view';


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
