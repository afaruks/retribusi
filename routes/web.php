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


// Route::get('/cetak', function () {
//     return view('report.sptrd_cetak')});
// })->name('home');
// Route::get('/cetak', function () {
//     return view('report.sptrd_cetak');
// });
Route::get('/', function () {
    return view ('auth.login');
});
// Route::get('/sptprd', function () {
//     return view('sptprd');
// });

Route::get('/sptrd_view', 'RetribusiController@Sptrd_view')->name('sptrdview'); 
Route::get('/skrd_view', 'RetribusiController@Skrd_view')->name('skrdview');
Route::get('/penetapan_report', 'RetribusiController@penetapan')->name('penetapan'); 
Route::get('/lunas_report', 'RetribusiController@lunas')->name('lunas');
Route::get('/tlunas_report', 'RetribusiController@tlunas')->name('tlunas');
Route::post('/jenis_pajak', 'RetribusiController@jenispajak')->name('jenis_pajak'); 
Route::get('/verifikasi/{NoID}','RetribusiController@Verifikator')->name('verifikasi');

Route::post('/TambahSptrd', 'RetribusiController@Csptrd'); 
Route::post('/TambahSkrd', 'RetribusiController@Cskrd'); 
Route::get('/skr_cetak/{Nomor_SKPRD}', 'RetribusiController@skr_cetak')->name('skr_cetak');
Route::get('/sptrd_cetak/{NoID}', 'RetribusiController@sptrd_cetak')->name('sptrd_cetak'); 
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jsonNpwpd', [
    'uses'=>'RetribusiController@json_npwpd',
    'as' => 'jsonNpwpd'
]);
Route::get('/json_sptrd', [
    'uses'=>'RetribusiController@json_sptrd',
    'as' => 'jsonsptrd'
]);
Route::post('/RetribusiController/npwpd','RetribusiController@npwpd')->name('autocomplete.npwpd');
Route::post('/RetribusiController/jsptrd','RetribusiController@s_sptrd')->name('autocomplete.jsptrd');