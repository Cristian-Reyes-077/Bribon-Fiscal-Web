<?php

use App\Controllers\AuthenticationController;
use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'AuthenticationController::index');
$routes->get('Home/Dashboard', [Home::class, 'Dashboard']);

$routes->get('/', [AuthenticationController::class, 'index']);


$routes->post('auth/verificarLogin', [AuthenticationController::class,'verificarLogin']);

//  $routes->view('about', 'pages/about');