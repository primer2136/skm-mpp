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

Route::get('layanan/{id_tenant}/survey', [LayananController::class, 'showSurveyForm'])->name('layanan.survey');;

Route::get('login', [LoginController::class, 'getLogin'])->name('login');;
Route::post('login', [LoginController::class, 'postLogin']);

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('admin/dashboard/index');
    });

    Route::resource('/responden', RespondenController::class);
    Route::resource('/tenant', TenantController::class);
    Route::resource('/pertanyaan', PertanyaanController::class);
});

// Route::get('/dashboard', function () {
//     return view('admin/dashboard/index');
// })->middleware('auth');

// Route::resource('ds-admin', UserController::class);
// Route::get('ds-admin/create', [UserController::class, 'create'])->name('admin.create');;
// Route::get('ds-admin/store', [UserController::class, 'store'])->name('admin.store');;
// Route::post('ds-admin/store', [UserController::class, 'store'])->name('admin.store');;

// Route::resource('/responden', RespondenController::class);
// // Route::post('/responden', [RespondenController::class, 'simpanSurvey']);

// Route::resource('/tenant', TenantController::class);

// Route::resource('/pertanyaan', PertanyaanController::class);

// Route::get('/penilaian', function () {
//     return view('admin/penilaian/index');
// });

// Route::middleware(['auth', 'super admin'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin/dashboard/index');
//     });

//     Route::resource('ds-admin', UserController::class)->except(['create', 'store']);
//     Route::get('ds-admin/create', [UserController::class, 'create'])->name('admin.create');
//     Route::post('ds-admin/store', [UserController::class, 'store'])->name('admin.store');

//     Route::resource('/responden', RespondenController::class);
//     Route::resource('/tenant', TenantController::class);
//     Route::resource('/pertanyaan', PertanyaanController::class);

//     Route::get('/penilaian', function () {
//         return view('admin/penilaian/index');
//     });
// });

// Route::middleware(['auth', 'role:super admin'])->group(function () {
//     // Routes untuk super admin
//     Route::get('/dashboard', function () {
//         return view('admin/dashboard/index');
//     });

//     Route::resource('ds-admin', UserController::class)->except(['create', 'store']);
//     Route::get('ds-admin/create', [UserController::class, 'create'])->name('admin.create');
//     Route::post('ds-admin/store', [UserController::class, 'store'])->name('admin.store');

//     Route::resource('/responden', RespondenController::class);
//     Route::resource('/tenant', TenantController::class);
//     Route::resource('/pertanyaan', PertanyaanController::class);

//     Route::get('/penilaian', function () {
//         return view('admin/penilaian/index');
//     });
// });