<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['admin/forgot-password'] = 'Admin/forgotPassword';
$route['admin/albums/new'] = 'albums/new';
$route['albums/save-album'] = 'albums/save';
$route['admin/comments'] = 'comments';
$route['logout'] = 'Admin/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
