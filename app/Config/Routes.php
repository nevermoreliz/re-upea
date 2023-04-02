<?php

namespace Config;

use CodeIgniter\Debug\Toolbar\Collectors\Routes;
use CodeIgniter\Router\Router;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers\Web');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);
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
$routes->get('/', 'Home::index');

$routes->group('auth', ['namespace' => 'App\Controllers\Auth'], function ($routes) {
    $routes->get('/', 'Login::index', ['as' => 'login']);
    $routes->post('signin', 'Login::signin', ['as' => 'signin']);
    $routes->get('logout', 'Login::logout', ['as' => 'logout']);
});

$routes->get('/auth', 'App\Controllers\Auth\Login::index');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth:ADMINISTRADOR,TECNICO,SECRETARIA'], function ($routes) {
    $routes->get('/', 'Dashboard::index', ['as' => 'dashboard']);


    $routes->group('publicacion',['namespace' => 'App\Controllers\Admin'], function($routes)
    {
        $routes->get('', 'Publicacion::index', ['as' => 'index_publicacion']);
    });


    /**======================
     *    usuarios rutas
     *========================**/
    $routes->group('usuario',['namespace' => 'App\Controllers\Admin','filter' => 'usuario:ADMINISTRADOR,TECNICO,SECRETARIA'], function($routes)
    {
        $routes->get('', 'Usuario::index', ['as' => 'index_usuario']);
    });

    // $routes->group('usuario',['namespace' => 'App\Controllers\Admin','filter' => 'usuario:ADMINISTRADOR'], function($routes)
    // {
    //     $routes->get('', 'Usuario::index', ['as' => 'index_usuario']);
    // });

    
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
