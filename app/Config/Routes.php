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
//$routes->get('/', 'Home::index');

/* GRUPO PARA WEB */
$routes->group('/', ['namespace' => 'App\Controllers\Web'], function ($routes) {


    $routes->get('', 'Home::index', ['as' => 'web_index']);

    $routes->group('page-undefined', ['namespace' => 'App\Controllers\Web'], function ($routes) {
        $routes->get('/', 'PageError::index', ['as' => 'en_construccion']);
    });

    $routes->group('institucional', ['namespace' => 'App\Controllers\Web'], function ($routes) {
        $routes->get('/', 'Institucional::index', ['as' => 'institucional_index']);
    });

    $routes->group('convenios', ['namespace' => 'App\Controllers\Web'], function ($routes) {

        $routes->get('', 'Convenio::index', ['as' => 'convenio_index']);

        $routes->group('nacional', ['namespace' => 'App\Controllers\Web'], function ($routes) {
            $routes->get('/', 'ConvenioNacional::index', ['as' => 'webConvenioNacional_index']);
            $routes->get('info/(:any)', 'ConvenioNacional::show/$1', ['as' => 'webConvenioNacional_show']);
            $routes->get('info-list', 'ConvenioNacional::list', ['as' => 'webConvenioNacional_list']);
        });

        $routes->group('internacional', ['namespace' => 'App\Controllers\Web'], function ($routes) {
            $routes->get('/', 'ConvenioInternacional::index', ['as' => 'webConvenioInternacional_index']);
            $routes->get('info/(:any)', 'ConvenioInternacional::show/$1', ['as' => 'webConvenioInternacional_show']);
            $routes->get('info-list', 'ConvenioInternacional::list', ['as' => 'webConvenioInternacional_list']);
        });

        $routes->group('idioma', ['namespace' => 'App\Controllers\Web'], function ($routes) {
            $routes->get('/', 'ConvenioIdioma::index', ['as' => 'convenioIdioma_index']);
        });

    });


    $routes->group('prensa', ['namespace' => 'App\Controllers\Web'], function ($routes) {

        $routes->group('publicacion', ['namespace' => 'App\Controllers\Web'], function ($routes) {
            $routes->get('/', 'PrensaPublicacion::index', ['as' => 'webPrensaPublicacion_index']);
            $routes->get('info-list', 'PrensaPublicacion::list', ['as' => 'webPrensaPublicacion_list']);
            $routes->get('info/(:any)', 'PrensaPublicacion::show/$1', ['as' => 'webPrensaPublicacion_show']);
        });

        $routes->group('noticia', ['namespace' => 'App\Controllers\Web'], function ($routes) {
            $routes->get('/', 'PrensaNoticia::index', ['as' => 'webPrensaNoticia_index']);
            $routes->get('info-list', 'PrensaNoticia::list', ['as' => 'webPrensaNoticia_list']);
            $routes->get('info/(:any)', 'PrensaNoticia::show/$1', ['as' => 'webPrensaNoticia_show']);
        });

        $routes->group('idioma', ['namespace' => 'App\Controllers\Web'], function ($routes) {
            $routes->get('/', 'PrensaIdioma::index', ['as' => 'prensaIdioma_index']);
        });

    });

});


/* GRUPO DE AUNTENTICACION */
//$routes->get('/auth', 'App\Controllers\Auth\Login::index');
$routes->group('auth', ['namespace' => 'App\Controllers\Auth'], function ($routes) {
    $routes->get('/', 'Login::index', ['as' => 'login']);
    $routes->post('signin', 'Login::signin', ['as' => 'signin']);
    $routes->get('logout', 'Login::logout', ['as' => 'logout']);
});

