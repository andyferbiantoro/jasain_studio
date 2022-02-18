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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');


Route::post('proses-login','AuthController@proses_login')->name('proses-login')->middleware('guest');


Route::get('/', 'LandingpageController@index')->name('landingpage-index');

Route::group(['middleware' => ['auth', 'admin']],function(){
  

});
  Route::get('/dashboard', 'AdminController@index')->name('dashboard-index');
    Route::get('/admin_portofolio', 'AdminController@admin_portofolio')->name('admin_portofolio');
    Route::post('/admin_portofolio_add', 'AdminController@admin_portofolio_add')->name('admin_portofolio_add');
    Route::post('/admin_portofolio_update/{id}', 'AdminController@admin_portofolio_update')->name('admin_portofolio_update');
    Route::post('/admin_portofolio_delete/{id}', 'AdminController@admin_portofolio_delete')->name('admin_portofolio_delete');


    Route::get('/admin_layanan', 'AdminController@admin_layanan')->name('admin_layanan');
    Route::post('/admin_layanan_add', 'AdminController@admin_layanan_add')->name('admin_layanan_add');
    Route::post('/admin_layanan_update/{id}', 'AdminController@admin_layanan_update')->name('admin_layanan_update');
    Route::post('/admin_layanan_delete/{id}', 'AdminController@admin_layanan_delete')->name('admin_layanan_delete');

    Route::get('/admin_team', 'AdminController@admin_team')->name('admin_team');
    Route::post('/admin_team_add', 'AdminController@admin_team_add')->name('admin_team_add');
    Route::post('/admin_team_update/{id}', 'AdminController@admin_team_update')->name('admin_team_update');
    Route::post('/admin_team_delete/{id}', 'AdminController@admin_team_delete')->name('admin_team_delete');


    Route::get('/admin_galeri', 'AdminController@admin_galeri')->name('admin_galeri');
    Route::post('/admin_galeri_add', 'AdminController@admin_galeri_add')->name('admin_galeri_add');
    Route::post('/admin_galeri_update/{id}', 'AdminController@admin_galeri_update')->name('admin_galeri_update');
    Route::post('/admin_galeri_delete/{id}', 'AdminController@admin_galeri_delete')->name('admin_galeri_delete');

    Route::get('/admin_testimoni', 'AdminController@admin_testimoni')->name('admin_testimoni');
    Route::post('/admin_testimoni_add', 'AdminController@admin_testimoni_add')->name('admin_testimoni_add');
    Route::post('/admin_testimoni_update/{id}', 'AdminController@admin_testimoni_update')->name('admin_testimoni_update');
    Route::post('/admin_testimoni_delete/{id}', 'AdminController@admin_testimoni_delete')->name('admin_testimoni_delete');


Route::get('logout-admin', 'AuthController@logout')->name('logout-admin')->middleware(['admin', 'auth']);