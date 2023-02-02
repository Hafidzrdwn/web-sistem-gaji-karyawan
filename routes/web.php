<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'dashboard');
Route::resource('karyawan', 'KaryawanController');

Route::get('jabatan', function () {
    return view('jabatan.index');
});
Route::get('jabatan/show', function () {
    return view('jabatan.show');
});
Route::get('jabatan/edit', function () {
    return view('jabatan.edit');
});
Route::get('jabatan/add', function () {
    return view('jabatan.add');
});



Route::get('gaji', function () {
    return view('gaji.index');
});
Route::get('gaji/show', function () {
    return view('gaji.show');
});
Route::get('gaji/edit', function () {
    return view('gaji.edit');
});
Route::get('gaji/add', function () {
    return view('gaji.add');
});



Route::get('pelanggaran', function () {
    return view('pelanggaran.index');
});
Route::get('pelanggaran/show', function () {
    return view('pelanggaran.show');
});
Route::get('pelanggaran/edit', function () {
    return view('pelanggaran.edit');
});
Route::get('pelanggaran/add', function () {
    return view('pelanggaran.add');
});



Route::get('tambahan', function () {
    return view('tambahan.index');
});
Route::get('tambahan/show', function () {
    return view('tambahan.show');
});
Route::get('tambahan/edit', function () {
    return view('tambahan.edit');
});
Route::get('tambahan/add', function () {
    return view('tambahan.add');
});


Route::get('tunjangan', function () {
    return view('tunjangan.index');
});
Route::get('tunjangan/show', function () {
    return view('tunjangan.show');
});
Route::get('tunjangan/edit', function () {
    return view('tunjangan.edit');
});
Route::get('tunjangan/add', function () {
    return view('tunjangan.add');
});
