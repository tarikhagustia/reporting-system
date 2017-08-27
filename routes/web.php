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


Route::group(['middleware' => 'auth'], function(){
  Route::get('/', 'HomeController@index');

  Route::get('/produk/tambah', 'ProductController@index')->name('product.add');
  Route::post('/produk/tambah', 'ProductController@product_add_post')->name('product.add.post');

  Route::get('/penjualan/input-penjualan', 'SellingController@index')->name('selling.sell');
  Route::post('/penjualan/input-penjualan', 'SellingController@selling_sell_post')->name('selling.sell.post');

  Route::get('/pembelian/permintaan-barang', function(){
      return view('orders.order');
  })->name('order.order');

  Route::get('/pembelian/input-pembelian', 'OrderController@index')->name('order.input');

  Route::get('/laporan/laporan-barang', 'ProductController@laporan_produk')->name('report.product');

  Route::get('/laporan/laporan-penjualan-harian', 'ReportController@dayily_sales')->name('report.day-sales');

  Route::get('/laporan/laporan-penjualan-bulanan', function(){
      return view('reports.monthlySales');
  })->name('report.monthlySales');
});


Auth::routes();
