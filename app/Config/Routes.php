<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('home');
$routes->setDefaultController('404');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
// ['except' => ['PATCH']]
// ['only' => ['index', ]]
// ['filter' => 'auth']
$routes->group("api", function ($routes) {
    $routes->post('user/login', 'User::login');
    $routes->post('Passenger/login', 'Passenger::login');
    $routes->get('user/setPassword/(:any)', 'User::setPassword/$1');
    $routes->resource('Search');
    $routes->post('UploadFile/fromBase64', 'UploadFile::imageBase64');
    $routes->post('UploadFile/image', 'UploadFile::imageMultipart');
    $routes->resource('UploadFile');
});

$routes->group("api", ['filter' => 'Auth'], function ($routes) {
    $routes->resource('trip');
    $routes->resource('FleetType');
    $routes->resource('tripRoute');
    $routes->resource('TripLocation');
    $routes->resource('TripAssign');
    $routes->resource('Schedule');
    $routes->resource('PriPrice');
    // resource must below 
    $routes->get('user/details', 'User::details');
    $routes->get('Passenger/details', 'Passenger::details');
    $routes->resource('user');
    $routes->resource('Passenger');
});
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
