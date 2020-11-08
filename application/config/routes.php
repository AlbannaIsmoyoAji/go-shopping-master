<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pembeli';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// AUTH
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

// USER
$route['admin/user/tambah'] = 'admin/tambahuser';
$route['admin/user/edit/(:any)'] = 'admin/edituser/$1';
$route['admin/user/editpassword/(:any)'] = 'admin/editpassword/$1';
$route['admin/user/hapus/(:any)'] = 'admin/hapususer/$1';

// PRODUK
$route['admin/produk/tambah'] = 'admin/tambahproduk';
$route['admin/produk/lihat/(:any)'] = 'admin/lihat/$1';
$route['admin/produk/edit/(:any)'] = 'admin/editproduk/$1';
$route['admin/produk/hapus/(:any)'] = 'admin/hapusproduk/$1';
$route['admin/produk/kategori'] = 'admin/kategori';
$route['admin/produk/editkategori/(:any)'] = 'admin/editkategori/$1';

// PENJUALAN
$route['admin/penjualan/edit/(:any)'] = 'admin/editpenjualan/$1';
$route['admin/penjualan/lihat/(:any)'] = 'admin/viewpenjualan/$1';
$route['admin/penjualan/harian'] = 'admin/penjualanharian';

// HOME
$route['post/(:any)'] = 'pembeli/post/$1';
$route['keranjang'] = 'pembeli/keranjang';
$route['hapuskeranjang/(:any)'] = 'pembeli/hapuskeranjang/$1';
$route['pembayaran'] = 'pembeli/pembayaran';
$route['profil'] = 'pembeli/profil';
$route['editprofil'] = 'pembeli/editprofil';
$route['riwayat'] = 'pembeli/riwayat';
$route['produk'] = 'pembeli/produk';
$route['transfer'] = 'pembeli/transfer';