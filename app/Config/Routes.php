<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LoginController');
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

//rutas del login
$routes->get('/', 'LoginController::login', ['as' => 'principal']);
$routes->post('/procesarLogin', 'LoginController::procesarLogin', ['as' => 'procesarLogin']);
$routes->get('/inicio-sesion', 'LoginController::inicioSesion', ['as' => 'inicioSesion']);
$routes->get('/sesion-finalizada', 'LoginController::cerrarSesion', ['as' => 'cerrarSesion']);

//rutas del crud
$routes->get('/inicio-crud', 'CrudController::principalCrud', ['as' => 'inicioCrud']);
$routes->get('/obtener-datos/editar/(:any)', 'CrudController::obtenerNombre/$1');
$routes->post('/crear-crud', 'CrudController::crear', ['as' => 'crearCrud']);
$routes->get('/eliminar-crud/(:any)', 'CrudController::eliminar/$1');
$routes->post('/actualizar-crud', 'CrudController::actualizar', ['as' => 'actualizarCrud']);

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
