<?php

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

Route::get('/', 'PageController@index')->name('index');
Route::get('/success', 'PageController@success')->name('success');
// temporary
Route::get('/liststudentkb', 'PageController@liststudentkb')->name('liststudentkb');

Route::get('/bukupenghubungkb', 'PageController@bukupenghubungkb')->name('bukupenghubungkb');

Route::get('/bukupenghubungdc', 'PageController@bukupenghubungdc')->name('bukupenghubungdc');

Route::get('/createbukupenghubungdc', 'PageController@createbukupenghubungdc')->name('createbukupenghubungdc');

Route::get('/showbukupenghubungkb', 'PageController@showbukupenghubungkb')->name('showbukupenghubungkb');

Route::get('/showbukupenghubungkb2', 'PageController@showbukupenghubungkb2')->name('showbukupenghubungkb2');

Route::get('/successdc', 'PageController@successdc')->name('successdc');

Route::get('/komentar', 'PageController@komentar')->name('komentar');

Route::get('/tambahkomentar', 'PageController@tambahkomentar')->name('tambahkomentar');

Auth::routes();

Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/home', 'HomeController@administratorHome')->name('home');
    Route::resource('berita', 'BeritaController');
});

Route::group(['prefix'=>'orangtua','as'=>'orangtua.'], function(){
    Route::get('/home', 'HomeController@parentHome')->name('home');
});

Route::group(['prefix'=>'guru','as'=>'guru.'], function(){
    Route::get('/home', 'HomeController@teacherHome')->name('home');
});

Route::group(['prefix'=>'fasilitator','as'=>'fasilitator.'], function(){
    Route::get('/home', 'HomeController@fasilitatorHome')->name('home');
});

Route::group(['prefix'=>'co-fasilitator','as'=>'cofasilitator.'], function(){
    Route::get('/home', 'HomeController@cofasilitatorHome')->name('home');
});

