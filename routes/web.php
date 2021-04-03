<?php

use Illuminate\Support\Facades\Auth;
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



Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth', 'admin')
    ->group(function () {
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');
        Route::resource('kategori-covid', 'KategoriGejalaCovidController');
        Route::resource('gejala-covid', 'GejalaCovidController');
        Route::resource('kasus-covid', 'KasusCovidController');
        Route::resource('dampak-covid', 'DampakCovidController');

        Route::get('keseluruhan-kasus', 'KasusCovidController@all')->name('kasus-covid.all');
        Route::resource('user', 'UserController');

        Route::get('profile', 'UserController@profile');
        Route::post('profile', 'UserController@update_avatar');
    });

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/diagnosis', 'HomeController@diagnosis')->name('home.diagnosis');
Route::post('/hasil', 'HomeController@hasil')->name('home.hasil');
Route::post('/simpan-hasil', 'HomeController@simpanhasil')->name('home.simpanhasil');
Route::get('/informasi', 'HomeController@daftardampak')->name('home.daftardampak');
Route::get('/informasi/{slug}', 'HomeController@dampak')->name('home.dampak');
