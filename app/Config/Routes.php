<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Página de inicio
$routes->get('/', 'Home::index');

// // Login (GET y POST)
// $routes->get('login', 'AuthController::login');
// $routes->post('auth/login', 'AuthController::processLogin');

// // Registro (GET y POST)
// $routes->get('register', 'AuthController::register');
// $routes->post('auth/register', 'AuthController::processRegister');


//$routes->get('login', 'AuthController::login');
$routes->post('auth/login', 'AuthController::login');
//$routes->get('register', 'AuthController::register');
$routes->post('auth/registro', 'AuthController::registro');
//$routes->get('logout', 'AuthController::logout');
