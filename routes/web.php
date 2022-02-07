<?php

use App\Http\Controllers\AdminAppController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('register_admin_app',[AdminAppController::class,'register_admin_app'])->name('register_admin_app');
Route::post('simpan_data_baru_admin_app',[AdminAppController::class,'simpan_data_baru_admin_app'])->name('simpan_data_baru_admin_app');
Route::get('login_admin_app',[AdminAppController::class,'login_admin_app'])->middleware('AdminAppLoggedIn');
Route::post('cek_login_admin_app',[AdminAppController::class,'cek_login_admin_app'])->name('cek_login_admin_app');
Route::get('dashboard_admin_app',[AdminAppController::class,'dashboard_admin_app'])->name('dashboard_admin_app');
Route::get('logout_admin_app',[AdminAppController::class,'logout_admin_app'])->name('logout_admin_app');
Route::post('simpan_perubahan_data_profil_admin_app',[AdminAppController::class,'simpan_perubahan_data_profil_admin_app'])->name('simpan_perubahan_data_profil_admin_app');
Route::post('simpan_perubahan_data_password_admin_app',[AdminAppController::class,'simpan_perubahan_data_password_admin_app'])->name('simpan_perubahan_data_password_admin_app');
Route::post('simpan_perubahan_data_foto_admin_app',[AdminAppController::class,'simpan_perubahan_data_foto_admin_app'])->name('simpan_perubahan_data_foto_admin_app');

Route::get('tampil_data_jenis_kamar_oleh_adminapp',[AdminAppController::class,'tampil_data_jenis_kamar_oleh_adminapp'])->name('tampil_data_jenis_kamar_oleh_adminapp');
Route::get('/jeniskamars1/{id}',[AdminAppController::class,'get_id_jenis_kamar_by_adminapp']);
Route::put('/jeniskamar1',[AdminAppController::class,'simpan_perubahan_data_jenis_kamar_oleh_admin_app'])->name('jeniskamar.updatedata');
Route::post('/jeniskamar2',[AdminAppController::class,'simpan_perubahan_data_foto_jenis_kamar_oleh_admin_app'])->name('jeniskamar.updatedatafoto');
Route::put('/jeniskamar3',[AdminAppController::class,'hapus_data_jenis_kamar_oleh_admin_app'])->name('jeniskamar.deletedata');
Route::get('tambah_data_jenis_kamar_oleh_admin_app',[AdminAppController::class,'tambah_data_jenis_kamar_oleh_admin_app'])->name('tambah_data_jenis_kamar_oleh_admin_app');
Route::post('simpan_data_baru_jenis_kamar_oleh_admin_app',[AdminAppController::class,'simpan_data_baru_jenis_kamar_oleh_admin_app'])->name('simpan_data_baru_jenis_kamar_oleh_admin_app');
