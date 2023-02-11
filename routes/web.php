<?php

use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\BonusController;
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

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::prefix('master')->group(function () {
    Route::resource('karyawan', 'KaryawanController');
    Route::get('karyawan/{karyawan}/pelanggaran', 'KaryawanController@pelanggaran')->name('karyawan.pelanggaran');
    Route::get('karyawan/{karyawan}/bonus', 'KaryawanController@bonus')->name('karyawan.bonus');
    Route::get('karyawan/{karyawan}/tunjangan', 'KaryawanController@tunjangan')->name('karyawan.tunjangan');

    Route::resource('jabatan', 'JabatanController');
    Route::resource('pelanggaran', 'PelanggaranController');
    Route::post('pelanggaran/add', 'PelanggaranController@add_pelanggaran')->name('pelanggaran.add');

    Route::resource('bonus', 'BonusController')->parameters(['bonus' => 'bonus']);
    Route::post('bonus/add', 'BonusController@add_bonus')->name('bonus.add');

    Route::resource('tunjangan', 'TunjanganController');
    Route::post('tunjangan/add', 'TunjanganController@add_tunjangan')->name('tunjangan.add');

    Route::resource('jenis_kelamin', 'JenisKelaminController')->parameters(['jenis_kelamin' => 'jk']);
});

Route::resource('gaji', 'GajiController')->parameters(['gaji' => 'karyawan']);
Route::delete('pelanggaran/delete/{pelanggaranKaryawan}', 'GajiController@delete_pelanggaran')->name('delete.pk');
Route::delete('bonus/delete/{bonusKaryawan}', 'GajiController@delete_bonus')->name('delete.bk');
