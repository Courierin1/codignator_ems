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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['register'] = 'Login/register';
$route['register-process'] = 'Login/register_process';
$route['login/success'] = 'Login/index/success';

$route['events'] = 'Events/events';
$route['logout'] = 'Login/logout';
$route['events/create'] = 'Events/create';
$route['event_enroll_del/(:any)'] = 'Events/event_enroll_del/$1';
$route['users/delete/(:any)'] = 'Events/remove_user/$1';
$route['spectator'] = 'Events/spectator';
$route['participate'] = 'Events/spectator';

$route['event_enroll/temp_data_get'] = 'Events/temp_get';
$route['event_enroll/temp_data'] = 'Events/temp_enroll_process';

$route['vips'] = 'Events/vips';

$route['event_enroll/edit/(:any)'] = 'Events/event_enroll_edit/$1';
$route['events/view/(:any)'] = 'Events/event_enroll_view/$1';

$route['users'] = 'Events/users';
$route['users/edit/(:any)'] = 'Events/user_edit/$1';

$route['events/view'] = 'Events/view';
$route['waiver'] = 'Events/waiver';

$route['waiver_view'] = 'Events/waiver_view';

$route['about'] = 'Events/about_view';
$route['about_form'] = 'Events/about';

$route['contact'] = 'Events/contact_view';
$route['contact_form'] = 'Events/contact';

$route['profile'] = 'Events/profile';

$route['register/error/1'] = 'Login/register/error/1';
$route['register/error/2'] = 'Login/register/error/2';
$route['register/error/3'] = 'Login/register/error/3';


$route['login/failed'] = 'Login/index/failed';
$route['login/failed1'] = 'Login/index/failed1';

$route['forget_password'] = 'Login/forget_password';
$route['new_password'] = 'Login/new_password';
$route['password_reset'] = 'Login/password_reset';


$route['events/waiver/(:any)'] = 'Events/waiver_view/$1';
$route['events/edit/(:any)'] = 'Events/edit_event/$1';
$route['events/delete/(:any)'] = 'Events/delete_event/$1';
$route['events/status'] = 'Events/event_process';


$route['paypal/success'] = 'Paypal/success';
$route['paypal/cancel'] = 'Paypal/cancel';
$route['paypal/ipn'] = 'Paypal/ipn';







