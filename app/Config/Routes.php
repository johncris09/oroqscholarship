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
$routes->get('/', 'DashboardController::index', ["filter" => "auth"]);



$routes->group('registration',  function($routes) {
    $routes->get('/', 'ScholarRegistrationController::index', ["filter" => "auth"]); 
    $routes->get('shs_app_no_id', 'ScholarRegistrationController::shs_app_no_id');   
    $routes->post('insert_senior_high', 'ScholarRegistrationController::insert_senior_high_registration');  
    $routes->post('insert_college', 'ScholarRegistrationController::insert_college_registration');     
    $routes->post('insert_tvet', 'ScholarRegistrationController::insert_tvet_registration');     
});

$routes->group('approved',  function($routes) {
    $routes->get('/', 'ApprovedApplicationController::index', ["filter" => "auth"]);   
    $routes->get('get_shs_approved_list', 'SeniorHighController::get_approved_application', ["filter" => "auth"]);   
    $routes->get('get_college_approved_list', 'CollegeController::get_approved_application', ["filter" => "auth"]);  
    $routes->get('get_tvet_approved_list', 'TvetController::get_approved_application', ["filter" => "auth"]);  
});

$routes->group('view',  function($routes) {
    $routes->get('application/(:any)/(:any)', 'ViewApplicationController::get_application/$1/$2', ["filter" => "auth"]);
    $routes->get('shs_app_no_id', 'ScholarRegistrationController::shs_app_no_id');  
});

$routes->group('pending',  function($routes) {
    $routes->get('/', 'ApprovedPendingApplicationController::index', ["filter" => "auth"]);  
    $routes->get('get_shs_pending_list', 'SeniorHighController::get_pending_application', ["filter" => "auth"]);   
    $routes->post('update_shs', 'SeniorHighController::update');    
    $routes->get('get_college_pending_list', 'CollegeController::get_pending_application', ["filter" => "auth"]);  
    $routes->post('update_college', 'CollegeController::update');    
    $routes->get('get_tvet_pending_list', 'TvetController::get_pending_application', ["filter" => "auth"]);  
    $routes->post('update_tvet', 'TvetController::update');     
});

$routes->group('manage',  function($routes) {
    $routes->get('/', 'ManageApplicationController::index', ["filter" => "auth"]);  
    $routes->get('get_shs_all_list', 'SeniorHighController::get_all', ["filter" => "auth"]);   
    $routes->post('update_shs', 'SeniorHighController::update');    
    $routes->get('get_college_all_list', 'CollegeController::get_all', ["filter" => "auth"]);  
    $routes->post('update_college', 'CollegeController::update');    
    $routes->get('get_tvet_all_list', 'TvetController::get_all', ["filter" => "auth"]);  
    $routes->post('update_tvet', 'TvetController::update');     
});

$routes->group('school',  function($routes) {
    $routes->get('/', 'SchoolController::index', ["filter" => "auth"]); 
    $routes->get('get_all', 'SchoolController::get_all', ["filter" => "auth"]);  
    $routes->get('get/(:num)', 'SchoolController::get/$1');  
    $routes->post('delete/(:num)', 'SchoolController::delete/$1');   
    $routes->post('insert', 'SchoolController::insert');   
    $routes->post('update', 'SchoolController::update');   
});

$routes->group('collegeschool',  function($routes) {
    $routes->get('/', 'CollegeSchoolController::index', ["filter" => "auth"]); 
    $routes->get('get_all', 'CollegeSchoolController::get_all', ["filter" => "auth"]);   
    $routes->get('get/(:num)', 'CollegeSchoolController::get/$1');  
    $routes->post('delete/(:num)', 'CollegeSchoolController::delete/$1');   
    $routes->post('insert', 'CollegeSchoolController::insert');   
    $routes->post('update', 'CollegeSchoolController::update');   
});


$routes->group('strand',  function($routes) {
    $routes->get('/', 'StrandController::index', ["filter" => "auth"]);   
    $routes->get('get_all', 'StrandController::get_all', ["filter" => "auth"]);  
    $routes->get('get/(:num)', 'StrandController::get/$1');  
    $routes->post('delete/(:num)', 'StrandController::delete/$1');   
    $routes->post('insert', 'StrandController::insert');   
    $routes->post('update', 'StrandController::update');   
});

$routes->group('course',  function($routes) {
    $routes->get('/', 'CourseController::index', ["filter" => "auth"]);  
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
