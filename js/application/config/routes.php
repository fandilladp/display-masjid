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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['master/identitas/(:any)/(:any)']   	= 'master_identitas/$1/$2';
$route['master/identitas/(:any)']          	= 'master_identitas/$1';
$route['master/identitas']                 	= 'master_identitas';

$route['master/user/(:any)/(:any)']   		= 'master_user/$1/$2';
$route['master/user/(:any)']          		= 'master_user/$1';
$route['master/user']                 		= 'master_user';

$route['master/profil/(:any)/(:any)']   	= 'profil/$1/$2';
$route['master/profil/(:any)']          	= 'profil/$1';
$route['master/profil']                 	= 'profil';


$route['pengaturan/waktu-shalat/(:any)/(:any)']   	= 'pengaturan/waktu_shalat/$1/$2';
$route['pengaturan/waktu-shalat/(:any)']          	= 'pengaturan/waktu_shalat/$1';
$route['pengaturan/waktu-shalat']                 	= 'pengaturan/waktu_shalat';

$route['pengaturan/masjid/(:any)/(:any)']   	= 'pengaturan/masjid/$1/$2';
$route['pengaturan/masjid/(:any)']          	= 'pengaturan/masjid/$1';
$route['pengaturan/masjid']                 	= 'pengaturan/masjid';

$route['pengaturan/general/(:any)/(:any)']   	= 'pengaturan/general/$1/$2';
$route['pengaturan/general/(:any)']          	= 'pengaturan/general/$1';
$route['pengaturan/general']                 	= 'pengaturan/general';

$route['pengaturan/font/(:any)/(:any)']   		= 'pengaturan/font/$1/$2';
$route['pengaturan/font/(:any)']          		= 'pengaturan/font/$1';
$route['pengaturan/font']                 		= 'pengaturan/font';

$route['petugas/shalat-jumat/(:any)/(:any)']   	= 'petugas_jumat/$1/$2';
$route['petugas/shalat-jumat/(:any)']          	= 'petugas_jumat/$1';
$route['petugas/shalat-jumat']                 	= 'petugas_jumat';


$route['jadwal-imam-shalat/(:any)/(:any)']   	= 'jadwal_imam/$1/$2';
$route['jadwal-imam-shalat/(:any)']          	= 'jadwal_imam/$1';
$route['jadwal-imam-shalat']                 	= 'jadwal_imam';


$route['jadwal/kajian/(:any)/(:any)']   	= 'jadwal_kajian/$1/$2';
$route['jadwal/kajian/(:any)']          	= 'jadwal_kajian/$1';
$route['jadwal/kajian']                 	= 'jadwal_kajian';


$route['pengaturan/perwaktu-shalat/(:any)/(:any)']   	= 'pengaturan/perwaktu_shalat/$1/$2';
$route['pengaturan/perwaktu-shalat/(:any)']          	= 'pengaturan/perwaktu_shalat/$1';
$route['pengaturan/perwaktu-shalat']                 	= 'pengaturan/perwaktu_shalat';


$route['pengaturan/background/(:any)/(:any)']   	= 'pengaturan/background/$1/$2';
$route['pengaturan/background/action_status']          	= 'pengaturan/background/action_status';
$route['pengaturan/background/action_delete']          	= 'pengaturan/background/action_delete';
$route['pengaturan/background/upload']          	= 'pengaturan/background/upload';
$route['pengaturan/background/add/(:any)']          = 'pengaturan/background/add/$1';
$route['pengaturan/background/(:any)']          	= 'pengaturan/background/index/$1';
$route['pengaturan/background']                 	= 'pengaturan/background';


