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
    return view('index');
});

Route::post("/entry","Entry@entry");
Route::post("/selesai","Entry@selesai");
Route::get("/laporan","Entry@laporan");
Route::get("/transaksi","Entry@transaksi");
Route::post('/hitung','Entry@hitung');
Route::post('/tanggal_transaksi','Entry@tanggal_transaksi');
Route::post('/tanggal_barang','Entry@tanggal_barang');
Route::get('/hapus/{id}','Entry@hapus');

