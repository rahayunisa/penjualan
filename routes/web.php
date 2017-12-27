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

Route::get('/home', 'KategoriBarangsController@index');

Route::group(['middleware'=>['auth']], function(){
Route::resource('/barangsuppliers', 'BarangSuppliersController');
Route::resource('/barangcustomers', 'BarangCustomersController');
Route::resource('/kategoribarangs', 'KategoriBarangsController');
Route::resource('/customers', 'CustomersController');
Route::resource('/suppliers', 'SuppliersController');
Route::resource('/transaksipembelians', 'TransaksiPembeliansController');
Route::resource('/transaksipenjualans', 'TransaksiPenjualansController');
});
