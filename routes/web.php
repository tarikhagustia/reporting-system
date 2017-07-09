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

Auth::routes();

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/produk/tambah', function(){
    return view('products.add');
})->name('product.add');

Route::get('/penjualan/input-penjualan', function(){
    return view('selling.sell');
})->name('selling.sell');

Route::get('/pembelian/permintaan-barang', function(){
    return view('orders.order');
})->name('order.order');

Route::get('/pembelian/input-pembelian', function(){
    return view('orders.input');
})->name('order.input');

Route::get('/laporan/laporan-barang', function(){
    return view('reports.products');
})->name('report.product');

Route::get('/laporan/laporan-penjualan-harian', function(){
    return view('reports.day-sales');
})->name('report.day-sales');

Route::get('/laporan/laporan-penjualan-bulanan', function(){
    return view('reports.monthlySales');
})->name('report.monthlySales');
