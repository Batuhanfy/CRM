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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



// API


//// Auth klasörü için yönlendirmeler
//$route['auth/balance'] = 'Auth/Balance';
//$route['auth/balance/(:any)'] = 'Auth/Balance/$1';
//$route['auth/balance/(:any)/(:any)'] = 'Auth/Balance/$1/$2';
//
//$route['auth/forgotpassword'] = 'Auth/ForgotPassword';
//$route['auth/forgotpassword/(:any)'] = 'Auth/ForgotPassword/$1';
//$route['auth/forgotpassword/(:any)/(:any)'] = 'Auth/ForgotPassword/$1/$2';
//
//$route['auth/login'] = 'Auth/Login';
//$route['auth/login/(:any)'] = 'Auth/Login/$1';
//$route['auth/login/(:any)/(:any)'] = 'Auth/Login/$1/$2';
//
//$route['auth/profile'] = 'Auth/Profile';
//$route['auth/profile/(:any)'] = 'Auth/Profile/$1';
//$route['auth/profile/(:any)/(:any)'] = 'Auth/Profile/$1/$2';
//
//$route['auth/register'] = 'Auth/Register';
//$route['auth/register/(:any)'] = 'Auth/Register/$1';
//$route['auth/register/(:any)/(:any)'] = 'Auth/Register/$1/$2';
//
//$route['auth/update'] = 'Auth/Update';
//$route['auth/update/(:any)'] = 'Auth/Update/$1';
//$route['auth/update/(:any)/(:any)'] = 'Auth/Update/$1/$2';
//
//$route['auth/updatepassword'] = 'Auth/UpdatePassword';
//$route['auth/updatepassword/(:any)'] = 'Auth/UpdatePassword/$1';
//$route['auth/updatepassword/(:any)/(:any)'] = 'Auth/UpdatePassword/$1/$2';
//
//// Download klasörü için yönlendirmeler
//$route['download/files'] = 'Download/Files';
//$route['download/files/(:any)'] = 'Download/Files/$1';
//$route['download/files/(:any)/(:any)'] = 'Download/Files/$1/$2';
//
//// Files klasörü için yönlendirmeler
//$route['files/project'] = 'Files/Project';
//$route['files/project/(:any)'] = 'Files/Project/$1';
//$route['files/project/(:any)/(:any)'] = 'Files/Project/$1/$2';
//
//// Logs klasörü için yönlendirmeler
//$route['logs/viewlog'] = 'Logs/Viewlog';
//$route['logs/viewlog/(:any)'] = 'Logs/Viewlog/$1';
//$route['logs/viewlog/(:any)/(:any)'] = 'Logs/Viewlog/$1/$2';
//
//// Notification klasörü için yönlendirmeler
//$route['notification/send'] = 'Notification/Send';
//$route['notification/send/(:any)'] = 'Notification/Send/$1';
//$route['notification/send/(:any)/(:any)'] = 'Notification/Send/$1/$2';
//
//// Payment klasörü için yönlendirmeler
//$route['payment/create'] = 'Payment/Create';
//$route['payment/create/(:any)'] = 'Payment/Create/$1';
//$route['payment/create/(:any)/(:any)'] = 'Payment/Create/$1/$2';
//
//$route['payment/view'] = 'Payment/View';
//$route['payment/view/(:any)'] = 'Payment/View/$1';
//$route['payment/view/(:any)/(:any)'] = 'Payment/View/$1/$2';
//
//// Project klasörü için yönlendirmeler
//$route['project/complete'] = 'Project/Complete';
//$route['project/complete/(:any)'] = 'Project/Complete/$1';
//$route['project/complete/(:any)/(:any)'] = 'Project/Complete/$1/$2';
//
//$route['project/completed'] = 'Project/Completed';
//$route['project/completed/(:any)'] = 'Project/Completed/$1';
//$route['project/completed/(:any)/(:any)'] = 'Project/Completed/$1/$2';
//
//$route['project/createfromquote'] = 'Project/CreateFromQuote';
//$route['project/createfromquote/(:any)'] = 'Project/CreateFromQuote/$1';
//$route['project/createfromquote/(:any)/(:any)'] = 'Project/CreateFromQuote/$1/$2';
//
//$route['project/details'] = 'Project/Details';
//$route['project/details/(:any)'] = 'Project/Details/$1';
//$route['project/details/(:any)/(:any)'] = 'Project/Details/$1/$2';
//
//$route['project/update'] = 'Project/Update';
//$route['project/update/(:any)'] = 'Project/Update/$1';
//$route['project/update/(:any)/(:any)'] = 'Project/Update/$1/$2';
//
//// Quote klasörü için yönlendirmeler
//$route['quote/create'] = 'Quote/Create';
//$route['quote/create/(:any)'] = 'Quote/Create/$1';
//$route['quote/create/(:any)/(:any)'] = 'Quote/Create/$1/$2';
//
//$route['quote/info'] = 'Quote/Info';
//$route['quote/info/(:any)'] = 'Quote/Info/$1';
//$route['quote/info/(:any)/(:any)'] = 'Quote/Info/$1/$2';
//
//$route['quote/lists'] = 'Quote/Lists';
//$route['quote/lists/(:any)'] = 'Quote/Lists/$1';
//$route['quote/lists/(:any)/(:any)'] = 'Quote/Lists/$1/$2';
//
//$route['quote/status'] = 'Quote/Status';
//$route['quote/status/(:any)'] = 'Quote/Status/$1';
//$route['quote/status/(:any)/(:any)'] = 'Quote/Status/$1/$2';
//
//$route['quote/update'] = 'Quote/Update';
//$route['quote/update/(:any)'] = 'Quote/Update/$1';
//$route['quote/update/(:any)/(:any)'] = 'Quote/Update/$1/$2';
//
//// Services klasörü için yönlendirmeler
//$route['services/servicelist'] = 'Services/ServiceList';
//$route['services/servicelist/(:any)'] = 'Services/ServiceList/$1';
//$route['services/servicelist/(:any)/(:any)'] = 'Services/ServiceList/$1/$2';
//
//// Suggest klasörü için yönlendirmeler
//$route['suggest/approve'] = 'Suggest/Approve';
//$route['suggest/approve/(:any)'] = 'Suggest/Approve/$1';
//$route['suggest/approve/(:any)/(:any)'] = 'Suggest/Approve/$1/$2';
//
//$route['suggest/newsuggestion'] = 'Suggest/NewSuggestion';
//$route['suggest/newsuggestion/(:any)'] = 'Suggest/NewSuggestion/$1';
//$route['suggest/newsuggestion/(:any)/(:any)'] = 'Suggest/NewSuggestion/$1/$2';
//
//// Upload klasörü için yönlendirmeler
//$route['upload/files'] = 'Upload/Files';
//$route['upload/files/(:any)'] = 'Upload/Files/$1';
//$route['upload/files/(:any)/(:any)'] = 'Upload/Files/$1/$2';

