<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['backend/(:any)']                                ='backend/index/$1';

$route['beranda/download/excel']                                 ='backend/downloadPDF';
$route['beranda/login']                                 ='backend/login';
$route['beranda/changePass/(:any)/(:any)']                      ='backend/changePass/$1/$2';
$route['beranda/show/edit/(:any)/(:any)']                      ='backend/edit/$1/$2';
$route['beranda/show/(:any)/(:any)/(:any)']                ='backend/verifikasi/$3';
$route['beranda/show/(:any)']                           ='backend/showDaftar/$1';
$route['beranda/Do/verifikasi/(:any)']                         ='backend/verifikasiNow/$1';
$route['beranda/Do/edit/(:any)/(:any)']                        ='backend/editNow/$1/$2';
$route['beranda/delete/image/(:any)/(:any)/(:any)/(:any)']                        ='backend/deleteImages/$1/$2/$3/$4';


$route['home/delete/image/(:any)/(:any)/(:any)']                        ='home/deleteImages/$1/$2/$3';
$route['show/idCard/(:any)']                        ='home/idCard/$1';


$route['default_controller'] = "home";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */