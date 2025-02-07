<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'SensorController::index');
// $routes->get('/history', 'SensorController::history');
$routes->post('/save-data', 'SensorController::saveData');
// $routes->get('/dashboard', 'Dashboard::index');
$routes->get('/get-latest-data', 'Dashboard::getLatestData');
// $routes->get('/history', 'History::index');

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('/dashboard', 'Dashboard::index');
    $routes->get('/history', 'History::index');
});


