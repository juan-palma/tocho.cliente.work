<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Inicio;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Inicio::class, 'index']);
$routes->get('inicio', [Inicio::class, 'index']);


use App\Controllers\Pages;

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

