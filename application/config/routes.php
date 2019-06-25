<?php error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Dashboard';

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;



/*Author*/
$route['add-module']  = 'Dashboard/index';
$route['add-save-author']  = 'Dashboard/addModule1';
$route['list-author']  = 'Dashboard/listAuthor';
$route['edit-module/(:any)']  = 'Dashboard/editAuthor/$1';
$route['delete-image/(:num)/{:any}']  = 'Dashboard/delete_image';
$route['search_author/(:any)']  = 'Dashboard/search_author/$1';
$route['search_text/(:any)']  = 'Dashboard/search_text/$1';
$route['update-module/(:any)']  = 'Dashboard/updateAuthor/$1';