/* GRUPO PARA LA PARTE DE ADMIN */
$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'auth:ADMINISTRADOR,TECNICO,SECRETARIA'], function ($routes) {
    $routes->get('/', 'Dashboard::index', ['as' => 'dashboard']);


    /* convenios */
    $routes->group('convenios', ['namespace' => 'App\Controllers\Admin'], function ($routes) {

        $routes->group('nacionales', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
            $routes->get('/', 'ConvenioNacional::index', ['as' => 'convenioNacional_index']);
            $routes->get('lista', 'ConvenioNacional::list', ['as' => 'convenioNacional_list']); /* lista en datatable */

//            $routes->get('detalle', 'ConvenioNacional::show', ['as' => 'convenioNacional_show']); /* informacion */

            $routes->get('crear', 'ConvenioNacional::create', ['as' => 'convenioNacional_create']); /* formulario */
            $routes->get('search-enlace', 'ConvenioNacional::ajaxSearch', ['as' => 'convenioNacional_ajaxSearch']); /* select2 */
            $routes->post('guardar', 'ConvenioNacional::store', ['as' => 'convenioNacional_store']); /* guardar datos del formulario */
            $routes->get('editar', 'ConvenioNacional::edit', ['as' => 'convenioNacional_edit']); /* actualiza datos del formulario */
            $routes->post('actualizar', 'ConvenioNacional::update', ['as' => 'convenioNacional_update']); /* actualiza datos del formulario */
            $routes->post('eliminar', 'ConvenioNacional::delete', ['as' => 'convenioNacional_delete']); /* pone el estado en 0 para desabilitado */

        });

        $routes->group('internacionales', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
            $routes->get('/', 'ConvenioInternacional::indexInternacional', ['as' => 'index_internacional']);
        });
    });

    /* publicaciones */
    $routes->group('publicacion', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
        $routes->get('', 'Publicacion::index', ['as' => 'publicacion_index']); /* inicio */

        $routes->get('detalle', 'Publicacion::show', ['as' => 'publicacion_show']); /* informacion */

        $routes->get('lista-categoria', 'Publicacion::listCat', ['as' => 'publicacion_listCat']);
        $routes->get('lista', 'Publicacion::list', ['as' => 'publicacion_list']); /* lista en datatable */
        $routes->get('crear', 'Publicacion::create', ['as' => 'publicacion_create']); /* formulario */
        $routes->post('guardar', 'Publicacion::store', ['as' => 'publicacion_store']); /* guardar datos del formulario */
        $routes->get('editar', 'Publicacion::edit', ['as' => 'publicacion_edit']); /* actualiza datos del formulario */
        $routes->post('actualizar', 'Publicacion::update', ['as' => 'publicacion_update']); /* actualiza datos del formulario */
        $routes->post('eliminar', 'Publicacion::delete', ['as' => 'publicacion_delete']); /* pone el estado en 0 para desabilitado */

        /* crud para la tabla de publicaciones archivos */
        $routes->get('lista-archivos-publicacion', 'Publicacion::listPublicacionArchivos', ['as' => 'publicacionArchivo_list']); /* lista en datatable de archivos publicacion */
        $routes->get('editar-archivos-publicacion', 'Publicacion::listPublicacionEdit', ['as' => 'publicacionArchivo_edit']); /* actualiza datos del formulario */
        $routes->post('actualizar-archivos-publicacion', 'Publicacion::listPubArchivoUpdate', ['as' => 'publicacionArchivo_update']); /* actualizar archivo de la publicacion */
        $routes->post('eliminar-archivos-publicacion', 'Publicacion::listPubArchivoDelete', ['as' => 'publicacionArchivo_delete']); /* eliminar archivo de la publicacion */

    });


    /**======================
     *    usuarios rutas
     *========================**/
    $routes->group('usuario', ['namespace' => 'App\Controllers\Admin', 'filter' => 'usuario:ADMINISTRADOR,TECNICO,SECRETARIA'], function ($routes) {
        $routes->get('', 'Usuario::index', ['as' => 'index_usuario']);
        /* vistas para usuarios*/
        $routes->get('lista', 'Usuario::usuarioLista', ['as' => 'lista_usuario']);
        $routes->post('form-usuario-nuevo', 'Usuario::formUser', ['as' => 'form_usuario']);
    });

    /**======================
     *    Persona
     *========================**/
    $routes->group('persona', ['namespace' => 'App\Controllers\Admin', 'filter' => 'usuario:ADMINISTRADOR,TECNICO,SECRETARIA'], function ($routes) {
        //$routes->get('', 'Usuario::index', ['as' => 'index_usuario']);

        /* vistas para usuarios*/

        /* crud de persona */
        $routes->get('/', 'Persona::Index', ['as' => 'persona']);
        $routes->get('crear', 'Persona::create', ['as' => 'persona_create']);
        $routes->post('guardar', 'Persona::store', ['as' => 'persona_store']);
        $routes->post('eliminar', 'Persona::delete', ['as' => 'persona_delete']);

        //$routes->get('lista', 'Usuario::usuarioLista', ['as' => 'lista_usuario']);
        $routes->post('form-persona-nuevo', 'Persona::formPerson', ['as' => 'form_persona']);
    });

    /* enlaces o instituciones */
    $routes->group('enlace', ['namespace' => 'App\Controllers\Admin', 'filter' => 'usuario:ADMINISTRADOR,TECNICO,SECRETARIA'], function ($routes) {

        /* crud de enlace o institucion */
        $routes->get('/', 'Enlace::index', ['as' => 'enlace_index']); /* lista en datatable */
        $routes->get('lista', 'Enlace::list', ['as' => 'enlace_list']); /* lista en datatable */
        $routes->get('detalle', 'Enlace::show', ['as' => 'enlace_show']); /* informacion */
        $routes->get('crear', 'Enlace::create', ['as' => 'enlace_create']); /* formulario */
        $routes->post('guardar', 'Enlace::store', ['as' => 'enlace_store']); /* guardar datos del formulario */
        $routes->get('editar', 'Enlace::edit', ['as' => 'enlace_edit']); /* actualiza datos del formulario */
        $routes->post('actualizar', 'Enlace::update', ['as' => 'enlace_update']); /* actualiza datos del formulario */
        $routes->post('eliminar', 'Enlace::delete', ['as' => 'enlace_delete']); /* pone el estado en 0 para desabilitado */

        /* otras rutas para otros opjetivos */
    });


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
