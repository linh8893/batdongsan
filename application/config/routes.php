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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'home';
$route['admin'] = 'admin/dashboard';
$route['login'] = 'admin/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = 'home';
$route['dang-tin-bat-dong-san.html']="productions/post";
$route['dang-nhap.html']="users/login";
$route['dang-xuat.html']="users/logout";
$route['dang-ky.html']="users/register";
$route['quen-mat-khau.html']="users/reset_pass";
$route['thong-tin-tai-khoan.html']="users/info";

$route['khong-tim-thay-tin.html']="productions/error_404";
$route['quan-ly-tin.html']="users/productions";
$route['quan-ly-tin/trang-(:any).html']="users/productions/$1";
$route['chinh-sua-tin-ms(:any).html']="users/edit/$1";
$route['xoa-tin-ms(:any).html']="users/production_delete/$1";
$route['dang-lai-ms(:any).html']="users/dang_lai/$1";
$route['dang-moi-ms(:any).html']="users/dang_moi/$1";

$route['(:any)/(:any)-msbds-(:num).html']="productions/view/$3";

$route['huong-dan-su-dung.html']="posts/huong_dan";

//$route['nha-dat-ban.html']="productions/groups_type/1";
//$route['nha-dat-cho-thue.html']="productions/groups_type/2";
//$route['nha-dat-ban/trang-(:num).html']="productions/groups_type/1/$1";
//$route['nha-dat-cho-thue/trang-(:num).html']="productions/groups_type/2/$1";
$route['cam-nang-tu-van.html']='posts/cam_nang_tu_van';
$route['cam-nang-tu-van/trang-(:any).html']='posts/cam_nang_tu_van/$1';

$route['tin-tuc-du-an.html']='posts/tin_tuc_du_an';
$route['tin-tuc-du-an/trang-(:any).html']='posts/tin_tuc_du_an/$1';

$route['chu-de/(:any).html']='posts/chu_de/$1';
$route['chu-de/(:any)/trang-(:any).html']='posts/chu_de/$1/$2';

$route['loi-khuyen.html']='posts/chu_de/loi-khuyen';
$route['loi-khuyen/trang-(:any).html']='posts/chu_de/loi-khuyen/$1';

$route['tu-van-luat.html']='posts/chu_de/tu-van-luat';
$route['tu-van-luat/trang-(:any).html']='posts/chu_de/tu-van-luat/$1';

$route['site-map.html']="productions/site_map";




$route['(:any)/(:any)-msp-(:num).html']='posts/view/$1/$2/$3';


$route['(:any)/(:any)/(:any)/(:any)/(:any).html']="productions/search/$1/$2/$3/$4/$5";
$route['(:any)/(:any)/(:any)/(:any)/(:any)/trang-(:any).html']="productions/search/$1/$2/$3/$4/$5/$6";

$route['(:any).html']="productions/tim_kiem/$1";
$route['(:any)/trang-(:any).html']="productions/tim_kiem/$1/$2";



