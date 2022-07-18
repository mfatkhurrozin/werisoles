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
$routes->setDefaultController('Home');
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

// $routes->get('/produk', 'Produk::index', ['filter' => 'role:user']);
// $routes->get('/siswa/index', 'Siswa::index', ['filter' => 'role:user']);

$routes->get('/pemilik', 'Pemilik::index', ['filter' => 'role:admin']);
$routes->get('/pemilik/index', 'Pemilik::index', ['filter' => 'role:admin']);

$routes->get('/admin', 'Admin::index', ['filter' => 'role:superadmin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'super:admin']);

// Materi guru
$routes->get('/guru/tambah', 'Guru::tambah');
$routes->get('/guru/ubah/(:num)', 'Guru::ubah/$1');
$routes->delete('/guru/(:num)', 'Guru::hapus/$1');
$routes->get('/guru/(:any)', 'Guru::detail/$1');

// Tugas Guru
$routes->get('/tugas/tambah', 'Tugas::tambah');
$routes->get('/tugas/ubah/(:num)', 'Tugas::ubah/$1');
$routes->delete('/tugas/(:num)', 'Tugas::hapus/$1');
$routes->get('/tugas/(:any)', 'Tugas::detail/$1');

// Detail Tugas Jawab
$routes->get('/jawaban/(:any)', 'Jawaban::detail/$1');

// Materi Siswa
$routes->get('/siswamateri/(:any)', 'Siswa::detail/$1');
$routes->get('/siswatugas/(:any)', 'Siswatugas::detail/$1');

// Materi Siswa
$routes->get('/tugasjawab/tambah', 'Tugasjawab::tambah');
$routes->get('/tugasjawab/tambah/(:num)', 'Tugasjawab::tambah/$1');
$routes->get('/tugasjawab/ubah/(:num)', 'Tugasjawab::ubah/$1');
$routes->delete('/tugasjawab/(:num)', 'Tugasjawab::hapus/$1');
$routes->get('/tugasjawab/(:any)', 'Tugasjawab::detail/$1');

//pelanggan
$routes->get('/produk/tambah', 'Produk::tambah');
$routes->get('/produk/ubah/(:num)', 'Produk::ubah/$1');
$routes->delete('/produk/(:num)', 'Produk::hapus/$1');
$routes->get('/produk/(:any)', 'Produk::detail/$1');

$routes->get('/pesanan/tambah', 'Pesanan::tambah');
$routes->get('/pesanan/tambah/(:num)', 'Pesanan::tambah/$1');
$routes->get('/pesanan/ubah/(:num)', 'Pesanan::ubah/$1');
$routes->delete('/pesanan/(:num)', 'Pesanan::hapus/$1');
$routes->get('/pesanan/(:any)', 'Pesanan::detail/$1');

$routes->get('/bayar/tambah', 'Bayar::tambah');
$routes->get('/bayar/ubah/(:num)', 'Bayar::ubah/$1');
$routes->delete('/bayar/(:num)', 'Bayar::hapus/$1');

$routes->get('/pelanggan/tambah', 'Pelanggan::tambah');

$routes->get('/nota/tambah', 'Nota::tambah');
$routes->get('/nota/ubah/(:num)', 'Nota::ubah/$1');
$routes->delete('/nota/(:num)', 'Nota::hapus/$1');


//pemilik
$routes->get('/pemilik/tambah', 'Pemilik::tambah');
$routes->get('/pemilik/ubah/(:num)', 'Pemilik::ubah/$1');
$routes->delete('/pemilik/(:num)', 'Pemilik::hapus/$1');
$routes->get('/pemilik/(:any)', 'Pemilik::detail/$1');

$routes->delete('/pesananadm/(:num)', 'Pesananadm::hapus/$1');
$routes->get('/pesananadm/(:any)', 'Pesananadm::detail/$1');
$routes->get('/pesananadm/ubah/(:num)', 'Pesananadm::ubah/$1');

//Laporan
$routes->get('/pesananadm/(:any)', 'Laporanpdf::invoice/$1');
$routes->get('/pesananadm/(:any)', 'Laporanpdf::lappesanan');
$routes->get('/pemilik/(:any)', 'Laporanpdf::lapproduk');

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
