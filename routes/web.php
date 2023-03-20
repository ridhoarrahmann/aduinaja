<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
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
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index']);
Route::controller(c_auth::class)->group(function () {
    Route::get('/login', 'login');
    // Route::post('/orders', 'store');
    Route::get('/register','register');
});
Route::post('/register_action', [c_auth::class, 'action_register']);
Route::post('/login_action',[c_auth::class,'login_action']);
Route::get('/home',[UserController::class,'index']);
Route::get('/setup',[c_auth::class,'setup_administrator']);
Route::post('/setup_action',[c_auth::class,'setup_action']);
Route::get('/admin_login',[c_auth::class,'login_admin']);
Route::post('/login_admin_action',[c_auth::class,'login_admin_action']);
Route::get('/admin-dashboard',[AdminController::class,'index']);
Route::get('data-petugas',[AdminController::class,'data_petugas']);
Route::get('admin-tambah-petugas',[AdminController::class,'tambah_petugas']);
Route::post('admin-tambah-petugas-action',[AdminController::class,'tambah_petugas_action']);
Route::get('admin-data-masyarakat',[AdminController::class,'data_masyarakat']);
Route::get('/kategori',[AdminController::class,'kategori']);
Route::post('/tambah-kategori',[AdminController::class,'tambah_kategori']);
Route::post('/tambah-sub-kategori',[AdminController::class,'tambah_sub_kategori']);
Route::post('/kategori-edit/{id_kategori}',[AdminController::class,'kategori_edit'])->name('kategori-edit');
Route::post('/sub-kategori-edit/{id_sub_kategori}',[AdminController::class,'sub_kategori_edit'])->name('sub-kategori-edit');
Route::get('/kategori-hapus/{id_kategori}',[AdminController::class,'kategori_hapus'])->name('kategori-hapus');
Route::get('/tambah-laporan',[UserController::class,'tambah_laporan']);
Route::get('/getSubKategori', [UserController::class, 'getSubKategori']);
Route::post('/tambah-laporan-action',[UserController::class,'tambah_laporan_action']);
Route::get('/laporan-success',[UserController::class,'laporan_success']);
Route::get('/data-laporan',[AdminController::class,'data_laporan']);
Route::get('/detail-pengaduan/{id_pengaduan}',[AdminController::class,'detail_pengaduan']);
Route::get('/tanggapan-pengaduan/{id_pengaduan}',[AdminController::class,'tanggapan_pengaduan']);
Route::post('/tanggapan-pengaduan-tambah/{id_pengaduan}',[AdminController::class,'tanggapan_pengaduan_tambah']);
Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);
Route::get('/admin-laporan-detail-pdf/{id_pengaduan}', [AdminController::class,'laporan_detail_pdf']);
Route::get('/history',[UserController::class,'history']);
Route::get('/history-detail/{id_pengaduan}',[UserController::class,'history_detail']);
Route::get('/pengaduan-update-selesai/{id_pengaduan}',[AdminController::class,'pengaduan_update_selesai']);
Route::get('/logout',[c_auth::class,'logout']);
Route::get('/data-pengaduan-pdf',[AdminController::class,'data_pengaduan_pdf']);
Route::get('/forgot-password',[c_auth::class,'forgot_password']);
Route::post('/forgot-password-action',[c_auth::class,'forgot_password_action']);
Route::get('/forgot-password-form/{token}',[c_auth::class,'forgot_password_form'])->name('reset.password.get');
Route::post('/forgot-password-form-submit',[c_auth::class,'forgot_password_form_submit']);
Route::get('/admin-ban-masyarakat/{id_masyarakat}',[AdminController::class,'ban_user']);
Route::get('/admin-activate-masyarakat/{id_masyarakat}',[AdminController::class,'activate_user']);
Route::get('/admin-ban-petugas/{id_petugas}',[AdminController::class,'ban_petugas']);
Route::get('/admin-activate-petugas/{id_petugas}',[AdminController::class,'activate_petugas']);
