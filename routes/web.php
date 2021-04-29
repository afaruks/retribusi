<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view ('auth.login');
// });

//route untuk login dan register
Route::get('/', 'AuthController@showFormLogin')->name('s_login');
Route::get('s_login', 'AuthController@showFormLogin')->name('s_login');
Route::post('s_login', 'AuthController@login');
Route::get('s_register', 'AuthController@showFormRegister')->name('s_register');
Route::post('s_register', 'AuthController@register');
 
Route::group(['middleware' => 'auth'], function () {
 
    Route::get('thome', 'HomeController@index')->name('thome');
    Route::post('s_logout', 'AuthController@logout')->name('s_logout');
 
});

Route::get('/sptrd_view', 'RetribusiController@Sptrd_view')->name('sptrdview'); //view tambah data sptrd
Route::post('/TambahSptrd', 'RetribusiController@Csptrd'); 
Route::get('/skrd_view', 'RetribusiController@Skrd_view')->name('skrdview'); // view tambah skrd
Route::post('/TambahSkrd', 'RetribusiController@Cskrd'); 
//laporan
Route::get('/penetapan_report', 'RetribusiController@penetapan')->name('penetapan'); 
Route::get('/lunas_report', 'RetribusiController@lunas')->name('lunas');
Route::get('/tlunas_report', 'RetribusiController@tlunas')->name('tlunas');
Route::post('/jenis_pajak', 'RetribusiController@jenispajak')->name('jenis_pajak'); 
Route::get('/verifikasi/{NoID}','RetribusiController@Verifikator')->name('verifikasi');// verifikasi Sptrd
Route::get('/skr_cetak/{Nomor_SKPRD}', 'RetribusiController@skr_cetak')->name('skr_cetak');// cetak skr
Route::get('/sptrd_cetak/{NoID}', 'RetribusiController@sptrd_cetak')->name('sptrd_cetak'); // cetak sptrd
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/RetribusiController/npwpd','RetribusiController@npwpd')->name('autocomplete.npwpd'); //ajax autofill npwpd
Route::post('/RetribusiController/jsptrd','RetribusiController@s_sptrd')->name('autocomplete.jsptrd'); // autofil sptrd

Route::get('/rincian','RetribusiController@rincian_pajak')->name('rincian_pajak');
