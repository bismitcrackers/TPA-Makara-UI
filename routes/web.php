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

Route::get('/successdc', 'PageController@successdc')->name('successdc');

Auth::routes();

Route::group(['prefix'=>'parent','as'=>'parent.'], function(){
    Route::get('/home', 'HomeController@parentHome')->name('home');
});

Route::group(['prefix'=>'teacher','as'=>'teacher.'], function(){
    Route::get('/home', 'HomeController@teacherHome')->name('home');
});

Route::group(['prefix'=>'headmaster','as'=>'headmaster.'], function(){
    Route::get('/home', 'HomeController@headmasterHome')->name('home');
});
