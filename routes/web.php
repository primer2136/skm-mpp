<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Use the UsersController class in your code
// $UsersController = new UsersController();

Route::get('/', function () {
    return view('masyarakat/home');
});

Route::get('/survey', function () {
    return view('survey');
});

Route::get('login-admin', function () {
    return view('admin/login');
})->name('login.admin');

Route::get('login', [LoginController::class, 'getLogin'])->name('login');;
Route::post('proseslogin', [LoginController::class, 'postLogin']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('admin/dashboard/index');
});

Route::resource('ds-admin', UsersController::class);
Route::get('ds-admin/create', [UsersController::class, 'create'])->name('admin.create');;
Route::get('ds-admin/store', [UsersController::class, 'store'])->name('admin.store');;
Route::post('ds-admin/store', [UsersController::class, 'store'])->name('admin.store');;

Route::get('/layanan/{nomor}', [LayananController::class, 'show']);

Route::get('layanan/{nomor}/survey', [LayananController::class, 'showSurveyForm'])->name('layanan.survey');;

Route::get('/faq', function () {
    return view('FAQ');
});

Route::get('/ds-admin', function () {
    return view('admin/ds-admin/index');
});

Route::get('/ds-masyarakat', function () {
    return view('admin/ds-masyarakat/index');
});

Route::resource('/tenant', TenantController::class);

Route::get('/penilaian', function () {
    return view('admin/penilaian/index');
});

// Route::group(['middleware' => 'auth:admin'], function () {
//     Route::get('dashboard', 'DashboardController@index');

//     // Petugas
//     Route::resource('petugas', 'PetugasController');

//     // Masyarakat
//     Route::resource('masyarakat', 'MasyarakatController');

//     // Pengaduan
//     Route::get('pengaduan', 'PengaduanController@index');
//     Route::get('pengaduan_p/{id}', 'PengaduanController@proses')->name('pengaduan.proses');
//     Route::get('pengaduan_s/{id}', 'PengaduanController@selesai')->name('pengaduan.selesai');
//     Route::get('pengaduan_t/{id}', 'PengaduanController@tanggapan')->name('pengaduan.tanggapan');

//     // Tanggapan
//     Route::post('tambahtanggapan', 'TanggapanController@tambah');
//     Route::get('tanggapan', 'TanggapanController@index');
//     Route::get('tanggapan/{id}', 'TanggapanController@edit')->name('tanggapan.edit');
//     Route::patch('tanggapans/{id}', 'TanggapanController@update')->name('tanggapan.update');
//     Route::delete('tanggapand/{id}', 'TanggapanController@destroy')->name('tanggapan.destroy');

//     //Laporan
//     Route::view('laporan', 'admin/laporan.index');
//     Route::get('rekap_laporan', 'LaporanController@rekap');
// });