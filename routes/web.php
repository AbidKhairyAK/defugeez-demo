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

Route::get('/', function () {
    return redirect('/disasters');
});

// ======== Resource =========
Route::resource('/users', 'UsersController');
Route::resource('/posts','PostsController');
Route::resource('/disasters', 'DisastersController');

// ======== Table ==========
Route::get('/users/table', 'UsersController@table')->name('users.table');
Route::get('/posts/table', 'PostsController@table')->name('posts.table');
Route::get('/disasters/table', 'DisastersController@table')->name('disasters.table');


// ====== Test =======

Route::resource('/test', 'TestController');

Route::get('/test/laporan', function () {
    return view('app.test.report');
});

Route::post('/test/report', function () {
    return ;
})->name('test.report');
