<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RespondenController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PertanyaanController;

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
// Use the UserController class in your code
// $UserController = new UserController();

Route::get('/', function () {
    return view('masyarakat/home');
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/survey', function () {
    return view('survey');
});

Route::get('/layanan/{id_tenant}', [LayananController::class, 'show']);

Route::get('layanan/{id_tenant}/survey', [LayananController::class, 'showSurveyForm'])->name('layanan.survey');
Route::post('layanan/{id_tenant}/survey', [LayananController::class, 'submitSurvey']);

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'getLogin'])->name('login');;
    Route::post('login', [LoginController::class, 'postLogin']);
});

Route::get('/home', function () {
    return redirect('/');
});

Route::get('logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('admin/dashboard/index');
});

Route::get('/ds-admin', function () {
    return view('admin/ds-admin/index');
});
Route::resource('ds-admin', UserController::class);
Route::get('ds-admin/create', [UserController::class, 'create'])->name('admin.create');;
Route::get('ds-admin/store', [UserController::class, 'store'])->name('admin.store');;
Route::post('ds-admin/store', [UserController::class, 'store'])->name('admin.store');;

Route::resource('/responden', RespondenController::class);

Route::resource('/tenant', TenantController::class);

Route::resource('/pertanyaan', PertanyaanController::class);



Route::get('/penilaian', function () {
    return view('admin/penilaian/index');
});


// routes/web.php

Route::group(['middleware' => 'role:super_admin'], function () {
    // Routes accessible only by super_admin
});

Route::group(['middleware' => 'role:admin'], function () {
    // Routes accessible only by admin
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