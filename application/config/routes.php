<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'GeneralController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Auth
$route['login'] = 'AuthController/index';
$route['proses_login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';

//Dashboard
$route['dashboard'] = 'HomeController/index';

//Data Penduduk
$route['penduduk'] = 'MasterController/index';
$route['penduduk/detail'] = 'MasterController/show_penduduk';
$route['penduduk/hapus/(:any)'] = 'MasterController/delete_penduduk/(:any)';

//Perangkat Desa
$route['perangkat_desa'] = 'MasterController/perangkat_desa';
$route['perangkat_desa/simpan'] = 'MasterController/store_pd';
$route['perangkat_desa/show'] = 'MasterController/show_pd';
$route['perangkat_desa/edit'] = 'MasterController/edit_pd';
$route['perangkat_desa/ubah'] = 'MasterController/update_pd';
$route['perangkat_desa/hapus/(:any)'] = 'MasterController/destroy_pd/(:any)';

//Info Desa
$route['info'] = 'NewsController/index';
$route['info/tambah'] = 'NewsController/create';
$route['info/simpan'] = 'NewsController/store';
$route['info/ubah'] = 'NewsController/update_berita';
$route['info/detail'] = 'NewsController/show';
$route['info/upload'] = 'NewsController/upload_image';
$route['info/deletes'] = 'NewsController/delete_image';
$route['info/edit/(:any)'] = 'NewsController/edit/(:any)';
$route['info/hapus/(:any)'] = 'NewsController/destroy/(:any)';
//Summernote
$route['info/upload'] = 'NewsController/upload_image';
$route['info/deletes'] = 'NewsController/delete_image';

//Mitigasi Bencana
$route['mitigasi'] = 'MitigasiController/index';
$route['mitigasi/tambah'] = 'MitigasiController/create';
$route['mitigasi/store'] = 'MitigasiController/store';
$route['mitigasi/edit/(:any)'] = 'MitigasiController/edit/(:any)';
$route['mitigasi/ubah'] = 'MitigasiController/update';
$route['mitigasi/hapus/(:any)'] = 'MitigasiController/destroy/(:any)';

//Layanan
$route['kategori_layanan'] = 'LayananController/index';
$route['kategori_layanan/simpan'] = 'LayananController/store';
$route['kategori_layanan/edit'] = 'LayananController/edit';
$route['kategori_layanan/ubah'] = 'LayananController/update';
$route['kategori_layanan/hapus/(:any)'] = 'LayananController/destroy/(:any)';
$route['layanan'] = 'LayananController/layanan';
$route['layanan/detail'] = 'LayananController/show_layanan';
$route['layanan/hapus/(:any)'] = 'LayananController/hapus_layanan/(:any)';
$route['layanan/verifikasi/(:any)'] = 'LayananController/verifikasi_layanan/(:any)';

//Potensi Desa
$route['potensi'] = 'PotensiController/index';
$route['potensi/simpan'] = 'PotensiController/store';
$route['potensi/detail'] = 'PotensiController/show';
$route['potensi/edit'] = 'PotensiController/edit';
$route['potensi/update'] = 'PotensiController/update';
$route['potensi/hapus/(:any)'] = 'PotensiController/destroy/(:any)';

//Usulan
$route['usulan'] = 'PotensiController/usulan';
$route['usulan/detail'] = 'PotensiController/show_usulan';
$route['usulan/verifikasi/(:any)'] = 'PotensiController/verifikasi_usulan/(:any)';
$route['usulan/hapus/(:any)'] = 'PotensiController/destroy_usulan/(:any)';

//Investor Desa
$route['investor'] = 'PotensiController/investor';
$route['investor/simpan'] = 'PotensiController/store_investor';
$route['investor/detail'] = 'PotensiController/show_investor';
$route['investor/edit'] = 'PotensiController/edit_investor';
$route['investor/ubah'] = 'PotensiController/update_investor';
$route['investor/hapus/(:any)'] = 'PotensiController/destroy_investor/(:any)';

//Perekonomian Desa
$route['umkm'] = 'PotensiController/umkm';
$route['umkm/simpan'] = 'PotensiController/store_umkm';
$route['umkm/detail'] = 'PotensiController/show_umkm';
$route['umkm/edit'] = 'PotensiController/edit_umkm';
$route['umkm/hapus/(:any)'] = 'PotensiController/destroy_umkm/(:any)';

//Data Alat
$route['data_alat'] = 'AlatController';
$route['data_alat/simpan'] = 'AlatController/store';
$route['data_alat/edit'] = 'AlatController/edit';
$route['data_alat/ubah'] = 'AlatController/update';
$route['data_alat/hapus/(:any)'] = 'AlatController/delete/$1';

//Registrasi Alat
$route['registrasi_alat'] = 'AlatController/registrasi_alat';
$route['registrasi_alat/detail'] = 'AlatController/detail_registrasi_alat';
$route['registrasi_alat/hapus/(:any)'] = 'AlatController/delete_registrasi_alat/$1';

//Panic Button
$route['pb'] = 'PanicButtonController/index';

//Settingan 
$route['(:any)'] = 'errors/show_404';
$route['(:any)/(:any)'] = 'errors/show_404';
$route['(:any)/(:any)/(:any)'] = 'errors/show_404';