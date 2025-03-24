<?php

use CodeIgniter\Router\RouteCollection;

$routes->setAutoRoute(true);

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/catalogo', 'Catalogo::index');
$routes->post('/catalogo/crear', 'Catalogo::crear');
$routes->get('/catalogo/formulario', 'Catalogo::formulario');
$routes->get('/catalogo/eliminar/(:num)', 'Catalogo::eliminar/$1');
$routes->get('/catalogo/editar/(:num)', 'Catalogo::editar/$1');
$routes->post('/catalogo/actualizar/(:num)', 'Catalogo::actualizar/$1');




