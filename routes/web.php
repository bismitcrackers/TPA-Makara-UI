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

Route::get('/showbukupenghubungkb', 'PageController@showbukupenghubungkb')->name('showbukupenghubungkb');

Route::get('/showbukupenghubungkb2', 'PageController@showbukupenghubungkb2')->name('showbukupenghubungkb2');

Route::get('/successdc', 'PageController@successdc')->name('successdc');

Route::get('/typeclass', 'PageController@typeclass')->name('typeclass');

Route::get('/abyanprofile', 'PageController@abyanprofile')->name('abyanprofile');

Auth::routes();

Route::group(['prefix'=>'dailyBook', 'as'=>'dailyBook.'], function(){
    Route::get('/students/{class}', 'PageController@studentsList')->name('student');
    Route::group(['prefix'=>'{daily_book_id}'], function(){
        Route::group(['prefix'=>'comments', 'as'=>'comments.'], function(){
            Route::get('/show', 'PageController@showComments')->name('show');
            Route::get('/send', 'PageController@sendComments')->name('send');
            Route::post('/add', 'DailyBooksController@addComments')->name('add');
        });
    });
    Route::group(['prefix'=>'{student_id}'], function(){
        Route::get('/form', 'PageController@formDailyBook')->name('form');
        Route::get('/date/{month}/{year}', 'PageController@selectDate')->name('date');
        Route::get('/month', 'PageController@selectMonth')->name('month');
        Route::post('/add', 'DailyBooksController@addDailyBooks')->name('add');
    });
});

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
