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

<<<<<<< HEAD
Route::get('/bukupenghubungdcnotpublish', 'PageController@bukupenghubungdcnotpublish')->name('bukupenghubungdcnotpublish');
=======
Route::get('/showbukupenghubungkb3', 'PageController@showbukupenghubungkb3')->name('showbukupenghubungkb3');
>>>>>>> 2b57087b46b0f7aa99496d7fef9cbcc96ca346d7

Route::get('/bukupenghubungdcortu', 'PageController@bukupenghubungdcortu')->name('bukupenghubungdcortu');

<<<<<<< HEAD
Route::get('/createbukupenghubungdc', 'PageController@createbukupenghubungdc')->name('createbukupenghubungdc');
Route::get('/showbukupenghubungkb2', 'PageController@showbukupenghubungkb2')->name('showbukupenghubungkb2');

Route::get('/publishbukupenghubungdc', 'PageController@publishbukupenghubungdc')->name('publishbukupenghubungdc');

Route::get('/successdc', 'PageController@successdc')->name('successdc');

=======

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
>>>>>>> 2b57087b46b0f7aa99496d7fef9cbcc96ca346d7

Route::group(['prefix'=>'profile', 'as'=>'profile.'], function(){
    Route::get('/typeclass', 'PageController@selectClassProfile')->name('typeclass');
    Route::get('/students/{class}', 'PageController@studentsProfile')->name('student');
    Route::get('/details/{student_id}', 'PageController@profileDetails')->name('details');
});

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

Route::group(['prefix'=>'profile', 'as'=>'profile.'], function(){
    Route::get('/typeclass', 'PageController@selectClassProfile')->name('typeclass');
    Route::get('/students/{class}', 'PageController@studentsProfile')->name('student');
    Route::get('/details/{student_id}', 'PageController@profileDetails')->name('details');
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
