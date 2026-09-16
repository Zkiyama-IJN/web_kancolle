<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::index');

// Publik
$routes->get('hall-of-fame', 'HallOfFameController::index');
$routes->get('hall-of-fame/(:num)', 'HallOfFameController::show/$1');
$routes->get('roll-of-honor', 'RollOfHonorController::index');
$routes->get('daftar', 'PendaftaranController::index');
$routes->post('daftar', 'PendaftaranController::store');
$routes->get('daftar/sukses', 'PendaftaranController::sukses');

// Auth
$routes->get('admin/login', 'Auth::login');
$routes->post('admin/login', 'Auth::attemptLogin');
$routes->get('admin/logout', 'Auth::logout');

// Area admin terproteksi - HANYA rute di dalam sini yang wajib login
$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->post('teitoku/(:num)/approve', 'Admin::approve/$1');
    $routes->post('teitoku/(:num)/reject', 'Admin::reject/$1');

    $routes->get('honor-roll', 'HonorRollController::index');
    $routes->get('honor-roll/create', 'HonorRollController::create');
    $routes->post('honor-roll', 'HonorRollController::store');
    $routes->get('honor-roll/(:num)/edit', 'HonorRollController::edit/$1');
    $routes->post('honor-roll/(:num)', 'HonorRollController::update/$1');
    $routes->post('honor-roll/(:num)/delete', 'HonorRollController::delete/$1');
});