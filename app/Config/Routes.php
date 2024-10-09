<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->post('/login_action', 'Login::login_action');
$routes->get('/logout', 'Login::logout');

$routes->get('/home', 'Home::index', ['filter' => 'UsersFilter']);
$routes->post('/home/store', 'Home::store', ['filter' => 'UsersFilter']);
$routes->post('/home/update/(:segment)', 'Home::update/$1', ['filter' => 'UsersFilter']);
$routes->get('/home/delete/(:segment)', 'Home::delete/$1', ['filter' => 'UsersFilter']);

