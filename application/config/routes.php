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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['lib/login'] = 'Welcome/lib_login';
$route['student/login'] = 'Welcome/student_login';

$route['lib/login_parse'] = 'Welcome/lib_login_parse';
$route['student/login_parse'] = 'Welcome/student_login_parse';

$route['lib/main'] = 'Welcome/lib_loginCheck';
$route['student/main'] = 'Welcome/student_loginCheck';

$route['lib'] = 'Welcome/logout';
$route['student'] = 'Welcome/logout';

$route['student/borrow/(:any)'] = 'Welcome/student_borrow';
$route['student/return/(:any)'] = 'Welcome/student_return';
$route['student/cancel/(:any)'] = 'Welcome/student_cancel';
$route['student/pending'] = 'Welcome/student_pending';
$route['student/borrowed'] = 'Welcome/student_borrowed';
$route['student/activity'] = 'Welcome/student_activity';

$route['lib/add_student'] = 'Welcome/add_student';
$route['lib/add_book'] = 'Welcome/add_book';
$route['lib/confirm/(:any)'] = 'Welcome/lib_confirm';
$route['lib/cancel/(:any)'] = 'Welcome/lib_cancel';
$route['lib/main/(:any)'] = 'Welcome/lib_deleteStudent';
$route['lib/books/(:any)'] = 'Welcome/lib_deleteBooks';

$route['lib/books'] = 'Welcome/lib_books';
$route['lib/pending'] = 'Welcome/lib_pending';
$route['lib/activity'] = 'Welcome/lib_activity';

$route['lib/setting'] ='Welcome/lib_setting';
$route['lib/change_password'] = 'Welcome/lib_change_password';

$route['lib/edit/(:any)'] = 'Welcome/lib_edit';
$route['lib/edit/(:any)/parse'] = 'Welcome/lib_edit_parse';

$route['lib/editBook/(:any)'] = 'Welcome/editBook';
$route['lib/editBook/(:any)/parse'] = 'Welcome/editBook_parse';

$route['student/setting'] = 'Welcome/student_setting';
$route['student/change_password'] = 'Welcome/student_change_password';