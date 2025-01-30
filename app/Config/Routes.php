<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'SensorController::index');
$routes->get('/history', 'SensorController::history');
$routes->post('/save-data', 'SensorController::saveData');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/history', 'History::index');

