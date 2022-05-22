<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');

// $routes->get('/User/edit', 'User::edit/$1');
$routes->post('/Peminjaman/(:num)', 'Peminjaman::kembali/$1');
$routes->delete('/Peminjaman/(:num)', 'Peminjaman::remove/$1');
$routes->get('/Peminjaman/add', 'Peminjaman::add');
$routes->get('/Peminjaman/(:any)', 'Peminjaman::index');

$routes->delete('/Pengembalian/(:num)', 'Pengembalian::remove/$1');

$routes->delete('/Penerbit/(:num)', 'Penerbit::remove/$1');
$routes->get('/Penerbit/(:any)', 'Penerbit::index');

$routes->delete('/Buku/(:num)', 'Buku::remove/$1');
$routes->get('/Buku/add', 'Buku::add');
$routes->get('/Buku/edit/(:num)', 'Buku::edit/$1');
$routes->get('/Buku/(:any)', 'Buku::index');

$routes->delete('/Rak/(:num)', 'Rak::remove/$1');
$routes->get('/Rak/(:any)', 'Rak::index');

$routes->delete('/Siswa/(:num)', 'Siswa::remove/$1');
$routes->get('/Siswa/add', 'Siswa::add');
$routes->get('/Siswa/edit/(:num)', 'Siswa::edit/$1');
$routes->get('/Siswa/(:any)', 'Siswa::index');

$routes->delete('/User/(:num)', 'User::remove/$1');
$routes->get('/User/add', 'User::add');
$routes->get('/User/edit/(:num)', 'User::edit/$1');
$routes->get('/User/(:any)', 'User::index');
$routes->delete('/Kategori/(:num)', 'Kategori::remove/$1');
$routes->get('/Kategori/(:any)', 'Kategori::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}