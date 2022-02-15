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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get', 'post'],'/', 'Home::index');
$routes->match(['get', 'post'],'login', 'Home::login',['filter' => 'noauth']);
$routes->match(['get', 'post'] ,'register', 'Home::register', ['filter' => 'noauth']);
$routes->match(['get', 'post'] ,'dashboard', 'Home::dashboard', ['filter' => 'auth']);
$routes->match(['get', 'post'] ,'api', 'Home::api');
$routes->post('verify', 'Home::verify', ['filter' => 'auth']);
$routes->post('update', 'Home::update', ['filter' => 'auth']);
$routes->get('logout', 'Home::logout');
$routes->match(['get', 'post'],'import', 'Home::import');

//Main Controller
$routes->add('getDistrict', 'Main::getDistrict');
$routes->add('getTehsil', 'Main::getTehsil');
$routes->add('getdistrictM', 'Main::getdistrictM');
$routes->add('getTehsilM', 'Main::getTehsilM');
$routes->add('getUsers', 'Main::getUsers');
$routes->add('registerM', 'Main::registerM');

$routes->add('gettest', 'Main::gettest');



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
