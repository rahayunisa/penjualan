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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'StokBarangsController@index');

Route::group(['middleware'=>['auth']], function(){
Route::resource('/barangsuppliers', 'BarangSuppliersController');
Route::resource('/barangcustomers', 'BarangCustomersController');
Route::resource('/kategoribarangs', 'KategoriBarangsController');
Route::resource('/customers', 'CustomersController');
Route::resource('/suppliers', 'SuppliersController');
Route::resource('/transaksipembelians', 'TransaksiPembeliansController');
Route::resource('/transaksipenjualans', 'TransaksiPenjualansController');
Route::resource('/stokbarangs', 'StokBarangsController');
});

Route::get('/deleteAll', 'CustomersController@deleteAll');
Route::resource('/deleteAll1', 'BarangSuppliersController@deleteAll');
Route::resource('/deleteAll2', 'KategoriBarangsController@deleteAll');
Route::resource('/deleteAll3', 'BarangCustomersController@deleteAll');
Route::resource('/deleteAll4', 'SuppliersController@deleteAll');
Route::resource('/deleteAll5', 'TransaksiPembeliansController@deleteAll');
Route::resource('/deleteAll6', 'TransaksiPenjualansController@deleteAll');
Route::resource('/deleteAll7', 'StokBarangsController@deleteAll');