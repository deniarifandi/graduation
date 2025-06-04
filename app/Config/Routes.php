<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/blank', 'Home::blank');

$routes->resource('sd');
$routes->post('/sd/data', 'Sd::data');

$routes->resource('nls');
$routes->post('/nls/data', 'Nls::data');

$routes->resource('pg');
$routes->post('/pg/data', 'Pg::data');

$routes->get('/qr/(:num)', 'Sd::qr/$1');
$routes->get('/loginlist', 'Sd::loginlist');

$routes->get('/qrn/(:num)', 'Nls::qr/$1');
$routes->get('/loginlistn', 'Nls::loginlist');

$routes->get('/qrpg/(:num)', 'Pg::qr/$1');
$routes->get('/loginlistpg', 'Pg::loginlist');