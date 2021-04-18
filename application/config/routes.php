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

// module routes
$route['login']='login/login';
$route['logout']='login/logout';
$route['signup']='register/register';
//wedding
$route['get-wedding']='wedding/get_wedding';
$route['create-wedding']='wedding/create_wedding';
// car
$route['get-car']='car/get_car';
$route['create-car']='car/create_car';
$route['block-car']='car/block_car';
$route['unblock-car']='car/unblock_car';
$route['update-car']='car/update_car';
//driver
$route['get-driver']='driver/get_driver';
$route['create-driver']='driver/create_driver';
$route['block-driver']='driver/block_driver';
$route['unblock-driver']='driver/unblock_driver';
$route['update-driver']='driver/update_driver';
// function
$route['get-function']='function/get_function';
$route['create-function']='function/create_function';
$route['block-function']='function/block_function';
$route['unblock-function']='function/unblock_function';
$route['update-function']='function/update_function';
//guest
$route['get-guest']='guest/get_guest';
$route['create-guest']='guest/create_guest';
$route['block-guest']='guest/block_guest';
$route['unblock-guest']='guest/unblock_guest';
$route['update-guest']='guest/update_guest';
// hotel
$route['get-hotel']='hotel/get_hotels';
$route['create-hotel']='hotel/create_hotel';
$route['block-hotel']='hotel/block_hotel';
$route['unblock-hotel']='hotel/unblock_hotel';
$route['update-hotel']='hotel/update_hotel';
// room
$route['get-room']='room/get_room';
$route['create-room']='room/create_room';
$route['block-room']='room/block_room';
$route['unblock-room']='room/unblock_room';
$route['update-room']='room/update_room';
// venue
$route['get-venue']='venue/get_venue';
$route['create-venue']='venue/create_venue';
$route['block-venue']='venue/block_venue';
$route['unblock-venue']='venue/unblock_venue';
$route['update-venue']='venue/update_venue';
// car driver
$route['get-cardriver']='cardriver/get_cardriver';
$route['create-cardriver']='cardriver/cardriver_map';
$route['block-cardriver']='cardriver/block_cardriver';
$route['unblock-cardriver']='cardriver/unblock_cardriver';
$route['update-cardriver']='cardriver/update_cardriver';
