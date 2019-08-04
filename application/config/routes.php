<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//GENERAL AREA
$route['login'] = 'general/login';
$route['forgotPassword'] = 'general/forgotPassword';
$route['dashboard'] = 'general/dashboard';
$route['logout'] = 'general/logout';
$route['createUser'] = 'general/createUser';
$route['profile'] = 'general/profile';
$route['detailAccount/(:any)'] = 'general/detailAccount/$1';

//ADMIN
$route['webconf'] = 'admin/webconf';
$route['category'] = 'admin/category';
$route['classifier'] = 'admin/classifier';
$route['account'] = 'admin/account';
//ANALIST
$route['myStock'] = 'analist/myStock';

//SYSTEM AREA
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
