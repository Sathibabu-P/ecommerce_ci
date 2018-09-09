<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admin/dashboard/index';

// items
$route['admins/items'] = 'admin/items/index';
$route['admins/items/create'] = 'admin/items/create';
$route['admins/items/edit'] = 'admin/items/edit';
$route['admins/items/edit/(:any)'] = 'admin/items/edit';
$route['admins/items/delete/(:any)'] = 'admin/items/delete';

$route['shop'] = 'home/shop';
$route['cart'] = 'home/cart';
$route['checkout'] = 'home/checkout';
$route['view'] = 'home/view';


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
