<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/blank', 'Home::blank');

$routes->resource('sd');
$routes->post('/sd/data', 'Sd::data');

$routes->get('/qr/(:num)', 'Sd::qr/$1');
