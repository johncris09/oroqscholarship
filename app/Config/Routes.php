<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(); 
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ["filter" => "auth"]);



$routes->group('school',  function($routes) {
    $routes->get('/', 'SchoolController::index', ["filter" => "auth"]); 
    $routes->get('add', 'SchoolController::add', ["filter" => "auth"]);  
    $routes->get('get_all', 'SchoolController::get_all', ["filter" => "auth"]);  
    $routes->get('get/(:num)', 'SchoolController::get/$1');  
    $routes->post('delete/(:num)', 'SchoolController::delete/$1');   
    $routes->post('insert', 'SchoolController::insert');   
    $routes->post('update', 'SchoolController::update');   
});


$routes->group('strand',  function($routes) {
    $routes->get('/', 'StrandController::index', ["filter" => "auth"]); 
    $routes->get('add', 'StrandController::add', ["filter" => "auth"]);  
    $routes->get('get_all', 'StrandController::get_all', ["filter" => "auth"]);  
    $routes->get('get/(:num)', 'StrandController::get/$1');  
    $routes->post('delete/(:num)', 'StrandController::delete/$1');   
    $routes->post('insert', 'StrandController::insert');   
    $routes->post('update', 'StrandController::update');   
});

$routes->group('course',  function($routes) {
    $routes->get('/', 'CourseController::index', ["filter" => "auth"]); 
    $routes->get('add', 'CourseController::add', ["filter" => "auth"]);  
    $routes->get('get_all', 'CourseController::get_all', ["filter" => "auth"]);  
    $routes->get('get/(:num)', 'CourseController::get/$1');  
    $routes->post('delete/(:num)', 'CourseController::delete/$1');   
    $routes->post('insert', 'CourseController::insert');   
    $routes->post('update', 'CourseController::update');   
});

$routes->group('user',  function($routes) {
    $routes->get('/', 'UserController::index', ["filter" => "auth"]);  
    $routes->get('get_all', 'UserController::get_all', ["filter" => "auth"]);  
    $routes->post('insert', 'UserController::insert');
    $routes->get('get/(:num)', 'UserController::get/$1');  
    $routes->post('update', 'UserController::update');   
    $routes->post('update_password', 'UserController::update_password');   
    $routes->post('delete/(:num)', 'UserController::delete/$1'); 
});

$routes->group('authlogin',  function($routes) {
    $routes->get('/', 'AuthLoginController::index', ["filter" => "auth"]);  
    $routes->get('get_all', 'AuthLoginController::get_all', ["filter" => "auth"]);  
});


service('auth')->routes($routes); 

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
