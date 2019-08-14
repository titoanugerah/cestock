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
$route['viewInvoice/(:any)'] = 'general/viewInvoice/$1';
$route['detailStock/(:any)'] = 'general/detailStock/$1';
$route['stockByCategory/(:any)'] = 'general/stockByCategory/$1';
//ADMIN
$route['webconf'] = 'admin/webconf';
$route['category'] = 'admin/category';
$route['classifier'] = 'admin/classifier';
$route['account'] = 'admin/account';
$route['pricing'] = 'admin/pricing';
$route['paymentList'] = 'admin/paymentList';

//ANALIST
$route['myStock'] = 'analist/myStock';


//USER AREA
$route['goPremium'] = 'user/goPremium';
$route['payment'] = 'user/payment';
$route['stockList'] = 'user/stockList';
$route['misqueen'] = 'user/misqueen';


//SYSTEM AREA
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
