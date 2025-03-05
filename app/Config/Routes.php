<?php
use CodeIgniter\Router\RouteCollection;
use App\Controllers\Inicio;
use App\Controllers\Admin\Login;
use App\Controllers\Admin\Panel;
use App\Controllers\Admin\General;
use App\Controllers\Admin\Home;
use App\Controllers\Admin\HombresSudadera;
use App\Controllers\Pages;
use App\Controllers\Pass;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Inicio::class, 'index']);
$routes->get('inicio', [Inicio::class, 'index']);

$routes->match(['GET', 'POST'], 'admin', [Login::class, 'index']);
$routes->match(['GET', 'POST'], 'admin/login', [Login::class, 'index']);

$routes->get('admin/panel', [Panel::class, 'index']);
$routes->get('admin/panel/out', [Panel::class, 'out']);
$routes->get('admin/general', [General::class, 'index']);
$routes->post('admin/general/do_upload', [General::class, 'do_upload']);
$routes->get('admin/home', [Home::class, 'index']);
$routes->get('admin/hombres/sudadera', [HombresSudadera::class, 'index']);


$routes->get('pass', [Pass::class, 'index']);

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

