<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'web';
$route['demo'] = 'web/demo';
$route['about'] = 'web/about';
$route['albums'] = 'web/albums';
$route['album/(:any)'] = 'web/viewAlbum/$1';
$route['projects'] = 'web/projects';
$route['blog'] = 'web/blog';
$route['article/(:any)'] = 'web/article/$1';
$route['contact'] = 'web/contact';
$route['locked-projects'] = 'web/lockedProjects';
$route['admin/forgot-password'] = 'Admin/forgotPassword';
$route['admin/albums/new'] = 'albums/new';
$route['albums/save-album'] = 'albums/save';
$route['admin/comments'] = 'comments';
$route['category/add-category'] = 'admin/addCategory';
$route['category/update-category'] = 'admin/updateCategory';
$route['category/delete/(:num)'] = 'admin/deleteCategory/$1';
$route['category/delete-multiple'] = 'admin/deleteCategories';
$route['logout'] = 'Admin/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
