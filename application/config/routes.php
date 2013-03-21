<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "home";
$route['404_override'] = '';

$route['home'] = 'home/index';
$route['about'] = 'about/index';
$route['new-idea'] = 'idea/create';
$route['post/(:num)'] = 'idea/show/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */