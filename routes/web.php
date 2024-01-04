<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('masyarakat/Home');
});
Route::get('/survey', function () {
    return view('survey');
});
Route::get('/layanan', function () {
    return view('masyarakat/layanan');
});
Route::get('/faq', function () {
    return view('FAQ');
});

// Route::get('/home','MasyarakatController@depan');