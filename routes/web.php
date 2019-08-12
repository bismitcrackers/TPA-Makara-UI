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
Route::get('/editprofilesiswa', 'PageController@editProfileSiswa')->name('editProfileSiswa');
Route::get('/editprofileibu', 'PageController@editProfileIbu')->name('editProfileIbu');
Route::get('/editprofileayah', 'PageController@editProfileAyah')->name('editProfileAyah');
Route::get('/pengumumankegiatan', 'PageController@pengumumanKegiatan')->name('pengumumanKegiatan');
Route::get('/ubahpengumuman', 'PageController@ubahPengumuman')->name('ubahPengumuman');
Route::get('/showpengumuman', 'PageController@showPengumuman')->name('showPengumuman');

Auth::routes();

Route::group(['prefix'=>'dailyBook', 'as'=>'dailyBook.'], function(){

    Route::get('/class', 'PageController@selectClassDailyBook')->name('class');

    Route::group(['prefix'=>'{daily_book_id}'], function(){
        Route::group(['prefix'=>'comments', 'as'=>'comments.'], function(){
            Route::get('/show', 'PageController@showComments')->name('show');
            Route::get('/send', 'PageController@sendComments')->name('send');
            Route::post('/add', 'DailyBooksController@addComments')->name('add');
        });
    });

    Route::group(['prefix'=>'DayCare', 'as'=>'dc.'], function(){
        Route::get('/students', 'PageController@dayCareStudents')->name('student');
        Route::group(['prefix'=>'{student_id}'], function(){
            Route::get('/form', 'PageController@formDailyBookDayCare')->name('form');
            Route::get('/month', 'PageController@dayCareSelectMonth')->name('month');
            Route::get('/date/{month}/{year}', 'PageController@dayCareSelectDate')->name('date');
            Route::get('/date/parent', 'PageController@dayCareSelectDateParent')->name('date.parent');
            Route::get('/review/{day}/{month}/{year}', 'PageController@reviewDailyBookDayCare')->name('review');
            Route::get('/show/{day}/{month}/{year}', 'PageController@showDailyBookDayCare')->name('show');
            // Route::get('/read/{dailyBook}', 'DailyBooksController@isReadDailyBook')->name('read');
            Route::post('/add', 'DailyBooksController@addDailyBooksDayCare')->name('add');
            Route::post('/publish/{dailyBook}', 'DailyBooksController@publishDailyBookDayCare')->name('publish');
        });
    });

    Route::group(['prefix'=>'KelompokBermain', 'as'=>'kb.'], function(){
        Route::get('/students', 'PageController@kelompokBermainStudents')->name('student');
        Route::group(['prefix'=>'{student_id}'], function(){
            Route::get('/form', 'PageController@formDailyBookKelompokBermain')->name('form');
            Route::get('/month', 'PageController@kelompokBermainSelectMonth')->name('month');
            Route::get('/date/{month}/{year}', 'PageController@kelompokBermainSelectDate')->name('date');
            Route::get('/date/parent', 'PageController@kelompokBermainSelectDateParent')->name('date.parent');
            Route::get('/review/{day}/{month}/{year}', 'PageController@reviewDailyBookKelompokBermain')->name('review');
            Route::get('/show/{day}/{month}/{year}', 'PageController@showDailyBookKelompokBermain')->name('show');
            // Route::get('/read/{dailyBook}', 'DailyBooksController@isReadDailyBook')->name('read');
            Route::post('/add', 'DailyBooksController@addDailyBooksKelompokBermain')->name('add');
            Route::post('/publish/{dailyBook}', 'DailyBooksController@publishDailyBookKelompokBermain')->name('publish');
        });
    });
});

Route::group(['prefix'=>'profile', 'as'=>'profile.'], function(){
    Route::get('/typeclass', 'PageController@selectClassProfile')->name('typeclass');
    Route::get('/DayCare/students/', 'PageController@studentsProfileDayCare')->name('dc.student');
    Route::get('/KelompokBermain/students', 'PageController@studentsProfileKelompokBermain')->name('kb.student');
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
    Route::get('/students', 'PageController@studentsProfileDayCare')->name('dc.student');
    Route::get('/students', 'PageController@studentsProfileKelompokBermain')->name('kb.student');
    Route::get('/details/{student_id}', 'PageController@profileDetails')->name('details');
});

Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/home', 'HomeController@administratorHome')->name('home');
    Route::resource('berita', 'BeritaController');
    Route::resource('pengumuman','PengumumanController');
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
