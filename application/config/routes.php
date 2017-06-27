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
$route['default_controller'] = 'front/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//My Admin Routes
$route['admin'] = 'admin/admin';
//$route['verify'] = 'verifylogin';
$route['admin/logout'] = 'admin/admin/logout';

//Dashboard, Code & Status
$route['code'] = 'admin/code';
$route['status/(:any)'] = 'admin/status';
$route['admin/admin-panel'] = 'admin/admin_panel';

//Agents
$route['admin/agents'] = 'admin/agents';
$route['admin/add_agent'] = 'admin/agents/add_agent';
$route['admin/insert_agent'] = 'admin/agents/insert_agent';
$route['admin/edit_agent/(:any)'] = 'admin/agents/edit_agent';
$route['admin/update_agent/(:any)'] = 'admin/agents/update_agent';
$route['admin/delete_agent/(:any)'] = 'admin/agents/delete_agent';

//Listings
$route['admin/listings'] = 'admin/listings';
$route['admin/add_listing'] = 'admin/listings/add_listing';
$route['admin/insert_listing'] = 'admin/listings/insert_listing';
$route['admin/add_files/(:any)'] = 'admin/listings/add_listing_files';
$route['admin/insert_pdf/(:any)'] = 'admin/listings/listing_pdf';
$route['admin/insert_gallery/(:any)'] = 'admin/listings/listing_gallery';
$route['admin/edit_listing/(:any)'] = 'admin/listings/edit_listing';
$route['admin/update_listing/(:any)'] = 'admin/listings/update_listing';
$route['admin/delete_listing/(:any)'] = 'admin/listings/delete_listing';
$route['admin/rename_listing_pdf/(:any)/(:any)'] = 'admin/listings/rename_listing_pdf';
$route['admin/delete_listing_pdf/(:any)/(:any)'] = 'admin/listings/delete_listing_pdf';
$route['admin/delete_listing_gallery/(:any)/(:any)'] = 'admin/listings/delete_listing_gallery';

//Listing Steps
$route['admin/listing_steps'] = 'admin/steps';
$route['admin/add_step'] = 'admin/steps/add_step';
$route['admin/insert_step'] = 'admin/steps/insert_step';
$route['admin/edit_step/(:any)/(:any)'] = 'admin/steps/edit_step';
$route['admin/update_step/(:any)/(:any)'] = 'admin/steps/update_step';
$route['admin/delete_step/(:any)/(:any)'] = 'admin/steps/delete_step';

//Search
$route['admin/search_agent'] = 'admin/search_agents';
$route['admin/search_listing'] = 'admin/search_listings';


/////////////////////////////////////////////////
//$route['admin/add_employee'] = 'admin/employees';
//$route['admin/edit_employee/(:any)'] = 'admin/employees/edit_employee';
//$route['admin/update_employee/(:any)'] = 'admin/employees/update_employee';
//$route['admin/confirm_pass'] = 'admin/admin/confirm_pass';
//$route['admin/profile'] = 'admin/admin/profile';