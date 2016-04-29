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

$route['default_controller'] = "loginnreg/log_logged";
$route['login']= 'loginnreg/login';
$route['registration']= 'loginnreg/registration';
$route['register']='loginnreg/register_validation';
$route['registerlogin']='loginnreg/registerlogin';
$route['loggedinuser']='loginnreg/login_setup';
$route['logoff']='loginnreg/logoff';

$route['home']='dashboard/view_home';
$route['profile_view']='dashboard/view_profile';
$route['friends']='dashboard/display_users_friend';
$route['groups']='dashboard/view_all_group';
$route['event/(:any)']='dashboard/display_event_topic/$1';
$route['leaderboard']='dashboard/view_leaderboards';
$route['friendleaderboard']='dashboard/view_leaderboards2';
$route['group/add/(:any)'] = 'dashboard/display_users_friend2/$1';
$route['my_groups'] = 'dashboard/display_users_circle';
$route['group/(:any)'] = 'dashboard/display_circle/$1';

$route['404_override'] = '';


// $route['default_controller'] = 'main';
// $route['hello/(:any)'] = 'main/hello/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */