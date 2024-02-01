<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RespondenController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\SaranController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/survey', function () {
    return view('survey');
});

Route::get('/layanan/{id_tenant}', [LayananController::class, 'show']);

Route::get('layanan/{id_tenant}/survey/responden', [LayananController::class, 'showSurveyForm'])->name('layanan.survey');
Route::post('layanan/{id_tenant}/survey/responden-submit', [LayananController::class, 'submitResponden'])->name('layanan.survey.submit');
Route::get('layanan/{id_tenant}/survey/pertanyaan/{id_responden}', [LayananController::class, 'showPertanyaanForm'])->name('masyarakat.pertanyaan');
Route::post('layanan/{id_tenant}/survey/jawaban-submit', [LayananController::class, 'submitJawaban'])->name('layanan.survey.submitjawaban');
Route::get('layanan/{id_tenant}/survey/saran/{id_responden}', [LayananController::class, 'showSaranForm'])->name('masyarakat.saran');
Route::post('layanan/{id_tenant}/survey/saran-submit', [LayananController::class, 'submitSaran'])->name('layanan.survey.submitsaran');
Route::delete('/hapus-responden/{id_responden}', [LayananController::class, 'hapusResponden']);

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'getLogin'])->name('login');
    Route::post('login', [LoginController::class, 'postLogin']);
})->middleware('guest');

Route::get('/home', function () {
    return redirect('/');
});

Route::get('logout', [LoginController::class, 'logout']);

Route::resource('/dashboard', DashboardController::class);

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

Route::resource('/publish', PublishController::class);
Route::get('/publish/{id_responden}', [PublishController::class, 'view'])->name('publish.view');

Route::resource('/saran', SaranController::class);

// Route::get('/publish', function () {
//     return view('admin/publish/index');
// });

// Route::middleware(['checkRole:super admin'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin/dashboard/index');
//     });

//     Route::resource('/responden', RespondenController::class);
// });

// Route::middleware(['checkRole:admin tenant 1'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin/dashboard/index');
//     });

//     Route::resource('/responden', RespondenController::class);
// });

// Route::middleware(['checkRole:admin tenant 2'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin/dashboard/index');
//     });

//     Route::resource('/responden', RespondenController::class);
// });

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