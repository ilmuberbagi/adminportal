<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'dashboard';
$route['404_override'] = '_404';

$route['reset'] = 'login/reset';
$route['register'] = 'login/register';

$route['member/(:any)'] = 'member/detail/$1';
$route['member/region'] = 'member/region';
$route['member/sv_region'] = 'member/sv_region';
$route['member/upd_region'] = 'member/upd_region';

$route['member/changepassword'] = 'member/changepassword';

$route['member/type'] = 'member/type';
$route['member/sv_type'] = 'member/sv_type';
$route['member/upd_type'] = 'member/upd_type';
$route['member/change_member_status'] = 'member/change_member_status';

$route['member/privilage'] = 'member/privilage';
$route['member/update'] = 'member/proc_update';
$route['member/updatepassword'] = 'member/proc_change_password';
$route['member/change_privilage'] = 'member/change_privilage';

$route['article/(:any)'] = 'article/detail/$1';
$route['article/category'] = 'article/category';
$route['article/create'] = 'article/create';
$route['article/update'] = 'article/update';
$route['article/insert'] = 'article/insert';
$route['article/image'] = 'article/image';
$route['article/get_image'] = 'article/get_image_from_dir';


$route['activity/(:any)'] = 'activity/detail/$1';
$route['activity/create'] = 'activity/create';
$route['activity/update'] = 'activity/update';
$route['activity/insert'] = 'activity/insert';
$route['activity/delete(:any)'] = 'activity/delete/$1';
